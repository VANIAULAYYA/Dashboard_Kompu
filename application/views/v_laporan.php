<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Gunakan CDN yang valid untuk turn.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/turn.js/4.1.1/turn.min.js"></script>
    <style>
        body { 
            background-color: #f9f9f9; 
            font-family: Arial, sans-serif; 
        }
        .reports-grid { 
            display: grid; 
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); 
            gap: 20px; 
            margin-top: 20px; 
        }
        .report-card { 
            background: #fff; 
            border: 1px solid #ddd; 
            border-radius: 8px; 
            padding: 15px; 
            text-align: center; 
            box-shadow: 0 2px 5px rgba(0,0,0,0.1); 
        }
        .report-thumbnail { 
            height: 100px; 
            background: #eee; 
            border-radius: 5px; 
            margin-bottom: 10px; 
            position: relative; 
        }
        .thumbnail-label { 
            position: absolute; 
            bottom: 5px; 
            left: 5px; 
            background: rgba(0,0,0,0.6); 
            color: #fff; 
            padding: 2px 6px; 
            font-size: 12px; 
            border-radius: 4px; 
        }
        .open-flipbook-btn { 
            background: #007bff; 
            color: white; 
            border: none; 
            padding: 8px 12px; 
            border-radius: 5px; 
            cursor: pointer; 
        }
        .open-flipbook-btn:hover { 
            background: #0056b3; 
        }
        #flipbook-container { 
            margin-top: 30px; 
            text-align: center; 
        }
        
        #flipbook-container-img {
    width: 100%;
    max-width: 800px;
    height: 500px;
    margin: 30px auto;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    position: relative;  /* penting agar tombol absolute bisa di atas */
    overflow: hidden;
}

.flipbook-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 999;  /* pastikan di atas flipbook */
    background: rgba(0,0,0,0.5);
    color: white;
    border: none;
    padding: 10px 15px;
    cursor: pointer;
    border-radius: 4px;
}

#flipbook-img {
    width: 100%;
    height: 100%;
}

#flipbook-img .hard {
    width: 100%;
    height: 100%;
    position: relative;
    pointer-events: auto;
}

#flipbook-img .hard img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

#prev-page, #next-page {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 1000;  /* pastikan di atas flipbook */
    background: rgba(0,0,0,0.5);
    color: white;
    border: none;
    padding: 10px 15px;
    cursor: pointer;
    border-radius: 4px;
    pointer-events: auto;
}
#prev-page { left: 10px; }
#next-page { right: 10px; }

#page-info {
    position: absolute;
    bottom: 5px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 1000;  /* pastikan di atas flipbook */
    background: rgba(0,0,0,0.6);
    color: white;
    padding: 4px 10px;
    border-radius: 4px;
    font-size: 14px;
}
        
        /* Styling untuk halaman flipbook */
        .page {
            background-color: white;
            background-size: 100% 100%;
            background-repeat: no-repeat;
        }
        
        .page img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .flipbook-controls {
            margin-top: 15px;
        }
        .flipbook-controls button {
            margin: 0 5px;
        }
        
        /* Pastikan elemen flipbook memiliki properti yang tepat */
        .turn-page {
            background-color: white;
        }
        
        /* Responsif */
        @media (max-width: 900px) {
            #flipbook-img {
                width: 90%;
                height: 400px;
            }
        }
        
        @media (max-width: 600px) {
            #flipbook-img {
                width: 95%;
                height: 300px;
            }
            @media (max-width: 600px) {
    #prev-page, #next-page {
        padding: 5px 8px;  /* lebih kecil dari default 10px 15px */
    }
}
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4"><?= $page_title; ?></h2>

    <?php if (!empty($laporan)) : ?>
        <div class="list-group">
            <?php foreach ($laporan as $row): ?>
                <button class="list-group-item list-group-item-action open-report-btn"
                        data-file="<?= $row->bukti_file; ?>">
                    📄 <?= $row->nama_file; ?> (<?= $row->periode; ?>)
                </button>
            <?php endforeach; ?>
        </div>

        <!-- Preview PDF -->
        <div class="mt-5">
            <h4>Preview Laporan Terbaru:</h4>
            <div id="flipbook-container">
                <iframe src="<?= $laporan[0]->bukti_file ?>" width="100%" height="600px" style="border:1px solid #ccc; border-radius:8px;"></iframe>
            </div>
        </div>

        <!-- Preview Gambar Flipbook - PERBAIKAN STRUKTUR -->
        <div id="flipbook-container-img">
    <div id="flipbook-img"></div>

    <!-- Tombol navigasi di dalam container -->
    <button id="prev-page">← Sebelumnya</button>
    <span id="page-info">Halaman: <span id="current-page">1</span> dari <span id="total-pages"></span></span>
    <button id="next-page">Berikutnya →</button>
