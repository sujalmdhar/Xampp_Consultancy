<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles go here */
        .navbar {
            background-color: #343a40 !important;
        }

        .navbar-brand img {
            max-height: 40px;
        }

        .nav-link {
            color: #fff !important;
            font-size: 16px;
            font-weight: 500;
            padding-left: 1rem !important;
            padding-right: 1rem !important;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: #ddd !important;
        }

        .nav-item.active .nav-link {
            color: #00b8d4 !important;
        }

        @media (max-width: 767.98px) {
            .navbar-nav .nav-link {
                padding-left: 1rem;
                padding-right: 1rem;
            }

            .navbar-collapse {
                background-color: #343a40;
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="../picture/logo.png" alt="Logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact_us.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="student.php">Login/Sign Up</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.navbar-toggler').click(function() {
            $('.navbar-collapse').collapse('toggle');
        });
    });
</script>
</body>
</html>