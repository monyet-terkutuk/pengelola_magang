<?php

namespace App\Http\Controllers;

use App\Models\Internship;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Ambil tahun dan bulan dari query string atau set default
        $year = $request->get('year', Carbon::now()->year);
        $month = $request->get('month', Carbon::now()->month);

        // Mendapatkan data internships berdasarkan range tahun
        $monthlyData = Internship::with('division')
            ->where(function($query) use ($year) {
                // Filter berdasarkan start_date dan end_date yang mencakup tahun yang dipilih
                $query->whereYear('start_date', $year)
                    ->orWhereYear('end_date', $year)
                    ->orWhere(function($q) use ($year) {
                        $q->where('start_date', '<=', Carbon::create($year, 12, 31))
                            ->where('end_date', '>=', Carbon::create($year, 1, 1));
                    });
            })
            ->get();

        // Menyiapkan data yang akan dikirim ke view untuk Monthly
        $formattedData = [];

        // Loop melalui semua divisi untuk menghitung data per bulan
        foreach ($monthlyData as $internship) {
            $divisionName = $internship->division->name;  // Ambil nama divisi
            $startDate = Carbon::parse($internship->start_date);  // Parse start_date
            $endDate = Carbon::parse($internship->end_date);  // Parse end_date
            $participantCount = $internship->participant_count;  // Ambil jumlah peserta

            // Loop untuk menghitung data per bulan berdasarkan rentang tanggal (start_date - end_date)
            $currentMonth = $startDate->copy(); // Mulai dari bulan pertama internship

            // Periksa setiap bulan dalam rentang tanggal
            while ($currentMonth->lte($endDate)) {
                $monthKey = $currentMonth->format('Y-m');  // Format bulan-tahun sebagai kunci

                // Jika divisi belum ada dalam formattedData, tambahkan
                if (!isset($formattedData[$divisionName])) {
                    $formattedData[$divisionName] = [];
                }

                // Jika bulan belum ada untuk divisi, set menjadi 0
                if (!isset($formattedData[$divisionName][$monthKey])) {
                    $formattedData[$divisionName][$monthKey] = 0;
                }

                // Tambahkan jumlah peserta untuk bulan ini
                $formattedData[$divisionName][$monthKey] += $participantCount;

                // Pindah ke bulan berikutnya
                $currentMonth->addMonth();
            }
        }

        // Menyiapkan data untuk tanggal harian
        $dailyData = [];
        $dates = [];

        // Menyusun tanggal dalam bulan yang dipilih
        $startDate = Carbon::create($year, $month, 1);
        $endDate = $startDate->copy()->endOfMonth();
        
        // Menyusun array tanggal dalam bulan
        while ($startDate->lte($endDate)) {
            $dates[] = $startDate->format('Y-m-d'); // Menyimpan setiap tanggal
            $startDate->addDay();
        }

        // Loop untuk menghitung data per hari berdasarkan rentang tanggal (start_date - end_date)
        foreach ($monthlyData as $internship) {
            $divisionName = $internship->division->name;  // Ambil nama divisi
            $startDate = Carbon::parse($internship->start_date);  // Parse start_date
            $endDate = Carbon::parse($internship->end_date);  // Parse end_date
            $participantCount = $internship->participant_count;  // Ambil jumlah peserta

            // Loop untuk menghitung data per hari berdasarkan rentang tanggal (start_date - end_date)
            $currentDate = $startDate->copy(); // Mulai dari tanggal pertama internship

            // Periksa setiap tanggal dalam rentang tanggal
            while ($currentDate->lte($endDate)) {
                $dateKey = $currentDate->format('Y-m-d');  // Format tanggal sebagai kunci

                // Jika divisi belum ada dalam dailyData, tambahkan
                if (!isset($dailyData[$divisionName])) {
                    $dailyData[$divisionName] = [];
                }

                // Jika tanggal belum ada untuk divisi, set menjadi 0
                if (!isset($dailyData[$divisionName][$dateKey])) {
                    $dailyData[$divisionName][$dateKey] = 0;
                }

                // Tambahkan jumlah peserta untuk tanggal ini
                $dailyData[$divisionName][$dateKey] += $participantCount;

                // Pindah ke tanggal berikutnya
                $currentDate->addDay();
            }
        }

        // Mengambil daftar tahun unik untuk filter tahun
        $years = Internship::selectRaw('YEAR(start_date) as year')
            ->union(
                Internship::selectRaw('YEAR(end_date) as year')
            )
            ->distinct()
            ->pluck('year')
            ->sortDesc();

        // Kirim data ke view
        return view('admin.dashboard', compact('formattedData', 'year', 'month', 'dailyData', 'dates', 'years'));
    }
}
