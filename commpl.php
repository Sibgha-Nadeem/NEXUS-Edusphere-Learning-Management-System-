<?php
// Start session
session_start();

// Check if session variables exist
if (isset($_SESSION['Uid'])) {
    // Retrieve Uid from session
    $Uid = $_SESSION['Uid'];

    // Database connection
    $conn = mysqli_connect("localhost", "root", "", "login");

    // Function to execute insert query
    function insert($conn, $sql) {
        if ($conn->query($sql) === TRUE) {
            header('Location: done.php');
            exit;
        } else {
            header('Location: recordNot.php');
            exit;
        }
    }

    // Function to execute update query
    function update($conn, $sql) {
        if ($conn->query($sql) === TRUE) {
            echo "New appointment scheduled";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    if (!empty($_POST)) {
        // Check for required fields
       if (empty($_POST['complaints']) && empty($_POST['queries'])) 
{
        header('Location: recordNot.php');
        exit;
    }

        // Insert into complaints table with Uid as RollNo
        $sql = "INSERT INTO complaints (RollNo, complain, query) VALUES ('$Uid', '" . $_POST['complaints'] . "', '" . $_POST['queries'] . "')";
        insert($conn, $sql);
    }
} else {
    // Redirect to login page if session variables are not set
    header("Location: login.php");
    exit();
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
      font-size: 30px; 
    }

    p.outset {
      border-style: outset;
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
  <header>
  <img src="https://i.postimg.cc/X7vQZ9mb/NEXUS.png" alt="NEXUS" border="0">
  </header>
</head>
<body>
<h1>

<br>
<br>
  <p class="outset">COMPLAINTS AND QUERIES
  </p>
</h1>
<h2 style="animation: fadeIn 2s ease forwards;text-align:center;color:#3a0000;">COMPLAINTS RULES</h2>
  <h3 style="color:white;"><br>
  1. Students must provide accurate details when submitting complaints or queries forms.Forms are automatically sent to the administrative office.
<br>
2-The office confirms receipt within one business day.
Review and alignment with university regulations take 5 to 6 business days.<br>

3-Students are notified via email or message once changes are implemented.

<br>
4-Students should contact the office if there are unexpected delays.
<br>
5-The office works promptly to resolve any discrepancies during processing.
<br>
6-Students receive final confirmation when updates are completed.
</h3>
<h2 style="animation: fadeIn 2s ease forwards;text-align:center;color:#3a0000;">QUERIES RULES</h2>
  <h3 style="color:white;"><br>
1-Students should submit queries using the designated form.Queries must include clear and concise details for efficient processing.
<br>
2-The administrative office aims to respond to queries within 2 business days of receipt.Complex queries may require additional time for thorough investigation and response.
</h3>
<div class="container" style="color:#3a0000;text-align:center;font-size:20px;animation: fadeIn 2s ease forwards">
  <form action="" method="post">
    
       <label for="complaints">COMPLAINTS:</label><br>
    <textarea id="complaints" name="complaints" rows="4" cols="50"></textarea><br>
    
     <label for="QUERIES">QUERIES:</label><br>
    <textarea id="QUERIES" name="queries" rows="4" cols="50" placeholder="how can we help you?"></textarea><br>
    <input type="submit" value="Submit">
  </form>
</div>
 <footer>
    &copy; 2024 NEXUS. All rights reserved.
  </footer>
</body>
</html>

