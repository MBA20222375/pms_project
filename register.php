<?php include "./inc/header.php"?>
<div class="container mt-5">
    <h2>Register</h2>
    <form action="./handlers/auth/register.php" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" id="name" name="name" class="form-control">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="text" id="email" name="email" class="form-control">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" id="password" name="password" class="form-control">
        </div>

        <div class="mb-3">
            <label for="confirm_password" class="form-label">Confirm Password:</label>
            <input type="password" id="password" name="confirm_password" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php include "./inc/footer.php"?>
