<?php // Filename: a-search-records.php
$pageTitle = "Advanced Search";
require_once 'inc/layout/header.inc.php';
require_once 'inc/db/mysqli_connect.inc.php';
require_once 'inc/app/config.inc.php'; 

?>



<div class="container bg-light p-3">
    <div class="col-12 mt-5">
        <h1 class="display-4 font-weight-bold">Advanced Search</h1>
        
        
    <form action="search-records.php" method="POST"  class="mb-3">
      
      <!-- <form action="search-records.php" method="POST" class="mb-3"> -->
     
     <!-- Each search term gets a div -->
  
        <div class="form-group">
            <label for="first_name">Student ID</label>
                <input type="text" id="student_id" name="student_id" class="form-control w-25" placeholder="Enter a Student ID" value="<?=(isset($_POST["student_id"]) ? $_POST["student_id"]:'') ?>">  
        </div>
        <div class="form-group">
            <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name" class="form-control w-25" placeholder="Enter a First Name" value="<?=(isset($_POST["first_name"]) ? $_POST["first_name"]:'') ?>">  
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name" class="form-control w-25" placeholder="Enter a Last Name" value="<?=(isset($_POST["last_name"]) ? $_POST["last_name"]:'') ?>">       
        </div>
        
        <div class="form-group">
            <label for="email">Email</label>
                <input type="text" id="email" name="email" class="form-control w-25" placeholder="Enter an Email" value="<?=(isset($_POST["email"]) ? $_POST["email"]:'') ?>">  
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
                <input type="text" id="phone" name="phone" class="form-control w-25" placeholder="Enter a Phone Number" value="<?=(isset($_POST["phone"]) ? $_POST["phone"]:'') ?>">  
        </div>
        <div class="form-group">
            <label for="degree_program">Degree Program</label>
                <input type="text" id="degree_program" name="degree_program" class="form-control w-25" placeholder="Enter a Degree" value="<?=(isset($_POST["degree_program"]) ? $_POST["degree_program"]:'') ?>"> 
        </div>
        <div class="form-group">
            <label for="gpa">GPA</label>
                <input type="text" id="gpa" name="gpa" class="form-control w-25" placeholder="Enter a GPA" value="<?=(isset($_POST["gpa"]) ? $_POST["gpa"]:'') ?>">       
        </div>
        <div class="form-group">
            <label for="financial_aid">Financial Aid</label>
                <input type="text" id="financial_aid" name="financial_aid" class="form-control w-25" placeholder="Financial Aid? (1 or 0)" value="<?=(isset($_POST["financial_aid"]) ? $_POST["financial_aid"]:'') ?>">  
        </div>
<!-- Graduation Date needs to be in date format -->
        <div>
            <label for="grad_date">Graduation date:</label>
            <br>
            <input type="date" id="grad_date" name="grad_date"
            value="<?=(isset($_POST["grad_date"]) ? $_POST["grad_date"]:'') ?>">  
            <br><br>
        </div>

  <!-- Here is the Submit -->
        <div class="form-group">
            <input type="submit" value="Search" class="btn btn-primary"/>
        </div>
    </form>
    </div>
</div>


<?php 
// Code to display search results
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // build SQL
    // STUFF BRUCE AND CORLENE MODIFIED
    // >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
    
    if (!empty($_POST["student_id"])) {
        $student_id = $_POST["student_id"];
        $sidSQL = " AND student_id = " . '"' . $student_id . '"';
    } else {
        $sidSQL = '';
    }

    if (!empty($_POST["first_name"])) {
        $first_name = $_POST["first_name"];
        $firstSQL = " AND first_name = " . '"' . $first_name . '"';
    } else {
        $firstSQL = '';
    }

    if (!empty($_POST["last_name"])) {
        $last_name = $_POST["last_name"];
        $lastSQL = " AND last_name = " . '"' . $last_name . '"';
    } else {
        $lastSQL = '';
    }

    if (!empty($_POST["email"])) {
        $email = $_POST["email"];
        $emailSQL = " AND email >= " . $email;
    } else {
        $emailSQL = '';
    }

    if (!empty($_POST["phone"])) {
        $phone = $_POST["phone"];
        $phoneSQL = " AND phone = " . '"' . $phone . '"';
    } else {
        $phoneSQL = '';
    }

    if (!empty($_POST["degree_program"])) {
        $degree_program = $_POST["degree_program"];
        $degreeSQL = " AND degree_program = " . '"' . $degree_program . '"';
    } else {
        $degreeSQL = '';
    }

    if (!empty($_POST["gpa"])) {
        $gpa = $_POST["gpa"];
        $gpaSQL = " AND gpa >= " . $gpa;
    } else {
        $gpaSQL = '';
    }

    if (!empty($_POST["financial_aid"])) {
        $financial_aid = $_POST["financial_aid"];
        $faidSQL = " AND financial_aid = " . '"' . $financial_aid . '"';
    } else {
        $faidSQL = '';
    }

    if (!empty($_POST["grad_date"])) {
        $grad_date = $_POST["grad_date"];
        $gdateSQL = " AND grad_date = " . '"' . $grad_date . '"';
    } else {
        $gdateSQL = '';
    }

}
    
?>


<?php require_once 'inc/layout/footer.inc.php'; ?>

