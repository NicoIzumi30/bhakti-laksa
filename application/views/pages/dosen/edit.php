<div class="page-content">

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <div class="row d-flex justify-content-between">
                        <div class="col-auto">
                            <h4 class="">Edit Data Dosen</h4>
                        </div>
                    </div>
                </div>
                <form action="<?= base_url('dosen/edit/'.$user->id) ?>" method="post">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Dosen</label>
                                <input type="text" class="form-control" name="name" id="name" autocomplete="off" value="<?=$user->name?>">
                                <?= form_error('name', '<small class="text-danger">', '</small>')?>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="nik" class="form-label">Nomor Induk Karyawan</label>
                                <input type="text" class="form-control numeric-input" name="nik" id="nik" autocomplete="off" value="<?=$user->nik?>">
                                <?= form_error('nik', '<small class="text-danger">', '</small>')?>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email" autocomplete="off" value="<?=$user->email?>">
                                <?= form_error('email', '<small class="text-danger">', '</small>')?>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="phone_number" class="form-label">No Telepon</label>
                                <input type="text" class="form-control numeric-input" name="phone_number" id="phone_number" autocomplete="off" value="<?=$user->phone_number?>">
                                <?= form_error('phone_number', '<small class="text-danger">', '</small>')?>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="gender" class="form-label">Jenis Kelamin</label>
                                <select name="gender" id="gender" class="form-select">
                                    <option disabled>Pilih Jenis Kelamin</option>
                                    <option value="Laki laki" <?php if($user->gender == 'Laki laki') echo 'selected'; ?>>Laki-laki</option>
                                    <option value="Perempuan" <?php if($user->gender == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                                </select>
                                <?= form_error('gender', '<small class="text-danger">', '</small>')?>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label for="birth_date" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="birth_date" id="birth_date" value="<?=$user->birth_date?>" autocomplete="off"
                                placeholder="Masukan Tanggal Lahir Dosen">
                                <?= form_error('birth_date', '<small class="text-danger">', '</small>')?>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <a href="<?= base_url('dosen') ?>" class="btn btn-danger mx-1">Cancel</a>
                        <button type="submit" class="btn btn-primary mx-1">Update</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

</div>