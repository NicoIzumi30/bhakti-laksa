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
                                <?php 
                                $no = 1;
                                foreach ($data as $row) : ?>
                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td><?=$row->name?></td>
                                    <td><?= $row->study_program_name; ?></td>
                                    <td><?= $row->dosen_name; ?></td>
                                    <td><?= $row->learning_type; ?></td>
                                    <td class="text-center">
                                        <a href="<?=base_url('mata-kuliah/edit/'.$row->id)?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="<?=base_url('mata-kuliah/delete/'.$row->id)?>" class="btn btn-danger btn-delete btn-sm">Delete</a>
                                        <a href="<?=base_url('mata-kuliah/detail/'.$row->id)?>" class="btn btn-info btn-sm">Detail</a>
                                    </td>
                                    <?php endforeach ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>