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
                <form action="<?= base_url('mata-kuliah/store') ?>" method="post">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Mata Kuliah</label>
                                    <input type="text" class="form-control" name="nama" id="nama" autocomplete="off"
                                        placeholder="Masukan Nama Mata Kuliah">
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
                                    <label for="dosen" class="form-label">Dosen</label>
                                    <select name="dosen" id="dosen" class="form-select">
                                        <option selected disabled>Pilih Dosen</option>
                                        <option value="Dosen 1">Dosen 1</option>
                                        <option value="Dosen 2">Dosen 2</option>
                                        <option value="Dosen 3">Dosen 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="tipe_pembelajaran" class="form-label">Tipe Pembelajaran</label>
                                    <select name="tipe_pembelajaran" id="tipe_pembelajaran" class="form-select">
                                        <option selected disabled>Pilih Tipe Pembelajaran</option>
                                        <option value="Materi">Materi</option>
                                        <option value="Praktikum">Praktikum</option>
                                        <option value="Materi dan Praktikum">Materi dan Praktikum</option>
                                    </select>
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