<?php include('LSSController.php'); ?>
<!DOCTYPE html>
<head>
    <title>Sales Person Signup</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
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
        .invalid {
            color: red;
        }
        .valid {
            color: green;
        }
        #passwordRequirements p {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="container shadow-lg p-5 mb-5 bg-white rounded" style="margin-top: 1em; width: 35%;">
        <h1 style="text-align: center">Sales Person Signup</h1>
        <form method="post" action="LSSController.php">
            <div class="form-group">
                <label>Email:</label>
                <input type="email" class="form-control" placeholder="Enter Email" name="email" id="email" required>
                <small id="emailMsg" class="form-text text-danger"></small>
            </div>
            <div class="form-group">
                <label>Name:</label>
                <input type="text" class="form-control" placeholder="Enter Name" name="name" required>
            </div>
            <div class="form-group">
                <label>Country:</label>
                <input type="text" class="form-control" placeholder="Enter Country" name="country" required>
            </div>
            <div class="form-group">
                <label>Postal Code:</label>
                <input type="text" class="form-control" placeholder="Enter Postal Code" name="postal" id="postal" required>
                <small id="postalMsg" class="form-text text-danger"></small>
            </div>
            <div class="form-group">
                <label>Password:</label>
                <div class="password-container">
                    <input type="password" class="form-control" placeholder="Enter Password" name="password" id="password" required oninput="validatePassword()">
                    <span class="toggle-eye" onclick="togglePasswordVisibility()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="grey" viewBox="0 0 24 24">
                            <path d="M12 5c-7.633 0-12 7-12 7s4.367 7 12 7 12-7 12-7-4.367-7-12-7zm0 11c-2.211 0-4-1.789-4-4s1.789-4 4-4 4 1.789 4 4-1.789 4-4 4zm0-6c-1.103 0-2 .897-2 2s.897 2 2 2 2-.897 2-2-.897-2-2-2z"/>
                        </svg>
                    </span>
                </div>
                <div id="passwordRequirements" class="mt-2">
                    <p id="lowercase" class="invalid">✗ At least one lowercase letter</p>
                    <p id="uppercase" class="invalid">✗ At least one uppercase letter</p>
                    <p id="number" class="invalid">✗ At least one number</p>
                    <p id="length" class="invalid">✗ Minimum 8 characters</p>
                </div>
            </div>
            <div class="form-group">
                <label for="type">Type:</label>
                <select class="form-control" name="type">
                    <option value="M">Manager</option>
                    <option value="S">Sales Person</option>
                </select>                    
            </div>
            <button type="submit" name="signup" class="form-control btn btn-primary">Signup</button><br><br>
            <p style="color:black; text-align: left">Already have an Account? <a href="salesPersonLogin.php">Click Here</a></p>
        </form>
    </div>

    <script>
        $(document).ready(function(){
            $("#email").on('input', function(){
                var email = $(this).val();
                if(email !== ""){
                    $.ajax({
                        url: "check_email.php",
                        method: "POST",
                        data: { email: email },
                        success: function(response){
                            if(response === "exists"){
                                $("#emailMsg").text("Email already exists");
                            } else {
                                $("#emailMsg").text("");
                            }
                        }
                    });
                } else {
                    $("#emailMsg").text("");
                }
            });

            // Postal code validation
            $("#postal").on('input', function() {
                const postalCode = $(this).val();
                if (/^\d{6}$/.test(postalCode)) {
                    $("#postalMsg").text("");
                } else {
                    $("#postalMsg").text("Invalid postal code. Please enter a 6-digit postal code.");
                }
            });
        });

        function validatePassword() {
            const password = document.getElementById("password").value;
            const lowercase = document.getElementById("lowercase");
            const uppercase = document.getElementById("uppercase");
            const number = document.getElementById("number");
            const length = document.getElementById("length");

            // Check for lowercase letters
            if (/[a-z]/.test(password)) {
                lowercase.classList.add("valid");
                lowercase.classList.remove("invalid");
                lowercase.textContent = "✓ At least one lowercase letter";
            } else {
                lowercase.classList.add("invalid");
                lowercase.classList.remove("valid");
                lowercase.textContent = "✗ At least one lowercase letter";
            }

            // Check for uppercase letters
            if (/[A-Z]/.test(password)) {
                uppercase.classList.add("valid");
                uppercase.classList.remove("invalid");
                uppercase.textContent = "✓ At least one uppercase letter";
            } else {
                uppercase.classList.add("invalid");
                uppercase.classList.remove("valid");
                uppercase.textContent = "✗ At least one uppercase letter";
            }

            // Check for numbers
            if (/[0-9]/.test(password)) {
                number.classList.add("valid");
                number.classList.remove("invalid");
                number.textContent = "✓ At least one number";
            } else {
                number.classList.add("invalid");
                number.classList.remove("valid");
                number.textContent = "✗ At least one number";
            }

            // Check for length
            if (password.length >= 8) {
                length.classList.add("valid");
                length.classList.remove("invalid");
                length.textContent = "✓ Minimum 8 characters";
            } else {
                length.classList.add("invalid");
                length.classList.remove("valid");
                length.textContent = "✗ Minimum 8 characters";
            }
        }

        function togglePasswordVisibility() {
            const passwordField = document.getElementById("password");
            passwordField.type = passwordField.type === "password" ? "text" : "password";
        }
    </script>
</body>
</html>
