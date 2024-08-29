<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Web App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* Global Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f8ff;
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
        .student-overview {
            margin-bottom: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: left;
            transition: transform 0.3s ease;
        }

        .dashboard-section h3,
        .student-overview h2 {
            margin-top: 0;
            color: #0077b6;
        }

        .dashboard-section:hover,
        .student-overview:hover {
            transform: translateY(-5px);
        }

        .dashboard-section ul,
        .student-overview ul {
            padding-left: 20px;
        }

        .dashboard-section ul li,
        .student-overview ul li {
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
            .student-overview {
                padding: 15px;
            }
        }
    </style>
</head>
<body>

<header>
    <h1>Student Dashboard</h1>
    <div class="dropdown">
        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
            </svg>
        </button>
        <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="student.php">Change Student(User)</a></li>
            <li><a class="dropdown-item" href="index.php">Logout</a></li>
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
                    <a class="nav-link" href="../page/proficiency_test.php">Proficiency Tests</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../page/university.php">View Universities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../page/score.php">Score</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main>
    <div class="container">
        <!-- Student Overview Section -->
        <div class="student-overview">
            <h2>Student Overview</h2>
            <p>Welcome to your student dashboard. Here, you can explore and manage various aspects of your academic journey:</p>
            <ul>
                <li><strong>Proficiency Tests:</strong> Browse and enroll in available proficiency tests to boost and enhance your language skills.</li>
                <li><strong>View Universities:</strong> Discover and explore universities that match your academic interests and career goals.</li>
                <li><strong>Score:</strong> Enter your exam scores and find universities that align with your achievements.</li>
            </ul>
        </div>

        <!-- Upcoming Events -->
        <div class="dashboard-section">
            <h3>Upcoming Events</h3>
            <ul>
                <li>IELTS Preparation Workshop (Date: July 15, 2024): Join our intensive IELTS workshop to boost your exam skills and strategies.</li>
                <li>Study Abroad Fair (Date: August 22, 2024): Meet representatives from top universities around the world.</li>
                <li>Webinars and Workshops (Date: September 10, 2024): Conducting online webinars on topics like choosing a study destination, application processes, visa guidance.</li>
            </ul>
        </div>

        <!-- Latest News -->
        <div class="dashboard-section">
            <h3>Latest News</h3>
            <ul>
                <li>New scholarship opportunities announced for students applying to UK universities.</li>
                <li>Important update: Changes in IELTS exam format starting next month.</li>
                <li>Study abroad options in Australia: Information session next week.</li>
                <li>Webinar on navigating the US visa application process for international students.</li>
                <li>COVID-19 travel advisory: Updates on international travel restrictions for students.</li>
            </ul>
        </div>

        <!-- Student Tips and Strategies -->
        <div class="dashboard-section">
            <h3>Student Tips and Strategies - IELTS</h3>
            <ul>
                <li>Regular practice with sample tests and mock exams can help improve familiarity with the IELTS format.</li>
                <li>Effective time management during the exam is crucial; allocate specific time slots for each section.</li>
                <li>Enhance vocabulary by learning and using academic and topic-specific words.</li>
                <li>Take advantage of online resources and tutorials to gain insights into scoring techniques and strategies.</li>
            </ul>
        </div>
    </div>
</main>

<footer>
    <p>&copy; 2024 Consultancy Web App for Student</p>
</footer>

</body>
</html>
