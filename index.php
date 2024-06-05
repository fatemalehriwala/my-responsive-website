<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Signup Form</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap");
        body {
            font-family: "League Spartan", sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .containerl {
            width: 300px;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .form-container {
            display: none;
        }

        .form-container.active {
            display: block;
        }

        h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 100%;
            padding: 10px;
            font-weight: 600;
            background-color: #fff;
            color: #000;
            font-size: 13px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: 0.2s;

        }

        button:hover {
            background: #088178;
            color: #fff;
        }

        p {
            text-align: center;
        }

        a {
            color: #4CAF50;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .error {
            color: red;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="containerl">
        <div class="form-container active" id="login-form">
            <h2>Login</h2>

            <form name="f1" action="authentication.php" onsubmit="return validation()" method="POST">

                <label for="login-email">Username</label>
                <input type="text" id="user" name="user" required />

                <label for="login-password">Password</label>
                <input type="password" id="pass" name="pass" required />

                <button type="submit">Login</button>
                <p>Don't have an account? <a href="#" id="show-signup">Sign up</a></p>



                <?php if (isset($_GET['error'])): ?>
                    <div class="error"><?= htmlspecialchars($_GET['error']) ?></div>
                <?php endif; ?>



            </form>
        </div>
        <div class="form-container" id="signup-form">
            <h2>Sign Up</h2>
            <form>
                <label for="signup-email">Email</label>
                <input type="email" id="signup-email" required />

                <label for="signup-password">Password</label>
                <input type="password" id="signup-password" required />

                <label for="signup-confirm-password">Confirm Password</label>
                <input type="password" id="signup-confirm-password" required />

                <button type="submit" class="normal">Sign Up</button>
                <p>Already have an account? <a href="#" id="show-login">Login</a></p>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('show-signup').addEventListener('click', function () {
            document.getElementById('login-form').classList.remove('active');
            document.getElementById('signup-form').classList.add('active');
        });

        document.getElementById('show-login').addEventListener('click', function () {
            document.getElementById('signup-form').classList.remove('active');
            document.getElementById('login-form').classList.add('active');
        });

        function validation() {
            var id = document.f1.user.value;
            var ps = document.f1.pass.value;


            if (id.length == "" && ps.length == "") {
                alert("User Name and Password fields are empty");
                return false;
            } else {
                if (id.length == "") {
                    alert("User Name is empty");
                    return false;
                }
                if (ps.length == "") {
                    alert("Password field is empty");
                    return false;
                }
            }
        }
    </script>
</body>

</html>