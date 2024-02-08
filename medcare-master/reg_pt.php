<?php

require 'connection.php';

$date = '2000-04-22';
$formattedDate = date('Y-m-d', strtotime($date));

// rpreg_no
// rpuname
// rpname
// rpgender
// rpnic
// rpdob
// rpaddress
// rpcontact
// rpperson
// rpnotes
// rppass

if (empty($_POST["rpreg_no"])) {
    echo "Please enter register no";
} else if (empty($_POST["rpuname"])) {
    echo "Please enter username";
} else if (empty($_POST["rpname"])) {
    echo "Please enter name";
} else if ($_POST["rpgender"] == "0") {
    echo "Please select a gender";
} else if (empty($_POST["rpnic"])) {
    echo "Please enter nic no";
} else if (empty($_POST["rpdob"])) {
    echo "Please select a birthday";
} else if (empty($_POST["rpaddress"])) {
    echo "Please enter address";
} else if (empty($_POST["rpcontact"])) {
    echo "Please enter contact no";
} else if ($_POST["rpperson"] == "0") {
    echo "Please select a responsible person";
} else if (empty($_POST["rpnotes"])) {
    echo "Please enter special note";
} else if (empty($_POST["rppass"])) {
    echo "Please enter password";
} else {

    Database::iud("INSERT INTO patient(preg_no,uname,NAME,gender,nic,dob,address,contact,notes,responsible,pass) 
VALUES ('" . $_POST["rpreg_no"] . "','" . $_POST["rpuname"] . "','" . $_POST["rpname"] . "','" . $_POST["rpgender"] . "','" . $_POST["rpnic"] . "','" . $_POST["rpdob"] . "',
'" . $_POST["rpaddress"] . "','" . $_POST["rpcontact"] . "','" . $_POST["rpnotes"] . "','" . $_POST["rpperson"] . "','" . $_POST["rppass"] . "');");

    echo "Success";
}
