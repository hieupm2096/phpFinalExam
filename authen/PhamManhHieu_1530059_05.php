<?php
/**
 * Created by PhpStorm.
 * User: oswal
 * Date: 5/28/2018
 * Time: 10:21 PM
 */

if (isset($_POST['submit'])) {
    try {
        require '../config.php';

        // create connection
        $connection = new PDO($dsn, $username, $password, $options);

        // fetch data
        $sql = "SELECT * FROM giangvien WHERE TenGV LIKE :TenGV";
        $tengv = $_POST['TenGV'];

        $tengv = "%$tengv%";

        $statement = $connection->prepare($sql);
        $statement->bindParam(':TenGV', $tengv, PDO::PARAM_STR);
        $statement->execute();

        $result = $statement->fetchAll();

    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

?>

<?php include "../templates/header.php"; ?>

<h2>Find user based on location</h2>

<form method="post">
    <label for="TenGV">Ten Giang Vien</label>
    <input type="text" name="TenGV" id="TenGV">
    <br/>
    <br/>
    <input type="submit" name="submit" value="Xem Ket qua">
    <input type="reset" value="Reset">
    <br/>
    <br/>
    <a href="PhamManhHieu_1530059_04.php">Back</a>
    <br/>
    <br/>
</form>

<?php
if (isset($_POST['submit'])) {
    if ($result && $statement->rowCount() > 0) {
        ?>
        <h2>Ket qua</h2>
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

    <?php } else { ?>
        <blockquote>Khong co ket qua <?php echo $_POST['TenGV']; ?>.</blockquote>
    <?php }
} ?>

<?php include "../templates/footer.php"; ?>
