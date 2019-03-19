<?php // Filename: connect.inc.php

require_once __DIR__ . "/../db/mysqli_connect.inc.php";
require_once __DIR__ . "/../app/config.inc.php";

$error_bucket = [];

// http://php.net/manual/en/mysqli.real-escape-string.php

if($_SERVER['REQUEST_METHOD']=="POST"){
    // First insure that all required fields are filled in
    if (empty($_POST['first'])) {
        array_push($error_bucket,"<p>A first name is required.</p>");
    } else {
        $first = $db->real_escape_string(strip_tags($_POST['first']));
    }
    if (empty($_POST['last'])) {
        array_push($error_bucket,"<p>A last name is required.</p>");
    } else {
        $last = $db->real_escape_string(strip_tags($_POST['last']));
    }
    if (empty($_POST['sid'])) {
        array_push($error_bucket,"<p>A student ID is required.</p>");
    } else {
        $sid = $db->real_escape_string(strip_tags($_POST['sid']));
    }
    if (empty($_POST['email'])) {
        array_push($error_bucket,"<p>An email address is required.</p>");
    } else {
        $email = $db->real_escape_string(strip_tags($_POST['email']));
    }
    if (empty($_POST['phone'])) {
        array_push($error_bucket,"<p>A phone number is required.</p>");
    } else {
        $phone = $db->real_escape_string(strip_tags($_POST['phone']));
    }
    // Project 4 update starts here
    if ($_POST['degree_program'] == "Choose Your Degree Program") {
        array_push($error_bucket,"<p>A degree program is required.</p>");
    } else {
        $degree_program = $db->real_escape_string($_POST['degree_program']);
    }


    if (empty($_POST['gpa'])) {
        array_push($error_bucket,"<p>A gpa number is required.</p>");
    } else {
        #$phone = $_POST['phone'];
        $gpa = $db->real_escape_string(strip_tags($_POST['gpa']));
    }
    if (!isset($_POST['financial_aid'])) {
        array_push($error_bucket,"<p>A financial_aid option is required.</p>");
     } else {
            if ($_POST['financial_aid'] == 'yes') {
                $yes = 'checked'; # set $yes to checked
                $db_value = 1;
            } elseif ($_POST['financial_aid'] == 'no') { # did the user click on no
                $no = 'checked'; # set $no to checked
                $db_value = 0;
            }

            $financial_aid = $db->real_escape_string($_POST['financial_aid']);
    }
    if (empty($_POST['gdate'])) {
        array_push($error_bucket,"<p>A graduation date is required.</p>");
    } else {
        $gdate = $db->real_escape_string(strip_tags($_POST['grad_date']));
    }

    // If we have no errors than we can try and insert the data
    if (count($error_bucket) == 0) {
        // Time for some SQL
        $sql = "INSERT INTO $db_table (first_name,last_name,student_id,email,phone,degree_program,gpa,financial_aid,grad_date) ";
        $sql .= "VALUES ('$first','$last',$sid,'$email','$phone','$degree_program','$gpa','$financial_aid','$grad_date')";

        // comment in for debug of SQL
        // echo $sql;

        $result = $db->query($sql);
        if (!$result) {
            echo '<div class="alert alert-danger" role="alert">
            I am sorry, but I could not save that record for you. ' .  
            $db->error . '.</div>';
        } else {
            echo '<div class="alert alert-success" role="alert">
            I saved that new record for you!
          </div>';
            unset($first);
            unset($last);
            unset($sid);
            unset($email);
            unset($phone);
            unset($degree_program);
            unset($gpa);
            unset($financial_aid);
            unset($grad_date);
        }
    } else {
        display_error_bucket($error_bucket);
    }
}

?>
