<?php
$name = $email = $mobile = "";
$nameError = $emailError = $mobileError = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $mobile = trim($_POST["mobile"]);

    // Name Validation (Only alphabets and spaces allowed)
    if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
        $nameError = "Name should contain only alphabets.";
    }

    // Email Validation (Not Empty)
    if (empty($email)) {
        $emailError = "Email should not be empty.";
    }

    // Mobile Validation (Exactly 10 digits)
    if (!preg_match("/^[0-9]{10}$/", $mobile)) {
        $mobileError = "Mobile number must contain exactly 10 digits.";
    }

    if (empty($nameError) && empty($emailError) && empty($mobileError)) {
        $success = "Student Registered Successfully!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Registration</title>

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
    background:linear-gradient(135deg,#11998e,#38ef7d);
}

.container{
    width:100%;
    max-width:450px;
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
    color:#11998e;
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
        <h2>Student Registration</h2>

        <?php if($success != "") echo "<div class='success'>$success</div>"; ?>

        <form method="post" action="">

            <div class="input-group">
                <label>Full Name</label>
                <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>">
                <div class="error"><?php echo $nameError; ?></div>
            </div>

            <div class="input-group">
                <label>Email</label>
                <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>">
                <div class="error"><?php echo $emailError; ?></div>
            </div>

            <div class="input-group">
                <label>Mobile Number</label>
                <input type="text" name="mobile" value="<?php echo htmlspecialchars($mobile); ?>">
                <div class="error"><?php echo $mobileError; ?></div>
            </div>

            <button type="submit">Register</button>

        </form>
    </div>
</div>

</body>
</html>