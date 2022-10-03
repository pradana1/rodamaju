<main role="main" class="container">
    <?php $this->load->view('layouts/_alert'); ?>
    <div class="row">
        <?php $this->load->view('layouts/_menu'); ?>
        <div class="col-md-9">
            <div class="card mb-9">
                <div class="card-header">
                    Detail Orders #<?= $booking->invoice  ?>
                    <div class="float-right">
                        <?php $this->load->view('layouts/_status', ['status' => $booking->status]);
                        ?>
                    </div>
                </div>
                <div class="card-body">
                    <p>Tanggal : <?= str_replace('-', '/', date("d-m-Y", strtotime($booking->date))) ?></p>
                    <p>Nama : <?= $booking->name ?> </p>
                    <p>Tanggal Booking: <?= str_replace('-', '/', date("d-m-Y", strtotime($booking->datebook))) ?></p>
                    <p>Kendaraan : <?= $booking->kendaraan ?>
                    <p>Telepon : <?= $booking->phone ?></p>
                    <p>Alamat : <?= $booking->address ?> </p>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Service</th>
                                <th>Tanggal Booking</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($booking_detail as $row) : ?>
                                <tr>
                                    <td>
                                        <p><strong><?= $row->title ?></strong> </p>
                                    </td>
                                    <td><?= str_replace('-', '/', date("d-m-Y", strtotime($row->datebook))) ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <p>Silahkan Jika ingin melakukan pembayaran DP dengan cara:</p>
                            <ol>
                                <li>Lakukan pembayaran pada rekening <strong>BCA 33908876</strong> a/n <strong>PT. Roda Maju</strong></li>
                                <li>Sertakan keterangan dengan nomor order: <strong><?= $booking->invoice  ?></strong></li>
                                <li>Jika ingin melakukan DP pembayaran minimal: <strong>Rp.50000,-</strong></li>
                            </ol>
                        </tfoot>

                    </table>
                </div>
                <?php if ($booking->status == 'waiting') : ?>
                    <div class="card-footer">
                        <a href="https://wa.me/+6281295266847" class="btn btn-success">Konfirmasi pembayaran DP</a>
                    </div>
                <?php endif ?>
            </div>


        </div>
    </div>
</main>