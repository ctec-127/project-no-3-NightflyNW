<?php // Filename: form.inc.php ?>

<!-- Note the use of sticky fields below -->
<!-- Note the use of the PHP Ternary operator
Scroll down the page
http://php.net/manual/en/language.operators.comparison.php#language.operators.comparison.ternary
-->

<!-- this is the form for creating a record -->
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
    <!-- Start input hidden id automatically created -->
    <label class="col-form-label" for="id">ID </label>
    <input class="form-control" type="text" id="id" name="id" value="<?php echo (isset($id) ? $id: '');?>">
    <br>
    <!-- End input hidden id automatically created -->
    <label class="col-form-label" for="first">First Name </label>
    <input class="form-control" type="text" id="first" name="first" value="<?php echo (isset($first) ? $first: '');?>">
    <br>
    <label class="col-form-label" for="last">Last Name </label>
    <input class="form-control" type="text" id="last" name="last" value="<?php echo (isset($last) ? $first: '');?>"">
    <br>
    <label class="col-form-label" for="id">Student ID </label>
    <input class="form-control" type="text" id="student_id" name="id" value="<?php echo (isset($student_id) ? $student_id: '');?>"">
    <br>
    <label class="col-form-label" for="email">Email </label>
    <input class="form-control" type="text" id="email" name="email" value="<?php echo (isset($email) ? $email: '');?>"">
    <br>
    <label class="col-form-label" for="phone">Phone </label>
    <input class="form-control" type="text" id="phone" name="phone" value="<?php echo (isset($phone) ? $phone: '');?>"">
    <br>
    <label class="col-form-label" for="gpa">GPA </label>
    <input class="form-control" type="text" id="gpa" name="gpa" value="<?php echo (isset($gpa) ? $gpa: '');?>"">
    <br>
    
    <!-- Start input radio buttons-->
    <!-- <label class="custom-control-label" for="financial_aid">Financial Aid Yes</label>
    <input class="custom-control-input" type="radio" id="financial_aid" name="financial_aid" value="""> -->
    <br>
    <label class="col-form-label" for="financial_aid">Financial Aid</label>
    <br>
    <div class="custom-control custom-radio">
        <input type="radio" id="financial_aid" name="financial_aid" class="custom-control-input" value="<?php echo (isset($financial_aid) ? $financial_aid: '');?>"">
        <label class="custom-control-label" for="financial_aid">Yes</label>
    </div>
    <div class="custom-control custom-radio">
        <input type="radio" id="financial_aid2" name="financial_aid" class="custom-control-input" value="<?php echo (isset($financial_aid) ? $financial_aid: '');?>"">
        <label class="custom-control-label" for="financial_aid2">No</label>
    </div>
    <!-- End input radio buttons-->
    <!-- Start input degree program pull down options -->
    <br>
    <label class="col-form-label" for="degree_program">Degree Program </label>
    <select class="custom-select">
        <option selected>Choose Your Degree Program</option>
        <option value="1">Web Design</option>
        <option value="2">Web Development</option>
        <option value="3">Network Administration</option>
        <option value="4">Technical Support</option>
        <option value="5">Robotics</option>
    </select id="degree_program" name="degree_program" value="<?php echo (isset($degree_program) ? $degree_program: '');?>"">
    <br> <br>
    <!-- End input degree program pull down options -->

    <!-- Start input Date Created / Time Stamp -->
    <label class="col-form-label" for="data_created">Data Created </label>
    <input class="<?php $d=mktime(); echo date("Y-m-d h:i:sa", $d);?>" type="text" id="data_created" name="data_created" value="<?php echo (isset($data_created) ? $data_createda: '');?>"">
    <br>
    <!-- End input Date Created / Time Stamp -->

    <a href="display-records.php">Cancel</a>&nbsp;&nbsp;
    <button class="btn btn-primary" type="submit">Save Record</button>
</form>

