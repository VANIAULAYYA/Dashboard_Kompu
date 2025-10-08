<!-- application/views/dashboard/index.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Kepuasan Masyarakat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen p-6">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="mb-6">
                <div class="flex justify-between items-center mb-4">
                    <h1 class="text-3xl font-bold text-gray-800">Dashboard Kepuasan Masyarakat</h1>
                    <button onclick="window.print()" class="no-print bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 flex items-center gap-2">
                        <i class="fas fa-print"></i> Cetak
                    </button>
                </div>
                
                <!-- Form Periode -->
<!-- Form Periode -->
<form method="GET" action="<?= site_url('monev_kepuasan') ?>" class="flex items-center gap-3 no-print">
    <label class="text-gray-700 font-medium">Periode:</label>
    <select name="periode" onchange="this.form.submit()" 
        class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        <!-- Opsi Bulanan -->
        <optgroup label="Bulanan">
            <option value="januari" <?= $periode_selected == 'januari' ? 'selected' : '' ?>>Januari</option>
            <option value="februari" <?= $periode_selected == 'februari' ? 'selected' : '' ?>>Februari</option>
            <option value="maret" <?= $periode_selected == 'maret' ? 'selected' : '' ?>>Maret</option>
            <option value="april" <?= $periode_selected == 'april' ? 'selected' : '' ?>>April</option>
            <option value="mei" <?= $periode_selected == 'mei' ? 'selected' : '' ?>>Mei</option>
            <option value="juni" <?= $periode_selected == 'juni' ? 'selected' : '' ?>>Juni</option>
            <option value="juli" <?= $periode_selected == 'juli' ? 'selected' : '' ?>>Juli</option>
            <option value="agustus" <?= $periode_selected == 'agustus' ? 'selected' : '' ?>>Agustus</option>
            <option value="september" <?= $periode_selected == 'september' ? 'selected' : '' ?>>September</option>
            <option value="oktober" <?= $periode_selected == 'oktober' ? 'selected' : '' ?>>Oktober</option>
            <option value="november" <?= $periode_selected == 'november' ? 'selected' : '' ?>>November</option>
            <option value="desember" <?= $periode_selected == 'desember' ? 'selected' : '' ?>>Desember</option>
        </optgroup>
        
        <!-- Opsi Triwulan -->
        <optgroup label="Triwulan">
            <option value="triwulan1" <?= $periode_selected == 'triwulan1' ? 'selected' : '' ?>>Triwulan I (Jan-Mar)</option>
            <option value="triwulan2" <?= $periode_selected == 'triwulan2' ? 'selected' : '' ?>>Triwulan II (Apr-Jun)</option>
            <option value="triwulan3" <?= $periode_selected == 'triwulan3' ? 'selected' : '' ?>>Triwulan III (Jul-Sep)</option>
            <option value="triwulan4" <?= $periode_selected == 'triwulan4' ? 'selected' : '' ?>>Triwulan IV (Okt-Des)</option>
        </optgroup>
        
        <!-- Opsi Semester -->
        <optgroup label="Semester">
            <option value="semester1" <?= $periode_selected == 'semester1' ? 'selected' : '' ?>>Semester I (Jan-Jun)</option>
            <option value="semester2" <?= $periode_selected == 'semester2' ? 'selected' : '' ?>>Semester II (Jul-Des)</option>
        </optgroup>
        
        <!-- Opsi Tahunan -->
        <optgroup label="Tahunan">
            <option value="tahunan" <?= $periode_selected == 'tahunan' ? 'selected' : '' ?>>Tahunan (Jan-Des)</option>
        </optgroup>
        
        <!-- Opsi Semua Data -->
        <optgroup label="Lainnya">
            <option value="semua" <?= $periode_selected == 'semua' ? 'selected' : '' ?>>Semua Data</option>
        </optgroup>
    </select>
    <span class="text-sm text-gray-600">
        Periode: <strong><?= $periode_label ?></strong>
    </span>
