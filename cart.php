<?php require_once('inc/header.php'); ?>

<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Shop in style</h1>
            <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
        </div>
    </div>
</header>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Product 1</td>
                            <td>$9.99</td>
                            <td>
                                <input type="number" value="1">
                            </td>
                            <td>$9.99</td>
                            <td>
                                <a href="#" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Product 2</td>
                            <td>$19.99</td>
                            <td>
                                <input type="number" value="2">
                            </td>
                            <td>$9.99</td>
                            <td>
                                <a href="#" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Product 2</td>
                            <td>$19.99</td>
                            <td>
                                <input type="number" value="2">
                            </td>
                            <td>$9.99</td>
                            <td>
                                <a href="#" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                Tatal Price
                            </td>
                            <td colspan="3">
                                <h3>3325 $</h3>
                            </td>
                            <td>
                                <a href="checkout.php" class="btn btn-primary">Checkout</a>
                            </td>
                        </tr>
                </table>
            </div>
        </div>
    </div>
</section>
<?php require_once('inc/footer.php'); ?>