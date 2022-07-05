<?= $this->extend('/layout/layout_user') ?>
<?= $this->section('title') ?>Checkout<?= $this->endSection() ?>
<?= $this->section('main') ?>

<div class="container-fluid">
    <div class="container">
        <div class="row my-5">
            <div class="col-lg col-md-12 ">
                <form>
                    <div class="col mb-3 ">
                        <h3>Contact Information</h3>
                        <input type="email" class="form-control" placeholder="Email" aria-describedby="emailHelp" value=" <?= $email ?> ">
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
                    <a href="" class="btn btn-dark">Continue to shopping</a>
                </form>
            </div>

            <div class="col-lg col-md-12 offset-lg-1 mt-md-5">
                <div class="sidebar">
                    <div class="mb-3">
                        <div class="row mt-3">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Gift card/discount code">
                            </div>
                            <div class="col-lg col-md col-sm-6">
                                <button class="btn btn-dark">Apply</button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <label>Subtotal</label>
                    </div>
                    <div class="mb-3">
                        <label>Shipping</label>
                    </div>
                    <div class="mb3">
                        <label>Total</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $this->endSection() ?>