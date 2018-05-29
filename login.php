<?php include 'templates/header.php'; ?>

<?php
session_start();

require 'config.php';
$msg = '';

if (isset($_SESSION['username'])) {
    header('Location: authen/index.php');
}

if (isset($_POST['submit']) && !empty($_POST['username']) && !empty($_POST['password'])) {
    try {
        $connection = new PDO($dsn, $username, $password, $options);

        $sql = "SELECT * FROM TaiKhoan WHERE TaiKhoan = :TaiKhoan AND MatKhau = :MatKhau";

        $taikhoan = $_POST['username'];
        $matkhau = $_POST['password'];

        $user = [
            "TaiKhoan" => $taikhoan,
            "MatKhau" => $matkhau
        ];

        $statement = $connection->prepare($sql);
        $statement->execute($user);

        $result = $statement->fetch();

        if ($statement->rowCount() > 0) {
            $_SESSION['username'] = $_POST['username'];
            header('Location: authen/index.php');
        } else {
            $msg = 'Login Failed';
        }

    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }


}
?>

<form method="post">
    <label for="username">Username</label>
    <br/>
    <input type="text" name="username" id="username">
    <br/>
    <label for="password">Password</label>
    <br/>
    <input type="password" name="password" id="password">
    <br/>
    <br/>
    <input type="submit" name="submit" value="Login">
    <?php echo $msg; ?>
    <br/>
</form>

<?php include 'templates/footer.php'; ?>
