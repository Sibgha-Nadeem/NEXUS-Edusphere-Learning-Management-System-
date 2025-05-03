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

  </style>
  <header>
  <img src="https://i.postimg.cc/X7vQZ9mb/NEXUS.png" alt="NEXUS" border="0">
  </header>
</head>
<body>
<h1>
<br>
<br>
  <p class="outset">TENTATIVE STUDY PLAN
  </p>
</h1>
<h2 style="color:#3a0000;text-align:center; animation: fadeIn 2s ease forwards; font-size:24px;">
COURSES OFFERED BY THE UNIVERSITY ARE :-
</h2>


<?php
// Create connection
$conn = new mysqli("localhost", "root", "", "login");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL query to select all records from the course table
$sql = "SELECT * FROM courses";
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) 
{
    // Start HTML table and output table headers
    echo "<table border='1' style='width: 60%;color:white;text-align:center;margin:auto;'>";
    echo "<tr><th>Course ID</th><th>Course Name</th><th>Credit Hours</th></tr>";

    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["courseID"]."</td><td>".$row["CourseName"]."</td><td>".$row["CreditHrs"]."</td></tr>";
    }

    // Close HTML table
    echo "</table>";
} else {
    echo "No courses found.";
}

// Close database connection
$conn->close();
?>



</body>
</html>
