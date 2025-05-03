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
      height: 200%;
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
      border-color: #ff6600; 
    }
    
    table, th, td {
      border: 1px solid black;
      color: #3a0000;
      background-color: #e7ceb6;
      font-size: 30px; /* Reduced font size */
      animation: fadeIn 2s ease forwards;
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
      padding: 2px; 
      margin-bottom: 4px;
      width: 100%;
    }
    .info p {
      margin: 1px 0;
      font-size: 20px; /* Reduced font size */
    }
    .label {
      font-weight: bold;
      color:#3a0000;
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
  <p class="outset">STUDENT INFORMATION
  </p>
</h1>
<br>
<h2 style="text-align:center;color:white;">
UNIVERSITY INFO
</h2>
<div class="info"style="text-align:center;color:grey">



 <?php
// Start session
session_start();

// Check if session variable exists
if(isset($_SESSION['Uid'])) 
{
    // Retrieve Uid from session
    $Uid = $_SESSION['Uid'];

    // Database connection
    $conn = new mysqli("localhost", "root", "", "login");

    // Check connection
    if ($conn->connect_error)
 {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to retrieve student details based on Uid
    $sql = "SELECT * FROM studentinfo WHERE RollNo = '$Uid'"; // Assuming roll_number is the unique identifier
    $result = $conn->query($sql);

    if ($result->num_rows > 0) 
{
        // Output data of the student
        while($row = $result->fetch_assoc()) 
{
            echo "<p><span class='label'>Roll Number:</span> " . $row["RollNo"]. "</p>";
            echo "<p><span class='label'>Current Status:</span> " . $row["CurrStat"]. "</p>";
            echo "<p><span class='label'>Majors:</span> " . $row["Majors"]. "</p>";
            echo "<p><span class='label'>Semester:</span> " . $row["Semester"]. "</p>";
            echo "<p><span class='label'>Parent Section:</span> " . $row["ParSection"]. "</p>";
            echo "<p><span class='label'>Email:</span> " . $row["Email"]. "</p>";
            echo "<p><span class='label'>Campus:</span> " . $row["Campus"]. "</p>";
            echo "<p><span class='label'>SGPA:</span> " . $row["SGPA"]. "</p>";
            echo "<p><span class='label'>CGPA:</span> " . $row["CGPA"]. "</p>";

        }
    } 
else 
{
        echo "No student details found.";
    }

    $conn->close();
} 
else 
{
    // Redirect to login page if session variable is not set
    header("Location: login.php");
    exit();
}
?>


</div>
<br>

</body>
</html>

</html>
