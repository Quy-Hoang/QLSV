<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CreateStudent</title>
</head>
<body>
    <form method="post">
        <h2>Thêm mới dữ liệu</h2>
        <table>
            <tr>
                <td>Mã sinh viên</td>
                <td>
                    <input type="text" name="txtID" id="txtID"/>
                </td>
            </tr>

            <tr>
                <td>Họ vã tên</td>
                <td>
                    <input type="text" name="txtName" id="txtName"/>
                </td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <button type="submit" id="btnSave" name="btnSave">Ghi giữ liệu</button>
                    <a href="index.php">Quay lại</a>
                </td>
            </tr>
        </table>
    </form>

    <?php
        function InsertData() {
            $conn = mysqli_connect("localhost", "root", "", "70dctt23");
            if ($conn == false) {
                die("connect fial " . mysqli_connect_error($conn));
            } else {
                $ID = $_POST['txtID'];
                $name = $_POST['txtName'];
                $query = "INSERT INTO sinhvien(MaSinhVien, TenSinhVien) VALUES ('$ID', '$name')";

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