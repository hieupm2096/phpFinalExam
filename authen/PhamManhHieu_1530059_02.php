<?php include '../templates/header.php' ?>

    <h2>Quan Ly Giang Vien</h2>

    <a href="PhamManhHieu_1530059_06.php">Them Giang Vien</a>
    <br/>
    <br/>

<?php
require '../config.php';
try {
    $connection = new PDO($dsn, $username, $password, $options);

    $sql = "SELECT * FROM giangvien";

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
            <th>Ten GV</th>
            <th>Gioi Tinh</th>
            <th>Ngay Sinh</th>
            <th>Hoc Ham</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($result as $row) { ?>
            <tr>
                <td><?php echo $row['MaGV'] ?></td>
                <td><?php echo $row['TenGV'] ?></td>
                <td><?php echo $row['GioiTinh'] ? "Nam" : "Nu" ?></td>
                <td><?php echo $row['NgaySinh'] ?></td>
                <td><?php echo $row['HocHam'] ?></td>
                <td><a href="PhamManhHieu_1530059_07.php?id=<?php echo $row['MaGV']; ?>">Edit</a></td>
                <td><a href="PhamManhHieu_1530059_08.php?id=<?php echo $row['MaGV']; ?>">Delete</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

<?php include '../templates/footer.php' ?>