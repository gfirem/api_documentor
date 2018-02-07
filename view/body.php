<?php include_once 'header.php';
ob_start();
include Jam3ApiDoc::$project_path . 'index.html';
$content = ob_get_clean();
echo "$content";
include_once 'footer.php';
