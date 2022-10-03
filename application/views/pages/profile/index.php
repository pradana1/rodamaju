<main role="main" class="container">
    <?php $this->load->view('layouts/_alert'); ?>
    <div class="row">
        <?php $this->load->view('layouts/_menu'); ?>

        <div class="col-md-9">
            <div class="card mb-3">
                <div class="card-body">
                    <p>Nama : <?= $content->name ?></p>
                    <p>Email : <?= $content->email ?></p>
                    <p><a href="<?= base_url("/profile/update/$content->id") ?>" class="btn btn-primary">Edit</a></p>
                </div>
            </div>
        </div>
    </div>
</main>