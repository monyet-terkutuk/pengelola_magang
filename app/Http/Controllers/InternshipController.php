<?php

namespace App\Http\Controllers;

use App\Models\Internship;
use App\Models\Division;
use App\Models\Participation;
use Illuminate\Http\Request;

class InternshipController extends Controller
{
    // Menampilkan semua data Internship
    public function index()
    {
        $internships = Internship::with('division')->get(); // Mengambil data internships beserta divisi terkait
        return view('internships.index', compact('internships'));
    }

    // Menampilkan form untuk membuat Internship baru
    public function create()
    {
        $divisions = Division::all();  // Menampilkan divisi untuk dipilih pada form
        return view('internships.create', compact('divisions'));
    }

     public function show($id)
    {
        // Ambil internship dengan id yang sesuai dan sertakan data peserta
        $internship = Internship::with('participations')->findOrFail($id);

        // Tampilkan halaman detail
        return view('internships.show', compact('internship'));
    }

    // Menyimpan Internship baru ke dalam database
public function store(Request $request)
{
    // Validasi inputan
    $request->validate([
        'letter_date' => 'required|date',
        'institution_name' => 'required|string|max:255',
        'major' => 'required|string|max:255',
        'participant_count' => 'required|integer',
        'division_id' => 'nullable|exists:divisions,id',
        'start_date' => 'nullable|date',
        'end_date' => 'nullable|date|after_or_equal:start_date',
        'request_letter' => 'boolean',
        'acceptance_letter' => 'boolean',
        'kesbangpol_letter' => 'boolean',
        'documentation' => 'nullable|string',
        'contact_person' => 'required|string|max:255',
        'participations' => 'required|array', // Validasi peserta
        'participations.*.name' => 'required|string|max:255', // Validasi nama peserta
        'participations.*.email' => 'required|email', // Validasi email peserta
        'participations.*.address' => 'nullable|string|max:255',
        'participations.*.date_of_birth' => 'nullable|date',
        'participations.*.phone' => 'nullable|string|max:15',
    ]);

    // Mengecek kondisi dan set value documentation
    $documentation = ($request->request_letter && $request->acceptance_letter && $request->kesbangpol_letter) ? 'Lengkap' : 'Belum Lengkap';

    // Validasi agar tidak ada nama dan email yang sama di antara peserta
    $names = [];
    $emails = [];
    foreach ($request->participations as $key => $participation) {
        if (in_array($participation['name'], $names)) {
            // Jika nama sudah ada
            return redirect()->back()->withErrors([
                'participations' => 'Peserta dengan nama "' . $participation['name'] . '" sudah ada.'
            ])->withInput();
        }
        $names[] = $participation['name'];

        if (in_array($participation['email'], $emails)) {
            // Jika email sudah ada
            return redirect()->back()->withErrors([
                'participations' => 'Peserta dengan email "' . $participation['email'] . '" sudah ada.'
            ])->withInput();
        }
        $emails[] = $participation['email'];
    }

    // Mengecek apakah ada peserta dengan nama, institusi, dan penempatan yang sama di dalam database
    foreach ($request->participations as $participation) {
        $existingParticipant = Participation::where('name', $participation['name'])
            ->where('email', $participation['email'])
            ->whereHas('internship', function ($query) use ($request) {
                $query->where('institution_name', $request->institution_name)
                      ->where('division_id', $request->division_id);
            })
            ->first();

        if ($existingParticipant) {
            // Jika sudah ada, tampilkan pesan error
            return redirect()->back()->withErrors([
                'participations' => 'Peserta dengan nama ' . $participation['name'] . ' dan email ' . $participation['email'] . ' sudah ada pada institusi dan penempatan yang sama.'
            ])->withInput();
        }
    }

    // Menyimpan Internship baru ke dalam database
    $internship = Internship::create(array_merge($request->all(), ['documentation' => $documentation]));

    // Menyimpan peserta-peserta terkait
    foreach ($request->participations as $participation) {
        $internship->participations()->create($participation);  // Pastikan sudah ada relasi "participations" di model Internship
    }

    return redirect()->route('internships.index')
        ->with('success', 'Internship created successfully.');
}


    // Menampilkan form untuk mengedit Internship
    public function edit($id)
    {
        $internship = Internship::findOrFail($id);
        $divisions = Division::all(); // Menampilkan divisi untuk dipilih pada form
        return view('internships.edit', compact('internship', 'divisions'));
    }

        // Menyimpan perubahan Internship
public function update(Request $request, $id)
{
    $request->validate([
        'letter_date' => 'required|date',
        'institution_name' => 'required|string|max:255',
        'major' => 'required|string|max:255',
        'participant_count' => 'required|integer',
        'division_id' => 'nullable|exists:divisions,id',
        'start_date' => 'nullable|date',
        'end_date' => 'nullable|date|after_or_equal:start_date',
        'request_letter' => 'boolean',
        'acceptance_letter' => 'boolean',
        'kesbangpol_letter' => 'boolean',
        'documentation' => 'nullable|string',
        'contact_person' => 'required|string|max:255',
        'participations' => 'required|array',
        'participations.*.name' => 'required|string|max:255',
        'participations.*.email' => 'required|email',
    ]);

    $internship = Internship::findOrFail($id);

    // Update Internship
    $internship->update($request->except('participations'));

    // Update Participants
    foreach ($request->participations as $participationData) {
        $participation = Participation::findOrFail($participationData['id']);
        $participation->update($participationData);
    }

    return redirect()->route('internships.index')
        ->with('success', 'Internship updated successfully.');
}



    // Menghapus Internship
    public function destroy($id)
    {
        $internship = Internship::findOrFail($id);
        $internship->delete();

        return redirect()->route('internships.index')
            ->with('success', 'Internship deleted successfully.');
    }
}
