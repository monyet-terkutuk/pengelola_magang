<x-app-layout>
    <div class="container-fluid py-4">
        {{-- <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Divisi</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        $53,000
                                        <span class="text-success text-sm font-weight-bolder">+55%</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Peserta Magang Bulan
                                        Ini</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        2,300
                                        <span class="text-success text-sm font-weight-bolder">+3%</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Peserta Magang Tahun
                                        Ini</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        +3,462
                                        <span class="text-danger text-sm font-weight-bolder">-2%</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Peserta
                                        Magang</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        $103,430
                                        <span class="text-success text-sm font-weight-bolder">+5%</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        {{-- Table --}}

        <div class="row my-4">
            <div class="col-lg-12 col-md-8 mb-md-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-6 col-7">
                                <h6>Rekaptulasi Peserta Magang</h6>
                                <p class="text-sm mb-0">
                                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                                    <span class="font-weight-bold ms-1">Untuk bulan</span> saat ini
                                </p>

                            </div>

                            <div class="col-lg-2 col-1 my-auto mx-auto text-end">
                                <div>
                                    <select class="form-select" id="monthSelect">
                                        <option value="1" {{ $month == 1 ? 'selected' : '' }}>January</option>
                                        <option value="2" {{ $month == 2 ? 'selected' : '' }}>February</option>
                                        <option value="3" {{ $month == 3 ? 'selected' : '' }}>March</option>
                                        <option value="4" {{ $month == 4 ? 'selected' : '' }}>April</option>
                                        <option value="5" {{ $month == 5 ? 'selected' : '' }}>May</option>
                                        <option value="6" {{ $month == 6 ? 'selected' : '' }}>June</option>
                                        <option value="7" {{ $month == 7 ? 'selected' : '' }}>July</option>
                                        <option value="8" {{ $month == 8 ? 'selected' : '' }}>August</option>
                                        <option value="9" {{ $month == 9 ? 'selected' : '' }}>September</option>
                                        <option value="10" {{ $month == 10 ? 'selected' : '' }}>October</option>
                                        <option value="11" {{ $month == 11 ? 'selected' : '' }}>November</option>
                                        <option value="12" {{ $month == 12 ? 'selected' : '' }}>December</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Division
                                        </th>
                                        @foreach ($dates as $date)
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                {{ \Carbon\Carbon::parse($date)->format('d') }}
                                            </th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dailyData as $division => $daysData)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $division }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            @foreach ($dates as $date)
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-xs font-weight-bold">
                                                        {{ isset($daysData[$date]) ? $daysData[$date] : "-" }} </span>
                                                </td>
                                            @endforeach
                                        </tr>

                                    @endforeach

                                </tbody>
                                <tfoot class="text-center">
                                    <tr>
                                        <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Total
                                        </td>
                                        @php
                                            $totalPerColumn = [];
                                            foreach ($dates as $date) {
                                                $totalPerColumn[$date] = 0;
                                                foreach ($dailyData as $daysData) {
                                                    $totalPerColumn[$date] += isset($daysData[$date]) ? $daysData[$date] : 0;
                                                }
                                            }
                                        @endphp
                                        @foreach ($dates as $date)
                                            <td
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                {{ $totalPerColumn[$date] }}
                                            </td>
                                        @endforeach

                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                            <div class="mb-3 mb-sm-0">
                                <h5 class="card-title fw-semibold">Rekaptulasi Peserta Magang</h5>
                            </div>
                            <div>
                                <select class="form-select" id="yearSelect">
                                    @foreach($years as $yearOption)
                                        <option value="{{ $yearOption }} " {{ $yearOption == $year ? 'selected' : '' }}>
                                            {{ $yearOption }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div id="chartInternship"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        // Mengambil data formattedData yang dikirim ke view
        var chartData = @json($formattedData);

        // Menyusun categories (bulan) dan series (data peserta) dari data yang diterima
        var categories = [];
        var seriesData = [];

        // Daftar bulan yang harus ada (menggunakan nama bulan)
        var allMonths = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];

        // Menyusun data untuk chart berdasarkan data yang diterima
        for (var division in chartData) {
            var divisionData = chartData[division];
            var dataPoints = [];

            // Menyusun data untuk setiap division dan setiap bulan
            allMonths.forEach(function (month, index) {
                var monthKey = `2025-${(index + 1).toString().padStart(2, '0')}`;  // Format: "2025-01"
                if (divisionData.hasOwnProperty(monthKey)) {
                    dataPoints.push(divisionData[monthKey]);
                } else {
                    // Jika data untuk bulan tidak ada, set 0
                    dataPoints.push(0);
                }

                // Tambahkan bulan ke kategori jika belum ada
                if (!categories.includes(month)) {
                    categories.push(month);
                }
            });

            seriesData.push({
                name: division,
                data: dataPoints
            });
        }

        // Menampilkan chart menggunakan ApexCharts
        var chartOptions = {
            series: seriesData,
            chart: {
                type: 'bar',
                height: 345,
                offsetX: -15,
                toolbar: { show: true },
                foreColor: "#adb0bb",
                fontFamily: 'inherit',
                sparkline: { enabled: false },
            },
            colors: ["#5D87FF", "#49BEFF", "#FF5733", "#9C27B0"], // Menambahkan warna sesuai jumlah division
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: "35%",
                    borderRadius: [6],
                    borderRadiusApplication: 'end',
                    borderRadiusWhenStacked: 'all'
                },
            },
            markers: { size: 0 },
            dataLabels: {
                enabled: false,
            },
            legend: {
                show: true,
                position: 'top'
            },
            grid: {
                borderColor: "rgba(0,0,0,0.1)",
                strokeDashArray: 3,
                xaxis: {
                    lines: {
                        show: false,
                    },
                },
            },
            xaxis: {
                type: "category",
                categories: categories,  // Menyusun kategori berdasarkan bulan yang sudah diurutkan
                labels: {
                    style: { cssClass: "grey--text lighten-2--text fill-color" },
                },
            },
            yaxis: {
                show: true,
                min: 0,
                max: 10, // Menetapkan nilai max di sumbu Y ke 10
                tickAmount: 5, // Membuat ticks lebih banyak agar lebih terperinci
                labels: {
                    style: {
                        cssClass: "grey--text lighten-2--text fill-color",
                    },
                },
            },
            stroke: {
                show: true,
                width: 3,
                lineCap: "butt",
                colors: ["transparent"],
            },
            tooltip: { theme: "light" },
            responsive: [
                {
                    breakpoint: 600,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 3,
                            }
                        },
                    }
                }
            ]
        };

        var chart = new ApexCharts(document.querySelector("#chartInternship"), chartOptions);
        chart.render();

        // Menambahkan event listener untuk bulan yang dipilih
        document.getElementById('monthSelect').addEventListener('change', function () {
            const selectedMonth = this.value;
            window.location.href = `?month=${selectedMonth}`;
        });
    </script>

</x-app-layout>