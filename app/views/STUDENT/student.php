<?php
include 'app/views/FRONT/layouts/head.php';
include_once 'app/views/FRONT/layouts/header.php';
?>
<h1>STUDENT PAGE</h1>
<?php include 'app/views/FRONT/layouts/footer.php' ?>
<?php echo($_SESSION['user']);
echo($_SESSION['name']);
    ?>
