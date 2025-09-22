<?php
session_start();
require_once 'db_connect.php';
if(!isset($_SESSION['user_id']))
{
header("Location: index.php");
exit;
}
$username = $_SESSION['username']; // تم تصحيح هذا السطر
$sql = "SELECT subject_id, subject_name FROM subjects";
$subjects_results = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav class="navbar navbar-light bg-light p-3">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1"><?php echo htmlspecialchars($username); ?></span>
            <a href="logout.php" class="btn btn-danger">تسجيل الخروج</a>
        </div>

    </nav>
    <div class="container mt-4">
        <h2 class="mb-4 text-center">ادخل علاماتك لحساب المعدل</h2>
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <?php
            if($subjects_results->num_rows>0)
            {
                while($row =$subjects_results->fetch_assoc())
                {
                    echo '
                    <div class="col">
                    <div class="card h-100">
                    <div class="card-body text-center">
                    <h5 class="card-title">'.htmlspecialchars($row["subject_name"]).'</h5>
                    <div class="mb-3">
                    <label for="grade-'.$row["subject_id"].'" class="form-label">الدرجة من100</label>
                    <input type="number" class="form-control subject-grade" id="grade-'.$row["subject_id"].'" min="0" max="100">
                    </div>
                    </div>
                    </div>
                    </div>
                    ';
                }
            }
            else{
                echo '<p class="text-center">لا توجد مواد للعرض.</p>';
            }
            ?>
        </div>
        <div class="text-center mt-5">
            <button id="calculate-btn" class="btn btn-success btn-lg">احسب المعدل</button>
            <div id="result" class="mt-4 fs-3 fw-bold"></div>
        </div>
    </div>
    
   <script src="js/bootstrap.bundle.min.js"></script> 
   <script src="js/main.js"></script>
</body>
</html>