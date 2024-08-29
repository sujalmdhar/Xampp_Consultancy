<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* Global Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #333;
        }

        /* Header Styles */
        header {
            background-color: #0077b6;
            color: #fff;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
        }

        header h1 {
            font-size: 28px;
            margin: 0;
            text-align: center;
            font-weight: bold;
            text-transform: uppercase;
        }

        /* Navigation Styles */
        nav {
            background-color: #343a40;
        }

        nav .navbar-nav .nav-link {
            color: #fff;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        nav .navbar-nav .nav-link:hover {
            background-color: #0056b3;
        }

        /* Main Content Styles */
        main {
            padding: 20px;
        }

        /* Footer Styles */
        footer {
            background-color: #0077b6;
            color: #fff;
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Dashboard Sections */
        .dashboard-section,
        .admin-overview {
            margin-bottom: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: left;
            transition: transform 0.3s ease;
        }

        .dashboard-section h3,
        .admin-overview h2 {
            margin-top: 0;
            color: #0077b6;
        }

        .dashboard-section:hover,
        .admin-overview:hover {
            transform: translateY(-5px);
        }

        .dashboard-section ul,
        .admin-overview ul {
            padding-left: 20px;
        }

        .dashboard-section ul li,
        .admin-overview ul li {
            list-style-type: disc;
            margin-bottom: 10px;
            color: #333;
        }

        /* Media Queries */
        @media (max-width: 768px) {
            header h1 {
                font-size: 24px;
            }

            nav .navbar-nav .nav-link {
                font-size: 16px;
                padding: 10px 15px;
            }

            .dashboard-section,
            .admin-overview {
                padding: 15px;
            }
        }
        @media (max-width: 576px) {
            header h1 {
                font-size: 20px;
            }

            nav .navbar-nav .nav-link {
                font-size: 14px;
                padding: 8px 12px;
            }

            .dashboard-section,
            .admin-overview {
                padding: 10px;
            }
        }
    </style>
</head>
<body>

<header>
    <h1>Admin Dashboard</h1>
    <div class="dropdown">
        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
            </svg>
        </button>
        <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="../page/admin.php">Change Admin</a></li>
            <li><a class="dropdown-item" href="../page/index.php">Logout</a></li>
        </ul>
    </div>
</header>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../admin/index.php">Manage Admins</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../proficiency_test/index.php">Manage Proficiency Tests</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../student/read.php">View Students</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../university/index.php">Manage Universities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="viewenroll.php">View Enrollments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="viewscore.php">View Scores</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main>
    <div class="container">
        <!-- Admin Overview Section -->
        <div class="admin-overview">
            <h2>Admin Tasks Overview</h2>
            <p>Welcome to the Admin Dashboard. Here's what you can do:</p>
            <ul>
                <li><strong>Manage Admins:</strong> Manage details of admins, including creating new admins, updating existing information, and deleting admin accounts.</li>
                <li><strong>Manage Proficiency Tests:</strong> Handle proficiency tests by creating new tests, updating test details, and removing outdated tests from the system.</li>
                <li><strong>View Students:</strong> View student details, including their Student ID, name, email, phone number, and address.</li>
                <li><strong>Manage Universities:</strong> Manage universities by adding new universities, updating existing university details, and removing universities that are no longer relevant.</li>
                <li><strong>View Enrollments:</strong> View enrollment details of students, including the course enrolled, and enrolled date.</li>
                <li><strong>View Scores:</strong> Access and review the scores achieved by students in proficiency tests as they search for universities by inputting their scores.</li>
            </ul>
        </div>
    </div>
</main>

<footer>
    <p>&copy; 2024 Admin Dashboard. All rights reserved.</p>
</footer>

</body>
</html>
