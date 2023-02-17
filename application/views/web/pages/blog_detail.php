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
                                <img src="https://erp-panel.think-champ.com/assets/images/blog/<?=$blog_detail['image']?>" class="w-100">
                            </div>
                            <div class="column-content p-4">
                                <h3 class="" style="color:#8b4cdc"><?=$blog_detail['blog_name']?></h3>
                                <h3 class="" style="color:#8b4cdc"><?=$blog_detail['blog_title']?></h3>
                                <h5 class="text-theme-dark"><?=date('F j, Y',strtotime($blog_detail['blog_created_at']))?></h5>
                                <div class="text-justify"><?=$blog_detail['blog_description']?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12" style="position: -webkit-sticky; position: sticky; top: 0;">
                        <div class="card bg-white p-4">
                            <h5 class="w900 text-theme-medium mb-4">Other Articles</h5>
                            <?php if (!empty($blog_list)>0) {
                            foreach ($blog_list as $key => $blog) { 
                                $url = $blog['blog_name']."-".$blog['blog_id'];
                                $url = trim($url);
                                $url = str_replace(" ","-",$url);
                                if($blog['blog_id'] != $blog_detail['blog_id']){?>

                                <h4 class="title"><a href="<?=base_url('Blog/article/' .$url)?>" class="d-block w700 text-sm mb-4"> <?=$blog['blog_title']?></a></h4>
                            <?php }}} ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

  


  