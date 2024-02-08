<?php

require 'connection.php';

if ($_POST["doc"] == "x") {
    echo "Please Select a Doctor";
} else {

    $date = $_POST["dt"];
    $time = $_POST["tm"];

    $datetime_str = $date . ' ' . $time;
    $datetime = new DateTime($datetime_str);

    $dt = $datetime->format('Y-m-d H:i:s');

    $d = Database::search("SELECT * FROM d_chanel_time WHERE date_time='" . $dt . "' AND doc_id='" . $_POST["doc"] . "';");

    if ($d->num_rows > 0) {
        echo "Already have a channeling";
    } else {
        Database::iud("INSERT INTO d_chanel_time(date_time,doc_id,stat) VALUES ('" . $dt . "','" . $_POST["doc"] . "','1');");
        echo "Success";
    }
}
