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

            <!-- <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">Add New Layanan</a> -->

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">no</th>
                        <th scope="col">Nip</th>
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
                            <a href="<?= base_url(); ?>menu/ubah/<?= $sm['id']; ?>"class="btn btn-warning btn-sm float-center"><i class=" fas fa-pen"></i></a>
                            <a href="<?= base_url(); ?>menu/hapus/<?= $sm['id']; ?>"class="btn btn-danger btn-sm float-center tombol-hapus"><i class="fas fa-trash-alt"></i></a>
                            <a href="<?= base_url(); ?>menu/detail_data/<?= $sm['id']; ?>"class="btn btn-success btn-sm float-center"><i class="fas fa-key"></i></a>
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
                        <input type="text" class="form-control" id="nip" name="nip" placeholder="Submenu nip">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="nama">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="slug" name="slug" placeholder="slug">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="satker" name="satker" placeholder="satker">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="instansi" name="instansi" placeholder="instansi">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="kepentingan" name="kepentingan" placeholder="kepentingan">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nohp" name="nohp" placeholder="No Hp">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="layanan" name="layanan" placeholder="layanan">
                    </div>
                    <div class="form-group">
                    <label>Counter</label>
                        <select class="form-control" name="counter" id="counter" placeholder=" Counter">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
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