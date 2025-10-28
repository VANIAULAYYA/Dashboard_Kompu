<!DOCTYPE html>
<html>
<head>
    <title>Cetak Layanan Kepuasan Masyarakat</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; font-size: 10pt; }
        .header { text-align: center; margin-bottom: 20px; border-bottom: 2px solid #000; padding-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; font-size: 8pt; }
        th, td { border: 1px solid #000; padding: 4px; text-align: left; }
        th { background-color: #f2f2f2; font-weight: bold; }
        @media print { body { margin: 0; } .no-print { display: none; } }
    </style>
</head>
<body>
    <div class="header">
        <h2>LAPORAN LAYANAN KEPUASAN MASYARAKAT</h2>
        <h3>BBWS BRANTAS</h3>
        <p>Periode: <?= $periode_label ?></p>
        <p>Tanggal Cetak: <?= date('d/m/Y H:i:s') ?></p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th><th>Nama</th><th>Jenis Kelamin</th><th>Asal Instansi</th><th>No. Telp</th>
                <th>Keperluan</th><th>Persyaratan</th><th>Prosedur</th><th>Kecepatan</th><th>Biaya</th>
                <th>Produk</th><th>Kompetensi</th><th>Perilaku</th><th>Pengaduan</th><th>Sarana</th><th>Kritik Saran</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach($tamu as $t): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $t->nama ?></td>
                <td><?= ($t->jenis_kelamin=="L") ? "L":"P" ?></td>
                <td><?= $t->asal_instansi ?></td>
                <td><?= $t->no_handphone ?></td>
                <td><?= $t->keperluan ?></td>
                <td><?= $t->pendapat_pelayanan ?></td>
                <td><?= $t->pemahaman_prosedur ?></td>
                <td><?= $t->pendapat_kecepatan ?></td>
                <td><?= $t->pendapat_biaya ?></td>
                <td><?= $t->pendapat_produk ?></td>
                <td><?= $t->pendapat_kompetensi ?></td>
                <td><?= $t->pendapat_perilaku ?></td>
                <td><?= $t->pendapat_pengaduan ?></td>
                <td><?= $t->pendapat_kualitas ?></td>
                <td><?= $t->kritik_saran ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="no-print" style="margin-top: 20px; text-align: center;">
        <button onclick="window.print()">Print</button>
        <button onclick="window.close()">Tutup</button>
    </div>

    <script>window.onload = function() { window.print(); }</script>
</body>
</html>