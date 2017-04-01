
<?php
require("includes/top.php");
require("includes/nav.php");
require("watsonServices.php");

$fileId = $_GET['id'];
?>
<script>
    function translateSel(str) {
        console.log(str);
        if (str == "") {
            document.getElementById("txtTranslate").innerHTML = "<p>test</p>";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtTranslate").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "translate.php?q=" + str+"&id="+ "<?php echo $fileId; ?>", true);
            xmlhttp.send();
        }
    }
</script>
<?php

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
            <select class="form-control" id="selLan" onchange="translateSel(this.value)">
                <option value="en">English</option>
                <option value="es">Spanish</option>
                <option value="fr">French</option>
            </select>
        </div>
    </div>
</form>
<h2 class="text-center "><?php echo $results[0]['fldTitle']; ?></h2>
<div class="message" id="txtTranslate">
    <style>
      .noteMessage{
        font-size: 12pt;
        padding: 10px 0px 10px 0px;
      }
    </style>
    <p class="text-justify" id="txtTranslate"><?php echo $results[0]['fldText']; ?></p>
</div>
<div class="container">

<table class="table table-default">
    <thead>
        <tr>
            <th>Keyword</th>
            <th>Relevance</th>
        </tr>
    </thead>

    <tbody>
        <?php
            foreach($temp['keywords'] as $k){
                echo "<tr>";
                   echo "<td>$k[text]</td>";
                   echo "<td>$k[relevance]</td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>
</div>
