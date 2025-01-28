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
                <form action="<?= base_url('penilaian/edit/' . $student->id . '/' . $matakuliah->id . '') ?>" method="post">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Mata Kuliah</label>
                                    <input type="text" class="form-control" value="<?= $matakuliah->name ?>" id="nama"
                                        autocomplete="off" disabled>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Mahasiswa</label>
                                    <input type="text" class="form-control" value="<?= $student->name ?>" id="nama"
                                        autocomplete="off" disabled>
                                </div>
                            </div>
                            <p class="my-2 fw-bold">Nilai Presensi (<?=$presentase->attendance?>%)</p>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="presensi" class="form-label">Nilai Presensi</label>
                                    <input type="text" class="form-control numeric-input" name="presensi" id="presensi"
                                        maxlength="3" value="<?= $presensi->grade ?>" autocomplete="off">
                                </div>
                            </div>
                            <p class="my-2 fw-bold">Nilai Ujian</p>
                            <hr>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nilai UTS (<?=$presentase->uts?>%)</label>
                                    <input type="text" class="form-control numeric-input" name="uts" id="nama"
                                        maxlength="3" value="<?= $uts->grade ?>" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nilai UAS (<?=$presentase->uas?>%)</label>
                                    <input type="text" class="form-control numeric-input" name="uas" id="nama"
                                        maxlength="3" value="<?= $uas->grade ?>" autocomplete="off">
                                </div>
                            </div>
                            <p class="my-2 fw-bold">Nilai Responsi (<?=$presentase->responsi?>%)</p>
                            <hr>
                            <?php foreach ($responsi as $res): ?>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nilai Responsi <?= $res->position; ?></label>
                                        <input type="text" class="form-control numeric-input" name="responsi[]" id="nama"
                                            maxlength="3" value="<?= $res->grade ?>" autocomplete="off">
                                    </div>
                                </div>
                            <?php endforeach ?>
                            <?php if ($matakuliah->learning_type == 'Materi' || $matakuliah->learning_type == 'Materi dan Praktikum'): ?>
                                <p class="my-2 fw-bold">Nilai Diskusi Materi (<?=$presentase->discussion?>%)</p>
                                <hr>
                                <?php foreach ($materi as $mat): ?>
                                    <div class="col-12 col-md-2">
                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Pertemuan <?= $mat->position ?></label>
                                            <input type="text" class="form-control numeric-input" name="materi[]" id="nama"
                                                maxlength="3" value="<?= $mat->grade ?>" autocomplete="off">
                                        </div>
                                    </div>
                                <?php endforeach; endif;
                            if ($matakuliah->learning_type == 'Praktikum' || $matakuliah->learning_type == 'Materi dan Praktikum'):
                                ?>
                                <p class="my-2 fw-bold">Nilai Praktikum(<?=$presentase->task?>%)</p>
                                <hr>
                                <?php foreach ($praktikum as $prak): ?>
                                    <div class="col-12 col-md-2">
                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Pertemuan <?= $prak->position ?></label>
                                            <input type="text" class="form-control numeric-input" name="praktikum[]"
                                                maxlength="3" value="<?= $prak->grade ?>" id="nama" autocomplete="off">
                                        </div>
                                    </div>
                                <?php endforeach; endif ?>

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