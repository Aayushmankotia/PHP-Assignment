<?php
session_start();
session_unset();
if(session_destroy()){
// echo " logged out ";
header("Location:tologin.php");
}

?>