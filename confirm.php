<?php

include 'includes/top.php';
$className = $_GET['class'];
$stuName = $_GET['stuName'];
$stuId = $_GET['stuId'];
$to = $stuId . '@uvm.edu';
$crn = $_GET['crn'];
$professorNetId = $_GET['pro'];

print "<h2>" . $stuName . " is note taker for " . $className . "</h2>";



$message = "
<html>
<head>
<title>Notaker Application Approved</title>
</head>
<body id='centerEmail'>
<pre style='font-family: sans-serif'>
Greetings,

You have successfully registered for $className as a note taker.
To log in, please click the link below:

----------------------------------

<a href='http://localhost/uvm-studentportal/login.php'>Log in to NoTaker</a>

----------------------------------

Thank you for registering.

</pre>

</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <' . $professorNetId . '@uvm.edu>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";
$subject = "Notetaker Application Approved";
mail($to, $subject, $message, $headers);
//require("includes/top.php");
try {
    $db->beginTransaction();
//    $query = "UPDATE tblUsersClasses SET fldNoteTaker = 'T' WHERE fnkNetId = '$stuId'";// AND fnkCourseId = " . $crn;
    echo $query;
    $query = "INSERT INTO tblUsersClasses (fldNoteTaker, fnkNetId, fnkCourseId) VALUES ('T', '" .$stuId . "'," . $crn . ")";
    echo "     " . $query . "     ";
    echo $stuId;
    echo $crn;

    //SET fldNoteTaker = 'T' WHERE fnkNetId = '" . $stuId ."' AND fnkCourseId = '" . $crn . "'";
    $statement = $db->prepare($query);
    $statement->execute();
//    var_dump($statement);
    $statement->fetchAll(PDO::FETCH_ASSOC);
    $db->commit();
} catch (PDOException $e) {
    $db->rollBack();
    echo $e->getMessage();
}
echo "test";
include 'includes/footer.php';
?>
