<main role="main" class="container">
    <?php $this->load->view('layouts/_alert') ?>
    <!-- Table Belanja -->
    <div class="row">
        <div class="col md-12">
            <div class="card">
                <div class="card-header">
                    PERIODE BOOKING SERVICE MINIMAL H-2 DARI TANGGAL SEKARANG
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>Service</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Datebook</th>
                                <th></th>
                            </tr>
                        </thead>

                        <!-- Hasil Belanja -->
                        <tbody>
                            <?php foreach ($content as $row) : ?>
                                <tr>
                                    <td>
                                        <p><strong><?= $row->title ?></strong> </p>
                                    </td>
                                    <td>
                                        <p class="text-center"> <?= substr($row->description, 0, 40,) . ' ' . '...' ?> </p>
                                    </td>
                                    <td>
                                        <form action="<?= base_url("/keranjang/update/$row->id") ?>" method="POST">
                                            <input type="hidden" name="id" value="<?= $row->id ?>">
                                            <div class="input-group">
                                                <input type="date" name="datebook" value="<?= $row->datebook ?>">

                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="submit"><i class="fas fa-check"></i></button>
                                                </div>
                                            </div>


                                        </form>

                                    </td>

                                    <td>
                                        <form action="<?= base_url("/keranjang/delete/$row->id") ?>" method="POST">
                                            <input type="hidden" name="id" value="<?= $row->id ?>">
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin ingin menghapus barang?')"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach ?>

                        </tbody>
                    </table>

                </div>

                <div class="card-footer">
                    <a href="<?= base_url('/checkout') ?>" class="btn btn-success float-right">Pembayaran <i class="fas fa-angle-right"></i></a>
                    <a href="<?= base_url("/") ?>" class="btn btn-warning text-white"><i class="fas fa-angle-left"></i> Kembali Belanja </a>
                </div>
            </div>
        </div>
    </div>
</main>