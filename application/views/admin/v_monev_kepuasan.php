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
                

<!-- Form Periode (2 Dropdown) -->
<form method="GET" action="<?= site_url('monev_kepuasan') ?>" class="flex items-center gap-3 no-print">
    <label class="text-gray-700 font-medium">Periode:</label>

    <!-- Dropdown Jenis Periode -->
    <select name="jenis_periode" id="jenis_periode"
        class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
        onchange="updatePeriodeOptions()">
        <option value="bulanan" <?= $jenis_periode == 'bulanan' ? 'selected' : '' ?>>Bulanan</option>
        <option value="triwulan" <?= $jenis_periode == 'triwulan' ? 'selected' : '' ?>>Triwulan</option>
        <option value="semester" <?= $jenis_periode == 'semester' ? 'selected' : '' ?>>Semester</option>
        <option value="tahunan" <?= $jenis_periode == 'tahunan' ? 'selected' : '' ?>>Tahunan</option>
        <option value="semua" <?= $jenis_periode == 'semua' ? 'selected' : '' ?>>Semua Data</option>
    </select>

    <!-- Dropdown Nilai Periode -->
    <select name="periode" id="periode"
        onchange="this.form.submit()"
        class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
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
<div class="bg-white rounded-lg shadow p-6 relative">
  <h2 class="text-xl font-semibold text-gray-700 mb-4">Grafik Survey Kepuasan Masyarakat (SKM)</h2>

  <?php 
  $total = $grafik_distribusi['sangat_sesuai'] + $grafik_distribusi['sesuai'] + 
           $grafik_distribusi['kurang_sesuai'] + $grafik_distribusi['tidak_sesuai'];
  ?>

  <?php if($total > 0): ?>
  <?php
    $sangat = ($grafik_distribusi['sangat_sesuai'] / $total) * 100;
    $sesuai = ($grafik_distribusi['sesuai'] / $total) * 100;
    $kurang = ($grafik_distribusi['kurang_sesuai'] / $total) * 100;
    $tidak = ($grafik_distribusi['tidak_sesuai'] / $total) * 100;
    
    $offset2 = $sangat * 5.03;
    $offset3 = ($sangat + $sesuai) * 5.03;
    $offset4 = ($sangat + $sesuai + $kurang) * 5.03;
  ?>

  <div class="flex justify-center mb-6">
    <div class="relative w-64 h-64">
      <svg viewBox="0 0 200 200" class="transform -rotate-90">
        <?php if($sangat > 0): ?>
        <circle cx="100" cy="100" r="80" fill="none" stroke="#10b981" stroke-width="40"
          stroke-dasharray="<?= $sangat * 5.03 ?> 502" stroke-dashoffset="0"
          class="hoverable" data-label="Sangat Sesuai: <?= round($sangat, 1) ?>%" />
        <?php endif; ?>

        <?php if($sesuai > 0): ?>
        <circle cx="100" cy="100" r="80" fill="none" stroke="#fbbf24" stroke-width="40"
          stroke-dasharray="<?= $sesuai * 5.03 ?> 502" stroke-dashoffset="-<?= $offset2 ?>"
          class="hoverable" data-label="Sesuai: <?= round($sesuai, 1) ?>%" />
        <?php endif; ?>

        <?php if($kurang > 0): ?>
        <circle cx="100" cy="100" r="80" fill="none" stroke="#f97316" stroke-width="40"
          stroke-dasharray="<?= $kurang * 5.03 ?> 502" stroke-dashoffset="-<?= $offset3 ?>"
          class="hoverable" data-label="Kurang Sesuai: <?= round($kurang, 1) ?>%" />
        <?php endif; ?>

        <?php if($tidak > 0): ?>
        <circle cx="100" cy="100" r="80" fill="none" stroke="#ef4444" stroke-width="40"
          stroke-dasharray="<?= $tidak * 5.03 ?> 502" stroke-dashoffset="-<?= $offset4 ?>"
          class="hoverable" data-label="Tidak Sesuai: <?= round($tidak, 1) ?>%" />
        <?php endif; ?>
      </svg>

      <!-- Tooltip -->
      <div id="tooltip"
        class="hidden absolute bg-gray-800 text-white text-sm px-3 py-2 rounded-lg pointer-events-none transform -translate-x-1/2 -translate-y-10">
      </div>
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
            <div class="bg-white rounded-lg shadow p-6 w-[1280px] mx-auto">
                <h2 class="text-center text-xl font-semibold text-gray-700 mb-4">Jenis Keperluan Kunjungan Masyarakat</h2>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                             <tr class="border-b">
    <th class="text-left py-3 px-2 text-gray-600 text-sm w-1/12">#</th>
    <th class="text-left py-3 px-2 text-gray-600 text-sm w-4/12">Keperluan</th>
    <th class="text-center py-3 px-2 text-gray-600 text-sm w-5/12">Jumlah</th>
    <th class="text-center py-3 px-2 text-gray-600 text-sm w-2/12">Jumlah (Angka)</th>
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
                                    <td class="text-center py-3 px-2">
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
        </div>
    </div>
    
    <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made by KOMPU BBWS BRANTAS
                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">IT Tim</a>
              </div>
            </div>
          </div>
        </div>

      </footer>

    <script>
