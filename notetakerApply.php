<?php 

//$row = array();
//$crn = $row['crn'];
//$crn = $_GET['crn'];

$crn = "123"; //TODO: should be class name/ section looked up from crn in database
$className = "CS 205 section A";
$studentID = "abeard1"; //TODO: should be students email
$studentName = "Alex Beard";
$to = "xzhu2@uvm.edu"; //TODO: this should be professor's email
$subject = $className . " Notetaker Application";
$confirmLink = "https://xzhu2.w3.uvm.edu/test/index.php?crn=" . $crn . "&id=" . password_hash($studentID, PASSWORD_DEFAULT);

$message = "
<html>
<head>
<title>Notetaker Application</title>
</head>
<body>
<pre style='font-family: sans-serif'>
Hi, 

" . $studentName . " is applying to be the notetaker for " . $className . "
    
Click the link below to confirm:
<a href='".$confirmLink."'>link</a>

Best, 

Notetaker App
</pre> 

</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <' . $studentID  . '@uvm.edu>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($to, $subject, $message, $headers);

include "includes/top.php";

print "<h1>Your application has been submitted.</h1>";

include "includes/footer.php";

?>