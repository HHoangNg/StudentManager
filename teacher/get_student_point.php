<?php
    function get_student_point($conn) {
        $sql1 = "SELECT student_id, name FROM student";
        $sql2 = "SELECT subject_id, subject_name FROM subject";
        $sql3 = "SELECT points, student_id, subject_id FROM point";
        $result1 = $conn->query($sql1);
        $result2 = $conn->query($sql2);
        $result3 = $conn->query($sql3);
    
        if ($result1 && $result2 && $result3) {
          while ($student_data = $result1->fetch_assoc()) {
            while ($subject_data = $result2->fetch_assoc()) {
              while ($point_data = $result3->fetch_assoc()) {
                if ($student_data['student_id'] == $point_data['student_id'] && $subject_data['subject_id'] == $point_data['subject_id']) {
                  echo "<div style='display: flex; flex-direction: row;'>";
                  echo $student_data['student_id'] . "<div style='width: 50px;'></div>";
                  echo $student_data['name'] . "<div style='width: 60px;'></div>";
                  echo $subject_data['subject_id'] . "<div style='width: 30px;'></div>";
                  echo $subject_data['subject_name'] . "<div style='width: 30px;'></div>";
                  echo $point_data['points'] . "<div style='width: 30px;'></div>";
                  echo "</div>";
                }
              }
              // Reset the internal pointer of $result3 after each iteration of $result2
              $result3->data_seek(0);
            }
            // Reset the internal pointer of $result2 after each iteration of $result1
            $result2->data_seek(0);
          }
        } else {
          die("loi truy van" . mysqli_error($conn));
        }
    }
?>