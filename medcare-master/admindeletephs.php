
<?php
require 'connection.php';
Database::iud("DELETE FROM pharmcist WHERE uname='" . $_POST["uname"] . "' AND nic='" . $_POST["nic"] . "';");
echo "Success";
