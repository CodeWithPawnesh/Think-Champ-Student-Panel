<?php
$class_link = $class_video[0]['video_link'];
$class_no = $class_video[0]['class_no'];
if(strpos($class_link,"www.youtube.com")==true){
    $class_link = str_replace("watch?v=","embed/",$class_link);
}
if(strpos($class_link,"https://drive.google.com")==true){
    $class_link = str_replace("view","preview",$class_link);
}

?>
<div class="main_content_iner overly_inner main-cont ">
    <div class="container-fluid p-0 ">
        <div class="row">
            <div class="col-12">
                <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                    <div class="page_title_left">
                        <h3 class="f_s_25 f_w_700 dark_text">Class Video</h3>
                        <ol class="breadcrumb page_bradcam mb-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Think-Champ</li>
                        </ol>
                    </div>
                    <div class="page_title_right">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row cont">
        <div class="main-video">
            <div class="video">
                <iframe height="300px" src="https://drive.google.com/file/d/1wgJMRJfd4Ol9kFlcuu2HU3_XZFFGkpf5/preview">
                   
                </iframe>
                <h3 class="title">Class <?= $class_no ?></h3>
            </div>
        </div>
        <div class="video-list">
            <?php $i=1; foreach($class_video as $c_d){
                if(strpos($c_d['video_link'],"www.youtube.com")==true){
                    $class_link = str_replace("watch?v=","embed/",$class_link);
                }
                if(strpos($c_d['video_link'],"https://drive.google.com")==true){
                    $class_link = str_replace("view","preview",$class_link);
                }
            ?>
            <div class="vid <?php if($i==1){ ?>active" <?php } $i++ ?>>
                <iframe height="70px" src="<?= $class_link ?>">
                </iframe>
                <h3 class="title">Class <?= $c_d['class_no'] ?></h3>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<div class="footer_part">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="footer_iner text-center">
                    <p><?= date('Y') ?> © Think-Champ</p>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<div id="back-top" style="display: none;">
    <a title="Go to Top" href="#">
        <i class="ti-angle-up"></i>
    </a>
</div>
</body>

</html>
<script src="assets/dashboard/js/jquery1-3.4.1.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
let listVideo = document.querySelectorAll('.video-list .vid');
let mainVideo = document.querySelector('.main-video iframe');
let title = document.querySelector('.main-video .title');
console.log(listVideo);
listVideo.forEach(iframe => {
    iframe.onclick = () => {
        listVideo.forEach(vid => vid.classList.remove('active'));
        iframe.classList.add('active');
        if(iframe.classList.contains('active')){
            let src = iframe.children[0].getAttribute('src');
            mainVideo.src = src;
            let text = iframe.children[1].innerHTML;
            title.innerHTML = text;
        }
    };
});
</script>