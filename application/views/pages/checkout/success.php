<main role="main" class="container">
    <?php $this->load->view('layouts/_alert'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Checkout Berhasil
                </div>
                <div class="card-body">
                    <h5>Nomer Order: <?= $content->invoice  ?></h5>
                    <p>Terimakasih Sudah Booking Service.</p>
                    <p>Silahkan Jika ingin melakukan pembayaran DP dengan cara:</p>
                    <ol>
                        <li>Lakukan pembayaran pada rekening <strong>BCA 33908876</strong> a/n <strong>PT. Roda Maju</strong></li>
                        <li>Sertakan keterangan dengan nomor order: <strong><?= $content->invoice  ?></strong></li>
                        <li>Jika ingin melakukan DP pembayaran minimal: <strong>Rp.50000,-</strong></li>
                    </ol>
                    <p>Jika sudah, silahkan kirimkan bukti transfer dihalaman konfirmasi atau bisa <a href="https://wa.me/+6281295266847">Klik disini</a>!</p>
                    <a href="<?= base_url('/')  ?>" class="btn btn-primary"><i class="fas fa-angle-left"></i> Kembali</a>
                </div>
            </div>
        </div>
    </div>
</main>