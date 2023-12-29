<?php
    function get_student_infor($conn) {
        $sql = "SELECT * FROM student ORDER BY class"; // lấy thông tin từ bảng student 
        $result = $conn->query($sql);
        if ($result) {
          while ($userData = $result->fetch_assoc()) {
            echo "<div style='display: flex; flex-direction: row;'>";
            echo $userData['student_id'] . "<div style='width: 50px;'></div>";
            echo $userData['name'] . "<div style='width: 60px;'></div>";
            echo $userData['birth'] . "<div style='width: 30px;'></div>";
            echo $userData['class'] . "<div style='width: 30px;'></div>";
            echo $userData['phone'] . "<div style='width: 30px;'></div>";
            echo "</div>";
          }
        } else {
          die("loi truy van" . mysqli_error($conn));
        }
      }
?>