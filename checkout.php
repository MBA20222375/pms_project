<?php 
require_once('inc/header.php'); 
?>

<!-- Header -->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Checkout</h1>
            <p class="lead fw-normal text-white-50 mb-0">Review your cart and complete your order</p>
        </div>
    </div>
</header>

<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">

            <!-- Products Summary -->
            <div class="col-4">
                <div class="border p-2">
                    <h4>Cart Items</h4>
                    <ul class="list-unstyled">
                        <?php
                        $grandTotal = 0;
                        if(!empty($_SESSION['cart'])):
                            foreach($_SESSION['cart'] as $item):
                                $total = $item['price'] * $item['quantity'];
                                $grandTotal += $total;
                        ?>
                        <li class="border p-2 my-1">
                            <?php echo htmlspecialchars($item['name']); ?> - 
                            <span class="text-success mx-2"><?php echo $item['quantity']; ?> x $<?php echo number_format($item['price'],2); ?></span>
                        </li>
                        <?php endforeach; endif; ?>
                    </ul>
                    <h5>Total: $<?php echo number_format($grandTotal,2); ?></h5>
                </div>
            </div>

            <!-- Checkout Form -->
            <div class="col-8">
                <?php
                // عرض الرسائل
                if(function_exists('showMessages')) {
                    showMessages();
                }
                ?>

                <form action="./handlers/auth/checkout.php" method="POST" class="form border my-2 p-3">

                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="Address">Address</label>
                        <input type="text" name="Address" id="Address" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="Phone">Phone</label>
                        <input type="number" name="number" id="Phone" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="Notes">Notes</label>
                        <input type="text" name="Notes" id="Notes" class="form-control">
                    </div>

                    <div class="mb-3">
                        <input type="submit" value="Send Order" class="btn btn-success">
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>

<?php require_once('inc/footer.php'); ?>
