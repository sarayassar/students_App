<?php
session_start();
session_unset();     // حذف جميع متغيرات الجلسة
session_destroy();   // تدمير الجلسة بالكامل
header("Location: index.php"); // إعادة توجيه المستخدم لصفحة تسجيل الدخول
exit;
?>