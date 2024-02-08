<?php

session_start();

require 'connection.php';

if (isset($_SESSION["DT"])) {


?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>DOCTOR <?= $_SESSION["DT"]["name"]; ?></title>
        <link rel="icon" href="assets/Untitled (800 × 800 px).svg">

        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">
    </head>

    <body>

        <div class="container-fluid">
            <div class="row ">

                <div class="col-12">

                    <!-- header -->

                    <div class="row  border-bottom border-4 border-primary shadow-lg bg-dark">

                        <div class="col-12 col-lg-4  text-center text-lg-start mt-3">
                            <div class="row align-content-center ">
                                <div class="col-12 col-lg-1">
                                    <img alt="logo" src="assets/Untitled (800 × 800 px).svg" width="60px">
                                </div>
                                <div class="col-12 col-lg-11 ">
                                    <h4 class=" mt-2 mt-lg-3 ms-lg-4 text-white">DOCTOR <?= $_SESSION["DT"]["name"]; ?></h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-3 offset-lg-5  pt-3 mb-4">

                            <nav class="navbar navbar-expand-lg navbar-light menu1 float-lg-end">
                                <div class="container-fluid ">
                                    <button class="navbar-toggler text-white " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon "></span>
                                    </button>
                                    <div class="collapse navbar-collapse " id="navbarSupportedContent">
                                        <!-- <ul class="navbar-nav mb-2 mb-lg-0 text-end  ">
                                            <li class="nav-item" onclick="THdash();">
                                                <a class="nav-link fw-bold d-block d-lg-none text-white" aria-current="page" href="#">Appoinments</a>
                                            </li>
                                            <hr class="my-1 text-white border border-bottom ">
                                            <li>
                                                <a class="nav-link fw-bold text-white" href="#" tabindex="-1" aria-disabled="true">Our Policies</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link fw-bold text-white" href="#" tabindex="-1" aria-disabled="true">About Us</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link fw-bold text-white" onclick="doctor_logout();" href="#" tabindex="-1" aria-disabled="true">log out</a>
                                            </li>
                                        </ul> -->
                                    </div>
                                </div>
                            </nav>

                        </div>

                    </div>

                    <!-- header -->

                    <!-- body -->

                    <div class="row ">
                        <div class="col-lg-2 col-12 border-end border-primary  border-4 shadow-lg position-fixed " style="background-color: #0e0e23;">

                            <div class="row d-none d-lg-block d-flex vh-100 px-2">
                                <div class="col-12 text-center mt-3">
                                </div>
                            </div>
                        </div>

                        <!-- Dashboard -->

                        <div class="col-12 col-lg-10 offset-lg-2 ">

                            <div class="row">

                                <div class="col-12 col-lg-4 offset-lg-7 p-2 shadow rounded alert-primary mt-2">
                                    <div class="row">
                                        <div class="col-12 ">
                                            <div class="row">
                                                <div class="col-6">
                                                    <p class="fw-bold">Appoinment No.</p>
                                                </div>
                                                <div class="col-6">
                                                    <p><?= $_GET["appoinmtid"] ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <p class="fw-bold">Patient Id</p>
                                                </div>
                                                <div class="col-6">
                                                    <p><?= $_GET["pid"] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-4">
                                    <div class="row">
                                        <div class="col-6 d-grid">
                                            <button class="btn btn-outline-primary" onclick="prescriptionhistory();">Prescription History</button>
                                        </div>
                                        <div class="col-6 d-grid">
                                            <button class="btn btn-outline-primary" onclick="labreporthistry();">Lab Reports</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-10 offset-1 mt-4 overflow-scroll vh-100">
                                    <div class="row">
                                        <div class="col-12" id="preshistory" style="display: block;">
                                            <h2 class="text-center fw-bold p-4">Prescription History</h2>
                                            <?php

                                            $rs1 = Database::search("SELECT *
                                            FROM prescription
                                            INNER JOIN d_chanel_time ON prescription.chnl_id=d_chanel_time.chnl_id
                                            WHERE d_chanel_time.doc_id='" . $_SESSION["DT"]["id"] . "' AND prescription.pat_id='" . $_GET["pid"] . "'  ORDER BY prescription.pres_id DESC;");

                                            $n1 = $rs1->num_rows;

                                            for ($i = 0; $i < $n1; $i++) {
                                                $d1 = $rs1->fetch_assoc();

                                                $datetime = $d1["date_time"];

                                                $d1date = date("Y-m-d", strtotime($datetime));

                                            ?>
                                                <div class="row border m-1 rounded">
                                                    <div class="col-12">
                                                        <h4>Date : <?= $d1date ?></h4>
                                                    </div>
                                                    <div class="col-12"><label class="form-label">Drug And Dosage</label>
                                                        <textarea class="form-control" id="" cols="30" rows="10" readonly><?= $d1["drugs_doses"]; ?></textarea>
                                                    </div>
                                                    <div class="col-12"><label class="form-label">Aditional Notes</label>
                                                        <textarea class="form-control" id="" cols="30" rows="10" readonly><?= $d1["notes"]; ?></textarea>
                                                    </div>
                                                </div>
                                            <?php
                                            }

                                            ?>
                                        </div>
                                        <div class="col-12" id="labreporthistory" style="display: none;">
                                            <h2 class="text-center fw-bold p-4">Lab Reports History</h2>
                                            <?php

                                            $rs2 = Database::search("SELECT * FROM lab_reports WHERE petiont_id='" .  $_GET["pid"] . "';");

                                            $n2 = $rs2->num_rows;



                                            for ($i = 0; $i < $n2; $i++) {
                                                $d2 = $rs2->fetch_assoc();

                                            ?>
                                                <div class="row border m-1 rounded">
                                                    <div class="col-12 p-2">
                                                        <h4>Date : <?= $d2["date"]; ?></h4>
                                                    </div>
                                                    <iframe src="<?= $d2["path"]; ?>" frameborder="2" width="100%" height="600px"></iframe>
                                                </div>
                                        </div>
                                    <?php
                                            }

                                    ?>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <!-- Dashboard -->

                </div>

                <!-- body -->

            </div>

        </div>

        </div>

        </div>
        </div>


        <script>
            var prescriptionhistory = function() {
                //   alert("prescription_history");
                document.getElementById("preshistory").style.display = "block";
                document.getElementById("labreporthistory").style.display = "none";
            }

            var labreporthistry = function() {
                //   alert("labreporthistry");
                document.getElementById("labreporthistory").style.display = "block";
                document.getElementById("preshistory").style.display = "none";
            }
        </script>
    </body>

    </html>

<?php

} else {
?>
    <script>
        window.location = "index.php"
    </script>
<?php
}
