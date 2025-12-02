<?php
// استدعاء الهيدر
require_once('inc/header.php'); 

$productsFile = __DIR__ . '/data/products.json';

if (file_exists($productsFile)) {
    $products = json_decode(file_get_contents($productsFile), true);
} else {
    $products = [];
}
?>

<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Shop in style</h1>
            <p class="lead fw-normal text-white-50 mb-0">With this shop homepage template</p>
        </div>
    </div>
</header>

<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

            <?php if (!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                    
                    <div class="col mb-5">
                        <div class="card h-100">
                            
                            <?php 
                            $productImage = isset($product['image']) ? $product['image'] : 'uploads/default.jpg';
                            ?>
                            <img class="card-img-top" src="/pms-front/<?php echo $productImage; ?>" alt="Product Image" />

                            <div class="card-body p-4">
                                <div class="text-center">
                                    <?php 
                                    $productName = isset($product['name']) ? $product['name'] : 'No Name';
                                    $productPrice = isset($product['price']) ? $product['price'] : 0;
                                    ?>
                                    
                                    <h5 class="fw-bolder"><?php echo $productName; ?></h5>
                                    <p>$<?php echo number_format($productPrice, 2); ?></p>
                                </div>
                            </div>

                           
                            <div class="text-center mb-3">
                                <?php 
                                $productId = isset($product['id']) ? $product['id'] : '';
                                ?>
                                
                                <!--  التعديل -->
                                <a href="edit.php?id=<?php echo $productId; ?>" class="btn btn-success btn-sm">Edit</a>
                                 <!-- زر المسح -->
                                <form action="handlers/prodect/delete.php" method="POST" style="display: inline-block;">
                                    <input type="hidden" name="id" value="<?php echo $productId; ?>">
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?');">Delete</button>
                                </form>
                                     <!--    Add to cart -->
                                          <a href="handlers/cart/cart.php" class="btn btn-outline-dark add-to-cart-btn"
                                             data-id="<?= $productId ?>"
                                            data-name="<?= htmlspecialchars($productName) ?>"
                                        data-price="<?= $productPrice ?>">
                                         Add to cart
                                    </a>
                                     </div>
                            
                        </div>
                    </div>
                    
                <?php endforeach; ?>
                
            <?php else: ?>
                <div class="col-12">
                    <p class="text-center">No products available.</p>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>

<?php 
// استدعاء الفوتر
require_once('inc/footer.php'); 
?>