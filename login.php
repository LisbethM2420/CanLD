<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center">Iniciar Sesión</h2>
                        <form class="form-login" action="login.php" method="post">
                            <div class="form-group">
                                <label for="username">Nombre de Usuario:</label>
                                <input type="text" id="username" name="username" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña:</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
                        </form>
                        <?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "CanLD"; 
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM usuarios WHERE username='$username' AND pass='$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header("Location: index.php");
    } else {
        echo "<div class='alert alert-danger mt-3' role='alert'>Nombre de usuario o contraseña incorrectos.</div>";
    }
    $conn->close();
}
?>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
