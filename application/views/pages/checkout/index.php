<main role="main" class="container">
    <?php $this->load->view('layouts/_alert'); ?>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Formulir Alamat Pengiriman
                </div>
                <div class="card-body">
                    <form action="<?= base_url("/checkout/create")  ?>" method="POST">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Masukan nama" value="<?= $input->name ?>">
                            <?= form_error('name') ?>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea name="address" id="" cols="30" rows="10" class="form-control"><?= $input->address  ?></textarea>
                            <?= form_error('address') ?>
                        </div>
                        <div class="form-group">
                            <label for="">Kendaraan</label>
                            <input type="text" class="form-control" name="kendaraan" placeholder="Masukan nama kendaraan" value="<?= $input->kendaraan ?>">
                            <?= form_error('kendaraan') ?>
                        </div>
                        <div class="from-control">
                            <label for="">Telephone</label>
                            <input type="text" class="form-control" name="phone" placeholder="Masukan Nomor Telephone" value="<?= $input->phone ?>">
                            <?= form_error('phone') ?>
                        </div>
                        <p></p>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Kategori
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Service</th>
                                        <th>Tanggal Booking</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($cart as $row) : ?>
                                        <tr>
                                            <td><?= $row->title ?></td>
                                            <td><?= $row->datebook  ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>