<div class="page-content">

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <div class="row d-flex justify-content-between">
                        <div class="col-auto">
                            <h4 class="">Data Mata Kuliah</h4>
                        </div>
                        <div class="col-auto">
                            <a href="<?=base_url('mata-kuliah/create')?>" class="btn btn-primary btn-sm">Create
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
                                    <th>Mata Kuliah</th>
                                    <th>Prodi</th>
                                    <th>Dosen</th>
                                    <th>Tipe Pembelajaran</th>
                                    <th width="20%" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td>Backend Web Development</td>
                                    <td>D3 Teknik Informatika</td>
                                    <td>firman@amikom.ac.id</td>
                                    <td>Materi & Praktikum</td>
                                    <td class="text-center">
                                        <a href="<?=base_url('mata-kuliah/edit/1')?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="<?=base_url('mata-kuliah/delete')?>" class="btn btn-danger btn-delete btn-sm">Delete</a>
                                        <a href="<?=base_url('mata-kuliah/detail/1')?>" class="btn btn-info btn-sm">Detail</a>
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