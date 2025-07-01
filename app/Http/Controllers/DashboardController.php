<?php

namespace App\Http\Controllers;

use App\Models\Internship;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{public function index(Request $request)
{
    // Ambil tahun dan bulan dari query string atau set default
    $year = $request->get('year', Carbon::now()->year);
    $month = $request->get('month', Carbon::now()->month);

    // Mendapatkan data internships berdasarkan range tahun, hanya yang accepted = true
    $monthlyData = Internship::with('division')
        ->where('accepted', true) // Hanya mengambil yang accepted = true
        ->where(function($query) use ($year) {
            $query->whereYear('start_date', $year)
                ->orWhereYear('end_date', $year)
                ->orWhere(function($q) use ($year) {
                    $q->where('start_date', '<=', Carbon::create($year, 12, 31))
                        ->where('end_date', '>=', Carbon::create($year, 1, 1));
                });
        })
        ->get();

    // Menyiapkan data untuk Monthly
    $formattedData = [];

    foreach ($monthlyData as $internship) {
        $divisionName = $internship->division->name;
        $startDate = Carbon::parse($internship->start_date);
        $endDate = Carbon::parse($internship->end_date);
        $participantCount = $internship->participant_count;

        $currentMonth = $startDate->copy();

        while ($currentMonth->lte($endDate)) {
            $monthKey = $currentMonth->format('Y-m');

            if (!isset($formattedData[$divisionName])) {
                $formattedData[$divisionName] = [];
            }

            if (!isset($formattedData[$divisionName][$monthKey])) {
                $formattedData[$divisionName][$monthKey] = 0;
            }

            $formattedData[$divisionName][$monthKey] += $participantCount;
            $currentMonth->addMonth();
        }
    }

    // Menyiapkan data untuk tanggal harian
    $dailyData = [];
    $dates = [];

    $startDate = Carbon::create($year, $month, 1);
    $endDate = $startDate->copy()->endOfMonth();

    while ($startDate->lte($endDate)) {
        $dates[] = $startDate->format('Y-m-d');
        $startDate->addDay();
    }

    foreach ($monthlyData as $internship) {
        $divisionName = $internship->division->name;
        $startDate = Carbon::parse($internship->start_date);
        $endDate = Carbon::parse($internship->end_date);
        $participantCount = $internship->participant_count;

        $currentDate = $startDate->copy();

        while ($currentDate->lte($endDate)) {
            $dateKey = $currentDate->format('Y-m-d');

            if (!isset($dailyData[$divisionName])) {
                $dailyData[$divisionName] = [];
            }

            if (!isset($dailyData[$divisionName][$dateKey])) {
                $dailyData[$divisionName][$dateKey] = 0;
            }

            $dailyData[$divisionName][$dateKey] += $participantCount;
            $currentDate->addDay();
        }
    }

    // Mengambil daftar tahun unik untuk filter tahun
    $years = Internship::where('accepted', true) // Tambahkan filter accepted = true di sini juga
        ->selectRaw('YEAR(start_date) as year')
        ->union(
            Internship::where('accepted', true)->selectRaw('YEAR(end_date) as year')
        )
        ->distinct()
        ->pluck('year')
        ->sortDesc();

    return view('admin.dashboard', compact('formattedData', 'year', 'month', 'dailyData', 'dates', 'years'));
}
}