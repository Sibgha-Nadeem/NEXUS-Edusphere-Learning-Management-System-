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
  <p class="outset">TRANSCRIPT
  </p>
</h1>
<h3 style="color:white; font-size:24px;text-align:center; animation: fadeIn 2s ease forwards;">IMPORTANT NOTICE:
</h3>
<h2 style="color:#3a0000; animation: fadeIn 2s ease forwards; font-size:24px;" >
To obtain a transcript, students need to request it from their NEXUS registrar's office, often with a nominal fee.It's essential for students to keep their transcripts secure and to ensure that they remain accurate reflections of their academic achievements.
</h2>
<h4 style="color:white; font-size:24px; animation: fadeIn 2s ease forwards;text-align:center;">FOR AWARD OF ANY DEGEREE:<br>
According to university policy:<br>
MINIMUM CGPA REQUIRED:  2.5 <br>
TOTAL CREDIT HOURS NEEDED: 120
</h4>

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
	$sql = "SELECT * FROM transcript WHERE RollNo = '$Uid'";
	$result = $conn->query($sql);

	// Check if there are any rows returned
	if ($result->num_rows > 0) 
	{
		// Output table header with expanded width
		echo "<table border='1' style='width:60%;margin:auto;color:white; text-align:center'>";
		echo "<tr><th>RollNo</th><th>CS2005</th><th>CS2006</th><th>CS2009</th><th>EE1009</th><th>MG1007</th><th>CL2005</th><th>CL2006</th></tr>";

		// Output data of each row
		while($row = $result->fetch_assoc()) 
		{
			echo "<tr><td>".$row["RollNo"]."</td><td>".$row["CS2005"]."</td><td>".$row["CS2006"]."</td><td>".$row["CS2009"]."</td><td>".$row["EE1009"]."</td><td>".$row["MG1007"]."</td><td>".$row["CL2005"]."</td><td>".$row["CL2006"]."</td></tr>";
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
