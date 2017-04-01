

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
            <th>Date Submitted</th>
            <th>File Link</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($results as $r):
            echo "<tr>";
            echo "<td>" . $r['fldDate'] . "</td>";
            echo "<td>" . $r['fnkCourseId'] . "</td>";
            echo "</tr>";
        endforeach;
        ?>
    </tbody>
</table>
