<?php
require "../config.php";
if (isset($_POST['submit'])) {
    try {
        $connection = new PDO($dsn, $username, $password, $options);

        $gv = [
            "MaGV" => $_POST['MaGV'],
            "TenGV" => $_POST['TenGV'],
            "GioiTinh" => $_POST['GioiTinh'],
            "NgaySinh" => $_POST['NgaySinh'],
            "HocHam" => $_POST['HocHam'],
        ];

        $sql = "UPDATE giangvien 
            SET MaGV = :MaGV, 
              TenGV = :TenGV, 
              GioiTinh = :GioiTinh, 
              NgaySinh = :NgaySinh, 
              HocHam = :HocHam
            WHERE MaGV = :MaGV";

        $statement = $connection->prepare($sql);
        $statement->execute($gv);

    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
?>


<?php

if (isset($_GET['id'])) {
    try {
        $connection = new PDO($dsn, $username, $password, $options);
        $id = $_GET['id'];

        $sql = "SELECT * FROM giangvien WHERE MaGV = :id";

        $statement = $connection->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();

        $gv = $statement->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

?>

<?php include '../templates/header.php' ?>

<h2>Sua giang vien</h2>

<form method="post">
    <input type="hidden" name="MaGV" value="<?php echo $gv['MaGV'] ?>">
    <label for="TenGV">Ten Giang vien</label>
    <input type="text" name="TenGV" id="TenGV" value="<?php echo $gv['TenGV'] ?>">
    <label for="GioiTinh">Gioi Tinh</label>
    <input type="number" name="GioiTinh" id="GioiTinh" value="<?php echo $gv['GioiTinh'] ?>">
    <label for="NgaySinh">Ngay Sinh</label>
    <input type="date" name="NgaySinh" id="NgaySinh" value="<?php echo $gv['NgaySinh'] ?>">
    <label for="HocHam">Hoc Ham</label>
    <input type="text" name="HocHam" id="HocHam" value="<?php echo $gv['HocHam'] ?>">
    <br/>
    <br/>
    <input type="submit" name="submit" value="Update">
</form>

<br/>
<br/>
<a href="PhamManhHieu_1530059_02.php">Back</a>

<?php include '../templates/footer.php' ?>
