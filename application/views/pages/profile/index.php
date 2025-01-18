<div class="page-content">
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h3 class="mb-3 mb-md-0">Profile</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="mt-3 text-center">
                        <img src="<?= base_url('assets/images/user.jpg') ?>"
                            style="width: 200px; height: 200px; border-radius: 50%;" alt="profile image">
                    </div>
                    <h3 class="card-title mt-5 text-center" style="font-size:1.3rem">Heru Kristanto</h3>
                    <div class="mt-3 mx-3">
                        <table class="table">
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>herukristanto@mail.com</td>
                            </tr>
                            <tr>
                                <td>NIK</td>
                                <td>:</td>
                                <td>3402053012040001</td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td>Laki Laki</td>
                            </tr>
                            <tr>
                                <td>No Telepon</td>
                                <td>:</td>
                                <td>0859126462972</td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>:</td>
                                <td>30-12-2004</td>
                            </tr>
                            <tr>
                                <td>Role</td>
                                <td>:</td>
                                <td>Admin</td>
                            </tr>
                            <tr>
                                <td>Bergabung Sejak</td>
                                <td>:</td>
                                <td>30-112-2024</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="">Edit Profile</h4>
                </div>
                <form>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="Heru Kristanto">
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="herukristanto@mail.com">
                        </div>
                        <div class="mb-3">
                            <label for="no_telepon">No Telepon</label>
                            <input type="text" class="form-control" id="no_telepon" name="no_telepon"
                                value="0859126462972">
                        </div>
                        <div class="mb-3">
                            <label for="myDropify">Image Profile</label>
                            <input type="file"
                                accept="image/*"
                                id="myDropify" />
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
            <div class="card mt-3">
                <div class="card-header">
                    <h4 class="">Ubah Password</h4>
                </div>
                <form>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="password">Password Lama</label>
                            <input type="password" class="form-control" id="password" name="current_password">
                        </div>
                        <div class="mb-3">
                            <label for="password">Password Baru</label>
                            <input type="password" class="form-control" id="password" name="new_password">
                        </div>
                        <div class="mb-3">
                            <label for="password">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" id="password" name="confirm_password">
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>