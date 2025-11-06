<!DOCTYPE html>
<html>
<head>
    <title>Preview Permohonan Informasi</title>
    <style>
        body { 
            font-family: 'Arial', sans-serif; 
            margin: 20px; 
            line-height: 1.6;
            font-size: 12pt;
        }
        .header { 
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #333;
            padding-bottom: 20px;
        }
        .logo { 
            width: 60px; 
            height: 60px;
            margin-right: 15px;
        }
        .header-text {
            flex: 1;
        }
        .header h2 {
            margin: 0;
            font-size: 14pt;
        }
        .header h3 {
            margin: 0;
            font-size: 12pt;
            font-weight: normal;
        }
        .form-title {
            text-align: center;
            font-weight: bold;
            font-size: 14pt;
            margin: 20px 0;
            text-decoration: underline;
        }
        .section {
            margin-bottom: 20px;
        }
        .section-title {
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 12pt;
        }
        .field {
            margin-bottom: 8px;
        }
        .label {
            display: inline-block;
            width: 150px;
            vertical-align: top;
        }
        .value {
            display: inline-block;
            flex: 1;
            border-bottom: 1px dotted #000;
            min-height: 20px;
            padding-left: 10px;
        }
        .checkbox-group {
            margin: 10px 0;
        }
        .checkbox-item {
            margin-right: 20px;
            display: inline-block;
        }
        .checkbox-box {
            border: 1px solid #000;
            width: 12px;
            height: 12px;
            display: inline-block;
            margin-right: 5px;
            vertical-align: middle;
        }
        .checked {
            background-color: #000;
        }
        .ttd-area {
            margin-top: 60px;
            display: flex;
            justify-content: space-between;
        }
        .ttd-box {
            text-align: center;
            width: 200px;
        }
        .ttd-line {
            border-bottom: 1px solid #000;
            height: 40px;
            margin-bottom: 5px;
        }
        .keterangan {
            margin-top: 30px;
            font-size: 10pt;
            font-style: italic;
        }
        .content-box {
            border: 1px solid #ddd;
            padding: 10px;
            margin: 10px 0;
            min-height: 80px;
            background: #f9f9f9;
        }
        .signature-img {
            max-width: 150px;
            max-height: 60px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <!-- HEADER -->
    <div class="header">
        <img src="<?php echo base_url('assets/Pictures/logo-pu.png'); ?>" class="logo" alt="Logo BBWS Brantas">
        <div class="header-text">
            <h2>BBWS BRANTAS</h2>
            <h3>BBWS BRANTAS</h3>
            <h3>Jl. Soekarno Hatta No. 100 Malang</h3>
            <h3>Telp: (0341) 123456, Email: ppid@bbwsbrantas.go.id</h3>
        </div>
    </div>

    <!-- JUDUL FORM -->
    <div class="form-title">
        FORMULIR PERMOHONAN INFORMASI
    </div>

    <!-- INFORMASI PERMOHONAN -->
    <div class="section">
        <div class="field">
            <span class="label">Nomor Pendaftaran:</span>
            <span class="value"><?= $nomor_surat ?? 'REG/PPID/2024/01/0001' ?></span>
        </div>
        <div class="field">
            <span class="label">Tanggal:</span>
            <span class="value"><?= date('d F Y', strtotime($tanggal_surat)) ?></span>
        </div>
    </div>

    <!-- DATA PEMOHON -->
    <div class="section">
        <div class="section-title">DATA PEMOHON</div>
        
        <div class="field">
            <span class="label">Nama Lengkap:</span>
            <span class="value"><?= $pengirim ?? '' ?></span>
        </div>
        <div class="field">
            <span class="label">Alamat:</span>
            <span class="value"><?= nl2br($alamat ?? '') ?></span>
        </div>
        <div class="field">
            <span class="label">No. Telepon:</span>
            <span class="value"><?= $nomor_telepon ?? '' ?></span>
        </div>
        <div class="field">
            <span class="label">Email:</span>
            <span class="value"><?= $email ?? '' ?></span>
        </div>
        <div class="field">
            <span class="label">Pekerjaan:</span>
            <span class="value"><?= $status_pemohon ?? '' ?></span>
        </div>
        
        <div class="field">
            <span class="label">Jenis Permohonan:</span>
            <div class="checkbox-group">
                <span class="checkbox-item">
                    <span class="checkbox-box checked"></span>
                    Permintaan Data
                </span>
                <span class="checkbox-item">
                    <span class="checkbox-box"></span>
                    Pengaduan
                </span>
                <span class="checkbox-item">
                    <span class="checkbox-box"></span>
                    Layanan Lainnya
                </span>
            </div>
        </div>
    </div>

    <!-- RINCIAN PERMOHONAN -->
    <div class="section">
        <div class="section-title">RINCIAN PERMOHONAN</div>
        
        <div class="field">
            <span class="label">Uraian Informasi yang Diminta:</span>
        </div>
        <div class="content-box">
            <?= nl2br($rincian_informasi ?? '') ?>
        </div>

        <div class="field">
            <span class="label">Tujuan Penggunaan Informasi:</span>
        </div>
        <div class="content-box">
            <?= nl2br($tujuan_penggunaan ?? '') ?>
        </div>

        <div class="field">
            <span class="label">Cara Mendapatkan Salinan:</span>
            <div class="checkbox-group">
                <span class="checkbox-item">
                    <span class="checkbox-box <?= ($cara_mendapatkan_salinan == 'Email') ? 'checked' : '' ?>"></span>
                    Email
                </span>
                <span class="checkbox-item">
                    <span class="checkbox-box <?= ($cara_mendapatkan_salinan == 'Diambil Langsung') ? 'checked' : '' ?>"></span>
                    Diambil Langsung
                </span>
                <span class="checkbox-item">
                    <span class="checkbox-box <?= ($cara_mendapatkan_salinan == 'Pos') ? 'checked' : '' ?>"></span>
                    Pos
                </span>
            </div>
        </div>
    </div>

    <!-- INFORMASI KONTAK -->
    <div class="section">
        <p><strong>Untuk informasi lebih lanjut mengenai prosedur permohonan, pemohon dapat menghubungi PPID BBWS Brantas</strong> selama jam kerja melalui telepon atau email yang tercantum di atas.</p>
    </div>

    <!-- TANDA TANGAN -->
    <div class="ttd-area">
        <div class="ttd-box">
            <div class="ttd-line">
                <?php if (!empty($ttd_data)): ?>
                    <img src="<?= $ttd_data ?>" class="signature-img" alt="Tanda Tangan Pemohon">
                <?php endif; ?>
            </div>
            <div>Tanda Tangan Pemohon</div>
        </div>
        
        <div class="ttd-box">
            <div class="ttd-line"></div>
            <div>Tanda Tangan Petugas PPID</div>
        </div>
    </div>

    <!-- KETERANGAN -->
    <div class="keterangan">
        <p><strong>Keterangan:</strong></p>
        <p>*) Dengan menandatangani formulir ini, saya menyatakan bahwa semua data dan informasi yang saya berikan adalah benar dan sah sesuai dengan ketentuan perundang-undangan yang berlaku mengenai keterbukaan informasi publik.</p>
    </div>

    <div style="margin-top: 30px; font-size: 10px; color: #666; text-align: center;">
        <p>Preview dokumen - <?= date('d F Y H:i:s') ?></p>
    </div>
</body>
</html>