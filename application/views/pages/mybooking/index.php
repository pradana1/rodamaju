<main role="main" class="container">
    <div class="row">
        <?php $this->load->view('layouts/_menu'); ?>
        <div class="col-md-9">
            <div class="card mb-9">
                <div class="card-header">
                    Daftar Orders
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Tanggal</th>
                                <th>Tanggal Booking</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($content as $row) : ?>
                                <tr>
                                    <td><a href="<?= base_url("/mybooking/detail/$row->invoice") ?>">#<?= $row->invoice  ?></a></td>
                                    <td><?= str_replace('-', '/', date("d-m-Y", strtotime($row->date))) ?></td>
                                    <td><?= str_replace('-', '/', date("d-m-Y", strtotime($row->datebook))) ?></td>
                                    <td>
                                        <?php $this->load->view('layouts/_status', ['status' => $row->status]); ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>