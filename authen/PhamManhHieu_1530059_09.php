<?php

require '../config.php';
if (isset($_POST['submit'])) {

    try {
        // create connection
        $connection = new PDO($dsn, $username, $password, $options);

        // insert new user
        $new_bb = array(
            "TenBB" => $_POST['TenGV'],
            "TomTatBB" => $_POST['GioiTinh'],
            "MaGV" => $_POST['NgaySinh']
        );

        $sql = sprintf("INSERT INTO %s (%s) VALUES (%s)",
            "BaiBao",
            implode(", ", array_keys($new_bb)),
            ":" . implode(", :", array_keys($new_bb)));

        $statement = $connection->prepare($sql);
        $statement->execute($new_bb);

    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

?>

<?php include '../templates/header.php' ?>

<h2>Them Moi Giang Vien</h2>

<form method="post">
    <label for="TenBB">Ten Giang vien</label>
    <input type="text" name="TenBB" id="TenBB">
    <label for="TomTatBB">Gioi Tinh</label>
    <input type="text" name="TomTatBB" id="TomTatBB">
    <label for="MaGV">Ngay Sinh</label>
    <input type="number" name="MaGV" id="MaGV">
    <br/>
    <br/>
    <input type="submit" name="submit" value="Submit">
    <input type="reset" name="reset" value="Reset">
    <br/>
    <br/>
    <a href="PhamManhHieu_1530059_03.php">Quay Lai</a>
</form>

<?php include '../templates/footer.php' ?>
