<section class="login-first-section">
    <div class="row">
        <div class="col-sm-7">
            <form action="<?= base_url("Subscription") ?>" method="post" class="login-form-box">
                <?php if(isset($_GET['id'])){ ?>
                <input type="hidden" name="course_id" value="<?= base64_decode($_GET['id']) ?>">
                <?php }else{ ?>
                <input type="hidden" name="course_id" value="<?=$course_detail['course_id'] ?>">
                <?php } ?>
                <input type="hidden" name="t_price" value="<?= $course_detail['price'] ?>">
                <input type="hidden" id="price" name="price" value="<?= $course_detail['price'] ?>">
                <h3 class="first-heading">Enroll Now</h3>
                <?php 
           if(!empty($error_mess)){ foreach($error_mess as $e_m){ ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>
                        <center><?= $e_m; ?></center>
                    </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php } }?>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label> Full Name</label>
                        </div>
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Full Name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label> Phone Number</label>
                        </div>
                        <div class="form-group">
                            <input type="number" name="number" placeholder="PH NO." class="form-control" required>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label> Who You Are?</label>
                        </div>
                        <div class="form-group">
                            <select name="student_ty" id="student" class="form-control" required>
                                <option value="forth-slot">Select Any One Option</option>
                                <option value="forth-slot">Student</option>
                                <option value="first-slot">Professional</option>
                                <option value="second-slot">Others</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label> College/Company Name </label>
                        </div>
                        <div class="form-group">
                            <input type="text" name="student_ab" placeholder="Enter Your College/Company Name"
                                class="form-control" required>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Choose Your Gender</label>
                        </div>
                        <div class="form-group">
                            <select name="gender" id="student" class="form-control" required>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Enter Your E-Mail</label>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" required>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Create Password</label>
                        </div>
                        <div class="form-group">
                            <input type="password" name="pass" class="form-control" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                        </div>
                        <div class="form-group">
                            <input type="password" name="c_pass" class="form-control" required>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group text-center">
                            <label>Payment Type</label>
                        </div>
                        <div class="form-group">
                            <select name="pay_type" id="pay_type" onchange="payChange()" class="form-control" required>
                                <option value="1">Full Payment</option>
                                <option value="2">2 Installments</option>
                                <option value="3">3 Installments</option>
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group text-center">
                            <label>Choose Any One Batch</label>
                        </div>
                        <div class="form-group">
                            <div class="radio-toolbar text-center">
                                <div class="row">
                                    <?php foreach($batch_detail as $b_d){ ?>
                                    <div class="col-sm-6">
                                        <input type="radio" id="<?= $b_d['batch_id'] ?>"
                                            onclick="check(<?= $b_d['batch_id'] ?>)" name="batch_id"
                                            value="<?= $b_d['batch_id'] ?>">
                                        <label for="<?= $b_d['batch_id'] ?>"><?= $b_d['batch_name'] ?> Class Timing
                                            <?= date('h:i A',$b_d['class_ts']) ?> </label>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-sm btn-success">Submit</button>
                </div>
            </form>
        </div>
        <div class="col-sm-5">
            <form action="<?= base_url("Subscription") ?>" method="post" class="login-form-box">
                <h3 class="first-heading">Order Details</h3>
                <h5 class="text-center">Order Summary</h5>
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th class="col-sm-6 text-center">
                                Order Name :
                            </th>
                            <td class="col-sm-6 text-center"><?= $course_detail['course_name'] ?> Course </td>
                        </tr>
                        <tr>
                            <th class="col-sm-6 text-center">
                                Order Price :
                            </th>
                            <td class="col-sm-6 text-center">₹ <?= $course_detail['price'] ?></td>
                        </tr>
                        <!-- <tr>
                            <th class="col-sm-6 text-center">
                                Discount Code :
                            </th>
                            <td class="col-sm-6 text-center"><input type="text" name="discount" class="form-control"
                                    placeholder="Discount">
                            </td>
                        </tr> -->
                        <tr>
                            <th class="col-sm-6 text-center">
                                Total :
                            </th>
                            <td class="col-sm-6 text-center">₹ <?= $course_detail['price'] ?></td>
                        </tr>
                        <tr>
                            <th class="col-sm-6 text-center text-success">
                                Pay Now :
                            </th>
                            <td class="col-sm-6 text-center text-success" id="pay_card">₹ <?= $course_detail['price'] ?>
                            </td>
                        </tr>
                    </thead>
                </table>
                <h3 class="text-center">Other Payment Options</h3>
                <h5 class="text-center">Full Payment Option</h5>
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th class="col-sm-6 text-center">
                                Order Name :
                            </th>
                            <td class="col-sm-6 text-center"><?= $course_detail['course_name'] ?> Course </td>
                        </tr>
                        <tr>
                            <th class="col-sm-6 text-center">
                                Order Price :
                            </th>
                            <td class="col-sm-6 text-center">₹ <?= $course_detail['price'] ?></td>
                        </tr>
                        <!-- <tr>
                            <th class="col-sm-6 text-center">
                                Discount Code :
                            </th>
                            <td class="col-sm-6 text-center"><input type="text" name="discount" class="form-control"
                                    placeholder="Discount">
                            </td>
                        </tr> -->
                        <tr>
                            <th class="col-sm-6 text-center">
                                Total :
                            </th>
                            <td class="col-sm-6 text-center">₹ <?= $course_detail['price'] ?></td>
                        </tr>
                    </thead>
                </table>
                <h5 class="text-center">2 Installments Payment Option</h5>
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th class="col-sm-6 text-center">
                                Order Name :
                            </th>
                            <td class="col-sm-6 text-center"><?= $course_detail['course_name'] ?> Course </td>
                        </tr>
                        <tr>
                            <th class="col-sm-6 text-center">
                                Order Price :
                            </th>
                            <td class="col-sm-6 text-center">₹ <?= $course_detail['price'] ?></td>
                        </tr>
                        <!-- <tr>
                            <th class="col-sm-6 text-center">
                                Discount Code :
                            </th>
                            <td class="col-sm-6 text-center"><input type="text" name="discount" class="form-control"
                                    placeholder="Discount">
                            </td>
                        </tr> -->
                        <tr>
                            <th class="col-sm-6 text-center">
                                First Installment :
                            </th>
                            <td class="col-sm-6 text-center">₹ <?= $course_detail['price']/2 ?><br>(On Enrollment Day)
                            </td>
                        </tr>
                        <tr>
                            <th class="col-sm-6 text-center">
                                Second Installment :
                            </th>
                            <td class="col-sm-6 text-center">₹ <?= $course_detail['price']/2 ?><br>(15 Days After
                                Installment)</td>
                        </tr>
                    </thead>
                </table>
                <h5 class="text-center">3 Installments Payment Option</h5>
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th class="col-sm-6 text-center">
                                Order Name :
                            </th>
                            <td class="col-sm-6 text-center"><?= $course_detail['course_name'] ?> Course </td>
                        </tr>
                        <tr>
                            <th class="col-sm-6 text-center">
                                Order Price :
                            </th>
                            <td class="col-sm-6 text-center">₹ <?= $course_detail['price'] ?></td>
                        </tr>
                        <!-- <tr>
                            <th class="col-sm-6 text-center">
                                Discount Code :
                            </th>
                            <td class="col-sm-6 text-center"><input type="text" name="discount" class="form-control"
                                    placeholder="Discount">
                            </td>
                        </tr> -->
                        <tr>
                            <th class="col-sm-6 text-center">
                                First Installment :
                            </th>
                            <td class="col-sm-6 text-center">₹ <?= round($course_detail['price']/3) ?><br>(On Enrollment
                                Day)</td>
                        </tr>
                        <tr>
                            <th class="col-sm-6 text-center">
                                Second Installment :
                            </th>
                            <td class="col-sm-6 text-center">₹ <?= round($course_detail['price']/3) ?><br>(After 15 Days
                                of Enrollment)</td>
                        </tr>
                        <tr>
                            <th class="col-sm-6 text-center">
                                Third Installment :
                            </th>
                            <td class="col-sm-6 text-center">₹ <?= round($course_detail['price']/3) ?><br>(After 15 Days
                                of Second Installment)</td>
                        </tr>
                    </thead>
                </table>
                <!-- <div class="text-center">
                    <button type="button" name="dis_btn" class="btn btn-sm btn-success text-center">Apply</button>
                </div> -->
            </form>
        </div>
    </div>
</section>
<script>
function payChange() {
    var price = <?= $course_detail['price'] ?>;
    var pay_type = document.getElementById("pay_type").value;
    if (pay_type == 2) {
        var new_price = Math.round(price / 2);

        document.getElementById("price").value = new_price;
        document.getElementById("pay_card").innerHTML = new_price;
    }
    if (pay_type == 3) {
        var new_price = Math.round(price / 3);
        document.getElementById("price").value = new_price;
        document.getElementById("pay_card").innerHTML = new_price;
    }
    if (pay_type == 1) {
        var new_price = price;
        document.getElementById("price").value = new_price;
        document.getElementById("pay_card").innerHTML = new_price;
    }
}
</script>