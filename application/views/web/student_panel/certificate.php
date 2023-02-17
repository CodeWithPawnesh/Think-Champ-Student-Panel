<html>

<head>
    <title>Certificate</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <!--<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Montserrat+Alternates:wght@600&display=swap" rel="stylesheet">-->
    <style>
    html,
    body {
        height: 100%;
        width: 100%;
        margin: 0px;
        padding: 0px;
    }

    .certi-container {
        display: block;
        position: relative;
        max-width: 100%;
        max-height: 100%;
        margin: auto;
        font-family: 'Dancing Script', cursive;
    }

    .certi-container .bg {
        max-height: 100vh;
        max-width: 100vw;
        display: block;
        margin: auto;
    }

    .certi-container .text h3,
    .certi-container .text h6 {
        margin-top: 0px;
        margin-bottom: 5px !important;
    }

    .certi-container h2 {
        position: absolute;
        top: 30%;
    }

    .lobster {
        font-family: 'Dancing Script', cursive;
    }

    .monts {
        font-family: 'Libre Baskerville', serif;
    }

    .download {
        position: absolute;
        top: 10px;
        right: 10px;
        background: #014080;
        border-radius: 10px;
        padding: 10px 15px;
        color: #fff;
        font-family: 'Libre Baskerville', serif;
        cursor: pointer;
    }
    </style>
</head>

<body style="background:#000">
    <!--<div class="certi-container">
        <img src="<?=base_url('assets/img/certificate_base.png')?>" class="bg">
        <h2 class="monts">Certificate of Participation</h2>
        <div class="text">
            <h6>This is to certify that</h6>
            <h3>Hemant Tulsani</h3>
            <h6>has successfully completed the COURSE NAME and her performance was found to be outstanding.</h6>
        </div>
    </div>-->
    <canvas id="my-canvas" width="1920" height="1350"
        style="max-height:100%; max-width:100%; display:block; margin:0 auto;">
    </canvas>
    <a class="download" id="dl" download="certificate.png" href="#">Download</a>
    <script>
    const myCanvas = document.getElementById("my-canvas");
    var context = myCanvas.getContext("2d");
    const img = new Image()
    img.src = "https://erp-panel.think-champ.com/assets/images/certificate/<?= $certificate_data['certificate_image'] ?>";
    img.onload = () => {
        context.drawImage(img, 0, 0);
        //context.font = "70px Libre Baskerville";
        //context.fillStyle = "#2361a2";  
        //context.fillText("<?php echo "title"; ?>", 200, 450);
        // Name 
        context.font = "70px bold Libre Baskerville";
        context.fillStyle = "#FFCC2E";
        context.fillText("<?php echo "This is to certify that ";?>", 700,720);
        context.textAlign = "center";
        context.textAlign = "center";
        context.font = "100px  Helvetica";
        context.fillStyle = "#000000";
        context.fillText("<?php echo $certificate_data['student_name'];?>", 960, 870);
        context.font = "70px bold Libre Baskerville";
        context.fillStyle = "#FFCC2E";
        context.fillText("<?php echo " has completed the online course ".$certificate_data['course_name'];?>", 960,950);
        context.textAlign = "center";
        context.font = "bold italic 35px Libre Baskerville";
        context.fillStyle = "#000000";
        context.fillText("<?php echo $certificate_data['student_name'];echo " "; echo $certificate_data['line1'];?>", 960,1040);
        context.textAlign = "center";
        context.font = "bold italic 35px Libre Baskerville";
        context.fillStyle = "#000000";
        context.fillText("<?php echo "Duration of the course was ".date('d M, Y',$certificate_data['batch_start_date'])." TO ".date('d M, Y',$certificate_data['batch_end_date']);?>", 960,1100);
        context.textAlign = "center";
        context.font = "bold italic 35px Libre Baskerville";
        context.fillStyle = "#000000";
        context.fillText("<?php echo $certificate_data['line2'];?>", 960,1150);
        context.textAlign = "center";
        context.font = "bold italic 35px Libre Baskerville";
        context.fillStyle = "#000000";
        context.fillText("<?php echo $certificate_data['line3'];?>", 960,1200);
        context.textAlign = "center";
        context.font = "bold 45px Libre Baskerville";
        context.fillStyle = "#000000";
        context.fillText("<?= date("d M, Y",strtotime($certificate_data['created_at'])) ?>", 560,1260);
        context.textAlign = "center";
        context.font = "20px Libre Baskerville";
        context.fillStyle = "#000000";
        context.fillText("<?= "Certificate NO = ".$certificate_data['certificate_number']; ?>", 990,1300);
        context.textAlign = "center";
        context.font = "20px Libre Baskerville";
        context.fillStyle = "#000000";
        context.fillText("https://think-champ.com/Certificate/verification/<?= $certificate_data['certificate_number']; ?>", 990,1332);
    }

    function dlCanvas() {
        var dt = myCanvas.toDataURL('image/png');
        var img = dt;
        dt = dt.replace(/^data:image\/[^;]*/, 'data:application/octet-stream');
        dt = dt.replace(/^data:application\/octet-stream/,
            'data:application/octet-stream;headers=Content-Disposition%3A%20attachment%3B%20filename=Canvas.png');
        this.href = dt;
    };
    document.getElementById("dl").addEventListener('click', dlCanvas, false);
    </script>
</body>

</html>