
<?php
require("includes/top.php");
require("includes/nav.php");
require("watsonServices.php");

$fileId = 29;

try {
    require("includes/top.php");
    $db->beginTransaction();
    $query = "SELECT * FROM tblNotes WHERE pmkNoteId =" . $fileId;

    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

//                    print"<pre>";
//                    print_r($results);
//                    print "</pre>";
//                    
    $db->commit();
} catch (PDOException $e) {
    $db->rollBack();
    echo $e->getMessage();
}




    
       //$userInputPlus = str_replace(' ', '+', $userInput);
       echo "original: " .$results[0]['fldText'];
       echo "<br>";
       echo "spanish: " .watsonLanguageTranslate("en", "es", urlencode($results[0]['fldText']));
       echo "<br>";
       echo watsonNaturalLanguageUnderstanding(urlencode($results[0]['fldText']));
       
       


require("includes/footer.php");
       
?>

