<?php
// Bắt đầu bộ nhớ đệm đầu ra
ob_start();

// Mã PHP và thẻ HTML hiện tại
?>
<!DOCTYPE html>
<html>
<head>
    <title>Test Page</title>
</head>
<body>
    <h1>Hello, world!</h1>
    <p>This is a test page.</p>
</body>
</html>
<?php

// Xóa nội dung trong bộ nhớ đệm mà không làm gì cả
ob_clean();
?>
