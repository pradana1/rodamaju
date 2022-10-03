<main role="main" class="container">
    <?php $this->load->view('layouts/_alert') ?>

    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            Kategori : <strong><?= isset($category) ? $category : 'Semua Kategori' ?></strong>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Produk -->
            <div class="row">
                <?php foreach ($content as $row) : ?>
                    <div class="col-md-6">

                        <div class="card mb-3">
                            <h5 class="card-header"><a href="<?= base_url("/shop/category/$row->category_slug") ?>" class="bagde bagde-primary"><i class="fas fa-tags"></i> <?= $row->category_title ?></a></h5>
                            <div class="card-body">
                                <h5 class="card-title"><?= $row->service_title ?></h5>
                                <p class="card-text"><?= $row->description ?></p>
                                <form action="<?= base_url("/keranjang/add") ?>" method="POST">
                                    <input type="hidden" name="id_service" value="<?= $row->id ?>">
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary">Go Booking Yuk</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                            </div>
                        </div>



                    </div>
                <?php endforeach ?>
            </div>

            <nav aria-label="Page navigation example">
                <?= $pagination ?>
            </nav>
        </div>


        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            Pencarian
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url("/shop/search") ?>" method="POST">
                                <div class="input-group">
                                    <input type="text" name="keyword" value="<?= $this->session->userdata('keyword') ?>" class="form-control">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            Kategori
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="<?= base_url('/') ?>">Semua Kategori</a></li>
                            <?php foreach (getCategories() as $category) : ?>
                                <li class="list-group-item"><a href="<?= base_url("/shop/category/$category->slug") ?>"><?= $category->title ?> <div class="badge badge-primary"> <?= $category->jumlah ?></div></a></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


</main>