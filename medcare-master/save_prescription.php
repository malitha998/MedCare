<?php
require 'connection.php';

if (empty($_POST["d_dosse"])) {
   echo "Pleace enter drugs and doses";
} elseif (empty($_POST["a_note"])) {
  echo "Please enter special notes";
} else {
   Database::iud("INSERT INTO prescription(pat_id,chnl_id,drugs_doses,notes) 
   VALUES ('".$_POST["pid"]."','".$_POST["chnl_id"]."','".$_POST["d_dosse"]."','".$_POST["a_note"]."');")   ;
   echo "Success";
}
