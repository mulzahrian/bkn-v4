<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Review Data
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $data['id']; ?>">
                        <div class="form-group">
                            <label for="nip">NIP :</label>
                            <label><?= $data['nip']; ?></label>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama :</label>
                            <label><?= $data['nama']; ?></label>
                        </div>
                        <div class="form-group">
                            <label for="satker">Satuan Kerja :</label>
                            <label><?= $data['satker']; ?></label>
                        </div>
                        <div class="form-group">
                            <label for="instansi">Instansi :</label>
                            <label><?= $data['instansi']; ?></label>
                        </div>
                        <div class="form-group">
                            <label for="kepentingan">Kepentingan :</label>
                            <label><?= $data['kepentingan']; ?></label>
                        </div>
                        <div class="form-group">
                            <label for="layanan">Layanan :</label>
                            <label><?= $data['layanan']; ?></label>
                        </div>
                        <div class="form-group">
                            <label for="counter">Counter :</label>
                            <label><?= $data['counter']; ?></label>
                        </div>
                        <a href="<?= base_url(); ?>menu/data" class="btn btn-success btn-sm float-center">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>