<?php 
include_once('header.php');
?>
<div class="wrapper">
    <div class="container-fluid"><br>
    <h2>Search Results</h2>
    <ul>
<?php
include_once('conn.php');
// Get the search query from the form
if(isset($_GET["filename"])) {
    $filename = $_GET["filename"];
    $filepath = $filename;
    $filename = str_replace("pdf/","",$filename);

    if(file_exists($filepath)) {
        header("Content-Type: application/pdf");
        header("Content-Disposition: attachment; filename=" . $filename);
        readfile($filepath);
        exit;
    } else {
        echo "File not found.";
    }
}
if(isset($_GET["query"])) {
    $query = $_GET['query'];
    // Perform the full-text search query
    $sql = "SELECT title,file_path FROM pdfs WHERE MATCH(content) AGAINST('$query' IN BOOLEAN MODE)";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $pdfName = $row['title'];
            $pdfLink = $row['file_path'];
            echo "<li><a href=search_process.php?filename=" .urlencode($pdfLink). ">" .$pdfName. "</a></li>";
        }
    } else {
        echo "No results found.";
    }
}
?>
</ul>
    </div>
    <hr>
</div>
<?php 
include_once('footer.php');
?>