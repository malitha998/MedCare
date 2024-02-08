<?php

require 'connection.php';

$q = "";

if (empty($_POST["key"])) {
    $q .= ";";
} else {
    $q .= " WHERE doctor.name LIKE '%" . $_POST["key"] . "%' OR specialies.speciality LIKE '%" . $_POST["key"] . "%';";
}
// $rs = Database::search("SELECT doctor.id, doctor.uname, doctor.name, doctor.specialty, specialies.speciality, doctor.password
// FROM doctor
// INNER JOIN specialies ON doctor.specialty=specialies.id" . $q);

// if ($rs->num_rows > 0) {
//     echo "okkk";
// }

// echo $rs->num_rows;

// echo "SELECT doctor.id, doctor.uname, doctor.name, doctor.specialty, specialies.speciality, doctor.password
// FROM doctor
// INNER JOIN specialies ON doctor.specialty=specialies.id" . $q;

?>


<table class=" table table-responsive shadow stdn mt-4">
    <thead>
        <tr>
            <th scope="col">Doctor's Name</th>
            <th>Details</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $rs1 = Database::search("SELECT doctor.id, doctor.uname, doctor.name, doctor.specialty, specialies.speciality, doctor.password FROM doctor 
        INNER JOIN specialies ON doctor.specialty=specialies.id" . $q);


        $sn = $rs1->num_rows;

        if ($sn > 0) {


            for ($i = 0; $i < $sn; $i++) {
                $sd = $rs1->fetch_assoc();

        ?>
                <tr class="alert-info">
                    <td><?php echo $sd["name"]; ?></td>
                    <td><button onclick="doctorDetails('<?php echo $sd['id']; ?>','<?php echo $sd['name']; ?>');" class="btn btn-outline-primary fw-bold">View Channelings</button></td>
                </tr>

            <?php

            }
        } else {
            ?>
            <tr class="alert-info">
                <td colspan="2" class="text-center fw-bold">No Data</td>
            </tr>

        <?php
        }

        ?>

    </tbody>
</table>