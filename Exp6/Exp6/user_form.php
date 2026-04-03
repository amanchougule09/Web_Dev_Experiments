<?php
$username = $password = "";
$userError = $passError = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    // Username Validation
    if (!preg_match("/^[a-zA-Z0-9]{8,}$/", $username)) {
        $userError = "Username must be at least 8 characters and contain only letters and numbers.";
    }

    // Password Validation
    if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $password)) {
        $passError = "Password must be at least 8 characters with at least one letter and one number.";
    }

    if (empty($userError) && empty($passError)) {
        $success = "Login Successful!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Professional PHP Login</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI', sans-serif;
}

body{
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:linear-gradient(135deg,#667eea,#764ba2);
}

.container{
    width:100%;
    max-width:400px;
    padding:20px;
}

.login-box{
    background:rgba(38, 186, 235, 0.15);
    backdrop-filter:blur(15px);
    padding:40px 30px;
    border-radius:20px;
    box-shadow:0 15px 35px rgba(23, 22, 22, 0.3);
    color:white;
}

.login-box h2{
    text-align:center;
    margin-bottom:25px;
}

.input-group{
    margin-bottom:20px;
}

.input-group label{
    display:block;
    margin-bottom:8px;
    font-size:14px;
}

.input-group input{
    width:100%;
    padding:12px;
    border:none;
    border-radius:10px;
    outline:none;
    font-size:14px;
}

.input-group input:focus{
    box-shadow:0 0 8px rgba(255,255,255,0.8);
}

.error{
    color:#ffdddd;
    font-size:13px;
    margin-top:5px;
}

.success{
    background:#28a745;
    padding:10px;
    text-align:center;
    border-radius:8px;
    margin-bottom:15px;
}

button{
    width:100%;
    padding:12px;
    border:none;
    border-radius:10px;
    background:white;
    color:#764ba2;
    font-weight:600;
    cursor:pointer;
    transition:0.3s;
}

button:hover{
    transform:translateY(-2px);
    background:#f1f1f1;
}

@media(max-width:480px){
    .login-box{
        padding:30px 20px;
    }
}
</style>
</head>

<body>

<div class="container">
    <div class="login-box">
        <h2>User Login</h2>

        <?php if($success != "") echo "<div class='success'>$success</div>"; ?>

        <form method="post" action="">
            
            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="Enter Username" value="<?php echo htmlspecialchars($username); ?>">
                <div class="error"><?php echo $userError; ?></div>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter Password">
                <div class="error"><?php echo $passError; ?></div>
            </div>

            <button type="submit">Login</button>

        </form>
    </div>
</div>

</body>
</html>