<div class="page-content">

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h3 class="mb-3 mb-md-0">Penilaian Mahasiswa</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow-1">
            <?php foreach($data as $d): ?>
            <div class="col-md-4 grid-margin stretch-card">
                    <div class="card card-custom">
                        <a href="<?=base_url('penilaian/detail/'.$d->id)?>">
                        <img src="<?= base_url('assets/images/background/'.rand(1,7).'.svg') ?>" class="img-card-custom" alt="...">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h3 class="card-title card-title-custom mb-0"><?= $d->name; ?></h3>
                            </div>
                            <div class="row mt-3">
                                <div class="col-6 col-md-12 col-xl-5">
                                    <h5 class="mb-2"><?= $d->learning_type; ?></h5>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                </div>
                <?php endforeach; ?>
               
            </div>
        </div>
    </div> <!-- row -->

</div>