<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>them</title>
</head>
<body>
    <?php require_once "connect.php"?>
    <?php
        if(isset($_POST["add"])) {
            $name = $_POST["ten"];
            $passWd = $_POST["mk"];
            $stu_id = 2;
            if($conn->query("INSERT INTO user(name, password) VALUES(N'$name', N'$passWd')")) {
                echo "<script>alert('them thong cong')</script>";
            }
            else {
                echo "<script>alert('them that bai')</script>";
            }
        }
        $sql = "SELECT * FROM user WHERE name = 'hoang1'";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            echo "<h1>Ten hoc sinh:</h1>";
            while($row = $result->fetch_assoc()) {
                echo "<p></p>". $row['name']. "<p> </p>". $row['password'];
            }
        }
        $conn->close();
    ?>
    <form action="" method="post">
        <input type="text" placeholder="nhap ten" name="ten">
        <input type="text" placeholder="nhap[ mmk" name="mk">
        <button type="submit" name="add">them</button>
    </form>
</body>
</html>