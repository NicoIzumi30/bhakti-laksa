<div class="page-content">

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <div class="row d-flex justify-content-between">
                        <div class="col-auto">
                            <h4 class="">Edit Data Mahasiswa</h4>
                        </div>
                    </div>
                </div>
                <form action="<?= base_url('mahasiswa/edit/'.$student->id) ?>" method="post">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Mahasiswa</label>
                                <input type="text" class="form-control" name="name" id="name" autocomplete="off" value="<?=$student->name?>">
                                <?= form_error('name', '<small class="text-danger">', '</small>')?>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="nim" class="form-label">Nomor Induk Mahasiswa</label>
                                <input type="text" class="form-control numeric-input" name="nim" id="nim" autocomplete="off" value="<?=$student->nim?>">
                                <?= form_error('nim', '<small class="text-danger">', '</small>')?>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email" autocomplete="off" value="<?=$student->email?>">
                                <?= form_error('email', '<small class="text-danger">', '</small>')?>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="prodi" class="form-label">Program Studi</label>
                                <select name="prodi_id" id="prodi" class="form-select">
                                    <option selected disabled>Pilih Program Studi</option>
                                    <?php foreach($study_programs as $prodi):?>
                                    <option value="<?=$prodi->id?>" <?=$student->study_program_id == $prodi->id ? 'selected' : ''?>><?=$prodi->name?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('prodi_id', '<small class="text-danger">', '</small>')?>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="class_of" class="form-label">Tahun Angkatan</label>
                                <input type="text" class="form-control numeric-input" name="class_of" id="class_of" autocomplete="off" value="<?=$student->class_of?>">
                                <?= form_error('class_of', '<small class="text-danger">', '</small>')?>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label for="birth_date" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="birth_date" id="birth_date" autocomplete="off" value="<?=$student->birth_date?>">
                            <?= form_error('birth_date', '<small class="text-danger">', '</small>')?>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <a href="<?= base_url('mahasiswa') ?>" class="btn btn-danger mx-1">Cancel</a>
                        <button type="submit" class="btn btn-primary mx-1">Save Changes</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

</div>