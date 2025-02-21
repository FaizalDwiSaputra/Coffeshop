<?php
session_start();
unset($_SESSION['admin']);
session_destroy();

echo "<script>Anda telah logout</script>";
echo "<script>location='login.php';</script>";
?>