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
.column-content img{
    max-width:100%;
}
</style>


    <section id="feature-home">
        <div class="top-left-circle"></div>
        <div class="bottom-wave-footer"></div>
            <div class="container ">
                <div class="row" style="padding-bottom: 50px;padding-top: 50px">
                    <div class="col-lg-8 col-md-8 col-sm-12">
                        <div class="card shadow bg-white">
                            <div class="align-items-center">
                                <img src="http://localhost/Employee-Portal/assets/images/news/<?=$news_detail['image']?>" class="w-100">
                            </div>
                            <div class="column-content p-4">
                                <h3 class="" style="color:#8b4cdc"><?=$news_detail['news_name']?></h3>
                                <h3 class="" style="color:#8b4cdc"><?=$news_detail['news_title']?></h3>
                                <h5 class="text-theme-dark"><?=date('F j, Y',strtotime($news_detail['created_at']))?></h5>
                                <div class="text-justify"><?=$news_detail['news_description']?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12" style="position: -webkit-sticky; position: sticky; top: 0;">
                        <div class="card bg-white p-4">
                            <h5 class="w900 text-theme-medium mb-4">Other Articles</h5>
                            <?php if (!empty($news_list)>0) {
                            foreach ($news_list as $key => $news) { 
                                $url = $news['news_name']."-".$news['news_id'];
                                $url = trim($url);
                                $url = str_replace(" ","-",$url);
                                if($news['news_id'] != $news_detail['news_id']){?>

                                <h4 class="title"><a href="<?=base_url('News/article/' .$url)?>" class="d-block w700 text-sm mb-4"> <?=$news['news_title']?></a></h4>
                            <?php }}} ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

  


  