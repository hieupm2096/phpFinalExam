<?php include '../templates/header.php' ?>

    <h2>Quan Ly Giang Vien</h2>

    <a href="PhamManhHieu_1530059_09.php">Them Bai Bao</a>
    <br/>
    <br/>

<?php
require '../config.php';
try {
    $connection = new PDO($dsn, $username, $password, $options);

    $sql = "SELECT * FROM baibao";

    $statement = $connection->prepare($sql);
    $statement->execute();

    $result = $statement->fetchAll();
} catch (PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}
?>

    <table border="1px">
        <thead>
        <tr>
            <th>#</th>
            <th>Ten Bai Bao</th>
            <th>Tom Tat</th>
            <th>Ma GV</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($result as $row) { ?>
            <tr>
                <td><?php echo $row['MaBB'] ?></td>
                <td><?php echo $row['TenBB'] ?></td>
                <td><?php echo $row['TomTatBB'] ?></td>
                <td><?php echo $row['MaGV'] ?></td>
                <td><a href="PhamManhHieu_1530059_10.php?id=<?php echo $row['MaGV']; ?>">Edit</a></td>
                <td><a href="PhamManhHieu_1530059_11.php?id=<?php echo $row['MaGV']; ?>">Delete</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

<?php include '../templates/footer.php' ?>