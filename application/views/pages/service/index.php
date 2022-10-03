<main role="main" class="container">
    <?php $this->load->view('layouts/_alert') ?>
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <span>Produk</span>
                    <a href="<?= base_url('service/create') ?>" class="btn-secondary btn-sm">Tambah</a>

                    <div class="float-right">
                        <form action="<?= base_url("service/search") ?>" method="POST">
                            <div class="input-group">
                                <input type="text" name="keyword" class="form-control form-control-sm text-center" placeholder="Cari" value="<?= $this->session->userdata('keyword') ?>">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary btn-sm">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <a href="<?= base_url("service/reset") ?>" class="btn btn-secondary btn-sm">
                                        <i class="fas fa-eraser"></i>
                                    </a>
                                </div>
                            </div>

                    </div>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>

                            <th scope="col">#</th>
                            <th scope="col">Service</th>
                            <th scope="col">Kategori</th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;
                        foreach ($content as $row) : $no++; ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td>
                                    <p>
                                        <?= $row->service_title ?>
                                    </p>
                                </td>
                                <td><span class="badge badge-primary"><i class="fas fa-tags"> <?= $row->category_title ?> </i></span></td>
                                <td>
                                    <?= form_open(base_url("/service/delete/$row->id"), ['method' => 'POST']) ?>
                                    <?= form_hidden('id', $row->id) ?>
                                    <a href="<?= base_url("service/edit/$row->id") ?>">
                                        <i class="fas fa-edit text-info"></i>

                                    </a>
                                    <button type="submit" class="btn btn-sm" onclick="return confirm('yakin hapus?')">
                                        <i class="fas fa-trash text-danger"></i>
                                    </button>
                                    <?= form_close() ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

                <nav aria-label="Page navigation example">
                    <?= $pagination ?>
                </nav>

            </div>
        </div>
    </div>
    </div>
</main>