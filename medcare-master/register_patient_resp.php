<?php

session_start();

require 'connection.php';

if (isset($_SESSION["RP"])) {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Receptionist | <?= $_SESSION["RP"]["name"]; ?></title>
        <link rel="icon" href="assets/Untitled (800 × 800 px).svg">

        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">
    </head>

    <body>

        <div class="container-fluid">

            <div class="row pt-4 ">
                <div class="col-12 col-lg-6 offset-lg-3"><label class="labels">Registration Number</label>
                    <input type="text" class="form-control" placeholder="Username" id="rpreg_no" title="please only enter numbers " required>
                    <div class="invalid-feedback">
                        Please enter a valid password.
                    </div>
                </div>
                <div class="col-12 col-lg-6"><label class="labels">Username</label>
                    <input type="text" class="form-control" placeholder="Username" id="rpuname" required>
                    <div class="invalid-feedback">
                        Please enter a valid password.
                    </div>
                </div>
                <div class="col-12 col-lg-6"><label class="labels">Full Name</label>
                    <input type="text" class="form-control" placeholder="Name" id="rpname" required>
                    <div class="invalid-feedback">
                        Please enter a valid password.
                    </div>
                </div>
                <div class="col-md-12 col-lg-6"><label class="labels">Gender</label>
                    <select id="rpgender" class="form-control" required>
                        <option value="0">Select Gender</option>
                        <?php
                        $grs = Database::search("SELECT * FROM gender;");
                        $gn = $grs->num_rows;
                        for ($i = 0; $i < $gn; $i++) {
                            $gd = $grs->fetch_assoc();

                        ?>
                            <option value="<?php echo $gd["id"]; ?>"><?php echo $gd["gender_type"]; ?></option>
                        <?php

                        }
                        ?>
                    </select>
                    <div class="invalid-feedback">
                        Please enter a valid password.
                    </div>
                </div>
                <div class="col-md-12 col-lg-6"><label class="labels">N.I.C.</label>
                    <input type="text" class="form-control" placeholder="N.I.C." id="rpnic" required>
                    <div class="invalid-feedback">
                        Please enter a valid password.
                    </div>
                </div>
                <div class="col-12 col-md-6"><label class="labels">Birthday</label>
                    <input type="date" class="form-control" placeholder="Grade" id="rpdob" required>
                    <div class="invalid-feedback">
                        Please enter a valid password.
                    </div>
                </div>
                <div class="col-12 col-md-6"><label class="labels">Address</label>
                    <input type="text" class="form-control" placeholder="Address" id="rpaddress" required>
                    <div class="invalid-feedback">
                        Please enter a valid password.
                    </div>
                </div>
                <div class="col-12 col-md-6"><label class="labels">Contact</label>
                    <input type="text" class="form-control" placeholder="Contact" id="rpcontact" required>
                    <div class="invalid-feedback">
                        Please enter a valid password.
                    </div>
                </div>
                <div class="col-12 col-md-6"><label class="labels">Responsible</label>
                    <select id="rpperson" class="form-control" required>
                        <option value="0">Select Responsible Person</option>
                        <?php
                        $resrs = Database::search("SELECT * FROM responsible;");
                        $resn = $resrs->num_rows;
                        for ($i = 0; $i < $resn; $i++) {
                            $resd = $resrs->fetch_assoc();

                        ?>
                            <option value="<?php echo $resd["responsible_id"]; ?>"><?php echo $resd["person"]; ?></option>
                        <?php

                        }
                        ?>
                    </select>
                    <div class="invalid-feedback">
                        Please enter a valid password.
                    </div>
                </div>
                <div class="col-12 col-md-6"><label class="labels">special Notes</label>
                    <textarea class="form-control" cols="auto" rows="auto" id="rpnotes" required></textarea>
                    <div class="invalid-feedback">
                        Please enter a valid password.
                    </div>
                </div>
                <div class="col-md-12 col-lg-6"><label class="labels">Password</label>
                    <input type="text" class="form-control " placeholder="Password" id="rppass" required>
                    <div class="invalid-feedback">
                        Please enter a valid password.
                    </div>
                </div>

                <div class="col-10 offset-1 col-lg-4 offset-lg-1 d-grid my-4">
                    <button class="btn btn-outline-primary fw-bold profile-button" type="button" onclick="register_patient();">Register</button>
                </div>
                <div class="col-10 offset-1 col-lg-4 offset-lg-1 d-grid my-4">
                    <button class="btn btn-outline-danger fw-bold profile-button" type="button">Close</button>
                </div>
            </div>

        </div>

        <script>
            document.getElementById("rpuname").onkeypress = function(event) {
                if (event.keyCode >= 48 && event.keyCode <= 57) {
                    event.preventDefault();
                }
            };
        
            document.getElementById("rpcontact").onkeypress = function(event) {
                // Check if input has reached maximum length
                if (this.value.length === 10) {
                    event.preventDefault();
                }
                // Check if input is a letter
                if (event.keyCode >= 65 && event.keyCode <= 90 || event.keyCode >= 97 && event.keyCode <= 122) {
                    event.preventDefault();
                }
            };
        </script>
        <script src="script.js"></script>
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
