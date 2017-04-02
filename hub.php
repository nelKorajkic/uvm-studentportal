<?php
include 'includes/top.php';
include 'includes/nav.php';
?>

<div id="selectBox" class="form-group">
  <label for="sel1">Select class:</label>
  <select class="form-control" id="sel1">
    <?php for($i = 0; $i < count($_SESSION['courseNames']); $i++): ?>
      <option value="<?php echo $_SESSION['courseIds'][$i]; ?>"><?php echo $_SESSION['courseNames'][$i]; ?></option>
    <?php endfor; ?>
  </select>
</div>

<div class="container">
	<?php if($_SESSION['user']['fldAccess']): ?>
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
			<td>01/04/2017</td>
			<td>txt</td>
		  </tr>
		</tbody>
	  </table>
	<?php endif; ?>
</div>

<?php include 'includes/footer.php' ?>
