<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    
    // Validaciones
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        header("Location: ../register.html?error=Todos los campos son obligatorios");
        exit();
    }
    
    if ($password !== $confirm_password) {
        header("Location: ../register.html?error=Las contraseñas no coinciden");
        exit();
    }
    
    if (strlen($password) < 6) {
        header("Location: ../register.html?error=La contraseña debe tener al menos 6 caracteres");
        exit();
    }
    
    // Verificar si el usuario o email ya existen
    $sql = "SELECT id FROM users WHERE username = ? OR email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        header("Location: ../register.html?error=El usuario o email ya están registrados");
        exit();
    }
    $stmt->close();
    
    // Hash de la contraseña
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Insertar nuevo usuario
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $hashed_password);
    
    if ($stmt->execute()) {
        header("Location: ../index.html?success=Cuenta creada exitosamente. Por favor inicia sesión.");
        exit();
    } else {
        header("Location: ../register.html?error=Error al registrar. Intenta nuevamente.");
        exit();
    }
    
    $stmt->close();
    $conn->close();
}
?>