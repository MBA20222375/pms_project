      <?php include "./inc/header.php"?>
        <div class="container mt-5">
    <h2>login</h2>
    <form action="../pms-front/handlers/auth/login.php" method="POST">
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="text" id="email" name="email" class="form-control">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" id="password" name="password" class="form-control">
        </div>

           <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php include "./inc/footer.php"?>
