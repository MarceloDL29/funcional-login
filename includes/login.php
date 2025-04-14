<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    // Validar credenciales
    $sql = "SELECT id, username, password FROM users WHERE username = ? OR email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        
        if (password_verify($password, $user['password'])) {
            // Iniciar sesión
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            
            header("Location: ../dashboard.php");
            exit();
        } else {
            header("Location: ../index.html?error=Credenciales incorrectas");
            exit();
        }
    } else {
        header("Location: ../index.html?error=Usuario no encontrado");
        exit();
    }
    
    $stmt->close();
    $conn->close();
}
?>