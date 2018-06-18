<?php require_once('includes/front_header.php') ?>
<?php
if(!empty($_SESSION['name'])){
    unset($_SESSION['name']);
    unset($_SESSION['password']);
    echo "<script>document.location='/login.php'</script>";
    // echo 'adf';
} else{
    echo "<script>document.location='/'</script>";
    
}
?>