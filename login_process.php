<?php
session_start();
require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $national_id = $_POST['national_id'];
    $birth_date_input = $_POST['birth_date'];

    $dob_object = DateTime::createFromFormat('Y-m-d', $birth_date_input);

    if ($dob_object) {
        // تنسيق التاريخ ليطابق عمود DATE في قاعدة البيانات
        $birth_date = $dob_object->format('Y-m-d');
    } else {
        $_SESSION['error_message'] = "تنسيق تاريخ الميلاد غير صحيح.";
        header("Location: index.php");
        exit;
    }

    $national_id = $conn->real_escape_string($national_id);
    $birth_date = $conn->real_escape_string($birth_date);

    $sql = "SELECT user_id, username FROM users WHERE national_id = '$national_id' AND birth_date = '$birth_date'";
    $result=$conn->query($sql);
    
    if($result->num_rows==1) {
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];
        header("Location: dashboard.php");
        exit;
    } else {
        $_SESSION['error_message'] = "الرقم الوطني أو تاريخ الميلاد غير صحيح.";
        header("Location: index.php");
        exit;
    }
}
$conn->close();
?>