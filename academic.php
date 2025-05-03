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
  <p class="outset">ACADEMICS
  </p>
</h1>
<h2 style="color:#3a0000;text-align:center; animation: fadeIn 2s ease forwards; font-size:24px;" >
<label>IMPORTANT NOTICE:</label><br>
<textarea rows="5" cols="100" readonly style="color:#3a0000;background-color:#ffdab9;">
 Ensure a clear understanding of your institution's grading criteria and assessment weights.
 Keep track of your performance in assignments and exams, seeking feedback topinpoint areas for growth. 
 GRADES WILL BE DISPLAYED ON THE TRANSCRPT WITHIN THE DAYS SPECIFIED.
</textarea>
</h2>
<h3 style="color:white;text-align:center; animation: fadeIn 2s ease forwards;">
Your Academics include Marks of Assignments/Class Activities/Homeworks,Quizzes,Sessional and Final Exam.<br>
The Evaluations of Lab(s) and Course(s) will depend upon instructor(s) and will NOT affect the other.<br>

</h3>

<h2 style="color:#3a0000;text-align:center;font-size:20px;">
BEST OF MARKS:
</h2>



<?php
// Start session
session_start();

// Check if session variables exist
if(isset($_SESSION['Uid']) && isset($_SESSION['psw'])) 
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

	// Prepare SQL query to select fee details for the logged-in user
	$sql = "SELECT * FROM academic WHERE RollNo = '$Uid'";
	$result = $conn->query($sql);

	// Check if there are any rows returned
	if ($result->num_rows > 0) 
	{
		// Output table header with expanded width
		echo "<table border='1' style='width: 60%;margin:auto;color:white;text-align:center'>";
		echo "<tr><th>RollNo</th><th>Assignment 1</th><th>Assignment 2</th><th>Quiz 1</th><th>Quiz 2</th><th>Sessional</th><th>Final</th></tr>";

		// Output data of each row
		while($row = $result->fetch_assoc()) 
		{
			echo "<tr><td>".$row["RollNo"]."</td><td>".$row["A1"]."</td><td>".$row["A2"]."</td><td>".$row["Q1"]."</td><td>".$row["Q2"]."</td><td>".$row["Sessional"]."</td><td>".$row["Final"]."</td></tr>";
		}

		// Close table
		echo "</table>";
	}
	else
	{
		echo "No fee details found for the logged-in user.";
	}

	// Close database connection
	$conn->close();
} 
else 
{
	// Redirect to login page if session variables are not set
	header("Location: login.php");
	exit();
}
?>

</body>
</html>