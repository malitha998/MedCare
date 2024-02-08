<?php
require 'connection.php';

if (isset($_POST["pid"])) {

    if (!empty($_POST["pid"])) {
        $rs = Database::search("SELECT * FROM prescription WHERE pat_id='" . $_POST["pid"] . "' ORDER BY pres_id DESC LIMIT 1;");

        if ($rs->num_rows > 0) {

            for ($i = 0; $i < $rs->num_rows; $i++) {
                $d = $rs->fetch_assoc();

?>
                <div class="col-12 col-lg-8 offset-lg-2 shadow my-2 p-2 rounded">
                    <div class="row">
                        <div class="col-10 offset-1 d-grid mt-2"><label class="form-label">Drugs And Doses</label>
                            <textarea class="form-control" id="" cols="30" rows="10" readonly><?= $d["drugs_doses"]; ?></textarea>
                        </div>
                        <div class="col-10 offset-1 d-grid mt-2"><label class="form-label">Aditional Notes</label>
                            <textarea class="form-control" id="" cols="30" rows="10" readonly><?= $d["notes"]; ?></textarea>
                        </div>
                    </div>
                </div>
            <?php
            }
        } else {
            ?>
            <p class="text-danger text-center">Invalid Patient Id</p>
        <?php
        }
    } else {
        ?>
        <p class="text-danger text-center">Please Enter Patient Id</p>

<?php
    }
}
