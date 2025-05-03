<?php
// Start session
session_start();

// Check if session variables exist
if(isset($_SESSION['Uid']) && isset($_SESSION['psw'])) {
    // Retrieve Uid from session
    $Uid = $_SESSION['Uid'];

    // Database connection
    $conn = new mysqli("localhost", "root", "", "login");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Function to insert data into the database
    function insert($conn, $sql) {
        if ($conn->query($sql) === TRUE) {
            header('Location: done.php');
            exit;
        } else {
            header('Location: recordNot.php');
            exit;
        }
    }

    // Function to update data in the database
    function update($conn, $sql) {
        if ($conn->query($sql) === TRUE) {
            echo "New appointment scheduled";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Check if form is submitted
    if (!empty($_POST)) {
        // Validate form fields
        if (empty($_POST['requested_changes'])) {
            echo "Please enter requested_changes";
        } else {
            // Prepare the SQL statement
            $requested_changes = $_POST['requested_changes'];
            $sql = "INSERT INTO profilealter (name, request) VALUES ('$Uid', '$requested_changes')";

            // Call the insert function
            insert($conn, $sql);
        }
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Session variables not set. Please log in.";
}
?>

<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      background-color: #C4A484; /* light brown */
      margin: 0; 
       
    }
    
    header {
      height: 100px; 
      background-color: #C4A484; 
      text-align: center; 
    }
    
    header img {
      width: 100%; 
      height: 230%;
    }

    h1 {
      color: white;
      font-size: 20px;
      text-align: center;
      background-color: #C4A484;
    }

    p {
      font-family: verdana;
      font-size: 30px; /* Reduced font size */
    }

    p.outset {
      border-style: outset;
      text-align: center; 
      border-color: #ff6600; 
    }

    @keyframes fadeIn {
      0% {
        opacity: 0;
        transform: translateY(50%);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }
    
    .info {
      background-color:#e7ceb6;
      padding: 1px; 
      margin-bottom: 4px;
      width: 100%;
    }

    .info h3 {
      color: #3a0000;
      text-align: center;
    }

    .info p {
      margin: 1px 0;
      font-size: 20px;
    }

    .label {
      font-weight: bold;
      color:#3a0000;
    }

    input[type="submit"] {
      animation: fadeIn 2s ease forwards;
      size:30px;
    }
 footer {
      background-color: #C4A484;
      color: #3a0000;
      text-align: center;
      padding: 10px 0;
      bottom: 0;
      width: 100%;
    }
  </style>
</head>
<body>
<header>
  <img src="https://i.postimg.cc/X7vQZ9mb/NEXUS.png" alt="NEXUS" border="0">
</header>

<h1>
  <br>
  <br>
  <p class="outset">PROFILE ALTERATION</p>
</h1>
<div class="container" style="color:#3a0000; text-align: center; font-size:20px;">
  <h2 style="animation: fadeIn 2s ease forwards;">Student Profile Alterations</h2>
  <form action="" method="post">

    <label for="requested_changes">Requested Changes:</label><br>
    <textarea id="requested_changes" name="requested_changes" rows="4" cols="50" required></textarea><br>

    <input type="submit" value="Submit Request">
  </form>
</div>

<div class="info">
  <h3>DESCRIPTION:<br>
  PROCESS GLIMPSE:<br>
  <img src="https://i.postimg.cc/9FfZ5Nrs/50ec102b-df90-488b-8825-f02631732147.jpg"><br>
  1. When a student fills out the form to update their profile, the request goes to the administrative office.<br>
  2. The office takes about 5 to 6 business days to review and make the changes. They check if the changes follow university rules.<br>
  3. After making the updates, the student gets an email or message telling them it's done.<br>
  4. If the updates take longer than expected, the student can go to the office or email/call for help.<br>
  5. If there are any problems, the office works to fix them quickly and get the updates done.<br>
  6. Once everything's done, the student gets another email or message confirming that their profile is updated as they wanted.</h3>
</div>
<footer>
    &copy; 2024 NEXUS. All rights reserved.
  </footer>
</body>
</html>
