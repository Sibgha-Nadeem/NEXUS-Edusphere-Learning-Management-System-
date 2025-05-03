<?php

session_start(); // Start session

$conn = mysqli_connect("localhost", "root", "", "login");

function insert($conn, $sql) {
    if ($conn->query($sql) === TRUE) {
        header('Location: done.php');
    } 
else {
        header('Location: recordNot.php');
    }
}

function update($conn, $sql) {
    if ($conn->query($sql) === TRUE) {
        echo "New appointment scheduled";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (!empty($_POST)) {
    // Check if session variables exist
    if (isset($_SESSION['Uid'])) {
        $RollNo = $_SESSION['Uid']; // Retrieve RollNo from session

        // Validate form fields
        $errors = [];
        if (empty($_POST['doctor_type'])) {
            $errors[] = "Please enter doctor type";
        }
        if (empty($_POST['service_type'])) {
            $errors[] = "Please enter type of service";
        }
        if (empty($_POST['appointment_date'])) {
            $errors[] = "Please enter date of appointment";
        }

        if (empty($errors)) {
            // Prepare the SQL statement with RollNo included
            $sql = "INSERT INTO health (doctortype, servicetype, appdate, RollNo) VALUES ('" . $_POST['doctor_type'] . "', '" . $_POST['service_type'] . "', '" . $_POST['appointment_date'] . "', '$RollNo')";

            // Call the insert function
            insert($conn, $sql);
        } else {
            // Output validation errors
            foreach ($errors as $error) {
                echo $error . "<br>";
            }
        }
    } else {
        echo "Session variables not set. Please log in.";
    }
}

?>



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
    
    .container {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #e7ceb6; /* light beige */
 animation: fadeIn 2s ease forwards; /* Apply fadeIn animation */
    }

    label {
      font-weight: bold;
      color: #3a0000; /* dark brown */
    }
     table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: middle;
      color:#d5f3fe;
    }

    th {
      background-color: #C4A484;
      color: white;
    }

    select, input[type="date"], input[type="submit"] {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
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
      width: 300px;
      height: 300px;
      margin-right: 20px;
      margin-bottom: 10px;
    }

    
  </style>
</head>
<body>
<header>
  <img src="https://i.postimg.cc/X7vQZ9mb/NEXUS.png" alt="NEXUS" border="0">
</header>

<h1>
  <br>
  <br>
  <p class="outset">HEALTH SERVICES</p>
</h1>

<div class="container">
  <form id="appointment_form" action="" method="post" >
    <label for="doctor_type">Select Doctor Type:</label><br>
    <select id="doctor_type" name="doctor_type">
      <option value="doctor">Doctor</option>
      <option value="psychiatrist">Psychiatrist</option>
    </select><br>

    <label for="service_type">Select Service:</label><br>
    <select id="service_type" name="service_type">
      <option value="Consultation">Consultation</option>
      <option value="Check-up">Check-up</option>
      <option value="Treatment">Treatment</option>
    </select><br>

    <label for="appointment_date">Select Appointment Date:</label><br>
    <input type="date" id="appointment_date" name="appointment_date" required><br>

    <input type="submit" value="Submit Request">
    </form>
</div>
<h1> FOR FURTHUR INFORMATION OR ANY CONCERNS PLEASE CONTACT:</h1>
<div class="side">
<h2 style="color:white;"> 
<img src="https://i.postimg.cc/PJwym3Y6/doctor.png">
<br>
University Health Center:<br> (555) 123-4567
   </h2>
   </div>
   <div class="side">
   <h3 style="color:white;">
   <img src="https://i.postimg.cc/SNb7BGWh/psychiatrist.png">
   <br>
     University Counseling Service:<br> (555) 987-6543</h3>
     </div>
<h3 style="color:#d5f3fe; font-size:20px">Emergency Contact Numbers</h3>

<table>
  <tr>
    <th>Service</th>
    <th>Contact Number</th>
  </tr>
  <tr>
    <td>Ambulance</td>
    <td>1122</td>
  </tr>
  <tr>
    <td>Police</td>
    <td>911</td>
  </tr>
  <tr>
    <td>Fire Department</td>
    <td>911</td>
  </tr>
  <tr>
    <td>Poison Control</td>
    <td>1-800-222-1222</td>
     <tr>
    <td>Medical Emergency Hotline</td>
    <td>112</td>
  </tr>
  <tr>
    <td>Roadside Assistance</td>
    <td>1-800-AAA-HELP (1-800-222-4357)</td>
  </tr>
  <tr>
    <td>National Suicide Prevention Lifeline</td>
    <td>1-800-273-TALK (1-800-273-8255)</td>
  </tr>
  <tr>
    <td>Domestic Violence Hotline</td>
    <td>1-800-799-SAFE (1-800-799-7233)</td>

  </tr>
</table>
</body>
</html>
