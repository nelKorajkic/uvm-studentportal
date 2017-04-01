
<?php
require("includes/top.php");
require("includes/nav.php");
require("watsonServices.php");

var_dump($_SESSION['user']);


if(isset($_POST['txt'])){
       $userInput = $_POST['txt'];
       // $userId = $_POST['usrId'];
       $courseId = $_POST['crn'];
       
       $date = $_POST['date'];
       
       
       //var_dump($_SESSION['user']);
       //$userInputPlus = str_replace(' ', '+', $userInput);
       
          $db->beginTransaction();
          $query = 'INSERT INTO tblNotes (fnkNetId,fnkCourseId, fldText, fldDate) VALUES ("'.$_SESSION['user'][pmkNetId].'",'.$courseId.',"'.$userInput.'", '.$date.')';
          //echo vardump($_SESSION['user']);
          echo $query;
    $statement = $db->prepare($query);
    $statement->execute();
    $statement->fetchAll(PDO::FETCH_ASSOC);
    $db->commit();
 
       echo "original: " .$userInput;
       echo "<br>";
       echo watsonLanguageTranslate("en", "es", urlencode($userInput));
       echo "<br>";
       echo watsonNaturalLanguageUnderstanding(urlencode($userInput));
       
}
?>
<h2>your file was added successfully</h2>
<?php
require("includes/footer.php");
       
?>


