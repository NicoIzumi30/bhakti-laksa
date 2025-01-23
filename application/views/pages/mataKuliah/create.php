<div class="page-content">

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <div class="row d-flex justify-content-between">
                        <div class="col-auto">
                            <h4 class="">Create Data Mata Kuliah</h4>
                        </div>
                    </div>
                </div>
                <form action="<?= base_url('mata-kuliah/create') ?>" method="post">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Mata Kuliah</label>
                                    <input type="text" class="form-control" name="name" id="name" autocomplete="off"
                                        placeholder="Masukan Nama Mata Kuliah">
                                        <?= form_error('name', '<small class="text-danger">', '</small>')?>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="prodi" class="form-label">Program Studi</label>
                                    <select name="prodi_id" id="prodi" class="form-select">
                                        <option selected disabled>Pilih Program Studi</option>
                                        <?php foreach($study_programs as $prodi): ?>
                                            <option value="<?=$prodi->id?>"><?=$prodi->name?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <?= form_error('prodi_id', '<small class="text-danger">', '</small>')?>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="dosen" class="form-label">Dosen</label>
                                    <select name="dosen_id" id="dosen" class="form-select">
                                        <option selected disabled>Pilih Dosen</option>
                                        <?php foreach($dosen as $row): ?>
                                            <option value="<?=$row->id?>"><?=$row->name?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <?= form_error('dosen_id', '<small class="text-danger">', '</small>')?>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="type" class="form-label">Tipe Pembelajaran</label>
                                    <select name="type" id="type" class="form-select">
                                        <option selected disabled>Pilih Tipe Pembelajaran</option>
                                        <option value="Materi">Materi</option>
                                        <option value="Praktikum">Praktikum</option>
                                        <option value="Materi dan Praktikum">Materi dan Praktikum</option>
                                    </select>
                                    <?= form_error('type', '<small class="text-danger">', '</small>')?>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button type="reset" class="btn btn-danger mx-1">Reset</button>
                            <button type="submit" class="btn btn-primary mx-1">Create Data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>