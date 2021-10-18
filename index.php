<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/index.css" />
    
</head>
<body>
    <?php
        $TenSinhVien = "";
    ?>
    <h1 id="heading">Thông tin sinh viên</h1>
    <div id="container">
        <form method="Post" class="search">
            <input type="text" name="txtSearch" value="<?php echo isset($_POST['txtSearch']) ? $_POST['txtSearch'] : $TenSinhVien  ?>" />
            <button type="submit" name="btnSearch" id="btnSearch">Search</button>
        </form>
        <a href='createStudent.php' class="create">Thêm Sinh viên</a>
    </div>

    <?php
        //Lấy dữ liệu từ mysql
        //khai báo 
        $conn = mysqli_connect("localhost", "root", "", "70dctt23");
        if ($conn == false) {
            echo "connect fial " . mysqli_connect_error($conn);
        } else { 
            $query = "SELECT * FROM sinhvien";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0 ) {
                echo "<table id='tblMain'>";
                echo "<thead>";
                echo "<th>Id</th><th>Họ và Tên</th>";
                echo "<th>Ngày Sinh</th>";
                echo "<th>Que Quan</th>";
                echo "<th>Email</th>";
                echo "<th>Thao tác</th>";
                echo "<thead>";
                echo "<tbody>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['MaSinhVien'] . "</td>";
                    echo "<td>" . $row['TenSinhVien'] . "</td>";
                    echo "<td>" . $row['NgaySinh'] . "</td>";
                    echo "<td>" . $row['QueQuan'] . "</td>";
                    echo "<td>" . $row['Email'] . "</td>";
                    echo "<td>" . "<a href='editStudent.php?MaSinhVien=".$row["MaSinhVien"]."'>Sửa</a>" . " " . 
                            "<a 
                                onclick='return confirm(\"Bạn có muốn xóa dữ liệu không?\")' 
                                href='deleteStudent.php?MaSinhVien=".$row["MaSinhVien"]."' >Xóa
                            </a>" . 
                        "</td>";
                    echo "</tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "Data is empty";
            }
        } 
        mysqli_close($conn);
    ?>

    <?php 
        if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['btnSearch'])) {
            Search();
        }

        function Search() {
            $KeyWord = $_POST['txtSearch'];
            echo "<script type='text/javascript'>var main = document.getElementById('tblMain'); main.remove();</script>";
            $conn = mysqli_connect("localhost", "root", "", "70dctt23");
                if ($conn == false) {
                    echo "connect fial " . mysqli_connect_error($conn);
                } else { 
                    $query = "SELECT * FROM sinhvien WHERE TenSinhVien LIKE N'%".$KeyWord."%'";
                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result) > 0 ) {
                        echo "<table>";
                        echo "<thead>";
                        echo "<th>Id</th><th>Họ và Tên</th>";
                        echo "<th>Ngày Sinh</th>";
                        echo "<th>Que Quan</th>";
                        echo "<th>Email</th>";
                        echo "<th>Thao tác</th>";
                        echo "<thead>";
                        echo "<tbody>";
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['MaSinhVien'] . "</td>";
                            echo "<td>" . $row['TenSinhVien'] . "</td>";
                            echo "<td>" . $row['NgaySinh'] . "</td>";
                            echo "<td>" . $row['QueQuan'] . "</td>";
                            echo "<td>" . $row['Email'] . "</td>";
                            echo "<td>" . "<a href='editStudent.php?MaSinhVien=".$row["MaSinhVien"]."'>Sửa</a>" . " " . 
                                    "<a 
                                        onclick='return confirm(\"Bạn có muốn xóa dữ liệu không?\")' 
                                        href='deleteStudent.php?MaSinhVien=".$row["MaSinhVien"]."' >Xóa
                                    </a>" . 
                                "</td>";
                            echo "</tr>";
                        }
                        echo "</tbody></table>";
                    } else {
                        echo "Data is empty";
                    }
                } 
            mysqli_close($conn);
        }
    ?>
</body>
</html>