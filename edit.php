<?php include('inc/header.php'); ?>
<?php 
$id = $_GET['id'] ?? null;
$products = getProducts();
$product = false;

foreach($products as $pro){
    if($pro['id'] == $id){
        $product = $pro;
        break;
    }
}
?>

<link href="./css/styles.css" rel="stylesheet" />

<div class="container mt-5">
    <h2>Edit product</h2>

    <?php if($product): ?>
    <form action="handlers/prodect/Product.php" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">

        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" id="name" name="name" class="form-control"
                value="<?php echo htmlspecialchars($product['name']); ?>">
        </div>

        <div class="mb-3">
            <label for="Price" class="form-label">Price</label>
            <input type="text" id="Price" name="Price" class="form-control"
                value="<?php echo htmlspecialchars($product['price']); ?>">
        </div>

        <div class="mb-3">
            <label for="Details" class="form-label">Details</label>
            <input type="text" id="Details" name="Details" class="form-control"
                value="<?php echo htmlspecialchars($product['Details']); ?>">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Product Image</label>
            <input type="file" id="image" name="image" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php else: ?>
        <p class="text-center text-danger">Product not found!</p>
    <?php endif; ?>
</div>

<?php include('inc/footer.php'); ?>
