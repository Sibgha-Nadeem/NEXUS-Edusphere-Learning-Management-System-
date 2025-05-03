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
  <p class="outset">ATTENDANCE
  </p>
</h1>
<h2 style="color:#3a0000;text-align:center; animation: fadeIn 2s ease forwards; font-size:24px;" >
<label>IMPORTANT NOTICE:</label><br>
<textarea rows="4" cols="50" readonly style="color:#3a0000;background-color:#ffdab9;">
For students, managing leaves or late attendance requires proactive communication with instructors to mitigate any potential impact on their attendance record.Promptly notifying instructors of any unavoidable absences demonstrates accountability and a commitment to meeting the attendance requirement.
</textarea><br>
Adhering to the 60% attendance limit for exam eligibility is Important. 
</h2>
</body>
</html>





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
	$sql = "SELECT * FROM attendance WHERE RollNo = '$Uid'";
	$result = $conn->query($sql);

	// Check if there are any rows returned
	if ($result->num_rows > 0) 
	{
		// Output table header with expanded width
		echo "<table border='1' style='width:60%;color:white;margin:auto;text-align:center;'>";
		echo "<tr><th>RollNo</th><th>CS2005</th><th>CS2006</th><th>MG1007</th><th>CS2009</th><th>EE1009</th><th>CL2005</th><th>CL2006</th></tr>";

		// Output data of each row
		while($row = $result->fetch_assoc()) 
		{
			echo "<tr><td>".$row["RollNo"]."</td><td>".$row["CS2005"]."</td><td>".$row["CS2006"]."</td><td>".$row["MG1007"]."</td><td>".$row["CS2009"]."</td><td>".$row["EE1009"]."</td><td>".$row["CL2005"]."</td><td>".$row["CL2006"]."</td></tr>";
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
