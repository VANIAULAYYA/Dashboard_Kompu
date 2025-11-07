<!DOCTYPE html>
<html>
<head>
    <title>Cetak Permohonan Informasi</title>
    <style>
        @page {
            size: A4;
            margin: 1.5cm 1.5cm;
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
        display: flex;
        align-items: flex-start;
        width: 100%;
        margin-bottom: 15px;
        position: relative;
    }
    
    .logo { 
        width: 100px;
        flex-shrink: 0;
        display: flex;
        justify-content: center;
        padding-right: 15px;
    }
    
    .logo img {
        width: 93px;
        height: 93px;
        object-fit: fill;
    }
    
    .header-text {
        flex: 1;
        text-align: center;
        padding: 0 20px 15px 20px;
        border-bottom: 2px solid #000;
    }
    
    .header-text h2 {
        margin: 0;
        font-size: 16pt;
        font-weight: bold;
        line-height: 1.1;
    }
    
    .header-text h3 {
        margin: 0;
        font-size: 11pt;
        font-weight: normal;
        line-height: 1.2;
    }
        
        .form-title {
            text-align: center;
            font-weight: bold;
            font-size: 13pt;
            margin: 20px 0 25px 0;
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
    margin-bottom: 5px;
    font-size: 12pt;
    text-align: center;
}

.signature-subtitle {
    margin-bottom: 5px;
    font-size: 12pt;
    text-align: center;
}

.signature-receiver {
    margin-bottom: 60px;
    font-size: 11pt;
    text-align: center;
    color: #555;
}

.signature-name {
    font-size: 12pt;
    text-align: center;
}

.signature-img {
    max-width: 120px;
    max-height: 60px;
    display: block;
    margin: 0 auto;
}

.signature-line {
    margin: 20px 0 10px 0;
    border-bottom: 1px solid #000;
    width: 200px;
    display: inline-block;
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
                margin: 1.5cm 1.5cm;
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
    <button onclick="closeForm()" class="btn btn-close">❌ Tutup</button>
</div>

    <!-- HEADER -->
    <div class="header">
        <div class="logo">
            <img src="<?php echo base_url('assets/logo-pu.jpeg'); ?>" alt="Logo BBWS Brantas">
        </div>
        <div class="header-text">
            <h2><strong>KEMENTERIAN PEKERJAAN UMUM</strong></h2>
            <h3>DIREKTORAT JENDERAL SUMBER DAYA AIR</h3>
            <h3><strong>BALAI BESAR WILAYAH SUNGAI BRANTAS</strong></h3>
            <h3>Jalan Raya Menganti Nomor 312 Wiyung Surabaya 60228 Telp. (031) 7523487, 7523488</h3>
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
    <span class="info-label">Tujuan Penggunaan Informasi<br>(Mohon Diperinci)</span>
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
        <p>Informasi yang diperoleh tidak akan disalahgunakan dan hanya digunakan <strong>sebagaimana mestinya sesuai dengan tujuan permohonan tersebut diatas.</strong> Segala akibat hukum dari informasi ini setelah keluar dari Kantor BBWS Brantas Kementerian PU menjadi tanggung jawab Pemohon/Pengguna Informasi.</p>
    </div>
<!-- TANDA TANGAN -->
<div class="signature-section">
    <div class="signature-row">
        <div class="signature-box">
            <div class="signature-title">Petugas Pelayanan</div>
            <div class="signature-subtitle">Informasi</div>
            <div class="signature-receiver">(Penerima Permohonan)</div>
            <div class="signature-name" style="margin-top: 67px;">(__________________________)</div>
        </div>
        
        <div class="signature-box">
            <div class="signature-title">Pemohon</div>
            <div class="signature-title">Informasi</div>
            <?php if (!empty($permohonan->ttd_data)): ?>
                <img src="<?= $permohonan->ttd_data ?>" class="signature-img" alt="Tanda Tangan" style="margin-top: 20px;">
            <?php else: ?>
                <!-- Kosong, hanya nama saja -->
            <?php endif; ?>
            <div class="signature-name" style="margin-top: 27px;">(<?= $permohonan->pengirim ?? '' ?>)</div>
        </div>
    </div>
</div>

    <!-- KETERANGAN -->
    <div class="keterangan">
        <p>Keterangan:</p>
        <p>*) Dalam hal informasi publik yang diminta pemohon telah tersedia di situs EPPID Kementerian PU, pemohon dapat mengunduh dan mencetak sendiri dari situs EPPID Kementerian PU. Pelayanan informasi publik tidak dipungut biaya. Namun biaya penggandaan atau perekaman yang timbul ditanggung oleh pemohon informasi publik.</p>
    </div>

    <script>
        // Auto print ketika halaman loaded (optional - hapus jika tidak perlu)
        // window.onload = function() {
        //     window.print();
        // }
    </script>

    <script>
    function closeForm() {
        // Cek dari URL
        if (window.location.href.indexOf('Layanan/view_pdf') > -1 || 
            window.location.href.indexOf('layanan/view_pdf') > -1) {
            window.location.href = '<?php echo base_url('Layanan'); ?>'; 
        } 
        else if (window.location.href.indexOf('permohonan/cetak') > -1) {
            window.location.href = '<?php echo base_url('Landing'); ?>'; 
        }
        else {
            history.back(); // Default kembali ke halaman sebelumnya
        }
    }
    
    // Auto print ketika halaman loaded (optional - hapus jika tidak perlu)
    // window.onload = function() {
    //     window.print();
    // }
</script>
</body>
</html>