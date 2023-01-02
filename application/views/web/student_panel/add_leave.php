<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">
        <div class="row">
            <div class="col-12">
                <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                    <div class="page_title_left">
                        <h3 class="f_s_25 f_w_700 dark_text">Leave </h3>
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
            <div class="white_card mb_30 card_height_100">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title ">
                            <h3 class="m-0 ">Add Leave</h3>
                        </div>
                        <div class="float-lg-right float-none common_tab_btn2 justify-content-end">
                        </div>
                    </div>
                </div>
                <div class="white_card_body ">
                    <?php if(!isset($_POST['leave_type'])){ ?>
                    <form action="" method="post">
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Choose Leave Type</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <select name="leave_type" class="form-control">
                                    <option value="" disabled selected>Choose Any One Type...</option>
                                    <option value="1">One Day Leave</option>
                                    <option value="2">More Then One Day Leave</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="submit" name="next" class="btn btn-primary px-4" value="Next">
                        </div>
                    </form>
                    <?php } if(isset($_POST['leave_type'])){ ?>
                    <form action="StudentPanel/add_leave" method="post">
                        <?php if($_POST['leave_type']==2){ ?>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Leave Start Date</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="date" name="start_date" min="<?= date('Y-m-d', strtotime(' +1 day')) ?>"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                Leave End Date
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="date" name="end_date" class="form-control"
                                    min="<?= date('Y-m-d', strtotime(' +1 day')) ?>" required>
                            </div>
                        </div>

                        <?php } if($_POST['leave_type']==1){ ?>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                Choose Leave Day
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="date" name="start_date" min="<?= date('Y-m-d', strtotime(' +1 day')) ?>"
                                    class="form-control" required>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                            <label>Leave's Reason</label>
                            </div>
                            <div class="col-sm-9 text-secondary">
                            <textarea name="reason" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="submit" name="submit" class="btn btn-primary px-4" value="Submit">
                        </div>
                    </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>