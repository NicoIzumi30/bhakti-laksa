<div class="page-content">
    <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow-1">
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-header bg-danger"></div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h4 class="card-title mb-0">Jumlah Mahasiswa</h4>
                            </div>
                            <div class="row mt-3">
                                <div class="col-6 col-md-12 col-xl-5">
                                    <h3 class="mb-2"><?= $countMahasiswa; ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-header bg-success"></div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h4 class="card-title mb-0">Sudah Di Nilai</h4>
                            </div>
                            <div class="row mt-3">
                                <div class="col-6 col-md-12 col-xl-5">
                                    <h3 class="mb-2"><?= $countMahasiswaHasGrade; ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-header bg-primary"></div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h4 class="card-title mb-0">Belum Di Nilai</h4>
                            </div>
                            <div class="row mt-3">
                                <div class="col-6 col-md-12 col-xl-5">
                                    <h3 class="mb-2"><?= $countMahasiswa - $countMahasiswaHasGrade; ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- row -->
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
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <div class="row d-flex justify-content-between">
                        <div class="col-auto">
                            <h4 class="">Data Penilaian <?= $matakuliah->name; ?></h4>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('penilaian/create/'.$matakuliah->id) ?>" class="btn btn-primary btn-sm">Create
                                Data</a>
                                <a data-bs-toggle="modal" data-bs-target="#importData" class="btn btn-success btn-sm">Import
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
                                    <th>Total Nilai</th>
                                    <th>Kategori Nilai</th>
                                    <th width="15%" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                 $no=1; 
                                 foreach($students as $student): 
                                    $nilai = total_nilai($matakuliah->id, $student->student_id);
                                 ?>
                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td><?= $student->name ?></td>
                                    <td><?= $student->nim ?></td>
                                    <td><?= $nilai['total'] ?></td>
                                    <td><?= $nilai['gradeCategory']; ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('penilaian/edit/'.$student->student_id.'/'.$matakuliah->id) ?>" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="<?=base_url('penilaian/delete/'.$student->student_id.'/'.$matakuliah->id)?>" class="btn btn-danger btn-sm btn-delete">Delete</a>
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