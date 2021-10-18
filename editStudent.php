<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/editStudent.css" />
</head>
<body>
    <?php
        $MaSinhVien = $_GET['MaSinhVien'];
        $TenSinhVien = "";
        $NgaySinh = "";
        $QueQuan = "";
        $Email = "";

        $conn = mysqli_connect("localhost", "root", "", "70dctt23");
        if ($conn == false) {
            die("connect fial " . mysqli_connect_error($conn));
        } else { 
            $query = "SELECT * FROM sinhvien where MaSinhVien = '".$MaSinhVien."'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0 ) {
                
                while ($row = mysqli_fetch_assoc($result)) {
                   $TenSinhVien = $row['TenSinhVien'];
                   $QueQuan = $row['QueQuan'];
                   $NgaySinh = $row['NgaySinh'];
                   $Email = $row['Email'];
                }
            } else {
                echo "Data is empty";
            }
        }
    ?>

    <h2 id="heading">Edit dữ liệu</h2>
    <form method="post" id="container">
        <table>
            <tr>
                <td class="name">Mã sinh viên</td>
                <td>
                    <input type="text" name="txtID" id="txtID" class="txtInput" value="<?php echo $MaSinhVien ?>"/>
                </td>
            </tr>

            <tr>
                <td class="name">Họ vã tên</td>
                <td>
                    <input type="text" name="txtName" id="txtName" class="txtInput" value="<?php echo isset($_POST['txtName']) ? $_POST['txtName'] : $TenSinhVien ?>"/>
                </td>
            </tr>

            <tr>
                <td class="name">Ngày Sinh</td>
                <td>
                    <input type="text" name="txtNgaySinh" id="txtNgaySinh" class="txtInput" value="<?php echo isset($_POST['txtNgaySinh']) ? $_POST['txtNgaySinh'] : $NgaySinh ?>"/>
                </td>
            </tr>

            <tr>
                <td class="name">Quê quán</td>
                <td>
                    <textarea name="txtAddress"class="txtInput" ><?php echo isset($_POST['txtAddress']) ? $_POST['txtAddress'] : $QueQuan ?></textarea>
                </td>
            </tr>

            <tr>
                <td class="name">Email</td>
                <td>
                    <input type="text" name="txtEmail" id="txtEmail" class="txtInput" value="<?php echo isset($_POST['txtEmail']) ? $_POST['txtEmail'] : $Email ?>"/>
                </td>
            </tr>
        </table>
        <div>
            <button type="submit" id="btnSave" name="btnSave">Ghi giữ liệu</button>
            <a href="index.php">Quay lại</a>
        </div>
    </form>

    

    <?php 
        function UpdateData() {
            $conn = mysqli_connect("localhost", "root", "", "70dctt23");
            if ($conn == false) {
                die("connect fial " . mysqli_connect_error($conn));
            } else {
                $ID = $_POST['txtID'];
                $name = $_POST['txtName'];
                $QueQuan = $_POST['txtAddress'];
                $NgaySinh = $_POST['txtNgaySinh'];
                $Email = $_POST['txtEmail'];
                $query = "UPDATE sinhvien SET TenSinhVien = '".$name."', NgaySinh = '".$NgaySinh."', Email = '".$Email."', QueQuan = '".$QueQuan."' WHERE MaSinhVien = '".$ID."'";

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
            UpdateData();
        }
    ?>

</body>
</html>