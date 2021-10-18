<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, tbody, td, tr {
            border: 1px solid #333;
        }

        td, tr {
            padding: 8px;
        }

        table {
            margin-top: 16px;
        }

        a {
            text-decoration: none;
            color: #000;
            padding: 8px 8px;
        }

        a:hover {
            color: red;
        }
    </style>
</head>
<body>
    <h1>Thông tin sinh viên</h1>
    <a href='createStudent.php'>Thêm Sinh viên</a>
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

    ?>
</body>
</html>