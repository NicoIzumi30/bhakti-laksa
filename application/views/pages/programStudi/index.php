<div class="page-content">

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <!-- Modal Create Data-->
            <div class="modal fade" id="createData" tabindex="-1" aria-labelledby="createDataLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createDataLabel">Create Data Program Studi
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="btn-close"></button>
                        </div>
                        <form action="<?= base_url('program-studi/store') ?>" method="post">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="fakultas" class="form-label">Fakultas</label>
                                    <select class="form-select" name="fakultas" id="fakultas">
                                        <option selected disabled>Pilih Fakultas</option>
                                        <?php foreach ($faculties as $faculty): ?>
                                            <option value="<?= $faculty['value'] ?>">
                                                <?= $faculty['name'] ?></option>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                    <?php echo form_error('fakultas', '<script>toast("error","', '");'); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="prodi" class="form-label">Nama Prodi</label>
                                    <input type="text" class="form-control" name="prodi" id="prodi" autocomplete="off"
                                        placeholder="Masukan Nama Prodi">
                                    <?php echo form_error('prodi', '<script>toast("error","', '");'); ?><?php echo form_error('fakultas', '<script>toast("error","', '");'); ?>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Create Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="row d-flex justify-content-between">
                        <div class="col-auto">
                            <h4 class="">Data Program Studi</h4>
                        </div>
                        <div class="col-auto">
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
                                    <th>Nama Prodi</th>
                                    <th>Fakultas</th>
                                    <th width="15%" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($data as $row): ?>
                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td><?= $row->name; ?></td>
                                        <td><?= $row->faculty; ?></td>
                                        <td class="text-center">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#editData<?= $row->id ?>"
                                                class="btn btn-primary btn-sm">Edit</a>
                                            <a href="<?= base_url('program-studi/delete/' . $row->id) ?>"
                                                class="btn btn-danger btn-sm btn-delete">Delete</a>
                                        </td>
                                    </tr>
                                    <!-- Modal Edit Data-->
                                    <div class="modal fade" id="editData<?= $row->id ?>" tabindex="-1"
                                        aria-labelledby="editDataLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editDataLabel">Edit Data Program Studi
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="btn-close"></button>
                                                </div>
                                                <form action="<?= base_url('program-studi/update/' . $row->id) ?>"
                                                    method="post">
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="fakultas" class="form-label">Fakultas</label>
                                                            <select class="form-select" name="fakultas" id="fakultas">
                                                                <option selected disabled>Pilih Fakultas</option>
                                                                <?php foreach ($faculties as $faculty): ?>
                                                                    <option value="<?= $faculty['value'] ?>" <?php if ($faculty['value'] == $row->faculty)
                                                                        echo 'selected'; ?>><?= $faculty['name'] ?></option>
                                                                    </option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="prodi" class="form-label">Nama Prodi</label>
                                                            <input type="text" class="form-control" name="prodi" id="prodi"
                                                                autocomplete="off" value="<?= $row->name ?>">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>