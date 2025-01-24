<div class="page-content">
    <div class="modal fade" id="importData" tabindex="-1" aria-labelledby="importDataLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importDataLabel">Import Data
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-3">
                        <input type="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" id="myDropify"/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="<?=base_url('mata-kuliah/template-import')?>" class="btn btn-success">Download Template </a>
                        <button type="submit" class="btn btn-primary">Import Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="createData" tabindex="-1" aria-labelledby="createDataLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createDataLabel">Add Mahasiswa
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <form action="<?=base_url('mata-kuliah/student-course/create/'.$mata_kuliah->id)?>" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="student" class="form-label">Mahasiswa</label>
                            <select class="form-control" id="student" name="student">
                                <option value="" disabled selected>-- Pilih Mahasiswa --</option>
                                <?php foreach($students as $m) :?>
                                    <option value="<?php echo $m->id;?>"><?php echo $m->name . ' (' . $m->nim . ')';?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <div class="row d-flex justify-content-between">
                        <div class="col-auto">
                            <h4 class="">Data Mahasiswa Mata Kuliah <?= $mata_kuliah->name; ?></h4>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('mata-kuliah/reset/') ?>" class="btn btn-danger btn-sm">Reset Data</a>
                            <a data-bs-toggle="modal" data-bs-target="#importData" class="btn btn-success btn-sm">Import
                                Data</a>
                                <a data-bs-toggle="modal" data-bs-target="#createData" class="btn btn-primary btn-sm">Create
                                Data</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="5%" class="text-center">No</th>
                                    <th>Nama</th>
                                    <th>NIM</th>
                                    <th>Prodi</th>
                                    <th>Tahun Angkatan</th>
                                    <th width="20%" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach($studentCourses as $student): ?>
                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td><?= $student->name ?></td>
                                    <td><?= $student->nim ?></td>
                                    <td><?= $student->study_program_name ?></td>
                                    <td><?= $student->class_of; ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('mata-kuliah/student-course/delete/'.$mata_kuliah->id.'/'.$student->id) ?>"
                                            class="btn btn-danger btn-delete btn-sm">Delete</a>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>