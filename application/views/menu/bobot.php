<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?= $this->session->flashdata('message'); ?>
    <table class="table table-hover">
        <form>
            <div class="form-group row">
                <label for="inputbobot1" class="col-sm-2 col-form-label">Akreditasi</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="inputbobot">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputbobot2" class="col-sm-2 col-form-label">Prestasi</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="inputbobot">
                </div>
            </div>
            <div class=" form-group row">
                <label for="inputbobot4" class="col-sm-2 col-form-label">Jarak</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="inputbobot">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputbobot4" class="col-sm-2 col-form-label">Sarana dan Prasarana</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="inputbobot">
                </div>
            </div>
        </form>
        <button type="button" class="btn btn-primary">Simpan</button>
        <button type="button" class="btn btn-secondary">Edit</button>
        <button type="button" class="btn btn-success">Delete</button>