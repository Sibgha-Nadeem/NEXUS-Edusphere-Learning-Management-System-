<?php
$Uid = $_POST['Uid'];
$psw = $_POST['psw'];

// Start session
session_start();

// Store variables in session
$_SESSION['Uid'] = $Uid;
$_SESSION['psw'] = $psw;

//database connection
$con=mysqli_connect("localhost","root","","login");
if(!$con)
{
	die("Failed to connect");
}
else
{
	$stmt=$con->prepare("select * from loginInfo where Uid = ?");
	$stmt->bind_param("s",$Uid);
	$stmt->execute();
	$stmt_result = $stmt->get_result();
	if($stmt_result->num_rows>0)
	{
		$data = $stmt_result->fetch_assoc();
		if($data['psw']===$psw)
		{}
		else
		{
			header('Location: Unsuccessful.php');
			exit;
		}

	}
	else
	{
    		header('Location: Unsuccessful.php');
		exit;
	}
}
?>

<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      background-color: #C4A484; /* light brown */
    }

    h1 {
      color: white;
      font-size: 30px;
      text-align: right;
      background-color: #e7ceb6;
    }

    img {
      width: 200px;
      height: 200px;
    }

    p {
      font-family: verdana;
      font-size: 50px;
    }

    p.outset {
      border-style: outset;
      border-color: #ff6600; /* orange redishbrown=#3a0000,skin #ffe269 */
    }

    textarea {
      width: 100%;
      padding: 5px;
      font-size: 14px;
      border: 2px solid #3a0000;
      border-radius: 8px;
      background-color: pink;
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


    .side {
      color: #3a0000;
      font-size: 20px;
      animation: fadeIn 2s ease forwards;
      width: 45%; 
      display: inline-block;
      vertical-align: top;
      text-align: center; 
    }

    .side img {
      width: 150px;
      height: 150px;
      margin-right: 20px;
      margin-bottom: 10px;
    }

    .side strong {
      font-size: 24px;
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
<h1 style="color:white;">
  <p class="outset">NEXUS UNIVERSITY EDUSPHERE
   <img src="https://i.postimg.cc/KYM3zKPJ/nexus.png" alt="NEXUS" border="0">
  </p>
</h1>

<h2 style="color:#3a0000; text-align:center;  font-size: 30px;  animation: fadeIn 2s ease forwards;">
  <img src="https://i.postimg.cc/J4f4yB3n/bb.png" alt="bulletin board">
  <br>
  <strong> NEXUS BULLETIN BOARD</strong>
<textarea rows="4" cols="18" readonly style="color:#3a0000;background-color:pink;">
<?php
// Create connection
$conn = new mysqli("localhost", "root", "", "login");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL query to select all records from the bulletin_board table
$sql = "SELECT * FROM bulletinboard";
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Update Type: " . $row["UpdateType"] . "\n";
        echo "Details: " . $row["Details"] . "\n\n";
    }
} else {
    echo "No bulletins found.";
}

// Close database connection
$conn->close();
?>
</textarea>
</h2>
<div class="side">
  <img src="https://i.postimg.cc/Pq80wMD7/UniInfo.png" alt="student info">
  <br>
<a href='stuinfo.php' target='_self'>
  <strong>STUDENT INFORMATION</strong>
</a>
  <br>
  <img src="https://i.postimg.cc/6p1fXJ8s/peronsonalinfo.png" alt="personal">
  <br>
<a href='personalinfo.php' target='_self'>
  <strong>PERSONAL INFORMATION </strong>
</a>
  <br>
  <br>
  <img src="https://i.postimg.cc/x89ZBDZr/profile-Alter.png" alt="profile">
  <br>
<a href='profilealter.php' target='_self'>
  <strong>PROFILE ALTERATIONS </strong>
  <br>
</a>
  <img src="https://i.postimg.cc/PxWc6r2z/Course-Reg.png" alt="reg">
  <br>
<a href='coursereg.php' target='_self'>
  <strong>COURSE REGISTRATION </strong>
  <br>
</a>
  <img src=" https://i.postimg.cc/x8RLpBw4/attendance.png" alt="attendance">
  <br>
<a href='attendance.php' target='_self'>
  <strong>ATTENDANCE</strong>
   <br>
</a>
  <img src="https://i.postimg.cc/wjSR26tB/transcript.png" alt="attendance">
  <br>
<a href='transcript.php' target='_self'>
  <strong>TRANSCRIPT</strong>
<br>
</a>
<img src="https://i.postimg.cc/KzMp0CHV/courses.png" alt="courses">
  <br>
<a href='courses.php' target='_self'>
  <strong>TENTATIVE STUDY PLAN</strong>
  <br>
</a>
</div>
<div class="side">
 <img src="https://i.postimg.cc/qRQ7P07y/academics.png" alt="academics">
  <br>
<a href='academic.php' target='_self'>
  <strong>ACADEMICS</strong>
  <br>
</a>
  <img src="https://i.postimg.cc/SxRf5t1X/fee-details-logo.png" alt="fee details">
  <br>
<a href='fee.php' target='_self'>
  <strong> FEE DETAILS</strong>
</a>
  <br>
  <img src="https://i.postimg.cc/8CtD5cBX/health-services.png" alt="health service">
  <br>
<a href='health.php' target='_self'>
  <strong>HEALTH SERVICES</strong>
  <br>
</a>
  <img src="https://i.postimg.cc/Dwf2LRfM/Society-Reg.png" alt="society registrations">
  <br>
<a href='societyreg.php' target='_self'>
  <strong>SOCIETY REGISTRATIONS</strong>
  <br>
</a>
  <img src="https://i.postimg.cc/bwFjbJBZ/Complaint-Queries.png" alt="COMPLAINTS">
  <br>
<a href='commpl.php' target='_self'>
  <strong>COMPLAINT AND QUERIES </strong>
   <br>
</a>
  <img src="https://i.postimg.cc/PxnZXth7/facultyrating.png" alt="faculty">
  <br>
<a href='faculty.php' target='_self'>
  <strong>FACULTY RATINGS</strong>
  <br>
</a>
  <img src="https://i.postimg.cc/NGJMbgSw/DCnotice.png" alt="dc notices">
  <br>
<a href='DCnotices.php' target='_self'>
  <strong >DC NOTICES</strong>
</a>
 </div>
  <footer>
    &copy; 2024 NEXUS. All rights reserved.
  </footer>
</body>
</html>