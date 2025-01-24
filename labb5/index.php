<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Language Switcher</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .sidebar {
            margin: 20px;
            padding: 15px;
            background-color: #f1f1f1;
            border-radius: 10px;
            text-align: left;
        }

        .sidebar a {
            display: block;
            padding: 10px;
            margin: 5px 0;
            text-decoration: none;
            color: #333;
            background-color: #eaeaea;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .sidebar a:hover {
            background-color: #ddd;
        }

        .language-switch {
            text-align: right;
            margin: 10px;
        }

        .language-switch button {
            padding: 10px;
            margin: 5px;
            display: inline-flex;
            align-items: center;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            cursor: pointer;
        }

        .language-switch button img {
            width: 20px;
            height: 15px;
            margin-right: 5px;
        }

        .form-button {
            padding: 10px 20px;
            margin: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .form-button:hover {
            background-color: #0056b3;
        }

        .content {
            margin: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

    <!-- Sidebar Content -->
    <div class="sidebar">
        <h3>Navigation</h3>
        <a href="index.php">Home</a>
        <a href="about.php">About</a>
        <a href="contact.php">Contact</a>
        <a href="resources.php">Resources</a>
    </div>

    <!-- Main Content -->
    <div class="content">

        <!-- Language Switcher Buttons -->
        <div class="language-switch">
            <form action="" method="get" style="display: inline;">
                <button name="language" value="tigrinya">
                    <img src="tigrinya_flag.png" alt="Tigrinya">ትግርኛ</button>
            </form>
            <form action="" method="get" style="display: inline;">
                <button name="language" value="swedish">
                    <img src="swedish_flag.png" alt="Swedish">Svenska</button>
            </form>
        </div>

        <h1><b>ሻሎም</b></h1>
        <h1>ትምርቲ ትግርኛ ንዘይክእል መጀመሪ ንዝክእል ከኣ ፍልጠቱ መስፍሒ</h1>
        <h4>ዝቀለል መገዲ ቲግርኛ ክትምሃር</h4>

        <!-- Forms for Learning Levels -->
        <form class="test-form1" action='first.php' method="get">
            <button value="ጀማራይ(Beginner)" name="biggner" id="byt1" class="form-button">ጀማራይ (Beginner)</button>
        </form>

        <input type="button" value="ይክእል (Advanced)" id="byt2" class="form-button">

        <!-- Login Button in a Different Location -->
        <div style="margin-top: 30px;">
            <form class="test-form" action='sql.php' method="get">
                <button name="login" value="log in" class="form-button">Log In</button>
            </form>
        </div>

    </div>

    <!-- Footer Section -->
    <footer style="margin-top: 20px; font-size: 12px; color: gray; text-align: center;">
        <p>© 2025 Language Learning Platform</p>
    </footer>

    <?php
    // Language Switch Logic
    if (isset($_GET['language'])) {
        $language = $_GET['language'];
        if ($language == 'swedish') {
            echo "<script>
                document.querySelector('html').lang = 'sv';
                document.querySelector('h1').innerHTML = 'Välkommen';
                document.querySelector('h4').innerHTML = 'En enkel väg att lära sig svenska';
                document.querySelector('.test-form1 button').innerHTML = 'Ny Börjare';
                document.querySelector('#byt2').value = 'Avancerad';
            </script>";
        }
    }
    ?>

</body>
</html>
