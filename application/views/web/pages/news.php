<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  /*width: 40%;*/
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
  padding: 2px 16px;
}
.name{
    color:#273C66;
}
.title{
    color:#1E95BA;
}
.in-active{
    color:gray;
    background-color:lightgray;
}

</style>
<section id="feature-home">
<div class="container">
    <br>
<div class="row">
    <div class="col text-center">
    <a class="readon2 banner-style in-active" href="Workshop">WORKSHOP</a>
    </div>
    <div class="col text-center">
    <a class="readon2 banner-style in-active" href="Blog">BLOG</a>
    </div>
    <div class="col text-center">
    <a class="readon2 banner-style " href="News">NEWS</a>
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
                    <h4 class="text-3-0 w700 mb-4 mt-5 title">NEWS</h4>

    <?php if (!empty($news_list)) {
        // echo "<pre>";print_r($blog_list);
        foreach ($news_list as $key => $news) {
            $url = $news['news_name']."-".$news['news_id'];
            $url = trim($url);
            $url = str_replace(" ","-",$url); 
            if($key % 2 ==0){?>


            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-md-4 col-sm-12 icon-boxes mb-4">
                    <a href="<?=base_url('News/article/').$url?>">
                    <img src="https://erp-panel.think-champ.com/assets/images/news/<?=$news['image']?>" width="400px" height ="400px"
                        class="card aos-init aos-animate img-fluid" data-aos="zoom-in" data-aos-delay="100">
                        </a>
                </div>
                <div class="col-12 col-md-8  col-sm-12 mb-4" data-aos="zoom-in" data-aos-delay="100">
                    <a href="<?=base_url('News/article/').$url?>"><h3 class="name w700"><?=$news['news_name']?></h3></a>
                    <a href="<?=base_url('News/article/').$url?>"><h3 class="title"><?=$news['news_title']?></h3></a>
                    <!-- <p class="text-theme-dark"><span>Posted by: Admin</span></p> -->
                    <h5 class="text-theme-dark"><?=date('F j, Y',strtotime($news['created_at']))?></h5>
                    <p class="des"><?php $news_des = explode(".",$news['news_description']); echo $news_des[0] ?></p>
                    <p></p>
                    <a href="<?=base_url('News/article/').$url?>" class="btn btn-info text-white">Read More</a>
                </div>
            </div>
            <hr>
        <?php }else{ ?>
            <div class="row align-items-center justify-content-center">

                <div class="col-12 col-md-8  col-sm-12 mb-4" data-aos="zoom-in" data-aos-delay="100">
                <a href="<?=base_url('News/article/').$url?>"><h3 class="name w700"><?=$news['news_name']?></h3></a>
                    <a href="<?=base_url('News/article/').$url?>"><h3 class="title"><?=$news['news_title']?></h3></a>
                    <!-- <p class="text-theme-dark"><span>Posted by: Admin</span></p> -->
                    <h5 class="text-theme-dark"><?=date('F j, Y',strtotime($news['created_at']))?></h5>
                    <p class="des"><?php $news_des = explode(".",$news['news_description']); echo $news_des[0] ?></p>
                    <p></p>
                    <a href="<?=base_url('News/article/').$url?>" class="btn btn-info text-white">Read More</a>
                </div>
                <div class="col-12 col-md-4 col-sm-12 icon-boxes mb-4">
                    <a href="<?=base_url('News/article/').$url?>">
                    <img src="https://erp-panel.think-champ.com/assets/images/news/<?=$news['image']?>" width="400px" height ="400px"
                        class="card aos-init aos-animate img-fluid" data-aos="zoom-in" data-aos-delay="100">
                        </a>
                </div>
            </div>
                 <hr> 
        <?php }  ?>


    <?php } } ?>

            </div>
</div>
</section>

   