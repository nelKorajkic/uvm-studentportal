
<?php
require("includes/top.php");
require("includes/nav.php");
require("watsonServices.php");

$userInput = "Ancient influences have helped spawn variant interpretations of the nature of history which have evolved over the centuries and continue to change today. The modern study of history is wide-ranging, and includes the study of specific regions and the study of certain topical or thematical elements of historical investigation. Often history is taught as part of primary and secondary education, and the academic study of history is a major discipline in university studies.";
$class = 12345;

echo $_POST["txt"];
echo $_POST["crn"];


       
        echo $userInput;
        echo "<br>";
        echo $class;
        echo "<br>";
    
       //$userInputPlus = str_replace(' ', '+', $userInput);
       echo "original: " .$userInput;
       echo "<br>";
       echo "spanish: " .watsonLanguageTranslate("en", "es", urlencode($userInput));
       echo "<br>";
       echo watsonNaturalLanguageUnderstanding(urlencode($userInput));
       
       


require("includes/footer.php");
       
?>

