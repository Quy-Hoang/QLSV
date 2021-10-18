<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $MaSinhVien = $_GET['MaSinhVien'];
        $conn = mysqli_connect("localhost", "root", "", "70dctt23");
        if ($conn == false) {
            die("connect fial " . mysqli_connect_error($conn));
        } else { 
            $query = "DELETE FROM sinhvien where MaSinhVien = '".$MaSinhVien."'";
            $result = mysqli_query($conn, $query);
            if ($result > 0 ) {
                echo "
                <script type='text/javascript'>" .
                    "alert('Xóa dữ liêu thành công');" .
                    "window.location.href='index.php'" .
                "</script>" ;
            } else {
                echo "Data is empty";
            }
        }
    ?>
</body>
</html>