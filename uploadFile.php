<?php require("includes/top.php");
      require("includes/nav.php"); ?>

<br>

<form action="viewFile.php" method="POST" enctype="multipart/form-data">
          <textarea name="txt" rows="28" cols="150" onfocus="this.select()"></textarea>
         <input type="submit"/>
</form>

<?php require("includes/footer.php"); ?>
