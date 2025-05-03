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
  <p class="outset">STUDENT PERSONAL INFORMATION</p>
</h1>
<br>
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
    $sql = "SELECT * FROM personalinfo WHERE RollNo = '$Uid'"; // Assuming roll_number is the unique identifier
    $result = $conn->query($sql);

    if ($result->num_rows > 0) 
{
        // Output data of the student
        while($row = $result->fetch_assoc()) 
{
            echo "<p><span class='label'>Student's Name:</span> " . $row["StFirstName"]. " " . $row['StudentLastName'] . "</p>";  
	    echo "<p><span class='label'>Father's Name:</span> " . $row['FatherFirstName'] . " " . $row['FatherLastName'] . "</p>";           
	    echo "<p><span class='label'>Gender:</span> " . $row["Gender"]. "</p>";
            echo "<p><span class='label'>Student CNIC:</span> " . $row["StudentCNIC"]. "</p>";
            echo "<p><span class='label'>Father CNIC:</span> " . $row["FatherCNIC"]. "</p>";
            echo "<p><span class='label'>Email:</span> " . $row["Email"]. "</p>";
	    echo "<p><span class='label'>Blood Type:</span> " . $row["BloodType"]. "</p>";
            echo "<p><span class='label'>DOB:</span> " . $row["DOB"]. "</p>";
            echo "<p><span class='label'>Nationality:</span> " . $row["Nationality"]. "</p>";
            echo "<p><span class='label'>Mobile No.:</span> " . $row["MobileNum"]. "</p>";
	    echo "<p><span class='label'>Father's No.:</span> " . $row["FatherNum"]. "</p>";
            echo "<p><span class='label'>Emergency No.:</span> " . $row["EmerNum"]. "</p>";
            echo "<p><span class='label'>House No.:</span> " . $row["HouseNum"]. "</p>";
            echo "<p><span class='label'>Block:</span> " . $row["Block"]. "</p>";
            echo "<p><span class='label'>Town:</span> " . $row["Town"]. "</p>";
            echo "<p><span class='label'>City:</span> " . $row["City"]. "</p>";



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
