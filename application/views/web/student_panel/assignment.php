<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">
        <div class="row">
            <div class="col-12">
                <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                    <div class="page_title_left">
                        <h3 class="f_s_25 f_w_700 dark_text">Assignments</h3>
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
        <?php $currDate = date("y-m-d"); if(!empty($assignment_data)){ foreach($assignment_data as $a_d){ 
                    ?>
        <div class="col-xl-12">
            <div class="white_card mb_30 card_height_100">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title ">
                            <h3 class="m-0 ">
                                <?php if($a_d['status'] == 1){ ?>
                                <h3 class="m-0 text-warning">Status : Under Review</h3>
                                <?php  } ?>
                                <?php if($a_d['status'] == 2){ ?>
                                <h3 class="m-0 text-success">Status : Checked</h3>
                                <?php  } ?>
                                <?php if(empty($a_d['status'])){ ?>
                                <h3 class="m-0 text-danger">Status : Pending</h3>
                                <?php  } ?>
                            </h3>
                        </div>
                        <div class="float-lg-right float-none common_tab_btn2 justify-content-end m-0 ">
                            <h4 class="m-0 ">Marks :
                                <?php if($a_d['status'] == 2){ echo $a_d['marks']; }else{ echo "NA";} ?> / <?= $a_d['marks'] ?></h4>
                        </div>
                    </div>
                </div>
                <div class="white_card_body text-center ">
                    <?= $a_d['assignment'] ?>
                    <br>
                    <p class="fw-bold text-body">NOTE: MAKE A ZIP FILE OR PDF OF YOUR PROJECT AND THEN SUBMIT HERE  </p>
                    <br><br>
                    <div class="text-center">
                        <?php if(empty($a_d['status']) && date('y-m-d',$a_d['end_date']) >= $currDate ){ ?>
                        <!-- Button trigger modal -->
                        <a onclick="myFun(<?= $a_d['assignment_id'] ?>)" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Submit
                        </a>
                        <p class="text-warning">Submit Your Assignment</p>
                        <?php }else{ ?>
                        <h3 class="text-success">Assignment Submitted</h3>
                        <?php } ?>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col text-bold  text-center">Assignment Start Date :
                            <?= date('d M, Y',$a_d['start_date']) ?></div>
                        <div class="col text-bold text-danger text-center">Assignment Deadline :
                            <?= date('d M, Y',$a_d['end_date']) ?></div>
                    </div>
                </div>
            </div>
        </div>
        <?php } }else{ echo "<h2 class='text-center text-warning'>No Assignment Found</h2>"; } ?>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="2" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Submit Your Assignment</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url("Assignment/submit_assignment") ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <input id="ass_id" type="hidden" name="assisment_id">
                <input type="file" id="ass_input" accept=".zip" name="assignment" class="form-control" required>
            </div>
            <div class="modal-footer">
                <button type="submit" name="submit" class="btn btn-success">Submit</button>
            </div>
            </form>
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
    function myFun(id){
       document.getElementById("ass_id").value=id;
    }
    var file = document.getElementById('ass_input');

file.onchange = function(e) {
  var ext = this.value.match(/\.([^\.]+)$/)[1];
  switch (ext) {
    case 'zip':
      break;
    default:
      alert('Only Zip File Are Allowed');
      this.value = '';
  }
};
</script>