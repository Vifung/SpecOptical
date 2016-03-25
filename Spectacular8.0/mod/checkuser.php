<?php
session_start();

if(!isset($_SESSION['logged']))
{
   header("Location: http://localhost:8888/Spectacular_V.5.0/index.php"); 
}

?>