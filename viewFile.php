
<?php
require("includes/top.php");
require("includes/nav.php");

$sourcelanguage = "en";
$targetLanguage = "es";

if(isset($_POST['txt'])){
       $userInput = $_POST['txt'];
       //$userInputPlus = str_replace(' ', '+', $userInput);
       //echo $userInput;
       echo "original: " .$userInput;
       echo "watson: ".watsonLanguageTranslate ($sourcelanguage,$targetLanguage,$userInput);
       //json_decode($userInput);
       //echo "end";
       
}

require("includes/footer.php");
       
?>

