<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Flipbook CI</title>
    <!-- jQuery (CDN) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Turn.js (CDN) -->
    <script src="https://cdn.jsdelivr.net/gh/blasten/turn.js/turn.min.js"></script>

    <style>
        #flipbook {
            width: 600px;
            height: 400px;
            margin: 50px auto;
        }
        #flipbook .page {
            width: 100%;
            height: 100%;
            background-color: white;
            border: 1px solid #ccc;
            background-size: cover;
            background-position: center;
        }
        button {
            margin: 10px;
        }
        /* Untuk FlipHTML5 iframe */
        .fliphtml5-container {
            position: relative;
            padding-top: max(60%,324px);
            width: 100%;
            height: 0;
            margin: 50px 0;
        }
        .fliphtml5-container iframe {
            position: absolute;
            border: none;
            width: 100%;
            height: 100%;
            left: 0;
            top: 0;
        }
        iframe.pdf-viewer {
            width: 100%;
            height: 600px;
            border: none;
            margin-top: 50px;
        }
    </style>
</head>
<body>

<!-- Flipbook Turn.js -->
<!-- Container Flipbook Turn.js -->
<div id="flipbook" style="width:500px; height:350px; margin:50px auto;">
    <div class="page" style="background-image: url('<?= base_url('assets/template/assets/img/team-1.jpg'); ?>');"></div>
    <div class="page" style="background-image: url('<?= base_url('assets/template/assets/img/team-2.jpg'); ?>');"></div>
    <div class="page" style="background-image: url('<?= base_url('assets/template/assets/img/team-3.jpg'); ?>');"></div>
</div>

<div style="text-align:center;">
    <button id="prev">← Sebelumnya</button>
    <button id="next">Berikutnya →</button>
</div>

<!-- Container FlipHTML5, tetap proporsional -->
<div style="position:relative;padding-top:60%;width:80%;max-width:700px;margin:50px auto;height:0;">
    <iframe src="https://online.fliphtml5.com/sxzzx/vqgk/" 
            style="position:absolute;top:0;left:0;width:100%;height:100%;border:none;" 
            seamless scrolling="no" allowtransparency="true" allowfullscreen="true">
    </iframe>
</div>

<!-- PDF.js viewer container -->
<iframe class="pdf-viewer" 
        src="<?= base_url('assets/pdfjs_2/web/viewer.html?file=') . base_url('assets/pdf/SILABUS.pdf'); ?>" 
        style="width:80%;max-width:700px;height:500px;margin:50px auto;display:block;border:none;">
</iframe>


<!-- PDF.js Viewer -->
<iframe class="pdf-viewer" src="<?= base_url('assets/pdfjs_2/web/viewer.html?file=') . base_url('assets/pdf/SILABUS.pdf'); ?>"></iframe>

<script>
$(document).ready(function(){
    $("#flipbook").turn({
        width: 600,
        height: 400,
        autoCenter: true
    });

    $("#prev").click(function(){
        $("#flipbook").turn("previous");
    });

    $("#next").click(function(){
        $("#flipbook").turn("next");
    });
});
</script>

</body>
</html>
