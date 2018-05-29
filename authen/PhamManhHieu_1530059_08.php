<?php

/**
 * Delete a user
 */

require "../config.php";

if (isset($_GET["id"])) {
    try {
        $connection = new PDO($dsn, $username, $password, $options);

        $id = $_GET["id"];

        $sql = "DELETE FROM giangvien WHERE MaGV = :id";

        $statement = $connection->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();

        $success = "Giang vien successfully deleted";

        header('Location: PhamManhHieu_1530059_02.php');
    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

?>