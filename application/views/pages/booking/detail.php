<main role="main" class="container">
    <?php $this->load->view('layouts/_alert'); ?>
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="card">
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
                            <p>Tanggal Booking : <?= str_replace('-', '/', date("d-m-Y", strtotime($booking->datebook))) ?></p>
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
                                </tfoot>

                            </table>
                        </div>
                        <div class="card-footer">
                            <form action="<?= base_url("booking/update/$booking->id") ?>" method="POST">
                                <input type="hidden" name="id" value="<?= $booking->id ?>">
                                <div class="input-group">
                                    <select name="status" id="" class="form-control">
                                        <option value="waiting" <?= $booking->status == 'waiting' ? 'selected' : '' ?>>Belom Melakukan DP</option>
                                        <option value="paid" <?= $booking->status == 'paid' ? 'selected' : '' ?>>Sudah DP / Dikerjakan Sebagian</option>
                                        <option value="done" <?= $booking->status == 'done' ? 'selected' : '' ?>>Selesai Dikerjakan</option>
                                        <option value="cancel" <?= $booking->status == 'cancel' ? 'selected' : '' ?>>Batal</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <?php if (isset($order_confirm)) : ?>
                <div class="row mb-3">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                Bukti Transfer
                            </div>
                            <div class="card-body">
                                <p>No Rekening : <?= $order_confirm->account_number ?></p>
                                <p>Atas Nama : <?= $order_confirm->account_name ?></p>
                                <p>Nominal : Rp.<?= number_format($order_confirm->nominal, 0, ',', '.') ?>,-</p>
                                <p>Catatan : <?= $order_confirm->note ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img src="<?= base_url("/images/confirm/$order_confirm->image") ?>" alt="" height="200">
                    </div>
                </div>
            <?php endif ?>
        </div>
    </div>
    </div>
</main>