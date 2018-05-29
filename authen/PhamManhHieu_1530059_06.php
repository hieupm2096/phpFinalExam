<?php

require '../config.php';
if (isset($_POST['submit'])) {

    try {
        // create connection
        $connection = new PDO($dsn, $username, $password, $options);

        // insert new user
        $new_gv = array(
            "TenGV" => $_POST['TenGV'],
            "GioiTinh" => $_POST['GioiTinh'],
            "NgaySinh" => $_POST['NgaySinh'],
            "HocHam" => $_POST['HocHam']
        );

        $sql = sprintf("INSERT INTO %s (%s) VALUES (%s)",
            "GiangVien",
            implode(", ", array_keys($new_gv)),
            ":" . implode(", :", array_keys($new_gv)));

        $statement = $connection->prepare($sql);
        $statement->execute($new_gv);

    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

?>

<?php include '../templates/header.php' ?>

<h2>Them Moi Giang Vien</h2>

<form method="post">
    <label for="TenGV">Ten Giang vien</label>
    <input type="text" name="TenGV" id="TenGV">
    <label for="GioiTinh">Gioi Tinh</label>
    <input type="number" name="GioiTinh" id="GioiTinh">
    <label for="NgaySinh">Ngay Sinh</label>
    <input type="date" name="NgaySinh" id="NgaySinh">
    <label for="HocHam">Hoc Ham</label>
    <input type="text" name="HocHam" id="HocHam">
    <br/>
    <br/>
    <input type="submit" name="submit" value="Submit">
    <input type="reset" name="reset" value="Reset">
    <br/>
    <br/>
    <a href="PhamManhHieu_1530059_02.php">Quay Lai</a>
</form>

<?php include '../templates/footer.php' ?>
