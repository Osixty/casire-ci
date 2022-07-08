<?= $this->extend('/layout/layout_user') ?>
<?= $this->section('title') ?>Cart<?= $this->endSection() ?>
<?= $this->section('main') ?>

<link rel="stylesheet" href="/css/cart.css">
<div class="container-fluid">
    <div class="container">
        <div class="row mt-3">
            <h2>Shopping Cart</h2>
            <hr>
        </div>
        <div class="row">
            <div class="col-lg-7 col-md-12 col-sm-12">
                <!-- product view -->
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <img src="image/grey.png" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <div class="row mb-2">
                            <label for="" href="" class="pname">Nama produk</label>
                        </div>
                        <div class="row mb-2">
                            <label for="">Warna</label>
                        </div>
                        <div class="row mb-2">
                            <label for="" class="harga1">Rp 49.000</label>
                        </div>
                        <!-- Counter -->
                        <div class="counter">
                            <span class="down" onClick='decreaseCount(event, this)'>-</span>
                            <input type="text" value="1">
                            <span class="up" onClick='increaseCount(event, this)'>+</span>
                        </div>
                        <div class="row">
                            <h4>
                                <strong>Total :</strong>
                            </h4>
                        </div>
                        <div class="row">
                            <label for="">Rp. 199.000</label>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 offset-lg-1">
                <div class="row mb-3">
                    <div class="col pname">
                        <label>Subtotal</label>
                    </div>
                    <div class="col harga2">
                        <label>Rp. 449.000</label>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label>Total Savings</label>
                    </div>
                    <div class="col">
                        <label for="">Rp. 199.000</label>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox">
                        <label class="form-check-label" for="gridCheck">
                            I Agree with the Terms & Conditions
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <a href="/checkout" class="btn btn-dark col-lg-12 col-md-12">Checkout</a>
                </div>
                <div>
                    <a href="" class="linkshop">Continue shopping</a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Custom scripts -->
<script type="text/javascript" src="<?= base_url() ?>/js/counter.js"></script>

<?= $this->endSection() ?>