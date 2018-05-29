<?php

/**
 * Delete a user
 */

require "../config.php";

if (isset($_GET["id"])) {
    try {
        $connection = new PDO($dsn, $username, $password, $options);

        $id = $_GET["id"];

        $sql = "DELETE FROM baibao WHERE MaBB = :id";

        $statement = $connection->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();

        $success = "Bai bao successfully deleted";

        header('Location: PhamManhHieu_1530059_03.php');
    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

?>