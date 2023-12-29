<?php require_once "../login1/connect.php" ?>
<?php require_once "get_student_infor.php"?>
<?php require_once "get_student_point.php"?>
<?php
  session_start();
  $teachers_id = $_SESSION['user_id'];
  $sql = "SELECT * FROM teacher WHERE teacher_id = '$teachers_id'";
  $result = $conn->query($sql);
  if ($result) {
    $teacher_data = $result->fetch_assoc();
  } else {
    die("Lỗi truy vấn" . mysqli_error($conn));
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang chủ</title>
  <link rel="stylesheet" href="teacher_index.css">
  <link rel="icon" href="../image/logo.jpg" type="image/x-icon">
</head>

<body>
  <header>
    <div style="display: flex; align-items: center; justify-content: left;">
      <img src="../image/logo.jpg" alt="">
      <h1 style="width: 450px; text-align: center; background-color: #ffd83f; border-radius: 15px;">Bộ giáo dục và đào tạo trường THPT Số 1 Bảo Yên</h1>
    </div>

    <div style="display: flex; position: absolute; top: 10px; right: 60px; align-items: center;" class="profile">
      <h1 style="background-color: #ffd83f; border-radius: 4px;">Xin chào, <?php echo $teacher_data['name'] ?></h1>
      <span class="dropdown_icon"></span>
      <div class="dropdown_content">
        <a href="../logout/logout.html">Đăng xuất</a>
      </div>
    </div>
  </header>

  <hr>

  <div class="teacher_info">
    <p>Tên: <?php echo $teacher_data['name'] ?></p>
    <p>Mã giáo viên: <?php echo $teacher_data['teacher_id'] ?></p>
    <p>Chuyên ngành: <?php echo $teacher_data['major'] ?></p>
    <p>Chức vụ: <?php echo $teacher_data['pos'] ?></p>
    <p>Số điện thoại: <?php echo $teacher_data['phone'] ?></p>
    <img src="../image/user.png" alt="">
  </div>
  <div class="teacher_function">
    <div class="student_infors" style="display: none;">
      <div style="display: flex; gap: 10px;">
        <h4>Mã học sinh</h4>
        <h4>Tên học sinh</h4>
        <h4>Năm sinh</h4>
        <h4>Lớp</h4>
        <h4>Số điện thoại</h4>
      </div>
      <div style="display: flex; gap: 20px; flex-direction: column;">
        <?php get_student_infor($conn) ?>
      </div>
    </div>
    <div class="student_point" style="display: none;">
      <div style="display: flex; gap: 10px;">
        <h4>Mã học sinh</h4>
        <h4>Tên học sinh</h4>
        <h4>Mã môn</h4>
        <h4>Tên môn học</h4>
        <h4>Điểm</h4>
      </div>
      <div style="display: flex; gap: 20px; flex-direction: column;">
        <?php get_student_point($conn); ?>
      </div>
    </div>
    <button id="btn_get_infor">xem thong tin hoc sinh</button>
    <button id="btn_get_point" style="margin-top: 40px;">xem diem hoc sinh</button>
  </div>
  <script>
    let btn_get_infor = document.getElementById("btn_get_infor")
    let btn_get_point=  document.getElementById("btn_get_point")
    let student_infors = document.getElementsByClassName("student_infors")
    let student_point = document.getElementsByClassName("student_point")
    btn_get_infor.addEventListener('click', () => {
      btn_get_infor.style.display = 'none'
      student_infors[0].style.display = 'block'
      student_point[0].style.display = 'none'
      btn_get_point.style.display = 'block'
    })
    btn_get_point.addEventListener('click', () => {
      btn_get_point.style.display = 'none'
      btn_get_infor.style.display = 'block'
      student_point[0].style.display = 'block'
      student_infors[0].style.display = 'none'
    })
  </script>
</body>
</html>