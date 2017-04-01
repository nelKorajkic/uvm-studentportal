<?php
include 'includes/top.php';
include 'includes/nav.php';
?>

<div id="selectBox" class="form-group">
  <label for="sel1">Select class:</label>
  <select class="form-control" id="sel1">
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
  </select>
</div>

<div class="container">
  <h2>Notes for this class</h2>
  <table class="table">
    <thead>
      <tr>
        <th>File Name</th>
        <th>Date Submitted</th>
        <th>File Type</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Notes</td>
        <td>blah</td>
        <td>blah</td>
      </tr>
    </tbody>
  </table>
</div>

<?php include 'includes/footer.php' ?>
