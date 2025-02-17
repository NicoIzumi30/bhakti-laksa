<div class="page-content">

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <div class="row d-flex justify-content-between">
                        <div class="col-auto">
                            <h4 class="">Create Data Penilaian</h4>
                        </div>
                    </div>
                </div>
                <form action="<?= base_url('penilaian/create/'.$matakuliah->id) ?>" method="post">
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
                                    <select name="student_id" id="students" class="form-select">
                                        <option value="" disabled selected>-- Pilih Mahasiswa --</option>
                                        <?php foreach ($students as $student): ?>
                                            <option value="<?= $student->student_id ?>">
                                                <?= $student->name . ' (' . $student->nim . ')'; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <p class="my-2 fw-bold">Nilai Presensi (<?= $presentase->attendance ?>%)</p>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="presensi" class="form-label">Nilai Presensi</label>
                                    <input type="text" class="form-control numeric-input" value="0" maxlength="3" name="presensi" id="presensi"
                                        autocomplete="off">
                                </div>
                            </div>
                            <p class="my-2 fw-bold">Nilai Ujian</p>
                            <hr>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nilai UTS (<?= $presentase->uts ?>%)</label>
                                    <input type="text" class="form-control numeric-input" name="uts" value="0" maxlength="3" id="nama"
                                        autocomplete="off">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nilai UAS (<?= $presentase->uas ?>%)</label>
                                    <input type="text" class="form-control numeric-input" name="uas" value="0" maxlength="3" id="nama"
                                        autocomplete="off">
                                </div>
                            </div>
                            <p class="my-2 fw-bold">Nilai Responsi (<?= $presentase->responsi ?>%)</p>
                            <hr>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nilai Responsi 1</label>
                                    <input type="text" class="form-control numeric-input" name="responsi[]" value="0" maxlength="3" id="nama"
                                        autocomplete="off">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nilai Responsi 2</label>
                                    <input type="text" class="form-control numeric-input" name="responsi[]" value="0" maxlength="3" id="nama"
                                        autocomplete="off">
                                </div>
                            </div>
                            <?php if ($matakuliah->learning_type == 'Materi' || $matakuliah->learning_type == 'Materi dan Praktikum'): ?>
                                <p class="my-2 fw-bold">Nilai Diskusi Materi (<?= $presentase->discussion ?>%)</p>
                                <hr>
                                <?php for ($i = 1; $i <= 14; $i++): ?>
                                    <div class="col-12 col-md-2">
                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Pertemuan <?= $i ?></label>
                                            <input type="text" class="form-control numeric-input" name="materi[]" value="0" maxlength="3" id="nama"
                                                autocomplete="off">
                                        </div>
                                    </div>
                                <?php
                                endfor;
                            endif;
                            if ($matakuliah->learning_type == 'Praktikum' || $matakuliah->learning_type == 'Materi dan Praktikum'):
                                ?>
                                <p class="my-2 fw-bold">Nilai Praktikum(<?= $presentase->task ?>%)</p>
                                <hr>
                                <?php for ($i = 1; $i <= 14; $i++): ?>
                                    <div class="col-12 col-md-2">
                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Pertemuan <?= $i ?></label>
                                            <input type="text" class="form-control numeric-input" name="praktikum[]" value="0" maxlength="3" id="nama"
                                                autocomplete="off">
                                        </div>
                                    </div>
                                <?php endfor; endif; ?>

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