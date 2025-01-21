<div class="page-content">

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <div class="row d-flex justify-content-between">
                        <div class="col-auto">
                            <h4 class="">Create Data Mahasiswa</h4>
                        </div>
                    </div>
                </div>
                <form action="<?= base_url('mahasiswa/create') ?>" method="post">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Mahasiswa</label>
                                <input type="text" class="form-control" name="name" id="name" autocomplete="off"
                                    placeholder="Masukan Nama Mahasiswa">
                                    <?= form_error('name', '<small class="text-danger">', '</small>')?>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="nim" class="form-label">Nomor Induk Mahasiswa</label>
                                <input type="text" class="form-control numeric-input" name="nim" id="nim" autocomplete="off"
                                    placeholder="Masukan NIM">
                                    <?= form_error('nim', '<small class="text-danger">', '</small>')?>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email" autocomplete="off"
                                    placeholder="Masukan Email Mahasiswa">
                                    <?= form_error('email', '<small class="text-danger">', '</small>')?>
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
                                <label for="class_of" class="form-label">Tahun Angkatan</label>
                                <input type="text" class="form-control numeric-input" name="class_of" id="class_of" autocomplete="off"
                                    placeholder="Masukan Tahun Angkatan">
                                    <?= form_error('class_of', '<small class="text-danger">', '</small>')?>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label for="birth_date" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="birth_date" id="birth_date" autocomplete="off"
                                placeholder="Masukan Tanggal Lahir Mahasiswa">
                                <?= form_error('birth_date', '<small class="text-danger">', '</small>')?>
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