window.addEventListener('load', function() {
    const periodeOptions = {
        bulanan: [
            { value: 'januari', label: 'Januari' },
            { value: 'februari', label: 'Februari' },
            { value: 'maret', label: 'Maret' },
            { value: 'april', label: 'April' },
            { value: 'mei', label: 'Mei' },
            { value: 'juni', label: 'Juni' },
            { value: 'juli', label: 'Juli' },
            { value: 'agustus', label: 'Agustus' },
            { value: 'september', label: 'September' },
            { value: 'oktober', label: 'Oktober' },
            { value: 'november', label: 'November' },
            { value: 'desember', label: 'Desember' }
        ],
        triwulan: [
            { value: 'triwulan1', label: 'Triwulan I (Jan–Mar)' },
            { value: 'triwulan2', label: 'Triwulan II (Apr–Jun)' },
            { value: 'triwulan3', label: 'Triwulan III (Jul–Sep)' },
            { value: 'triwulan4', label: 'Triwulan IV (Okt–Des)' }
        ],
        semester: [
            { value: 'semester1', label: 'Semester I (Jan–Jun)' },
            { value: 'semester2', label: 'Semester II (Jul–Des)' }
        ],
        tahunan: [
            { value: 'tahunan', label: 'Tahunan (Jan–Des)' }
        ]
        // HAPUS "semua" dari sini karena tidak perlu opsi periode untuk "semua"
    };

    const jenisSelect = document.getElementById('jenis_periode');
    const periodeSelect = document.getElementById('periode');

    function updatePeriodeOptions() {
        const jenis = jenisSelect.value;
        const selectedPeriode = '<?= $periode_selected ?>'; // Ambil dari PHP
        
        console.log('Updating options for:', jenis, 'Selected:', selectedPeriode);
        
        // Kosongkan dropdown periode
        periodeSelect.innerHTML = '<option value="">-- Pilih Periode --</option>';

        // Jika pilih "semua", disable dropdown periode
        if (jenis === 'semua') {
            periodeSelect.disabled = true;
            return;
        }

        // Enable dropdown dan isi opsi
        periodeSelect.disabled = false;
        
        if (periodeOptions[jenis]) {
            periodeOptions[jenis].forEach(opt => {
                const option = document.createElement('option');
                option.value = opt.value;
                option.textContent = opt.label;
                
                // Set selected berdasarkan periode yang aktif
                if (opt.value === selectedPeriode) {
                    option.selected = true;
                }
                
                periodeSelect.appendChild(option);
            });
        }
    }

    // Event listener untuk jenis periode
    jenisSelect.addEventListener('change', function() {
        if (this.value === 'semua') {
            // Jika pilih "Semua Data", submit langsung
            window.location.href = '<?= site_url('monev_kepuasan') ?>?jenis_periode=semua';
        } else {
            updatePeriodeOptions();
            // Reset pilihan periode
            periodeSelect.value = '';
        }
    });

    // Event listener untuk periode (auto-submit)
    periodeSelect.addEventListener('change', function() {
        if (this.value) {
            const jenisPeriode = jenisSelect.value;
            window.location.href = '<?= site_url('monev_kepuasan') ?>?jenis_periode=' + jenisPeriode + '&periode=' + this.value;
        }
    });

    document.addEventListener("DOMContentLoaded", () => {
    const tooltip = document.getElementById("tooltip");

    document.querySelectorAll(".hoverable").forEach(circle => {
      circle.addEventListener("mousemove", e => {
        tooltip.textContent = circle.getAttribute("data-label");
        tooltip.style.left = e.offsetX + "px";
        tooltip.style.top = e.offsetY + "px";
        tooltip.classList.remove("hidden");
      });

      circle.addEventListener("mouseleave", () => {
        tooltip.classList.add("hidden");
      });
    });
    

    // Inisialisasi saat halaman load
    updatePeriodeOptions();

    // Animasi tampilan elemen
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