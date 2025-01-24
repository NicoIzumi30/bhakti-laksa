<div class="page-content">

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <div class="row d-flex justify-content-between">
                        <div class="col-auto">
                            <h4 class="">Edit Data Mata Kuliah</h4>
                        </div>
                    </div>
                </div>
                <form action="<?= base_url('mata-kuliah/edit/'.$mata_kuliah->id) ?>" method="post">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Mata Kuliah</label>
                                    <input type="text" class="form-control" name="name"  id="nama" autocomplete="off"
                                        value="<?=$mata_kuliah->name?>">
                                        <?php echo form_error('name', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="prodi" class="form-label">Program Studi</label>
                                    <select name="prodi_id" id="prodi" class="form-select">
                                        <option disabled>Pilih Program Studi</option>
                                        <?php foreach ($study_programs as $prodi) : ?>
                                        <option value="<?=$prodi->id?>"<?php if($prodi->id == $mata_kuliah->study_program_id) echo 'selected' ?>><?=$prodi->name?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <?php echo form_error('prodi_id', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="dosen" class="form-label">Dosen</label>
                                    <select name="dosen_id" id="dosen" class="form-select">
                                        <option selected >Pilih Dosen</option>
                                        <?php foreach ($dosen as $row) :?>
                                        <option value="<?=$row->id?>"<?php if($row->id == $mata_kuliah->user_id) echo 'selected' ?>><?=$row->name?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php echo form_error('dosen_id', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="type" class="form-label">Tipe Pembelajaran</label>
                                    <select name="type" id="type" class="form-select">
                                        <option disabled>Pilih Tipe Pembelajaran</option>
                                        <option value="Materi" <?php if($mata_kuliah->learning_type == 'Materi') echo 'selected' ?>>Materi</option>
                                        <option value="Praktikum" <?php if($mata_kuliah->learning_type == 'Praktikum') echo 'selected' ?>>Praktikum</option>
                                        <option value="Materi dan Praktikum" <?php if($mata_kuliah->learning_type == 'Materi dan Praktikum') echo 'selected' ?>>Materi dan Praktikum</option>
                                    </select>
                                    <?php echo form_error('type', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <h5 class="mt-3">Data Presentase Pernilaian</h5>
                        <small>Maximal Nilai 100 untuk keseluruhan</small>
                        <hr class="mb-3">
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="mb-3">
                                    <label for="presensi" class="form-label">Presensi (%)</label>
                                    <input type="text" class="form-control numeric-input" name="presensi" id="presensi" autocomplete="off"
                                        value="<?=$presentase->attendance?>">
                                        <?php echo form_error('presensi', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                            <?php if($mata_kuliah->learning_type == 'Materi dan Praktikum' || $mata_kuliah->learning_type == 'Praktikum'): ?>
                            <div class="col-12 col-md-4">
                                <div class="mb-3">
                                    <label for="tugas" class="form-label">Tugas Praktikum(%)</label>
                                    <input type="text" class="form-control numeric-input" name="tugas" id="tugas" autocomplete="off"
                                        value="<?=$presentase->task?>">
                                </div>
                            </div>
                            <?php endif;?>
                            <?php if($mata_kuliah->learning_type == 'Materi dan Praktikum' || $mata_kuliah->learning_type == 'Materi'): ?>
                            <div class="col-12 col-md-4">
                                <div class="mb-3">
                                    <label for="diskusi" class="form-label">Diskusi Materi(%)</label>
                                    <input type="text" class="form-control numeric-input" name="diskusi" id="diskusi" autocomplete="off"
                                        value="<?=$presentase->discussion?>">
                                </div>
                            </div>
                            <?php endif;?>
                            <div class="col-12 col-md-4">
                                <div class="mb-3">
                                    <label for="responsi" class="form-label">Responsi (%)</label>
                                    <input type="text" class="form-control numeric-input" name="responsi" id="responsi" autocomplete="off"
                                        value="<?=$presentase->responsi?>">
                                        <?php echo form_error('responsi', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="mb-3">
                                    <label for="uts" class="form-label">UTS (%)</label>
                                    <input type="text" class="form-control numeric-input" name="uts" id="uts" autocomplete="off"
                                        value="<?=$presentase->uts?>">
                                        <?php echo form_error('uts', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="mb-3">
                                    <label for="uas" class="form-label">UAS (%)</label>
                                    <input type="text" class="form-control numeric-input" name="uas" id="uas" autocomplete="off"
                                        value="<?=$presentase->uas?>">
                                        <?php echo form_error('uas', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <a href="<?=base_url('mata-kuliah')?>" class="btn btn-danger mx-1">Cancel</a>
                        <button type="submit" class="btn btn-primary mx-1">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>