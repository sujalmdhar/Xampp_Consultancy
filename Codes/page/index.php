<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultancy - Home</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <?php include('header.php'); ?>
    <style>
        /* Custom styles go here */
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 20px;
            padding: 0 15px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .headpic {
            width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        .content {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            padding: 20px;
            background-color: #343a40;
            color: #ffffff;
        }

        .about,
        .testimonial,
        .service,
        .events,
        .destinations {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .about h2,
        .testimonial h2,
        .service h2,
        .events h2,
        .destinations h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .about p,
        .testimonial p,
        .service p,
        .events p,
        .destinations p {
            font-style: italic;
            text-align: center;
        }

        .services,
        .destinations-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .service-item,
        .destination-item {
            flex: 0 0 30%;
            background-color: #ffffff;
            padding: 20px;
            margin: 10px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .service-image,
        .destination-image {
            width: 100px;
            height: 100px;
            object-fit: contain;
            margin-bottom: 10px;
        }

        .service-item:hover,
        .destination-item:hover {
            transform: translateY(-5px);
        }

        .events .event-item {
            margin-bottom: 20px;
            font-style: italic; /* Apply italic style */
            text-align: center; /* Center align text */
        }

        .content p {
            font-style: italic;
        }
    </style>
</head>

<body>
    <!-- Main Content -->
    <div class="container">
        <div class="header">
            <h1>Welcome to Insight Consultancy</h1>
            <p>"Empowering Dreams, Bridging Borders: Your Gateway to Global Success!"</p>
        </div>

        <img src="../picture/headpic.png" alt="Head Picture" class="headpic">

        <div class="content">
            <p>Welcome to Insight Consultancy, where academic excellence meets global opportunities. We are committed to empowering students with the knowledge, skills, and confidence they need to succeed in exams such as IELTS, and to embark on transformative journeys abroad. Our consultancy serves as a guiding light for aspiring students, offering personalized coaching and resources tailored to their unique needs and aspirations. With a team of experienced educators and consultants, we provide comprehensive support throughout the exam preparation process, equipping students with the tools they need to achieve their desired scores and unlock doors to prestigious institutions worldwide. Driven by a passion for education and a dedication to student success, Insight Consultancy goes beyond traditional tutoring services, offering holistic guidance that extends beyond the classroom. From exam strategies and study materials to visa assistance and university admissions support, we are committed to ensuring that every student receives the guidance and support they need to turn their dreams of studying abroad into reality. Join us and take the first step towards a brighter future. Let us be your partner in success as you embark on your journey to academic excellence and global opportunities.</p>
        </div>

        <!-- About Us -->
        <div class="about">
            <h2>About Us</h2>
            <p>Insight Consultancy was founded in 2020 with the mission of empowering students to achieve their academic and personal goals. Our team of experienced educators and consultants is dedicated to providing comprehensive support and guidance to help students succeed in their educational endeavors, both locally and globally. We believe that every student has the potential to excel, and we are committed to unlocking that potential through personalized attention, innovative teaching methods, and a deep understanding of the challenges faced by today's students.</p>
            <p>At Insight Consultancy, we take pride in our ability to adapt to the unique needs of each student. Whether you're preparing for an important exam, seeking to improve your academic performance, or exploring study abroad opportunities, our team is here to support you every step of the way. We believe that education is the key to unlocking a world of opportunities, and we are passionate about helping our students achieve their dreams.</p>
        </div>

        <!-- Services -->
        <div class="service">
            <h2>Our Services</h2>
            <div class="services">
                <div class="service-item">
                    <img src="../picture/services/test.png" alt="Test Picture" class="service-image">
                    <h3>Test Preparation</h3>
                    <p>Specialized courses designed to prepare students for standardized English language proficiency tests such as IELTS (International English Language Testing System).</p>
                </div>
                <div class="service-item">
                    <img src="../picture/services/improvement.png" alt="Improvement Picture" class="service-image">
                    <h3>Student Improvement</h3>
                    <p>Through personalized coaching and mentoring, we help students enhance their academic performance and achieve their educational goals by addressing their individual learning needs and providing tailored support.</p>
                </div>
                <div class="service-item">
                    <img src="../picture/services/abroad.png" alt="Abroad Picture" class="service-image">
                    <h3>Abroad Counseling</h3>
                    <p>Personalized counseling sessions to help students understand their study abroad options, including selecting suitable courses, universities, and countries based on their academic background, career goals, and personal preferences.</p>
                </div>
            </div>
        </div>

        <!-- Study Abroad Destinations -->
        <div class="destinations">
            <h2>Study Abroad Destinations</h2>
            <div class="destinations-list">
                <div class="destination-item">
                    <img src="../picture/countries/canada.png" alt="Canada" class="destination-image">
                    <h3>Canada</h3>
                    <p>Renowned for its high-quality education and diverse culture, Canada is a top destination for international students seeking world-class education and research opportunities.</p>
                </div>
                <div class="destination-item">
                    <img src="../picture/countries/usa.png" alt="USA" class="destination-image">
                    <h3>USA</h3>
                    <p>Home to many of the world's top universities, the USA offers a wide range of programs and opportunities for students looking to advance their education and career prospects.</p>
                </div>
                <div class="destination-item">
                    <img src="../picture/countries/australia.png" alt="Australia" class="destination-image">
                    <h3>Australia</h3>
                    <p>With its strong emphasis on research and practical learning, Australia provides students with an innovative and high-quality education in a vibrant and welcoming environment.</p>
                </div>
                <div class="destination-item">
                    <img src="../picture/countries/uk.png" alt="UK" class="destination-image">
                    <h3>United Kingdom</h3>
                    <p>The UK is known for its rich academic heritage and rigorous education system, making it an ideal choice for students seeking to study in a prestigious and historic setting.</p>
                </div>
                <div class="destination-item">
                    <img src="../picture/countries/zealand.png" alt="New Zealand" class="destination-image">
                    <h3>New Zealand</h3>
                    <p>Offering a unique blend of quality education and exceptional lifestyle, New Zealand is an excellent destination for students looking for an adventurous and fulfilling study experience.</p>
                </div>
                <div class="destination-item">
                    <img src="../picture/countries/germany.png" alt="Germany" class="destination-image">
                    <h3>Germany</h3>
                    <p>Known for its cutting-edge research and top-tier universities, Germany is a prime destination for students interested in engineering, technology, and innovation.</p>
                </div>
            </div>
        </div>

        <!-- Upcoming Events -->
        <div class="events">
            <h2>Upcoming Events</h2>
            <div class="event-item">
                1. IELTS Preparation Workshop (Date: July 15, 2024): Join our intensive IELTS workshop to boost your exam skills and strategies.
            </div>
            <div class="event-item">
                2. Study Abroad Fair (Date: August 22, 2024): Meet representatives from top universities around the world.
            </div>
            <div class="event-item">
                3. Webinars and Workshops (Date: September 10, 2024): Conducting online webinars on topics like choosing a study destination, application processes, visa guidance.
            </div>
        </div>

        <!-- Testimonials -->
        <div class="testimonial">
            <h2>What Our Clients Say</h2>
            <p>"Insight Consultancy not only helped me excel in my IELTS exam but also provided invaluable guidance in navigating the process of studying abroad." - Client A</p>
            <p>"Thanks to Insight Consultancy, I not only achieved my desired scores in my IELTS exam but also received personalized support in preparing my visa applications and choosing the right destination for my overseas education." - Client B</p>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2024 Insight Consultancy. All rights reserved.</p>
        <p>
            <a href="#" class="text-white">Privacy Policy</a> |
            <a href="#" class="text-white">Terms of Service</a>
        </p>
    </div>
</body>

</html>
