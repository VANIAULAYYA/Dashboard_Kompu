<!DOCTYPE html>
<html>
<head>
    <title>Cetak Permintaan Data</title>
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
        <h2>LAPORAN PERMINTAAN DATA</h2>
        <h3>BBWS BRANTAS</h3>
        <p>Periode: <?= $periode_label ?></p>
        <p>Tanggal Cetak: <?= date('d/m/Y H:i:s') ?></p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Via</th>
                <th>Status Pemohon</th>
                <th>Pengirim</th>
                <th>Tanggal Surat</th>
                <th>Nomor Surat</th>
                <th>Perihal</th>
                <th>Diterima PPID</th>
                <th>Tindak Lanjut</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach($permintaan_data as $p): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $p->via ?></td>
                <td><?= $p->status_pemohon ?></td>
                <td><?= $p->pengirim ?></td>
                <td><?= $p->tanggal_surat ?></td>
                <td><?= $p->nomor_surat ?></td>
                <td><?= $p->perihal ?></td>
                <td><?= $p->diterima_ppid ?></td>
                <td><?= $p->tindak_lanjut ?></td>
                <td><?= $p->status ?></td>
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