<?php include '../templates/header.php'; ?>

<?php
// check session
?>

<?php
require '../config.php';
$connection = new PDO($dsn, $username, $password, $options);

$sql = "SELECT * FROM danhmuc";

$statement = $connection->prepare($sql);
$statement->execute();

$result = $statement->fetchAll();

?>

    <h2>Tim Kiem Du Lieu</h2>

    <ul>
        <?php foreach ($result as $row) { ?>
            <?php if (isset($row['MaDMCha']) && $row['MaDMCha'] == 3) { ?>
                <li><a href="<?php echo $row['Link']; ?>"><?php echo $row['TenDM']; ?></a></li>
            <?php } ?>
        <?php } ?>
    </ul>

<?php include '../templates/footer.php'; ?>