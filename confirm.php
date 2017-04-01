<?php

include 'includes/top.php';
$className = $_GET['class'];
$stuName = $_GET['stuName'];
$stuId = $_GET['stuId'];
$to = $stuId . '@uvm.edu';
$crn = $_GET['crn'];
$professorNetId = $_GET['pro'];

print "<h2>" . $stuName . " is notetaker for " . $className . "</h2>";



$message = "
<html>
<head>
<title>Notetaker Application Approved</title>
</head>
<body>
<pre style='font-family: sans-serif'>
Hi, 

You are a notetaker for $className
    
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
$headers .= 'From: <' . $professorNetId . '@uvm.edu>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";
$subject = "Notetaker Application Approved";
mail($to, $subject, $message, $headers);

try {
    $db->beginTransaction();
    $query = "INSERT INTO tblUsersClasses (fldNoteTaker, fnkNetId, fnkCourseId) VALUES ('T', '" . $stuId . "'," . $crn . ")";
    echo $stuId;
    echo $crn;
    //SET fldNoteTaker = 'T' WHERE fnkNetId = '" . $stuId ."' AND fnkCourseId = '" . $crn . "'";
    $statement = $db->prepare($query);
    $statement->execute();
    $statement->fetchAll(PDO::FETCH_ASSOC);
    $db->commit();
} catch (PDOException $e) {
    $db->rollBack();
    echo $e->getMessage();
}
include 'includes/footer.php'
?>