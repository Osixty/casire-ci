<?= $this->extend('/layout/layout_user') ?>
<?= $this->section('title') ?>Checkout<?= $this->endSection() ?>
<?= $this->section('main') ?>

<link rel="stylesheet" href="/css/checkout.css">
<div class="container-fluid">
    <div class="container">
        <div class="row my-5">
            <div class="col-lg-6 col-md-12 ">
                <form>
                    <div class="col mb-3 ">
                        <div class="col">
                            <h3>Contact Information</h3>
                        </div>
                        <div class="col">
                            <input type="email" class="form-control" placeholder="Email" aria-describedby="emailHelp" value=" <?= $email ?> ">
                        </div>
                    </div>
                    <div class="col mb-3 form-check">
                        <input type="checkbox" class="form-check-input">
                        <label class="form-check-label" for="exampleCheck"> Email me with news and offers</label>
                    </div>
                    <div class="col mb-3">
                        <div class="row">
                            <div class="col-lg col-md col-sm-12 mb-3">
                                <input type="text" class="form-control" placeholder="First name" aria-label="First name">
                            </div>
                            <div class="col-lg col-md col-sm-12">
                                <input type="text" class="form-control" placeholder="Last name" aria-label="Last name">
                            </div>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <input class="form-control" placeholder="Alamat">
                    </div>
                    <div class="col mb-3">
                        <input class="form-control" placeholder="Kecamatan">
                    </div>
                    <div class="col mb-3">
                        <input class="form-control" placeholder="Kota">
                    </div>
                    <div class="col mb-3">
                        <div class="row">
                            <div class="col-lg col-md col-sm-12 mb-3">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Province</option>
                                    <option>Aceh</option>
                                    <option>Bali</option>
                                    <option>Bangka belitung</option>
                                    <option>Banten</option>
                                    <option>Bengkulu</option>
                                    <option>Jawa barat</option>
                                    <option>Jawa tengah</option>
                                    <option>Jawa timur</option>
                                    <option>Kalimantan barat</option>
                                    <option>Kalimantan tengah</option>
                                    <option>Kalimantan timur</option>
                                    <option>Kalimantan selatan</option>
                                </select>
                            </div>
                            <div class="col-lg col-md col-sm-12">
                                <input class="form-control" placeholder="Postal code">
                            </div>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <input class="form-control" placeholder="Phone Number">
                    </div>
                    <a href="" class="btn btn-dark mb-3">Continue to shopping</a>
                </form>
            </div>

            <div class="col-lg-5 col-md-12 offset-lg-1">
                <div class="sidebar">
                    <div class="row mb-2">
                        <div class="col-lg-2 col-md-3 col-sm-2">
                            <img src="image/grey.png" class="img-fluid" alt="">
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5">
                            <div class="row mb-2">
                                <label for="" href="" class="pname">Nama produk</label>
                            </div>
                            <div class="row mb-2 warna">
                                <label for="">Warna</label>
                            </div>
                        </div>
                        <!-- Jumlah produk -->
                        <div class="col-lg-1 col-md-1 col-sm-1">
                            <label for="" class="jumlah">2</label>
                        </div>
                        <div class="col-lg-4 col-md-3 col-sm-4">
                            <label for="" class="harga1">Rp 49.000</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row mt-3">
                            <div class="col-lg-7 col-md-8">
                                <input type="text" class="form-control" placeholder="Gift card/discount code">
                            </div>
                            <div class="col-lg-5 col-md-4 col-sm-6">
                                <button class="btn btn-dark">Apply</button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <div class="col pname">
                            <label>Subtotal</label>
                        </div>
                        <div class="col harga2">
                            <label>Rp. 149.000</label>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col pname">
                            <label>Shippingl</label>
                        </div>
                        <div class="col harga2">
                            <label>Rp. 19.000</label>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col total">
                            <label>Total</label>
                        </div>
                        <div class="col harga">
                            <label for="">Rp. 499.000</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $this->endSection() ?>