<?php
$oldPassword = $newPassword = $confirmPassword = "";
$oldError = $newError = $confirmError = "";
$success = "";

// Example stored password (Normally this comes from database)
$storedPassword = "Aman1234";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $oldPassword = trim($_POST["oldPassword"]);
    $newPassword = trim($_POST["newPassword"]);
    $confirmPassword = trim($_POST["confirmPassword"]);

    // Check old password
    if ($oldPassword != $storedPassword) {
        $oldError = "Old password is incorrect.";
    }

    // New password minimum 8 characters
    if (strlen($newPassword) < 8) {
        $newError = "New password must be minimum 8 characters.";
    }

    // Confirm password match
    if ($newPassword != $confirmPassword) {
        $confirmError = "New password and Confirm password must match.";
    }

    if (empty($oldError) && empty($newError) && empty($confirmError)) {
        $success = "Password Updated Successfully!";
        // Normally update password in database here
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Change Password</title>

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
    background:linear-gradient(135deg,#ff9966,#ff5e62);
}

.container{
    width:100%;
    max-width:420px;
    padding:20px;
}

.form-box{
    background:rgba(255,255,255,0.15);
    backdrop-filter:blur(15px);
    padding:40px 30px;
    border-radius:20px;
    box-shadow:0 15px 35px rgba(0,0,0,0.3);
    color:white;
}

.form-box h2{
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
    color:#ffe0e0;
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
    color:#ff5e62;
    font-weight:600;
    cursor:pointer;
    transition:0.3s;
}

button:hover{
    transform:translateY(-2px);
    background:#f1f1f1;
}

@media(max-width:480px){
    .form-box{
        padding:30px 20px;
    }
}
</style>
</head>

<body>

<div class="container">
    <div class="form-box">
        <h2>Change Password</h2>

        <?php if($success != "") echo "<div class='success'>$success</div>"; ?>

        <form method="post" action="">

            <div class="input-group">
                <label>Old Password</label>
                <input type="password" name="oldPassword">
                <div class="error"><?php echo $oldError; ?></div>
            </div>

            <div class="input-group">
                <label>New Password</label>
                <input type="password" name="newPassword">
                <div class="error"><?php echo $newError; ?></div>
            </div>

            <div class="input-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmPassword">
                <div class="error"><?php echo $confirmError; ?></div>
            </div>

            <button type="submit">Update Password</button>

        </form>
    </div>
</div>

</body>
</html>