</form>
            </div>

            <!-- Top Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    <!-- Nilai IKM -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-gray-600 text-sm mb-1">Nilai Indeks Kepuasan Masyarakat (IKM)</p>
                <div class="flex items-baseline gap-2">
                    <p class="text-4xl font-bold text-gray-800"><?= number_format($nilai_ikm, 2) ?></p>
                    <span class="text-green-500 text-lg font-semibold"><?= number_format($persentase_ikm, 2) ?>%</span>
                </div>
            </div>
            <div class="bg-orange-500 p-3 rounded-lg">
                <i class="fas fa-chart-line text-white text-2xl"></i>
            </div>
        </div>
    </div>

    <!-- Grade PKM -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-gray-600 text-sm mb-1">Grade Mutu</p>
                <div class="flex items-baseline gap-2">
                    <p class="text-4xl font-bold text-gray-800"><?= $grade_pkm ?></p>
                    <span class="text-green-500 text-lg font-semibold">
                        <?php
                        if($grade_pkm == 'A') echo 'SANGAT BAIK';
                        elseif($grade_pkm == 'B') echo 'BAIK';
                        elseif($grade_pkm == 'C') echo 'CUKUP';
                        else echo 'KURANG';
                        ?>
                    </span>
                </div>
            </div>
            <div class="bg-orange-500 p-3 rounded-lg">
                <i class="fas fa-award text-white text-2xl"></i>
            </div>
        </div>
    </div>

    <!-- Total Responden -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-gray-600 text-sm mb-1">Jumlah Responden Masyarakat</p>
                <p class="text-4xl font-bold text-gray-800"><?= $total_responden ?></p>
            </div>
            <div class="bg-orange-500 p-3 rounded-lg">
                <i class="fas fa-users text-white text-2xl"></i>
            </div>
        </div>
    </div>

    <!-- Jenis Kelamin -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-gray-600 text-sm mb-1">Jenis Kelamin Responden Masyarakat</p>
                <p class="text-lg">
                    <span class="text-green-600 font-semibold">Pria <?= $jenis_kelamin['pria'] ?></span>
                    <span class="text-gray-400 mx-2">-</span>
                    <span class="text-pink-600 font-semibold">Wanita <?= $jenis_kelamin['wanita'] ?></span>
                </p>
            </div>
            <div class="bg-orange-500 p-3 rounded-lg">
                <i class="fas fa-venus-mars text-white text-2xl"></i>
            </div>
        </div>
    </div>
</div>

            <!-- Main Content -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                <!-- Unsur Survey SKM -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-semibold text-gray-700 mb-4">Unsur Survey Kepuasan Masyarakat (SKM)</h2>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b">
                                    <th class="text-left py-3 px-2 text-gray-600 text-sm">#</th>
                                    <th class="text-left py-3 px-2 text-gray-600 text-sm">Unsur SKM</th>
                                    <th class="text-center py-3 px-2 text-gray-600 text-sm">Nilai</th>
                                    <th class="text-center py-3 px-2 text-gray-600 text-sm">Mutu Pelayanan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($unsur_skm)): ?>
                                    <?php foreach ($unsur_skm as $no => $item): ?>
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="py-3 px-2 text-sm"><?= $no + 1 ?>.</td>
                                        <td class="py-3 px-2 text-sm"><?= $item['nama'] ?></td>
                                        <td class="py-3 px-2 text-center text-sm"><?= number_format($item['nilai'], 2) ?></td>
                                        <td class="py-3 px-2 text-center">
                                            <?php
                                            $grade = $item['grade'];
                                            $color = $grade == 'A' ? 'bg-green-500' : 
                                                    ($grade == 'B' ? 'bg-yellow-500' : 
                                                    ($grade == 'C' ? 'bg-orange-500' : 'bg-red-500'));
                                            ?>
                                            <span class="<?= $color ?> text-white px-3 py-1 rounded-full text-sm font-semibold">
                                                <?= $grade ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="4" class="py-4 text-center text-gray-500">Belum ada data</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Grafik Survey SKM -->
