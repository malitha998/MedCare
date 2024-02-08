<?php

require 'connection.php';
session_start();

if (empty($_POST["uname"])) {
    echo "Please enter username";
} else if (empty($_POST["name"])) {
    echo "Please enter name";
} else if (empty($_POST["nic"])) {
    echo "Please enter NIC";
}  else {


    Database::search("UPDATE SET uname='".$_POST["uname"]."', NAME='".$_POST["name"]."', nic='".$_POST["nic"]."'
    WHERE ph_id='".$_POST["id"]."';");

    echo "Successfully Updated";
}
