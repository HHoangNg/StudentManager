<?php require_once "../login1/connect.php" ?>
<?php
session_start();
$userID = $_SESSION['user_id'];

$sql = "SELECT * FROM student WHERE student_id = '$userID'";
$result = $conn->query($sql);

if ($result) {
  // Lấy dữ liệu từ kết quả truy vấn
  $userData = mysqli_fetch_assoc($result);

  // Đóng kết nối
  
} else {
  die("Lỗi truy vấn: " . mysqli_error($conn));
}
$sql1 = "SELECT * FROM subject WHERE student_id = '$userID'";
$result1 = $conn->query($sql1);

if ($result1) {
  // Lấy dữ liệu từ kết quả truy vấn
  $userData1 = mysqli_fetch_assoc($result1);

  // Đóng kết nối
  mysqli_close($conn);
} else {
  die("Lỗi truy vấn: " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang chủ</title>
  <link rel="stylesheet" href="student_index.css">
  <link rel="icon" href="../image/logo.jpg" type="image/x-icon">
</head>

<body>
  <header>
    <div style="display: flex; align-items: center; justify-content: left;">
      <img src="../image/logo.jpg" alt="">
      <h1 style="width: 450px; text-align: center; background-color: #ffd83f; border-radius: 15px;">Bộ giáo dục và đào tạo trường THPT Số 1 Bảo Yên</h1>
    </div>

    <div style="display: flex; position: absolute; top: 10px; right: 60px; align-items: center;" class="profile">
      <h1 style="background-color: #ffd83f; border-radius: 4px;">Xin chào, <?php echo $userData['name'] ?></h1>
      <span class="dropdown_icon"></span>
      <div class="dropdown_content">
        <a href="#">Sửa thông tin</a>
        <a href="../logout/logout.html">Đăng xuất</a>
      </div>
    </div>

  </header>
  <hr>
  <!-- <iframe src="../login1/login.html" width="0" height="0" frameborder="0"></iframe> -->

  <div >
    <div class="student_info">
      <p>Tên: <?php echo $userData['name'] ?></p>
      <p>Mã học sinh: <?php echo $userData['student_id'] ?></p>
      <p>Lớp: <?php echo $userData['class'] ?></p>
      <p>Năm sinh: <?php echo $userData['birth'] ?></p>
      <p>Số điện thoại: <?php echo $userData['phone'] ?></p>
      <img src="../image/user/student.PNG" alt="">
    </div>
    
  </div>

  <div class="student_point" style="display: flex; gap:50px;">
  <div style="flex-direction: column;">
    <h2>diem</h2>
    <p><?php echo $userData1['points']?></p>
  </div>
  <div style="flex-direction: column;">
    <h2>mon</h2> 
    <p><?php echo $userData1['subject_name']?></p>
  </div>
       
  </div>
</body>

</html>