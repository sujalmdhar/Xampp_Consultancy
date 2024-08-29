<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <?php include('header.php'); ?>
    <style>
        
        body {
            background-color: #f8f9fa;
            color: #212529;
        }

        .container1 {
            margin-top: 100px;
            max-width: 400px;
        }

        .content {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .content h2 {
            margin-bottom: 30px;
        }

        .btn-primary {
            background: linear-gradient(45deg, #007bff, #1e90ff);
            border: none;
        }

        .btn-primary:hover {
            background: linear-gradient(45deg, #1e90ff, #007bff);
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.6);
            border: 1px solid #ced4da;
            color: #495057;
        }

        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.9);
        }
    </style>
</head>

<body>
    <div class="container1 mx-auto">
        <div class="content">
            <h2 class="text-center">Admin Login</h2>
            <form id="loginForm" method="post" action="../adminlogin/login.php">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password" required>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" id="togglePassword">Show</button>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            var passwordField = document.getElementById('password');
            var toggleButton = document.getElementById('togglePassword');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleButton.textContent = 'Hide';
            } else {
                passwordField.type = 'password';
                toggleButton.textContent = 'Show';
            }
        });
    </script>
</body>

</html>
