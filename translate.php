<?php
require("includes/top.php");
require("watsonServices.php");
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$lan = $_GET['q'];
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
if($lan !== "en"){
    echo "<p class='text-justify noteMessage'>" . watsonLanguageTranslate("en", $lan, urlencode($results[0]['fldText'])) . "</p>";
}else{
    echo "<p class='text-justify noteMessage'>" . $results[0]['fldText'] . "</p>";
}
?>
