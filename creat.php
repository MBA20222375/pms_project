<?php include('inc/header.php'); ?>

<link href="./css/styles.css" rel="stylesheet" />

<div class="container mt-5">
    <h2>add prodect</h2>

<form action="/pms-front/handlers/prodect/Product.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
            <label for="name" class="form-label">Product Name </label>
            <input type="text" id="name" name="name" class="form-control">
        </div>

        <div class="mb-3">
            <label for="Price" class="form-label"> Price</label>
            <input type="text" id="Price" name="Price" class="form-control">
        </div>

        <div class="mb-3">
            <label for="Text" class="form-label">Details</label>
            <input type="Text" id="Details" name="Details" class="form-control">

        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Product Image</label>
            <input type="file" id="image" name="image" class="form-control" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


<?php include('inc/footer.php'); ?>
