

<?php
$courseId = $_GET['q'];
?>

<h2>Notes for this class</h2>
<?php
try {
    require("includes/top.php");
    $db->beginTransaction();
    $query = "SELECT * FROM tblNotes WHERE fnkCourseId =" . $courseId;

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
?>
<table class="table">
    <thead>
        <tr>
            <th class="text-center">Title</th>
            <th class="text-center">Date Submitted</th>
            <th class="text-center">File Link</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($results as $r):
            echo "<tr class='text-center'>";
            echo "<td>" . $r['fldTitle'] . "</td>";
            echo "<td>" . $r['fldDate'] . "</td>";
            echo "<td><a href='viewFile.php?id=$r[pmkNoteId]'>Link</a></td>";
            echo "</tr>";
        endforeach;
        ?>
    </tbody>
</table>

