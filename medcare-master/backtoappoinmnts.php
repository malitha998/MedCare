<?php

session_start();

require 'connection.php';

?>


<div class="col-10 offset-1 col-lg-8 offset-lg-2 shadow mt-2">
    <?php
    $dcrs = Database::search("SELECT *
                                                      FROM patient_channels
                                                      INNER JOIN patient ON patient_channels.patient_id=patient.preg_no
                                                      INNER JOIN d_chanel_time ON patient_channels.chnl_id=d_chanel_time.chnl_id
                                                      WHERE d_chanel_time.doc_id='" . $_SESSION["DT"]["id"] . "' AND 
                                                      DAY(d_chanel_time.date_time) < CURDATE() AND 
                                                      patient_channels.paid='1' AND 
                                                      patient_channels.`status`='1';");

                                            

    $dcn = $dcrs->num_rows;

    ?>
    <h4 class="text-center">Today My Appoinments</h4>
    <table class="table table-responsive table-striped">
        <thead>
            <tr>
                <th>Patient Registration No</th>
                <th>Patient Name</th>
                <th>Open</th>
            </tr>
        </thead>
        <?php
        if ($dcn > 0) {
        ?>
            <tbody>
                <?php

                for ($i = 0; $i < $dcn; $i++) {
                    $dcd = $dcrs->fetch_assoc();
                ?>
                    <tr class="table-info">
                        <td><?= $dcd["preg_no"]; ?></td>
                        <td><?= $dcd["name"]; ?></td>
                        <td>
                            <button id="pchecked" class="btn btn-outline-primary fw-bold" onclick="checkedPatient('<?= $dcd['preg_no']; ?>','<?= $dcd['p_chnl_id']; ?>');">
                                Open Appoinment
                            </button>
                        </td>
                    </tr>
                <?php
                }

                ?>
            </tbody>
        <?php
        } else {
        ?>
            <tbody>
                <tr class="table-info">
                    <td colspan="3" class="text-center">Todays No Appoinments</td>
                </tr>
            </tbody>
        <?php
        }

        ?>

    </table>
</div>