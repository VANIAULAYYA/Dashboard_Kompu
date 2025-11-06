<!DOCTYPE html>
<html>
<head>
    <title>Cetak Permohonan Informasi</title>
    <style>
        @page {
            size: A4;
            margin: 2cm 2.5cm;
        }
        
        body { 
            font-family: 'Times New Roman', Times, serif;
            margin: 0;
            padding: 0;
            line-height: 1.5;
            font-size: 12pt;
            color: #000;
        }
        
        .header { 
            display: table;
            width: 100%;
            margin-bottom: 20px;
            border-bottom: 3px solid #000;
            padding-bottom: 10px;
        }
        
        .logo { 
            display: table-cell;
            width: 80px;
            vertical-align: middle;
        }
        
        .logo img {
            width: 70px;
            height: 70px;
        }
        
        .header-text {
            display: table-cell;
            vertical-align: middle;
            text-align: center;
            padding-left: 10px;
        }
        
        .header-text h2 {
            margin: 0;
            font-size: 14pt;
            font-weight: bold;
            line-height: 1.3;
        }
        
        .header-text h3 {
            margin: 0;
            font-size: 12pt;
            font-weight: normal;
            line-height: 1.3;
        }
        
        .form-title {
            text-align: center;
            font-weight: bold;
            font-size: 13pt;
            margin: 20px 0 25px 0;
            text-decoration: underline;
        }
        
        .info-section {
            margin-bottom: 8px;
        }
        
        .info-row {
            display: flex;
            margin-bottom: 3px;
            line-height: 1.5;
        }
        
        .info-label {
            width: 250px;
            flex-shrink: 0;
        }
        
        .info-separator {
            width: 15px;
            flex-shrink: 0;
        }
        
        .info-value {
            flex: 1;
        }
        
        .section-title {
            font-weight: bold;
            text-decoration: underline;
            margin: 20px 0 10px 0;
            font-size: 12pt;
        }
        
        .multiline-value {
            margin-left: 265px;
            margin-top: -3px;
            margin-bottom: 8px;
            text-align: justify;
        }
        
        .footer-note {
            margin-top: 15px;
            text-align: justify;
            line-height: 1.5;
        }
        
        .signature-section {
            margin-top: 40px;
            width: 100%;
        }
        
        .signature-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }
        
        .signature-box {
            width: 45%;
            text-align: center;
        }
        
        .signature-title {
            margin-bottom: 80px;
            font-size: 12pt;
            text-align: center;
        }
        
        .signature-name {
            margin-top: 5px;
            font-size: 12pt;
            text-align: center;
        }
        
        .signature-img {
            max-width: 120px;
            max-height: 60px;
            display: block;
            margin: -75px auto 15px auto;
        }
        
        .keterangan {
            margin-top: 30px;
            font-size: 11pt;
            text-align: justify;
            line-height: 1.5;
        }
        
        .keterangan p {
            margin: 5px 0;
        }
        
        @media print {
            .no-print { 
                display: none !important; 
            }
            
            body { 
                margin: 0;
                padding: 0;
            }
            
            @page {
                margin: 2cm 2.5cm;
            }
        }
        
        .no-print {
            position: fixed;
            top: 10px;
            right: 10px;
            z-index: 9999;
            background: white;
            padding: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        
        .btn {
            padding: 8px 15px;
            margin: 0 3px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 12pt;
        }
        
        .btn-print {
            background: #007bff;
            color: white;
        }
        
        .btn-close {
            background: #dc3545;
            color: white;
        }
    </style>
</head>
<body>
    <div class="no-print">
        <button onclick="window.print()" class="btn btn-print">🖨️ Cetak</button>
        <button onclick="window.close()" class="btn btn-close">❌ Tutup</button>
    </div>

    <!-- HEADER -->
    <div class="header">
        <div class="logo">
            <img src="<?php echo base_url('assets/Pictures/logo-pu.png'); ?>" alt="Logo BBWS Brantas">
        </div>
        <div class="header-text">
            <h2>BBWS BRANTAS</h2>
            <h3>BBWS BRANTAS</h3>
            <h3>Jl. Soekarno Hatta No. 100 Malang</h3>
            <h3>Telp: (0341) 123456, Email: ppid@bbwsbrantas.go.id</h3>
        </div>
    </div>

    <!-- JUDUL -->
    <div class="form-title">
        FORMULIR PERMOHONAN INFORMASI
    </div>

    <!-- INFO DASAR -->
    <div class="info-row">
    <span class="info-label">Nomor Pendaftaran</span>
    <span class="info-separator">:</span>
    <span class="value"><?= $permohonan->buku_tamu_id ?? $buku_tamu_id ?? '' ?></span>
</div>
        <div class="info-row">
            <span class="info-label">Tanggal</span>
            <span class="info-separator">:</span>
            <span class="info-value"><?= date('d F Y', strtotime($permohonan->tanggal_surat)) ?></span>
        </div>
        <div class="info-row">
            <span class="info-label">Cara Penyampaian Permintaan</span>
            <span class="info-separator">:</span>
            <span class="info-value"><?= $permohonan->via ?? 'Langsung' ?></span>
        </div>
    </div>

    <!-- DATA PEMOHON -->
    <div class="section-title">DATA PEMOHON INFORMASI</div>
    
    <div class="info-section">
        <div class="info-row">
            <span class="info-label">Jenis Pemohon</span>
            <span class="info-separator">:</span>
            <span class="info-value"><?= $permohonan->status_pemohon ?? '-' ?></span>
        </div>
        <div class="info-row">
            <span class="info-label">Nama</span>
            <span class="info-separator">:</span>
            <span class="info-value"><?= $permohonan->pengirim ?? '-' ?></span>
        </div>
        <div class="info-row">
            <span class="info-label">Nomor Identitas</span>
            <span class="info-separator">:</span>
            <span class="info-value"><?= $permohonan->nomor_identitas ?? '-' ?></span>
        </div>
        <div class="info-row">
            <span class="info-label">Alamat</span>
            <span class="info-separator">:</span>
            <span class="info-value"><?= $permohonan->alamat ?? '-' ?></span>
        </div>
        <div class="info-row">
            <span class="info-label">Nomor Telepon</span>
            <span class="info-separator">:</span>
            <span class="info-value"><?= $permohonan->nomor_telepon ?? '-' ?></span>
        </div>
        <div class="info-row">
            <span class="info-label">Email</span>
            <span class="info-separator">:</span>
            <span class="info-value"><?= $permohonan->email ?? '-' ?></span>
        </div>
    </div>

    <!-- PENGAJUAN PERMOHONAN -->
    <div class="section-title">PENGAJUAN PERMOHONAN INFORMASI</div>
    
    <div class="info-section">
        <div class="info-row">
            <span class="info-label">Rincian Informasi yang Dibutuhkan</span>
            <span class="info-separator">:</span>
            <span class="info-value"><?php 
                $rincian = $permohonan->rincian_informasi ?? $permohonan->perihal ?? '-';
                $lines = explode("\n", $rincian);
                echo $lines[0];
            ?></span>
        </div>
        <?php if (isset($lines) && count($lines) > 1): ?>
        <div class="multiline-value">
            <?php 
            for ($i = 1; $i < count($lines); $i++) {
                echo $lines[$i];
                if ($i < count($lines) - 1) echo "<br>";
            }
            ?>
        </div>
        <?php endif; ?>
        
        <div class="info-row">
            <span class="info-label">Tujuan Penggunaan Informasi</span>
            <span class="info-separator">:</span>
            <span class="info-value"><?php 
                $tujuan = $permohonan->tujuan_penggunaan ?? '-';
                $lines2 = explode("\n", $tujuan);
                echo $lines2[0];
            ?></span>
        </div>
        <?php if (isset($lines2) && count($lines2) > 1): ?>
        <div class="multiline-value">
            <?php 
            for ($i = 1; $i < count($lines2); $i++) {
                echo $lines2[$i];
                if ($i < count($lines2) - 1) echo "<br>";
            }
            ?>
        </div>
        <?php endif; ?>
        
        <div class="info-row">
            <span class="info-label">Cara Memperoleh Informasi</span>
            <span class="info-separator">:</span>
            <span class="info-value"><?= $permohonan->cara_memperoleh_informasi ?? '-' ?></span>
        </div>
        
        <div class="info-row">
            <span class="info-label">Cara Mendapatkan Salinan Informasi</span>
            <span class="info-separator">:</span>
            <span class="info-value"><?= $permohonan->cara_mendapatkan_salinan ?? '-' ?></span>
        </div>
    </div>

    <!-- FOOTER NOTE -->
    <div class="footer-note">
        <p>Untuk informasi lebih lanjut mengenai prosedur permohonan, <strong>pemohon dapat menghubungi PPID BBWS Brantas</strong> selama jam kerja melalui telepon atau email yang tercantum di atas.</p>
    </div>

    <!-- TANDA TANGAN -->
    <div class="signature-section">
        <div class="signature-row">
            <div class="signature-box">
                <div class="signature-title">Petugas Pelayanan</div>
                <div class="signature-name">(Penerima Permohonan)</div>
            </div>
            
            <div class="signature-box">
                <div class="signature-title">Pemohon Informasi</div>
                <?php if (!empty($permohonan->ttd_data)): ?>
                    <img src="<?= $permohonan->ttd_data ?>" class="signature-img" alt="Tanda Tangan">
                <?php endif; ?>
                <div class="signature-name">(<?= $permohonan->pengirim ?? '________________________' ?>)</div>
            </div>
        </div>
    </div>

    <!-- KETERANGAN -->
    <div class="keterangan">
        <p><strong>Keterangan:</strong></p>
        <p>*) Dengan menandatangani formulir ini, saya menyatakan bahwa semua data dan informasi yang saya berikan adalah benar dan sah sesuai dengan ketentuan perundang-undangan yang berlaku mengenai keterbukaan informasi publik.</p>
    </div>

    <script>
        // Auto print ketika halaman loaded (optional - hapus jika tidak perlu)
        // window.onload = function() {
        //     window.print();
        // }
    </script>
</body>
</html>