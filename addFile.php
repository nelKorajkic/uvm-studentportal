
<?php
require("includes/top.php");
require("includes/nav.php");
require("watsonServices.php");

if(isset($_POST['txt'])){
       $userInput = $_POST['txt'];
       // $userId = $_POST['usrId'];
       $courseId = $_POST['crn'];
       // var_dump($_SESSION['user']);
       //$userInputPlus = str_replace(' ', '+', $userInput);
       
          $db->beginTransaction();
          $query = 'INSERT INTO tblNotes (fnkNetId,fnkCourseId, fldText) VALUES ("'.$_SESSION['user'].'",'.$courseId.'"'.$userInput.'")';
    $statement = $db->prepare($query);
    $statement->execute();
    $statement->fetchAll(PDO::FETCH_ASSOC);
    $db->commit();
// } catch (PDOException $e) {
//     $db->rollBack();
//     echo $e->getMessage();
// }
//        echo "original: " .$userInput;
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


