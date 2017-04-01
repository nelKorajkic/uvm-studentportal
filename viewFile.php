
<?php
require("includes/top.php");
require("includes/nav.php");
require("watsonServices.php");

if(isset($_POST['txt'])){
       $userInput = $_POST['txt'];
       //$userInputPlus = str_replace(' ', '+', $userInput);
       echo "original: " .$userInput;
       echo "<br>";
       echo watsonLanguageTranslate("en", "es", urlencode($userInput));
       echo "<br>";
       echo watsonNaturalLanguageUnderstanding(urlencode($userInput));
       
}

require("includes/footer.php");
       
?>

