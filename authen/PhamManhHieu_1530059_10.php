<?php
require "../config.php";
if (isset($_POST['submit'])) {
    try {
        $connection = new PDO($dsn, $username, $password, $options);

        $bb = [
            "MaBB" => $_POST['MaBB'],
            "TenBB" => $_POST['TenBB'],
            "TomTatBB" => $_POST['TomTatBB'],
            "MaGV" => $_POST['MaGV']
        ];

        $sql = "UPDATE baibao 
            SET MaBB = :MaBB, 
              TenBB = :TenBB, 
              TomTatBB = :TomTatBB, 
              MaGV = :MaGV
            WHERE MaBB = :MaBB";

        $statement = $connection->prepare($sql);
        $statement->execute($bb);

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

        $sql = "SELECT * FROM baibao WHERE MaBB = :id";

        $statement = $connection->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();

        $bb = $statement->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

?>

<?php include '../templates/header.php' ?>

<h2>Sua giang vien</h2>

<form method="post">
    <input type="hidden" name="MaBB" value="<?php echo $bb['MaBB'] ?>">
    <label for="TenBB">Ten Bai Bao</label>
    <input type="text" name="TenBB" id="TenBB" value="<?php echo $bb['TenBB'] ?>">
    <label for="TomTatBB">Tom Tat Bai Bao</label>
    <input type="text" name="TomTatBB" id="TomTatBB" value="<?php echo $bb['TomTatBB'] ?>">
    <label for="MaGV">Ma Giang vien</label>
    <input type="number" name="MaGV" id="MaGV" value="<?php echo $bb['MaGV'] ?>">
    <br/>
    <br/>
    <input type="submit" name="submit" value="Update">
</form>

<br/>
<br/>
<a href="PhamManhHieu_1530059_03.php">Back</a>

<?php include '../templates/footer.php' ?>
