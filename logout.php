<?php 
include 'process_login.php';

	if (isset($_SESSION['email']))
    {
      session_destroy();
      unset($_SESSION['email']);
      header("location: index.php");
    }
    if (isset($_SESSION['std_email']))
    {
      session_destroy();
      unset($_SESSION['std_email']);
      header("location: index.php");
    }
  if (isset($_SESSION['admin_id']))
    {
      session_destroy();
      unset($_SESSION['employee_id']);
      header("location: index.php");
    }

?>