<?php include('LSSController.php'); ?>
<!DOCTYPE html>
<head>
    <title>Admin Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap');
        body {
            background-image: url("https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1147&q=80");
            background-repeat: no-repeat;
            background-size: cover;
            font-family: 'Montserrat', sans-serif;
        }
        .password-container {
            position: relative;
            display: flex;
            align-items: center;
        }
        .toggle-eye {
            position: absolute;
            right: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container shadow-lg p-5 mb-5 bg-white rounded" style="margin-top: 10em; width: 35%;">
        <h1 style="text-align: center">Sales Person Login</h1>
        <form method="post" action="LSSController.php">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email..." name="email" required>
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <div class="password-container">
                    <input type="password" class="form-control" id="password" placeholder="Enter password..." name="password" required>
                    <span class="toggle-eye" onclick="togglePasswordVisibility()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="grey" viewBox="0 0 24 24">
                            <path d="M12 5c-7.633 0-12 7-12 7s4.367 7 12 7 12-7 12-7-4.367-7-12-7zm0 11c-2.211 0-4-1.789-4-4s1.789-4 4-4 4 1.789 4 4-1.789 4-4 4zm0-6c-1.103 0-2 .897-2 2s.897 2 2 2 2-.897 2-2-.897-2-2-2z"/>
                        </svg>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label for="type">Type:</label>
                <select class="form-control" name="type">
                    <option value="M">Manager</option>
                    <option value="S">Sales Person</option>
                </select>                    
            </div>
            <button type="submit" name="login" class="max-auto btn btn-primary">Login</button><br><br>
            <p style="color:black; text-align: left">Don't Have An Account? <a href="salesPersonSignup.php">Click Here</a></p>
        </form>
        <?php if(isset($_SESSION['msg'])): ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <?php
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                ?>
            </div>
        <?php endif ?>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordField = document.getElementById("password");
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }
    </script>
</body>
</html>
