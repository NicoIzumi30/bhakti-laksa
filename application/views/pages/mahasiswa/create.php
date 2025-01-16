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
                <form action="<?= base_url('mahasiswa/store') ?>" method="post">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Mahasiswa</label>
                                <input type="text" class="form-control" name="nama" id="nama" autocomplete="off"
                                    placeholder="Masukan Nama Mahasiswa">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="nim" class="form-label">Nomor Induk Mahasiswa</label>
                                <input type="text" class="form-control numeric-input" name="nim" id="nim" autocomplete="off"
                                    placeholder="Masukan NIM">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email" autocomplete="off"
                                    placeholder="Masukan Email Mahasiswa">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="prodi" class="form-label">Program Studi</label>
                                <select name="prodi" id="prodi" class="form-select">
                                    <option selected disabled>Pilih Program Studi</option>
                                    <option value="Teknik Informatika">Teknik Informatika</option>
                                    <option value="Sistem Informasi">Sistem Informasi</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="angkatan" class="form-label">Tahun Angkatan</label>
                                <input type="text" class="form-control numeric-input" name="angkatan" id="angkatan" autocomplete="off"
                                    placeholder="Masukan Tahun Angkatan">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" autocomplete="off"
                                placeholder="Masukan Tanggal Lahir Mahasiswa">
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