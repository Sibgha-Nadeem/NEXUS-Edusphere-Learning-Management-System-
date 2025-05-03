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
      font-size: 50px;
    }

    p.outset {
      border-style: outset;
      border-color: #ff6600; 
    }
    
    table, th, td {
      border: 1px solid black;
      color: #3a0000;
      background-color: #e7ceb6;
      font-size: 20px;
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
    
    textarea {
      width: 100%;
      padding: 10px;
      font-size: 14px;
      border: 2px solid white;
      border-radius: 8px;
      background-color: pink;
    }
    
    .side {
      color: #3a0000;
      font-size: 20px;
      width: 45%; 
      border-radius: 8px;
      display: inline-block;
      vertical-align: top;
      text-align: right; 
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
  <p class="outset">FEE DETAILS</p>
</h1>
<br>
<textarea rows="8" cols="8" readonly>
Nexus University offers various fee payment options, including online payment portals, bank transfers, payment plans, and in-person payments. Students can also explore scholarships and financial aid options. 
For more information, students can visit the university's accounts department.
                      IMPORTANT INSTRUCTIONS FOR FEE:
                    -->Late Payment Fine Rules:
A late payment fine of 1% per week may be imposed on overdue fees.
Failure to pay fees on time could result in restrictions on access to university services and registration for classes.
                    -->Online Payment Platform:
Nexus University's online payment platform can be accessed at https://www.random.org/.
                    -->Banks for Payment:
Students can make payments through the following banks:
Bank A,Bank B,Bank C (any branch)

For more information, students can visit the university's accounts department.
</textarea>
</div>

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
	$sql = "SELECT * FROM feedetails WHERE Uid = '$Uid'";
	$result = $conn->query($sql);

	// Check if there are any rows returned
	if ($result->num_rows > 0) 
	{
		// Output table header with expanded width
		echo "<table border='1' style='width: 100%;'>";
		echo "<tr><th>Semester</th><th>Amount</th><th>Status</th></tr>";

		// Output data of each row
		while($row = $result->fetch_assoc()) 
		{
			echo "<tr><td>".$row["Semester"]."</td><td>".$row["Amount"]."</td><td>".$row["Status"]."</td></tr>";
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
