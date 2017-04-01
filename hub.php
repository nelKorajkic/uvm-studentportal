<?php
include 'includes/top.php';
include 'includes/nav.php';
?>
<script>
    function showData(str) {
        console.log(str);
        if (str == "") {
            document.getElementById("notesForClass").innerHTML = "";
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
                    document.getElementById("notesForClass").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "notesForClassPhp.php?q=" + str, true);
            xmlhttp.send();
        }
    }
</script>

<div id="selectBox" class="form-group">
    <label for="sel1">Select class:</label>
    <select class="form-control" id="sel1" onchange="showData(this.value)">
        <option value="">---</option>
        <?php for ($i = 0; $i < count($_SESSION['courseNames']); $i++): ?>
            <option value="<?php echo $_SESSION['courseIds'][$i]; ?>"><?php echo $_SESSION['courseNames'][$i]; ?></option>
        <?php endfor; ?>
    </select>
</div>

<div class="container" id="notesForClass">

</div>

<?php include 'includes/footer.php' ?>
