        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Data Pendaftaran Siswa Baru</h1>
            <?= $this->session->flashdata('flash'); ?>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="font-weight-bold text-primary mt-2">Table Calon Siswa Baru
                        <a href="" type="button" class="btn btn-primary float-right tombolTambahData" data-toggle="modal" data-target="#formModal">Daftar Siswa Baru</a></h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <div>

                            </div>
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>NIS</th>
                                    <th>Sekolah Asal</th>
                                    <th>Tempat Tanggal Lahir</th>
                                    <th>Alamat</th>
                                </tr>
                            </thead>
                            <?php foreach ($calon_siswa as $siswa) : ?>
                                <tbody>
                                    <tr>
                                        <td><?= $siswa['nama_siswa']; ?></td>
                                        <td><?= $siswa['nis']; ?></td>
                                        <td><?= $siswa['asal']; ?></td>
                                        <td><?= $siswa['tempat_lahir']; ?>, <?= date("d F Y", strtotime($siswa['tgl_lahir'])) ?></td>
                                        <td><?= $siswa['alamat']; ?></td>
                                    </tr>
                                </tbody>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Modal -->
        <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="judulModal">Daftar Siswa Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="calon_siswa" action="<?= base_url('table/tambah'); ?>" method="post">
                            <input type="hidden" name="id" id="id" value="<?= $siswa['id_siswa']; ?>">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" placeholder="Nama Lengkap" required>
                            </div>
                            <div class="form-group">
                                <label>NIS</label>
                                <input type="number" class="form-control" id="nis" name="nis" placeholder="NIS" required>
                            </div>
                            <div class="form-group">
                                <label>Asal Sekolah</label>
                                <input type="text" class="form-control" id="asal" name="asal" placeholder="Asal Sekolah" required>
                            </div>

                            <div class="form-group">
                                <label>Tempat lahir</label>
                                <input type="text" class="form-control" id="tempat_lahir" name=" tempat_lahir" placeholder="Tempat Lahir" required>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <div class="input-group date" data-provide="datepicker" data-date-format="yyyy/mm/dd">
                                    <input id="tgl_lahir" name="tgl_lahir" type="text" class="form-control" required autocomplete="off">
                                    <?= form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" id="alamat" name=" alamat" placeholder="Alamat Tinggal" required>
                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>