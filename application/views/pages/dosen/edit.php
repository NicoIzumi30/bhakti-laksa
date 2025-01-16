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
                <form action="<?= base_url('dosen/update/1') ?>" method="post">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Dosen</label>
                                <input type="text" class="form-control" name="nama" id="nama" autocomplete="off" value="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="nik" class="form-label">Nomor Induk Karyawan</label>
                                <input type="text" class="form-control numeric-input" name="nik" id="nik" autocomplete="off" value="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email" autocomplete="off" value="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="no_telp" class="form-label">No Telepon</label>
                                <input type="text" class="form-control numeric-input" name="no_telp" id="no_telp" autocomplete="off" value="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="jk" class="form-label">Jenis Kelamin</label>
                                <select name="jk" id="jk" class="form-select">
                                    <option selected disabled>Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="" autocomplete="off"
                                placeholder="Masukan Tanggal Lahir Dosen">
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