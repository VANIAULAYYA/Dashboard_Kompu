<div class="row">
    <!-- Buku Tamu Card -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?= $total_tamu ?></h3>
                <p>Buku Tamu</p>
            </div>
            <div class="icon">
                <i class="fas fa-book"></i>
            </div>
            <a href="<?= base_url('admin/buku_tamu') ?>" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    
    <!-- Kepuasan Card -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?= number_format($total_kepuasan, 1) ?>/5</h3>
                <p>Rata-rata Kepuasan</p>
            </div>
            <div class="icon">
                <i class="fas fa-star"></i>
            </div>
            <a href="<?= base_url('admin/buku_tamu') ?>" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    
    <!-- Aduan Card -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?= $total_aduan ?></h3>
                <p>Total Aduan</p>
            </div>
            <div class="icon">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <a href="<?= base_url('admin/aduan') ?>" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    
    <!-- Aduan Proses Card -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3><?= $aduan_proses ?></h3>
                <p>Aduan dalam Proses</p>
            </div>
            <div class="icon">
                <i class="fas fa-spinner"></i>
            </div>
            <a href="<?= base_url('admin/aduan') ?>" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>

<!-- Grafik -->
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Statistik Kunjungan Bulanan</h3>
            </div>
            <div class="card-body">
                <canvas id="visitorChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tingkat Kepuasan</h3>
            </div>
            <div class="card-body">
                <canvas id="satisfactionChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- ChartJS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
$(function () {
    // Visitor Chart
    var visitorCtx = document.getElementById('visitorChart').getContext('2d');
    var visitorChart = new Chart(visitorCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Pengunjung',
                data: [100, 150, 200, 180, 250, 300],
                backgroundColor: 'rgba(60, 141, 188, 0.2)',
                borderColor: 'rgba(60, 141, 188, 1)',
                borderWidth: 2,
                tension: 0.1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });

    // Satisfaction Chart
    var satisfactionCtx = document.getElementById('satisfactionChart').getContext('2d');
    var satisfactionChart = new Chart(satisfactionCtx, {
        type: 'doughnut',
        data: {
            labels: ['Sangat Puas (5)', 'Puas (4)', 'Cukup (3)', 'Kurang (2)', 'Tidak Puas (1)'],
            datasets: [{
                data: [35, 30, 20, 10, 5],
                backgroundColor: [
                    '#00a65a',
                    '#00c0ef',
                    '#f39c12',
                    '#f56954',
                    '#d2d6de'
                ],
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
});
</script>
