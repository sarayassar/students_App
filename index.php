<?php
session_start();
$error_message = isset($_SESSION['error_message']) ? $_SESSION['error_message'] :'';
unset($_SESSION['error_message']);
?>






<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container login-container p-4 border rounded shadow-sm">
        <h2 class="text-center mb-4">تسجيل دخول للطلاب</h2>
        <?php if($error_message): ?>
            <div class="alert alert-danger text-center"><?php echo $error_message; ?></div>
            <?php endif; ?>
        <form action="login_process.php" method="POST">
            <div class="mb-3">
                <label for="national_id" class="form-label">الرقم الوطني</label>
                <input type="text" name="national_id" id="national_id" class="form-control" required pattern="[0-9]{10}">
            </div>
            <div class="mb-3">
                <label for="birth_date" class="form-label">تاريخ الميلاد</label>
                <input type="date" class="form-control" name="birth_date" id="birth_date" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">تسجيل الدخول</button>
            </div>
        </form>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>