
<?php
require("includes/top.php");
require("includes/nav.php");
require("watsonServices.php");

$fileId = $_GET['id'];

try {
    $db->beginTransaction();
    $query = "SELECT * FROM tblNotes WHERE pmkNoteId =" . $fileId;

    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);            
    $db->commit();
} catch (PDOException $e) {
    $db->rollBack();
    echo $e->getMessage();
}




    
       //$userInputPlus = str_replace(' ', '+', $userInput);
       //echo "original: " .$results[0]['fldText'];
       //echo "<br>";
       //echo "spanish: " .watsonLanguageTranslate("en", "es", urlencode($results[0]['fldText']));
       //echo "<br>";
       $json = watsonNaturalLanguageUnderstanding(urlencode($results[0]['fldText']));
	   $temp = json_decode($json, true);
 ?>  
	<form class="form-horizontal">
		<div class="form-group">
			<label for="" class="control-label col-sm-4">Select Language</label>
			<div class="col-sm-5">
				<select class="form-control">
					<option>----</option>
					<option value="es">Spanish</option>
				</select>
			</div>
		</div>
	</form>
	<h4 class="text-center"><?php echo $results[0]['fldTitle'];?></h4>
	<p class="text-center"><?php echo $results[0]['fldText']; ?></p>
	
<?php
require("includes/footer.php");
       
?>

