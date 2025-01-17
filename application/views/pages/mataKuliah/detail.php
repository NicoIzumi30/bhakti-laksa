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
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <div class="row d-flex justify-content-between">
                        <div class="col-auto">
                            <h4 class="">Data Mahasiswa Mata Kuliah Backend Web Development</h4>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('mata-kuliah/reset/') ?>" class="btn btn-danger btn-sm">Reset Data</a>
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
                                    <th>Prodi</th>
                                    <th>Tahun Angkatan</th>
                                    <th width="20%" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td>Heru Kristanto</td>
                                    <td>23.01.5047</td>
                                    <td>D3 Teknik Informatika</td>
                                    <td>2023</td>
                                    <td class="text-center">
                                        <a href="<?= base_url('mata-kuliah/delete') ?>"
                                            class="btn btn-danger btn-delete btn-sm">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>