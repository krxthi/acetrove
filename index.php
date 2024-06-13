<?php

session_start();

if (isset($_SESSION["id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $username = $mysqli->real_escape_string($_SESSION["id"]);
    
    $sql = "SELECT * FROM users
            WHERE username = '$username'";
            
    $result = $mysqli->query($sql);
    
    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>ACE Trove</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    
    <h1>ACE Trove</h1>
    
    <?php if (isset($user)): ?>
        
        <p>Hello <?= htmlspecialchars($user["username"]) ?></p>
        
        <p><a href="logout.php">Log out</a></p>

        <p><a href="index.html">Continue Shopping</a></p>
        
    <?php else: ?>
        
        <p><a href="login.php">Log in</a> or <a href="signup.html">sign up</a></p>
        
    <?php endif; ?>
    
</body>
</html>