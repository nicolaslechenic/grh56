<?php 
include 'layouts/head.php';
include_once 'layouts/header.php';
?>
<h1>My name is...!</h1>

<?php echo password_hash('admin', PASSWORD_DEFAULT);
 ?>
 <?php include 'layouts/footer.php' ?>