<?php
include 'includes/top.php';
include 'includes/nav.php';

print '<table>';
if ($result->num_rows > 0)
{
  while($row = $result->fetch_assoc())
  {
      print '<tr>';
      print '<td>' . $row["fldName"] . '</td>';
      print '</td></tr>';
    }
  }

print '</table>';

include 'includes/footer.php' ?>