<div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-xl font-semibold text-gray-700 mb-4">Grafik Survey Kepuasan Masyarakat (SKM)</h2>
    
    <?php 
    $total = $grafik_distribusi['sangat_sesuai'] + $grafik_distribusi['sesuai'] + 
             $grafik_distribusi['kurang_sesuai'] + $grafik_distribusi['tidak_sesuai'];
    ?>
    
    <?php if($total > 0): ?>
        <!-- Donut Chart -->
        <div class="flex justify-center mb-6">
            <div class="relative w-64 h-64">
                <?php
                $sangat = ($grafik_distribusi['sangat_sesuai'] / $total) * 100;
                $sesuai = ($grafik_distribusi['sesuai'] / $total) * 100;
                $kurang = ($grafik_distribusi['kurang_sesuai'] / $total) * 100;
                $tidak = ($grafik_distribusi['tidak_sesuai'] / $total) * 100;
                
                $offset1 = 0;
                $offset2 = $sangat * 5.03;
                $offset3 = ($sangat + $sesuai) * 5.03;
                $offset4 = ($sangat + $sesuai + $kurang) * 5.03;
                ?>
                <svg viewBox="0 0 200 200" class="transform -rotate-90">
                    <?php if($sangat > 0): ?>
                    <circle cx="100" cy="100" r="80" fill="none" stroke="#10b981" stroke-width="40" 
                        stroke-dasharray="<?= $sangat * 5.03 ?> 502" stroke-dashoffset="0" />
                    <?php endif; ?>
                    
                    <?php if($sesuai > 0): ?>
                    <circle cx="100" cy="100" r="80" fill="none" stroke="#fbbf24" stroke-width="40" 
                        stroke-dasharray="<?= $sesuai * 5.03 ?> 502" stroke-dashoffset="-<?= $offset2 ?>" />
                    <?php endif; ?>
                    
                    <?php if($kurang > 0): ?>
                    <circle cx="100" cy="100" r="80" fill="none" stroke="#f97316" stroke-width="40" 
                        stroke-dasharray="<?= $kurang * 5.03 ?> 502" stroke-dashoffset="-<?= $offset3 ?>" />
                    <?php endif; ?>
                    
                    <?php if($tidak > 0): ?>
                    <circle cx="100" cy="100" r="80" fill="none" stroke="#ef4444" stroke-width="40" 
                        stroke-dasharray="<?= $tidak * 5.03 ?> 502" stroke-dashoffset="-<?= $offset4 ?>" />
                    <?php endif; ?>
                </svg>
            </div>
        </div>

        <!-- Legend -->
        <div class="space-y-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="w-4 h-4 rounded bg-green-500"></span>
                    <span class="text-sm font-medium">Sangat Sesuai</span>
                </div>
                <div class="flex items-center gap-4">
                    <span class="text-sm text-gray-600">4.00 - 3,5324</span>
                    <span class="text-sm font-semibold w-8 text-right"><?= $grafik_distribusi['sangat_sesuai'] ?></span>
                </div>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="w-4 h-4 rounded bg-yellow-500"></span>
                    <span class="text-sm font-medium">Sesuai</span>
                </div>
                <div class="flex items-center gap-4">
                    <span class="text-sm text-gray-600">3,0644 - 3,532</span>
                    <span class="text-sm font-semibold w-8 text-right"><?= $grafik_distribusi['sesuai'] ?></span>
                </div>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="w-4 h-4 rounded bg-orange-500"></span>
                    <span class="text-sm font-medium">Kurang Sesuai</span>
                </div>
                <div class="flex items-center gap-4">
                    <span class="text-sm text-gray-600">2,60 - 3,064</span>
                    <span class="text-sm font-semibold w-8 text-right"><?= $grafik_distribusi['kurang_sesuai'] ?></span>
                </div>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="w-4 h-4 rounded bg-red-500"></span>
                    <span class="text-sm font-medium">Tidak Sesuai</span>
                </div>
                <div class="flex items-center gap-4">
                    <span class="text-sm text-gray-600">1,00 - 2,5996</span>
                    <span class="text-sm font-semibold w-8 text-right"><?= $grafik_distribusi['tidak_sesuai'] ?></span>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="text-center py-8 text-gray-500">
            <i class="fas fa-chart-pie text-4xl mb-2"></i>
            <p>Tidak ada data untuk periode <?= $periode_label ?> ini</p>
            <p class="text-sm mt-2">Silakan pilih periode lain</p>
        </div>
    <?php endif; ?>
</div>

            <!-- Jenis Keperluan -->
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Jenis Keperluan Kunjungan Masyarakat</h2>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b">
                                <th class="text-left py-3 px-2 text-gray-600 text-sm">#</th>
                                <th class="text-left py-3 px-2 text-gray-600 text-sm">Keperluan</th>
                                <th class="text-left py-3 px-2 text-gray-600 text-sm">Jumlah</th>
                                <th class="text-left py-3 px-2 text-gray-600 text-sm">Jumlah(Angka)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($keperluan)): ?>
                                <?php foreach ($keperluan as $idx => $item): ?>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-3 px-2 text-sm"><?= $idx + 1 ?>.</td>
                                    <td class="py-3 px-2 text-sm"><?= $item['nama'] ?></td>
                                    <td class="py-3 px-2">
                                        <div class="flex items-center gap-2">
                                            <div class="flex-1 bg-gray-200 rounded-full h-6 max-w-md">
                                                <?php
                                                $bar_color = $item['persen'] >= 80 ? 'bg-green-500' : 
                                                            ($item['persen'] >= 60 ? 'bg-yellow-500' : 'bg-orange-500');
                                                ?>
                                                <div class="<?= $bar_color ?> h-6 rounded-full transition-all duration-500" 
                                                     style="width: <?= $item['persen'] ?>%"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 px-2">
                                        <?php
                                        $badge_color = $item['persen'] >= 80 ? 'bg-green-500' : 
                                                      ($item['persen'] >= 60 ? 'bg-yellow-500' : 'bg-orange-500');
                                        ?>
                                        <span class="<?= $badge_color ?> text-white px-3 py-1 rounded-full text-sm font-semibold">
                                            <?= $item['persen'] ?>%
                                        </span>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="py-4 text-center text-gray-500">Belum ada data keperluan</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Footer -->
            <div class="mt-8 text-center text-gray-500 text-sm">
                <p>© <?= date('Y') ?> Dashboard Kepuasan Masyarakat - Dibuat dengan CodeIgniter</p>
            </div>
        </div>
    </div>

    <script>
        // Auto refresh setiap 5 menit (opsional)
        // setTimeout(function(){ location.reload(); }, 300000);
        
        // Animasi saat halaman load
        window.addEventListener('load', function() {
            document.querySelectorAll('.bg-white').forEach((el, index) => {
                setTimeout(() => {
                    el.style.opacity = '0';
                    el.style.transform = 'translateY(20px)';
                    el.style.transition = 'all 0.5s ease';
                    setTimeout(() => {
                        el.style.opacity = '1';
                        el.style.transform = 'translateY(0)';
                    }, 50);
                }, index * 100);
            });
        });
    </script>
</body>
</html>