</div>
            </div>
        </div>

    <?php else: ?>
        <p class="text-muted">Belum ada laporan tersedia.</p>
    <?php endif; ?>

    <!-- Filter periode -->
    <div class="mb-4">
        <button class="btn btn-outline-primary filter-btn" data-periode="Triwulan">Triwulan</button>
        <button class="btn btn-outline-primary filter-btn" data-periode="Semester">Semester</button>
        <button class="btn btn-outline-primary filter-btn" data-periode="Tahunan">Tahunan</button>
    </div>

    <!-- Reports Grid -->
    <div class="reports-grid" id="reportsGrid">
        <?php if (!empty($laporan)): ?>
            <?php foreach ($laporan as $row): ?>
                <div class="report-card">
                    <div class="report-thumbnail">
                        <div class="thumbnail-label">
                            <?= htmlspecialchars($row->jenis_laporan) ?> - <?= htmlspecialchars($row->periode) ?>
                        </div>
                    </div>
                    <button class="open-flipbook-btn" onclick="openFlipbook(<?= $row->id ?>)">Buka Flipbook</button>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="initial-message">Belum ada data laporan tersedia.</p>
        <?php endif; ?>
    </div>

</div>

<script>
$(document).ready(function() {
    const imagePages = [
    '<?= base_url("assets/template/assets/img/team-1.jpg") ?>',
    '<?= base_url("assets/template/assets/img/team-2.jpg") ?>',
    '<?= base_url("assets/template/assets/img/team-3.jpg") ?>'
];

// Fungsi untuk preload gambar
    function preloadImages(sources) {
        return Promise.all(sources.map(src => new Promise(resolve => {
            const img = new Image();
            img.src = src;
            img.onload = resolve;
        })));
    }

// Inisialisasi flipbook setelah semua gambar load
    function initFlipbook(pages) {
        const flipbook = $('#flipbook-img');
        flipbook.empty();

        pages.forEach((src, idx) => {
            flipbook.append(`<div class="hard"><img src="${src}" alt="Halaman ${idx+1}"></div>`);
        });

        // Tunggu sebentar supaya DOM update
        setTimeout(() => {
            flipbook.turn({
                width: $('#flipbook-container-img').width(),
                height: $('#flipbook-container-img').height(),
                autoCenter: true,
                display: 'single', // bisa ganti 'double' kalau mau
                acceleration: true,
                gradients: true,
                elevation: 50,
                when: {
                    turned: function(e, page) {
                        $('#current-page').text(page);
                        $('#total-pages').text(flipbook.turn('pages'));
                    }
                }
            });

            $('#current-page').text(1);
            $('#total-pages').text(pages.length);

            // Tombol prev/next
            $('#prev-page').off('click').on('click', () => flipbook.turn('previous'));
            $('#next-page').off('click').on('click', () => flipbook.turn('next'));
        }, 50);
    }
     // Preload semua gambar lalu init flipbook
    preloadImages(imagePages).then(() => initFlipbook(imagePages));

    // Buka laporan PDF dari list klik
$(document).on('click', '.open-report-btn', function() {
    var fileUrl = $(this).data('file');

    // Tampilkan PDF
    $('#flipbook-container').html('<iframe src="'+fileUrl+'" width="100%" height="600px" style="border:1px solid #ccc; border-radius:8px;"></iframe>');

    // Jika mau, bisa panggil initFlipbook dengan imagePages tertentu
    // initFlipbook(imagePages); // uncomment jika ingin reload flipbook
});

// Filter periode
$('.filter-btn').click(function() {
    var periode = $(this).data('periode');

    $.ajax({
        url: '<?php echo base_url("Landing/get_ppid_periode"); ?>',
        type: 'POST',
        data: { periode: periode },
        dataType: 'json',
        success: function(laporan) {
            if(laporan.length === 0) {
                $('#flipbook-container').html('<p>Tidak ada laporan untuk periode ini.</p>');
                return;
            }

            // Update PDF
            var fileUrl = laporan[0].nama_file.startsWith("http")
                ? laporan[0].nama_file
                : '<?php echo base_url("uploads/laporan/"); ?>' + laporan[0].nama_file;
            $('#flipbook-container').html('<iframe src="'+fileUrl+'" width="100%" height="600px" style="border:1px solid #ccc; border-radius:8px;"></iframe>');

            // Jika mau reload flipbook sesuai laporan baru, panggil initFlipbook
            // initFlipbook(imagePages); // optional
        }
    });
});
});

// Fungsi untuk membuka flipbook berdasarkan ID
function openFlipbook(id) {
    alert('Membuka flipbook dengan ID: ' + id);
    // Di sini Anda dapat menambahkan logika untuk menampilkan flipbook berdasarkan ID
}
</script>

</body>
</html>