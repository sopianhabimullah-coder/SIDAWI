<x-app-layout>
    <x-slot name="header">Dashboard</x-slot>

    <style>
    /* ... css yang sudah ada ... */

    @media (max-width: 768px) {
        .row > [class*="col-md"] { margin-bottom: 12px; }
        canvas { max-height: 200px; }
    }

    @media (max-width: 576px) {
        .row.g-4 > div { padding: 6px; }
        .stat-value { font-size: 1.5rem; }
        .stat-icon { font-size: 1.5rem; }
        canvas { max-height: 180px; }
    }
</style>

    {{-- Header Profil - TETAP SAMA SEPERTI SEBELUMNYA --}}
    <div class="card border-0 shadow-sm mb-4"
         style="border-radius:16px; background: linear-gradient(135deg, #1e3a5f 0%, #2d6a4f 100%)">
        <div class="card-body text-white py-4 px-4">
            <div class="d-flex align-items-center gap-4">
                <img src="{{ asset('images/LOGO PKK PNG.png') }}" alt="Logo PKK"
                     style="width:70px;height:70px;object-fit:contain;filter:drop-shadow(0 2px 8px rgba(0,0,0,0.3))">
                <div>
                    <h4 class="fw-bold mb-1">KELOMPOK DASA WISMA {{ strtoupper($profil->nama_dasawisma ?? '-') }}</h4>
                    <div class="d-flex flex-wrap gap-3" style="font-size:0.85rem;opacity:0.9">
                        <span>🏠 RT {{ $profil->rt ?? '-' }} / RW {{ $profil->rw ?? '-' }}</span>
                        <span>🏘️ Desa {{ $profil->desa ?? '-' }}</span>
                        <span>📍 Kec. {{ $profil->kecamatan ?? '-' }}</span>
                        <span>📅 Tahun {{ $profil->tahun ?? '-' }}</span>
                        <span>👩‍💼 Ketua: {{ $profil->nama_ketua ?? '-' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- BARIS 1: Top Summary Cards (Statistik Utama Berbentuk Kartu Ringkas) --}}
    <div class="row g-4 mb-4">
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm p-3" style="border-radius: 14px; background: #ffffff;">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted small text-uppercase fw-semibold" style="letter-spacing: 0.5px;">Jumlah KK</span>
                        <h3 class="fw-bold mb-0 mt-1" style="color: #1e3a5f;">{{ $jumlahKK }}</h3>
                    </div>
                    <div class="p-3 bg-light rounded-3 text-primary fs-4">🏠</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm p-3" style="border-radius: 14px; background: #ffffff;">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted small text-uppercase fw-semibold" style="letter-spacing: 0.5px;">Total Warga</span>
                        <h3 class="fw-bold mb-0 mt-1" style="color: #2d6a4f;">{{ $totalLakiLaki + $totalPerempuan }}</h3>
                    </div>
                    <div class="p-3 bg-light rounded-3 text-success fs-4">👨‍👩‍👧‍👦</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm p-3" style="border-radius: 14px; background: #ffffff;">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted small text-uppercase fw-semibold" style="letter-spacing: 0.5px;">Balita</span>
                        <h3 class="fw-bold mb-0 mt-1" style="color: #d97706;">{{ $totalBalita }}</h3>
                    </div>
                    <div class="p-3 bg-light rounded-3 text-warning fs-4">👶</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm p-3" style="border-radius: 14px; background: #ffffff;">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted small text-uppercase fw-semibold" style="letter-spacing: 0.5px;">Lansia</span>
                        <h3 class="fw-bold mb-0 mt-1" style="color: #7c3aed;">{{ $totalLansia }}</h3>
                    </div>
                    <div class="p-3 bg-light rounded-3 text-info fs-4">🧓</div>
                </div>
            </div>
        </div>
    </div>

    @php
    // Sisa data dikelompokkan ke tabel detail yang lebih ringkas
    $sections = [
        [
            'title' => '❤️ Kesehatan Ibu & Anak',
            'color' => '#0d6e6e',
            'data' => [
                ['Pasangan Usia Subur (PUS)', $totalPus],
                ['Wanita Usia Subur (WUS)', $totalWus],
                ['Ibu Hamil', $totalIbuHamil],
                ['Ibu Menyusui', $totalIbuMenyusui],
                ['3 Buta', $totalTigaButa],
                ['Warga Berkebutuhan Khusus', $totalBerkebutuhanKhusus],
            ]
        ],
        [
            'title' => '🏠 Kriteria Rumah & Pangan',
            'color' => '#15803d',
            'data' => [
                ['Sehat Layak Huni', $totalSehatLayakHuni],
                ['Tidak Layak Huni', $totalTidakLayakHuni],
                ['Memiliki Tempat Sampah', $totalTempatSampah],
                ['Memiliki SPAL', $totalSpal],
                ['Memiliki Jamban Keluarga', $totalJamban],
                ['Menempel Stiker P4K', $totalStikerP4k],
                ['Makanan Pokok: Beras', $totalBeras],
                ['Makanan Pokok: Non Beras', $totalNonBeras],
            ]
        ],
    ];
    @endphp

    {{-- BARIS 2: Pembagian Grid antara Tabel Detail vs Grafik Berdampingan --}}
    <div class="row g-4 mb-4">
        <div class="col-lg-7">
            <div class="row g-4">
                @foreach($sections as $section)
                <div class="col-12">
                    <div class="card border-0 shadow-sm" style="border-radius:14px; overflow:hidden">
                        <div class="card-header text-white fw-bold py-3 px-4 border-0"
                             style="background: linear-gradient(90deg, {{ $section['color'] }}, {{ $section['color'] }}cc)">
                            {{ $section['title'] }}
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0 align-middle">
                                    <tbody>
                                        @foreach($section['data'] as $row)
                                        <tr>
                                            <td class="px-4 py-2-5 text-secondary" style="font-size: 0.95rem;">{{ $row[0] }}</td>
                                            <td class="px-4 py-2-5 text-end font-monospace" style="color:{{ $section['color'] }}; font-size:1.15rem;">
                                                <span class="badge bg-light text-dark border px-3 py-2" style="border-radius: 8px;">{{ $row[1] }}</span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                {{-- Tabel Kegiatan Warga --}}
                <div class="col-12">
                    <div class="card border-0 shadow-sm" style="border-radius:14px; overflow:hidden">
                        <div class="card-header text-white fw-bold py-3 px-4 border-0"
                             style="background: linear-gradient(90deg, #2d6a4f, #1b4332)">
                            🤝 Warga Mengikuti Kegiatan
                        </div>
                        <div class="card-body p-3">
                            <div class="row g-3">
                                <div class="col-6">
                                    <div class="p-3 border rounded-3 bg-light">
                                        <small class="text-muted d-block">UP2K</small>
                                        <span class="fs-4 fw-bold text-dark">{{ $totalUp2k }}</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="p-3 border rounded-3 bg-light">
                                        <small class="text-muted d-block">Pemanfaatan Pekarangan</small>
                                        <span class="fs-4 fw-bold text-dark">{{ $totalPekarangan }}</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="p-3 border rounded-3 bg-light">
                                        <small class="text-muted d-block">Industri Rumah Tangga</small>
                                        <span class="fs-4 fw-bold text-dark">{{ $totalIndustriRT }}</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="p-3 border rounded-3 bg-light">
                                        <small class="text-muted d-block">Kerja Bakti</small>
                                        <span class="fs-4 fw-bold text-dark">{{ $totalKerjaBakti }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="row g-4">
                <div class="col-12">
                    <div class="card border-0 shadow-sm" style="border-radius:12px;overflow:hidden">
                        <div class="card-header bg-white border-0 pt-3 px-4 text-dark fw-bold">
                            📊 Perbandingan Laki-Laki & Perempuan
                        </div>
                        <div class="card-body d-flex justify-content-center align-items-center" style="height: 220px;">
                            <canvas id="chartGender"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card border-0 shadow-sm" style="border-radius:12px;overflow:hidden">
                        <div class="card-header bg-white border-0 pt-3 px-4 text-dark fw-bold">
                            📊 Grafik Sumber Air Keluarga
                        </div>
                        <div class="card-body d-flex justify-content-center align-items-center" style="height: 220px;">
                            <canvas id="chartAir"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card border-0 shadow-sm" style="border-radius:12px;overflow:hidden">
                        <div class="card-header bg-white border-0 pt-3 px-4 text-dark fw-bold">
                            📊 Cakupan Kondisi Rumah (Donut)
                        </div>
                        <div class="card-body d-flex justify-content-center align-items-center" style="height: 240px;">
                            <canvas id="chartRumah"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Script JavaScript untuk Inisialisasi Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Set opsi global agar chart responsif dan memiliki ujung tumpul halus
        Chart.defaults.responsive = true;
        Chart.defaults.maintainAspectRatio = false;

        // 1. Grafik Jenis Kelamin (Doughnut)
        new Chart(document.getElementById('chartGender'), {
            type: 'doughnut',
            data: {
                labels: ['Laki-laki', 'Perempuan'],
                datasets: [{
                    data: [{{ $totalLakiLaki }}, {{ $totalPerempuan }}],
                    backgroundColor: ['#1e3a5f', '#ec4899'],
                    borderWidth: 2,
                }]
            },
            options: { plugins: { legend: { position: 'bottom' } } }
        });

        // 2. Grafik Kriteria Rumah (Polar Area / Pie)
        new Chart(document.getElementById('chartRumah'), {
            type: 'polarArea',
            data: {
                labels: ['Layak Huni','Tidak Layak','Sampah','SPAL','Jamban','P4K'],
                datasets: [{
                    data: [{{ $totalSehatLayakHuni }},{{ $totalTidakLayakHuni }},{{ $totalTempatSampah }},{{ $totalSpal }},{{ $totalJamban }},{{ $totalStikerP4k }}],
                    backgroundColor: ['#15803d','#ef4444','#f59e0b','#10b981','#3b82f6','#6366f1'],
                }]
            },
            options: { plugins: { legend: { position: 'right', labels: { boxWidth: 12 } } } }
        });

        // 3. Grafik Sumber Air (Pie)
        new Chart(document.getElementById('chartAir'), {
            type: 'pie',
            data: {
                labels: ['PDAM','Sumur','Lainnya'],
                datasets: [{
                    data: [{{ $totalPdam }},{{ $totalSumur }},{{ $totalDllAir }}],
                    backgroundColor: ['#2563eb','#06b6d4','#94a3b8'],
                    borderWidth: 1,
                }]
            },
            options: { plugins: { legend: { position: 'bottom' } } }
        });
    </script>

{{-- Footer Tambahan --}}
    <footer class="mt-5 pt-4 pb-3 border-top text-center text-md-start">
        <div class="row align-items-center g-2 text-muted" style="font-size: 0.85rem;">
            <div class="col-md-6">
                <span class="fw-semibold text-dark">Sistem Informasi Dasa Wisma (SIDAWI)</span>
                <span class="mx-2 text-secondary">|</span>
                <span>Versi 1.0</span>
            </div>
            <div class="col-md-6 text-md-end text-secondary">
                &copy; {{ date('Y') }} Hak Cipta Kelompok 4.
            </div>
        </div>
    </footer>
</x-app-layout>