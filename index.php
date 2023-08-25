<?php 
include_once('header.php');
?>

<div class="wrapper">
    <div class="container-fluid"><br>
    <form action="search_process.php" method="GET">
        <div class="form-group row">
            <div class="col-sm-3"></div>
            <label for="Search" class="col-sm-2 col-form-label">Search:</label>
            <input class="col-sm-4 form-control" name="query" type="text" id="query" placeholder="Type keywords..." required/>
            <div class="col-sm-3"></div>
        </div>
        <div class="text-center m-t-15">
            <input class="btn btn-primary waves-effect waves-light" type="submit" name="submit" value="Search">
        </div>
    </form>
    </div>
    <hr>
</div>
<script>
$(document).ready(function() {
    var table = null;
    table = $('#myTable').DataTable();

});
</script>
<?php 
include_once('footer.php');
?>