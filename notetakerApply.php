<?php
require("includes/top.php");
?>
<style>

  .applicationSubmissionText {
    text-align: center;
  }
</style>
<?PHP
$hashedCrn = $_GET['crn'];

try {
    $db->beginTransaction();
    $query = "SELECT fnkProfessorNetId, pmkCourseId, fldDepartment, fldCourseNum, fldSection FROM tblClasses where fldToken LIKE '" . $hashedCrn . "%'";
    $statement = $db->prepare($query);
    $statement->execute();
    $classInfo = $statement->fetchAll(PDO::FETCH_ASSOC);
    $db->commit();
} catch (PDOException $e) {
    $db->rollBack();
    echo $e->getMessage();
}
//
// print "<pre>";
// print_r($_SESSION);
// print "</pre>";

$studentID = $_SESSION['user']['pmkNetId'];

try {
    $db->beginTransaction();
    $query = "SELECT fldFirstName, fldLastName FROM tblUsers where pmkNetId = '" . $studentID . "'";
    $statement = $db->prepare($query);
    $statement->execute();
    $studentInfo = $statement->fetchAll(PDO::FETCH_ASSOC);
    $db->commit();
} catch (PDOException $e) {
    $db->rollBack();
    echo $e->getMessage();
}


$professorNetId = $classInfo[0]['fnkProfessorNetId'];
// echo $professorNetId;
$crn = $classInfo[0]['pmkCourseId'];

$className = $classInfo[0]['fldDepartment'] . " " . $classInfo[0]['fldCourseNum'] . " " . $classInfo[0]['fldSection'];

$studentName = $studentInfo[0]['fldFirstName'] . " " . $studentInfo[0]['fldLastName'];

$to = $professorNetId . "@uvm.edu";
$subject = $className . " Notetaker Application";
$confirmLink = "http://localhost:8888/uvm-studentportal/confirm.php?crn=" . $crn . "&id=" . password_hash($studentID, PASSWORD_DEFAULT) . "&stuName=" . $studentName . "&class=" . $className .'&stuId='. $studentID .'&pro='.$professorNetId;

$message = "
<html>
<head>
<title>NoTaker Application</title>
</head>
<body>
<pre style='font-family: sans-serif'>
Hi,

" . $studentName . " is applying to be the notetaker for " . $className . "

Click the link below to confirm:
<a href='" . $confirmLink . "'>" . $confirmLink . "</a>

Best,

Notetaker App
</pre>
=======
Greetings

$studentName would like to register for $className as a peer note taker.

If you would like to confirm their application, please click the link below:

----------------------------------

<a href='" . $confirmLink . "'>Confirm application</a>

----------------------------------

If you would not like to confirm their application, then you may disregard this message.
</pre>

</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
 $headers .= 'From: <' . $studentID . '@uvm.edu>' . "\r\n";
//$headers .= 'From: <alexdbeard@gmail.com>' . "\r\n";

//$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($to, $subject, $message, $headers);

// include "includes/top.php";
?>
<div class="row" id="logoutBg">
  <div class="jumbotron text-center">
    <h1 class='applicationSubmissionText'>Your application has been submitted.</h1>;
