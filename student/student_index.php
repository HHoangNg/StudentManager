<?php require_once "../login1/connect.php" ?>
<?php
session_start();
$students_id = $_SESSION['user_id'];
$sql = "SELECT * FROM student WHERE student_id = '$students_id'";
$result = $conn->query($sql);
if ($result) {
  $student_data = $result->fetch_assoc();
} else {
  die("loi truy van" . mysqli_error($conn));
}
function get_point($student_id, $conn) {
  $sql = "SELECT points FROM point WHERE student_id = '$student_id' ORDER BY subject_id";
  $result = $conn->query($sql);
  if ($result) {
    
    // Lấy dữ liệu từ kết quả truy vấn
    while ($userData1 = $result->fetch_assoc()) {
      
      echo $userData1['points'];
      echo "<br><hr>";
    }
  } else {
    die("Lỗi truy vấn: " . mysqli_error($conn));
  }
}
function get_subject_name($conn) {
  $sql = "SELECT * FROM subject";
  $result = $conn->query($sql);
  if ($result) {
    // Lấy dữ liệu từ kết quả truy vấn
    while ($userData1 = $result->fetch_assoc()) {
      echo $userData1['subject_name'];
      echo "<br><hr>";
    }
  } else {
    die("Lỗi truy vấn: " . mysqli_error($conn));
  }
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
      <h1 style="background-color: #ffd83f; border-radius: 4px;">Xin chào, <?php echo $student_data['name'] ?></h1>
      <span class="dropdown_icon"></span>
      <div class="dropdown_content">
        <a href="../logout/logout.html">Đăng xuất</a>
      </div>
    </div>

  </header>
  <hr>
  <!-- <iframe src="../login1/login.html" width="0" height="0" frameborder="0"></iframe> -->


  <div class="student_info">
    <p>Tên: <?php echo $student_data['name'] ?></p>
    <p>Mã học sinh: <?php echo $student_data['student_id'] ?></p>
    <p>Lớp: <?php echo $student_data['class'] ?></p>
    <p>Năm sinh: <?php echo $student_data['birth'] ?></p>
    <p>Số điện thoại: <?php echo $student_data['phone'] ?></p>
    <img src="../image/user/student.PNG" alt="">
  </div>

  <div class="student_point" style="display: flex; gap:50px;">
    <div style="flex-direction: column;">
      <h2>Điểm</h2>
      <p><?php get_point($students_id, $conn); ?></p>
    </div>
    <div style="flex-direction: column;">
      <h2>Môn</h2>
      <p><?php get_subject_name($conn); ?></p>
    </div>

  </div>
</body>

</html>