<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    // Menampilkan semua divisi
    public function index()
    {
        $divisions = Division::all();  // Ambil semua data dari tabel divisions
        return view('divisions.index', compact('divisions'));
    }

    // Menampilkan form untuk membuat divisi baru
    public function create()
    {
        return view('divisions.create');
    }

    // Menyimpan divisi baru ke dalam database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',  // Validasi input
            'description' => 'nullable|string|max:1000',
        ]);

        Division::create($request->all());  // Menyimpan data divisi baru

        return redirect()->route('divisions.index')
            ->with('success', 'Division created successfully.');
    }

    // Menampilkan form untuk mengedit divisi
    public function edit($id)
    {
        $division = Division::findOrFail($id);  // Mencari divisi berdasarkan ID
        return view('divisions.edit', compact('division'));
    }

    // Menyimpan perubahan divisi
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        $division = Division::findOrFail($id);  // Mencari divisi berdasarkan ID
        $division->update($request->all());     // Mengupdate data divisi

        return redirect()->route('divisions.index')
            ->with('success', 'Division updated successfully.');
    }

    // Menghapus divisi
    public function destroy($id)
    {
        $division = Division::findOrFail($id);  // Mencari divisi berdasarkan ID
        $division->delete();                    // Menghapus data divisi

        return redirect()->route('divisions.index')
            ->with('success', 'Division deleted successfully.');
    }
}
