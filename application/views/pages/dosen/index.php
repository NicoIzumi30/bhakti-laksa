<div class="page-content">

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <div class="row d-flex justify-content-between">
                        <div class="col-auto">
                            <h4 class="">Data Dosen</h4>
                        </div>
                        <div class="col-auto">
                            <a href="<?=base_url('dosen/create')?>" class="btn btn-primary btn-sm">Create
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
                                    <th>NIK</th>
                                    <th>Email</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No Telepon</th>
                                    <th>Tanggal Lahir</th>
                                    <th width="15%" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td>Dimas</td>
                                    <td>1204981234</td>
                                    <td>dimas@.com</td>
                                    <td>Laki-laki</td>
                                    <td>0859126462972</td>
                                    <td>30-12-2004</td>
                                    <td class="text-center">
                                        <a href="<?=base_url('dosen/edit/1')?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="<?=base_url('dosen/delete')?>" class="btn btn-danger btn-delete btn-sm">Delete</a>
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