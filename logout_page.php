<?php
Session_start();
Session_destroy();
header("Refresh:0; url=login_page.php");

?>