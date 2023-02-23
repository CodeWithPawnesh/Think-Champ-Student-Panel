<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">
        <div class="row">
            <div class="col-12">
                <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                    <div class="page_title_left">
                        <h3 class="f_s_25 f_w_700 dark_text">Leaderboard</h3>
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
    <div class="row ">
        <div class="col-xl-12 ">
            <?php $i=1; foreach($leaderboard_data as $ld){ ?>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless table-sm">
                            <tbody>
                                <tr>
                                    <td class="text-center">
                                        <?php if($i==1 && $ld['total']>0){ ?>
                                        <img src="assets/dashboard/img/gold-medal.png" style="height:20px" alt="">
                                        <?php } ?>
                                        <?php if($i==2 && $ld['total']>0){ ?>
                                        <img src="assets/dashboard/img/silver-medal.png" style="height:20px" alt="">
                                        <?php } ?>
                                        <?php if($i==3 && $ld['total']>0){ ?>
                                        <img src="assets/dashboard/img/bronze-medal.png" style="height:20px" alt="">
                                        <?php } ?>
                                        <?= $ld['student_name'] ?>
                                    </td>
                                    <td class="text-center"><?php if($ld['total']>0) { ?>Rank <?= $i; }else{echo "--"; } ?> </td>
                                    <td class="text-center">Quiz : <?= $ld['qm_sum'] ?> </td>
                                    <td class="text-center">Assignment : <?= $ld['am_sum'] ?> </td>
                                    <td class="text-center">Programming Challenge : <?= $ld['pqm_sum'] ?> </td>
                                    <td class="text-center">Programming Class: <?= $ld['pcm_sum'] ?></td>
                                    <td class="text-center">Total : <?= $ld['total'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php $i++; } ?>
        </div>
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