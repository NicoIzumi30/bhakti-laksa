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
                        <form action="" method="post">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="fakultas" class="form-label">Fakultas</label>
                                    <select class="form-select" name="fakultas" id="fakultas">
                                        <option selected disabled>Pilih Fakultas</option>
                                        <option value="Fakultas Ilmu Komputer">Fakultas Ilmu
                                            Komputer</option>
                                        <option value="Fakultas Ekonomi & Sosial">Fakultas Ekonomi &
                                            Sosial</option>
                                        <option value="Fakultas Sains & Teknologi">Fakultas Sains &
                                            Teknologi</option>
                                        <option value="Pasca Sarjana">Pasca Sarjana</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="prodi" class="form-label">Nama Prodi</label>
                                    <input type="text" class="form-control" name="prodi" id="prodi" autocomplete="off"
                                        placeholder="Masukan Nama Prodi">
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
                                <tr>
                                    <td class="text-center">1</td>
                                    <td>D3 Teknik Informatika</td>
                                    <td>Fakultas Ilmu Komputer</td>
                                    <td class="text-center">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#editData"
                                            class="btn btn-primary btn-sm">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm btn-delete">Delete</a>
                                    </td>
                                </tr>
                                <!-- Modal Edit Data-->
                                <div class="modal fade" id="editData" tabindex="-1" aria-labelledby="editDataLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editDataLabel">Edit Data Program Studi
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="btn-close"></button>
                                            </div>
                                            <form action="" method="post">
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="fakultas" class="form-label">Fakultas</label>
                                                        <select class="form-select" name="fakultas" id="fakultas">
                                                            <option selected disabled>Pilih Fakultas</option>
                                                            <option value="Fakultas Ilmu Komputer">Fakultas Ilmu
                                                                Komputer</option>
                                                            <option value="Fakultas Ekonomi & Sosial">Fakultas Ekonomi &
                                                                Sosial</option>
                                                            <option value="Fakultas Sains & Teknologi">Fakultas Sains &
                                                                Teknologi</option>
                                                            <option value="Pasca Sarjana">Pasca Sarjana</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="prodi" class="form-label">Nama Prodi</label>
                                                        <input type="text" class="form-control" name="prodi" id="prodi"
                                                            autocomplete="off" placeholder="Masukan Nama Prodi">
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>