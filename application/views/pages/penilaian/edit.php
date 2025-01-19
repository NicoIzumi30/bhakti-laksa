<div class="page-content">

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <div class="row d-flex justify-content-between">
                        <div class="col-auto">
                            <h4 class="">Edit Data Penilaian</h4>
                        </div>
                    </div>
                </div>
                <form action="<?= base_url('mata-kuliah/store') ?>" method="post">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Mata Kuliah</label>
                                    <input type="text" class="form-control" value="Backend Web Development" id="nama" autocomplete="off" disabled>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Mahasiswa</label>
                                    <input type="text" class="form-control" value="Heru Kristanto" id="nama" autocomplete="off" disabled>
                                </div>
                            </div>
                            <p class="my-2 fw-bold">Nilai Presensi (8%)</p>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="presensi" class="form-label">Nilai Presensi</label>
                                    <input type="text" class="form-control numeric-input" name="presensi" id="presensi" autocomplete="off">
                                </div>
                            </div>
                            <p class="my-2 fw-bold">Nilai Ujian</p>
                            <hr>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nilai UTS (30%)</label>
                                    <input type="text" class="form-control numeric-input" name="uts" id="nama" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nilai UAS(30%)</label>
                                    <input type="text" class="form-control numeric-input" name="uas" id="nama" autocomplete="off">
                                </div>
                            </div>
                            <p class="my-2 fw-bold">Nilai Responsi (15%)</p>
                            <hr>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nilai Responsi 1</label>
                                    <input type="text" class="form-control numeric-input" name="responsi1" id="nama" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nilai Responsi 2</label>
                                    <input type="text" class="form-control numeric-input" name="responsi2" id="nama" autocomplete="off">
                                </div>
                            </div>
                            <p class="my-2 fw-bold">Nilai Diskusi Materi (10%)</p>
                            <hr>
                            <?php for($i = 1; $i <= 14; $i++) : ?>
                            <div class="col-12 col-md-2">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Pertemuan <?= $i ?></label>
                                    <input type="text" class="form-control numeric-input" name="materi[]" id="nama" autocomplete="off">
                                </div>
                            </div>
                            <?php endfor ?>
                            <p class="my-2 fw-bold">Nilai Praktikum(10%)</p>
                            <hr>
                            <?php for($i = 1; $i <= 14; $i++) : ?>
                            <div class="col-12 col-md-2">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Pertemuan <?= $i ?></label>
                                    <input type="text" class="form-control numeric-input" name="materi[]" id="nama" autocomplete="off">
                                </div>
                            </div>
                            <?php endfor ?>
                           
                        </div>
                        <div class="card-footer text-end">
                            <a href="<?= base_url('penilaian/detail/12') ?>" class="btn btn-danger mx-1">Kembali</a>
                            <button type="submit" class="btn btn-primary mx-1">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>