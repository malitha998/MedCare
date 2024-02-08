<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="bootstrap.css">

<div class="col-12 border rounded p-2 ">
    <div class="row">
        <div class="col-10 offset-1 d-grid mt-2"><label class="form-label">Drug And Dosage</label>
            <textarea class="form-control" id="d_dosse" cols="30" rows="10"></textarea>
        </div>
        <div class="col-10 offset-1 d-grid mt-2"><label class="form-label">Aditional Notes</label>
            <textarea class="form-control" id="a_note" cols="30" rows="10"></textarea>
        </div>
        <div class="col-10 offset-1 col-lg-2 offset-lg-5 d-grid mt-2">
            <button class="btn btn-outline-primary fw-bold" onclick="saveprescrip('<?= $_POST['chnl_id'] ?>','<?= $_POST['pid'] ?>');">Save</button>
        </div>
    </div>
</div>