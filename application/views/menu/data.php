<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>
            <a href="<?= base_url(); ?>menu/excel" class="btn btn-success"><i class="fa fa-clipboard"></i>  Excel File</a>
            <a href="<?= base_url(); ?>menu/pdf" class="btn btn-danger"><i class="fa fa-clipboard"></i>  PDF File</a>

            <!-- <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">Add New Layanan</a> -->

            <div class="row mt-3">
        <div class="col-md-3">
            <form action="<?= base_url('menu/data'); ?>" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari data .." name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIP</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Instansi</th>
                        <th scope="col">Layanan</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data as $sm) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $sm['nip']; ?></td>
                            <td><?= $sm['nama']; ?></td>
                            <td><?= $sm['instansi']; ?></td>
                            <td><?= $sm['layanan']; ?></td>
                            <td>
                                <a href="<?= base_url(); ?>menu/ubah/<?= $sm['id']; ?>" class="btn btn-warning btn-sm float-center"><i class=" fas fa-pen"></i></a>
                                <a href="<?= base_url(); ?>menu/hapus/<?= $sm['id']; ?>" class="btn btn-danger btn-sm float-center tombol-hapus"><i class="fas fa-trash-alt"></i></a>
                                <a href="<?= base_url(); ?>menu/detail_data/<?= $sm['id']; ?>" class="btn btn-success btn-sm float-center"><i class="fas fa-key"></i></a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>


        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Tambah Layanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/layanan'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>NIP</label>
                        <input type="text" class="form-control" id="nip" name="nip" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Satuan Kerja</label>
                        <input type="text" class="form-control" id="satker" name="satker" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Instansi</label>
                        <input type="text" class="form-control" id="instansi" name="instansi" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Kepentingan</label>
                        <input type="text" class="form-control" id="kepentingan" name="kepentingan" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>No.HP</label>
                        <input type="text" class="form-control" id="nohp" name="nohp" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Layanan</label>
                        <select class="form-control" name="layanan" id="layanan" placeholder="">
                            <option selected>Choose...</option>
                            <option value="Informasi Kepegawaian">Informasi Kepegawaian</option>
                            <option value="Mutasi dan Status Kepegawaian">Mutasi dan Status Kepegawaian</option>
                            <option value="Pengangkatan dan Pensiun">Pengangkatan dan Pensiun</option>
                            <option value="Pengembangan dan Supervisi Kepegawaian">Pengembangan dan Supervisi Kepegawaian</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Counter</label>
                        <select class="form-control" name="counter" id="counter" placeholder="">
                            <option selected>Choose...</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>