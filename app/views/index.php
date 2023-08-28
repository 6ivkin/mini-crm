<?php
if($_SERVER['REQUEST_URI'] == '/mini_crm/index.php') {
    header('Location: /mini_crm/');
    exit();
}

$title = 'Home page';
ob_start();
?>

    <h1>Home</h1>

<?php $content = ob_get_clean();

include 'app/views/layout.php';
?>