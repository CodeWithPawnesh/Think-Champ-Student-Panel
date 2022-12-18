<style>
.card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    transition: 0.3s;
    /*width: 40%;*/
}

.card:hover {
    box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
}

.container {
    padding: 2px 16px;
}

.name {
    color: #273C66;
}

.title {
    color: #1E95BA;
}

.in-active {
    color: gray;
    background-color: lightgray;
}
</style>
<section id="feature-home">
    <div class="container">
        <br>
        <div class="row">
            <div class="col text-center">
                <a class="readon2 banner-style " href="Workshop">WORKSHOP</a>
            </div>
            <div class="col text-center">
                <a class="readon2 banner-style in-active" href="Blog">BLOG</a>
            </div>
            <div class="col text-center">
                <a class="readon2 banner-style in-active" href="News">NEWS</a>
            </div>
        </div>
        <div class="top-left-circle"></div>
        <div class="bottom-wave-footer"></div>

        <!--   <div class="row align-items-center justify-content-center">
                    <div class="col-12 col-md-12 col-sm-12 icon-boxes">
                        <h1 class="w700 text-3-0">Blogs</h1>
                        <h4 class="w700">For Success For Life</h4>
                            <p class="w700 text-theme-medium">(Age 7 to 14 years)</p>
                </div> -->
        <div style="padding-bottom: 100px">
            <h4 class="text-3-0 w700 mb-4 mt-5 title">WORKSHOP</h4>

            <?php if (!empty($workshop_list)) {
        // echo "<pre>";print_r($blog_list);
        foreach ($workshop_list as $key => $workshop) { 
            $url = $workshop['workshop_name']."-".$workshop['workshop_id'];
            $url = trim($url);
            $url = str_replace(" ","-",$url);
            if($key % 2 ==0){?>


            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-md-4 col-sm-12 icon-boxes mb-4">
                    <a href="<?=base_url('Workshop/article/').$url?>">
                        <img src="http://localhost/Employee-Portal/assets/images/workshop/<?=$workshop['image']?>"
                            width="400px" height="400px" class="card aos-init aos-animate img-fluid" data-aos="zoom-in"
                            data-aos-delay="100">
                    </a>
                </div>
                <div class="col-12 col-md-8  col-sm-12 mb-4" data-aos="zoom-in" data-aos-delay="100">
                    <a href="<?=base_url('Workshop/article/').$url?>">
                        <h3 class="title"><?=$workshop['workshop_title']?></h3>
                    </a>
                    <!-- <p class="text-theme-dark"><span>Posted by: Admin</span></p> -->
                    <h5 class="text-theme-dark"><?=date('F j, Y',strtotime($workshop['workshop_created_at']))?></h5>
                    <p class="des">
                        <?php $workshop_des = explode(".",$workshop['workshop_description']); echo $workshop_des[0] ?>
                    </p>
                    <?php 
                          $currDate = date('y-m-d, h:i');
                          $currStemp = strtotime($currDate);
                          $sdate = explode(",",$workshop['start_date_time']);
                          $sdate = $sdate[0];
                          $stimestamp = strtotime($workshop['start_date_time']);
                          $stime = $sdate[1];
                          $edate = explode(",",$workshop['end_date_time']);
                          $edate = $edate[0];
                          $etime = $edate[1];
                     ?>
                    <p class="text-justify">Workshop Start on <span
                            class="fw-bold title"><?=date('F j, Y',strtotime($sdate))?> at
                            <?=date('h:i A',strtotime($stime))?> </span>, And the workshop will End on <span
                            class="fw-bold title"><?=date('F j, Y',strtotime($edate))?> at
                            <?=date('h:i A',strtotime($etime))?> </span></p>
                            <p>Workshop Type : <span class="fw-bold title"><?php if($workshop['workshop_type']==1){ echo "Online"; }else{ echo"Offline"; } ?></span></p>
                    <a href="<?=base_url('Workshop/article/').$url?>" class="btn btn-info text-white">Read More</a>
                    <!-- Button trigger modal -->
                    <?php if($currStemp <= $stimestamp){ ?>
                    <button type="button" onclick="get_workshop(<?= $workshop['workshop_id']?>)"
                        class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Enroll Now
                    </button>
                    <?php } ?>
                </div>
            </div>
            <hr>
            <?php }else{ ?>
            <div class="row align-items-center justify-content-center">

                <div class="col-12 col-md-8  col-sm-12 mb-4" data-aos="zoom-in" data-aos-delay="100">
                    <a href="<?=base_url('Workshop/article/').$url?>">
                        <h3 class="title"><?=$workshop['workshop_title']?></h3>
                    </a>
                    <!-- <p class="text-theme-dark"><span>Posted by: Admin</span></p> -->
                    <h5 class="text-theme-dark"><?=date('F j, Y',strtotime($workshop['workshop_created_at']))?></h5>
                    <p class="des">
                        <?php $workshop_des = explode(".",$workshop['workshop_description']); echo $workshop_des[0] ?>
                    </p>
                    <?php $sdate = explode(",",$workshop['start_date_time']);
                          $sdate = $sdate[0];
                          $stime = $sdate[1];
                          $edate = explode(",",$workshop['end_date_time']);
                          $edate = $edate[0];
                          $etime = $edate[1];
                     ?>
                    <p class="text-justify">Workshop Start on <span
                            class="fw-bold title"><?=date('F j, Y',strtotime($sdate))?> at
                            <?=date('h:i A',strtotime($stime))?> </span>, And the workshop will End on <span
                            class="fw-bold title"><?=date('F j, Y',strtotime($edate))?> at
                            <?=date('h:i A',strtotime($etime))?> </span></p>
                    <p>Workshop Type : <span class="fw-bold title"><?php if($workshop['workshop_type']==1){ echo "Online"; }else{ echo"Offline"; } ?></span></p>
                    <a href="<?=base_url('Workshop/article/').$url?>" class="btn btn-info text-white"> Read More</a>
                    <!-- Button trigger modal -->
                    <button type="button" onclick="get_workshop(<?= $workshop['workshop_id']?>)"
                        class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Enroll Now
                    </button>

                </div>
                <div class="col-12 col-md-4 col-sm-12 icon-boxes mb-4">
                    <a href="<?=base_url('Workshop/article/').$url?>">
                        <img src="http://localhost/Employee-Portal/assets/images/workshop/<?=$workshop['image']?>"
                            width="400px" height="400px" class="card aos-init aos-animate img-fluid" data-aos="zoom-in"
                            data-aos-delay="100">
                    </a>
                </div>
            </div>
            <hr>
            <?php }  ?>
            <?php } } ?>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Workshop EnrollMent</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('Workshop') ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="workshop_id" id="id">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Enter Your Full Name</label>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Enter Your Phone No.</label>
                                </div>
                                <div class="form-group">
                                    <input type="tel" name="phone" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Enter Your E-mail Id</label>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
    function get_workshop(i) {
        document.getElementById("id").value = i;
    }
    </script>