<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      background-color: #C4A484;
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
  <p class="outset">DC NOTICES </p>
</h1>
<h1 style="color:#3a0000">
Disciplinary action has been taken against the students indicated here below:
</h1>
<h2 style="color:#3a0000;text-align:center; animation: fadeIn 2s ease forwards; font-size:24px;" >
<label>IMPORTANT NOTICE:</label><br>
<textarea rows="4" cols="50" readonly style="color:#3a0000;background-color:#ffdab9;">
A strict action which may amount to expulsion from the university will be taken in case found guilty of another DC Punishment in the future.
</textarea><br>
</h2>
<h3 style="color:#3a0000;text-align:center; animation: fadeIn 2s ease forwards; font-size:24px;" >
<label>APPEAL INSTRUCTIONS:</label><br>
<textarea rows="4" cols="50" readonly style="color:#3a0000;background-color:#ffdab9;">An appeal can be filed against this decision to the Director, NEXUS University within fifteen (15) days of the notification of this decision.
</textarea><br><br>
</h3>



<?php
// Create connection
$conn = new mysqli("localhost", "root", "", "login");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to select all data from dcnotice table
$sql = "SELECT * FROM dcnotices";
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) 
	{
		// Output table header with expanded width
		echo "<table border='1' style='width: 60%;color:white;margin:auto;'>";
		echo "<tr><th>ID</th><th>Description</th><th>Date</th></tr>";

		// Output data of each row
		while($row = $result->fetch_assoc()) 
		{
			echo "<tr><td>".$row["DCID"]."</td><td>".$row["Description"]."</td><td>".$row["date"]."</td></tr>";
		}

		// Close table
		echo "</table>";
	}
	else
	{
		echo "No fee details found for the logged-in user.";
	}


// Close connection
$conn->close();
?>



<h3 style="color: #3a0000">
Dr.Elena Cruz<br>   
(Chairman CDC)
</h3>
<h4 style="color: #3a0000; font-size: 20px;background-color: #C4A484;">
 Copy to:<br>
1. Notice Board<br>
2. Disciplinary Committee<br>
3. Heads of Departments<br>
4. Academic Office<br>
5. Parents / Guardians<br>
6. Course Instructor<br>
</h4>
</body>
</html>