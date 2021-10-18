<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CreateStudent</title>
    <link rel="stylesheet" href="./assets/css/createStudent.css" />

</head>
<body>
    <h2 id="heading">Thêm mới dữ liệu</h2>  
    <form method="post" id="container">
        <table>
            <tr>
                <td  class="name">Mã sinh viên</td>
                <td>
                    <input type="text" name="txtID" id="txtID" class="txtInput"/>
                </td>
            </tr>

            <tr>
                <td class="name">Họ vã tên</td>
                <td>
                    <input type="text" name="txtName" id="txtName" class="txtInput"/>
                </td>
            </tr>

            <tr>
                <td class="name">Ngày Sinh</td>
                <td>
                    <input type="text" name="txtNgaySinh" id="txtNgaySinh" class="txtInput"/>
                </td>
            </tr>

            <tr>
                <td class="name">Quê Quán</td>
                <td>
                    <input type="text" name="txtAddress" id="txtAddress" class="txtInput"/>
                </td>
            </tr>

            <tr>
                <td class="name">Email</td>
                <td>
                    <input type="text" name="txtEmail" id="txtEmail" class="txtInput"/>
                </td>
            </tr>
        </table>
        <div>
            <button type="submit" id="btnSave" name="btnSave">Ghi giữ liệu</button>
            <a href="index.php">Quay lại</a>
        </div>
    </form>

    <?php
        function InsertData() {
            $conn = mysqli_connect("localhost", "root", "", "70dctt23");
            if ($conn == false) {
                die("connect fial " . mysqli_connect_error($conn));
            } else {
                $ID = $_POST['txtID'];
                $name = $_POST['txtName'];
                $NgaySinh = $_POST['txtNgaySinh'];
                $QueQuan = $_POST['txtAddress'];
                $Email = $_POST['txtEmail'];
                $query = "INSERT INTO sinhvien(MaSinhVien, TenSinhVien, QueQuan, NgaySinh, Email) VALUES ('$ID', '$name', '$QueQuan','$NgaySinh', '$Email')";

                $result = mysqli_query($conn, $query);
                if ($result == true) {
                    echo "thêm mới dữ liệu thành công";
                } else {
                    echo "Lỗi ghi dữ liệu" . mysqli_error($conn);
                }
            }
            mysqli_close($conn);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['btnSave'])) {
            InsertData();
        }
    ?>
</body>
</html>