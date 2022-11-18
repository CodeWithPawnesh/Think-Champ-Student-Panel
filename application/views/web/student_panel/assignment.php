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
                        Right
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row ">
        <?php $status=3;$ob_marks = "NA"; $s=1;if(!empty($assignment_data)){ foreach($assignment_data as $a_d){ 
             if(!empty($submited_assignment)){
                 foreach($submited_assignment as $s_a){
                    if($s_a['assignment_id']== $a_d['assignment_id']){
                        $status = $s_a['status'];
                        $ob_marks = $s_a['marks'];
                        $s=0;
                    }
                    } } 
                    ?>
        <div class="col-xl-12">
            <div class="white_card mb_30 card_height_100">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title ">
                            <h3 class="m-0 ">
                                <?php if($status == 1){ ?>
                                <h3 class="m-0 text-warning">Status : Under Review</h3>
                                <?php  } ?>
                                <?php if($status == 2){ ?>
                                <h3 class="m-0 text-success">Status : Checked</h3>
                                <?php  } ?>
                                <?php if($status == 3){ ?>
                                <h3 class="m-0 text-danger">Status : Pending</h3>
                                <?php  } ?>
                            </h3>
                        </div>
                        <div class="float-lg-right float-none common_tab_btn2 justify-content-end m-0 ">
                            <h4 class="m-0 ">Marks :
                                <?php if($status == 2){ echo $ob_marks; }else{ echo "NA";} ?> / <?= $a_d['marks'] ?></h4>
                        </div>
                    </div>
                </div>
                <div class="white_card_body text-center ">
                    <?= $a_d['assignment'] ?>
                    <br>
                    <p class="fw-bold text-body">NOTE: MAKE A ZIP FILE OR PDF OF YOUR PROJECT AND THEN SUBMIT HERE  </p>
                    <br><br>
                    <div class="text-center">
                        <?php if($s == 1){ ?>
                        <!-- Button trigger modal -->
                        <a onclick="myFun(<?= $a_d['assignment_id'] ?>)" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Submit
                        </a>
                        <p class="text-warning">Submit Your Assignment</p>
                        <?php } ?>
                        <?php if($s == 0){ ?>
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
        <?php } } ?>
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