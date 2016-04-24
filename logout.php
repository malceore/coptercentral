<?php
session_start();
session_destroy();
//header('Location: login.php');
echo "You have been logged out! Click button to return.";
echo '<form><input type="button" value="Redirect Me" onclick="Redirect();" /></form>';
echo '<script type="text/javascript">function Redirect() {window.location="index.php";}</script>';
?>
