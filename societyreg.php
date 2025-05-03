
<?php

session_start(); // Start session

$conn = mysqli_connect("localhost", "root", "", "login");

function insert($conn, $sql){
    if ($conn->query($sql) === TRUE) {
        // Success, do nothing or handle accordingly
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (!empty($_POST)) {
    // Check if session variables exist
    if (isset($_SESSION['Uid'])) {
        $RollNo = $_SESSION['Uid']; // Retrieve RollNo from session

        if(empty($_POST['society'])) {
            echo "Please choose society name";
        } else {
            foreach ($_POST['society'] as $selectedSociety) {
                // Prepare the SQL statement with RollNo included
                $sql = "INSERT INTO societyregistration (societyname, RollNo) VALUES ('" . $selectedSociety . "', '$RollNo')";
                insert($conn, $sql);
            }

            header('Location: done.php');
            exit;
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
    body 
    {
      background-color: #C4A484; 
      margin: 0; 
    }
    
    header 
    {
      height: 100px; 
      background-color: #C4A484; 
      text-align: center; 
    }
    
    header img 
    {
      width: 100%; 
      height: 230%;
    }

    h1 
    {
      color: white;
      font-size: 20px;
      text-align: center;
      background-color: #C4A484;
    }

    p {
      font-family: verdana;
      font-size: 30px; 
    }

    p.outset 
    {
      border-style: outset;
      border-color: #ff6600; 
    }
    
    table, th, td 
    {
      border: 1px solid black;
      color: #3a0000;
      background-color: #e7ceb6;
      font-size: 30px; 
      animation: fadeIn 2s ease forwards;
    }

    @keyframes fadeIn
    {
      0% {
        opacity: 0;
        transform: translateY(50%);
      }
      100% 
      {
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
      width: 200px;
      height: 200px;
      margin-right: 20px;
      margin-bottom: 10px;
    }

    .side strong {
      font-size: 24px;
    }
    form {
      color: #d5f3fe;
      font-size: 25px;
    }
    
    input[type="submit"] {
      background-color: #3a0000;
      color: white;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
      font-size: 20px;
    }
    
    input[type="checkbox"] {
      margin-right: 10px;
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
  <header>
  <img src="https://i.postimg.cc/X7vQZ9mb/NEXUS.png" alt="NEXUS" border="0">
  </header>
</head>
<body>
<h1>
<br>
<br>
  <p class="outset">SOCIETY REGISTRATIONS
  </p>
</h1>
  <h2 style="color:white;font-size:30px;text-align:center;">Select Societies</h2>
  <form action="" method="post">
    <label for="society1">
      <input type="checkbox" id="society1" name="society[]" value="NEXUS Harmony Society"> NEXUS Harmony Society
    </label>
    <br>
    <label for="society2">
      <input type="checkbox" id="society2" name="society[]" value="Tech Innovators Society"> Tech Innovators Society
    </label>
    <br>
    <label for="society3">
      <input type="checkbox" id="society3" name="society[]" value="Artistic Expression Collective"> Artistic Expression Collective
    </label>
    <br>
    <label for="society4">
      <input type="checkbox" id="society4" name="society[]" value="Wellness Warriors Group"> Wellness Warriors Group
    </label>
    <br>
    <label for="society5">
      <input type="checkbox" id="society5" name="society[]" value="Adventure Seekers Club"> Adventure Seekers Club
    </label>
    <br>
    <label for="society6">
      <input type="checkbox" id="society6" name="society[]" value="Literary Enthusiasts Guild"> Literary Enthusiasts Guild
    </label>
    <br>
    <label for="society7">
      <input type="checkbox" id="society7" name="society[]" value="NEXUS Sports Society"> NEXUS Sports Society
    </label>
    <br>
    <label for="society8">
      <input type="checkbox" id="society8" name="society[]" value="Martial Arts Academy"> Martial Arts Academy
    </label>
    <br>
    <label for="society9">
      <input type="checkbox" id="society9" name="society[]" value="NEXUS Creative Society"> NEXUS Creative Society
    </label>
    <br>
    <label for="society10">
      <input type="checkbox" id="society10" name="society[]" value="NEXUS DEBATE Society"> NEXUS DEBATE Society
    </label>
    <br>
    <label for="society11">
      <input type="checkbox" id="society11" name="society[]" value="Business Leaders Network"> Business Leaders Network
    </label>
    <br>
    <input type="submit" value="Submit">
  </form>
  <br>
  <h3 style="color:white;"> DESCRIPTION BELOW:<br>
  For more info, visit the SAB(STUDENT ACTIVITY BLOCK) where the societies are physically located.
  After you have been registered, you'll recieve an email from the respective society for an interview.GOOD LUCK!
  </h3>
<div class="side">
 <img src="https://i.postimg.cc/x83CYrXz/fcdd7ebe-0bb8-485c-813e-c6802fdb18ac.jpg">
<h2 style="color:white;">
  NEXUS Harmony Society:-<br>
  A community dedicated to promoting peace, understanding, and cooperation among individuals from diverse backgrounds and cultures.
</h2>
<br>
 <img src="https://i.postimg.cc/rmz3M5zC/fd2b58bf-9757-4d47-8e1e-821f175ac8ac.jpg">
<h3 style="font-size:25px;color:white">
 Tech Innovators Society:-<br>
 An organization focused on fostering innovation and entrepreneurship in technology, providing a platform for collaboration, skill development, and networking among tech enthusiasts.
 </h3>
 <br>
  <img src="https://i.postimg.cc/zfhHMcFn/9ff3c9a0-f72d-4c78-aac5-af9ce911573e.jpg">
<h4 style="font-size:25px;color:white">
 Artistic Expression Collective:-<br>
  A space for artists of all mediums to share their work, collaborate on projects, and inspire creativity through exhibitions, workshops, and artistic events.
</h4>
<br>
 <img src="https://i.postimg.cc/8cQ24jPR/1332ec27-c984-488e-8415-2c79918d4b88.jpg">
<h5 style="font-size:25px;color:white">
Wellness Warriors Group:-<br>
 A supportive community dedicated to holistic well-being, promoting physical, mental, and emotional health through activities such as yoga, meditation, fitness, and mental health awareness campaigns.
</h5>
<br>
 <img src="https://i.postimg.cc/yN3pGsGv/eac94da9-d5c9-47ab-be94-1e0852c33e5e.jpg">
<h6 style="font-size:25px;color:white">
Adventure Seekers Club:<br>
An adventurous group organizing outdoor activities, travel expeditions, and adrenaline-pumping adventures, fostering a sense of camaraderie among thrill-seekers and nature enthusiasts.
</h6>
<br>
 </div>
 <div class="side">
 <img src="https://i.postimg.cc/T2tSh7nj/3bb25569-b4b7-4295-b082-ad9f8f867001.jpg">
 <br>
<h7 style="font-size:25px;color:white">
 Literary Enthusiasts Guild:-<br>
  A society for book lovers and literary enthusiasts to discuss literature, host book clubs, author events, and literary workshops, celebrating the joy of reading and storytelling.
 </h7>
 <br>
 <br>
  <img src="https://i.postimg.cc/T2ZHpfGr/0c391d5b-c18e-4574-928a-fe97e9fa29f3.jpg">
  <br>
  <h8 style="font-size:25px;color:white">
NEXUS Sports Society:-<br>
A league focused on fostering teamwork, sportsmanship, and camaraderie through organized team sports such as basketball, soccer, and volleyball.
</h8>
<br>
 <img src="https://i.postimg.cc/J0WZC6VB/taekwon-academy.png">
 <br>
 <h9 style="font-size:25px;color:white">
Martial Arts Academy:-<br>
Offering training in various martial arts disciplines such as karate, judo, taekwondo, and Brazilian jiu-jitsu, promoting discipline, self-defense, and physical fitness.
</h9>
 <img src="https://i.postimg.cc/qM4ym5xP/creative-academy.png">
 <br>
 <h10 style="font-size:25px;color:white">
NEXUS Creative Society:-<br>
Celebrating traditional craftsmanship and artisanal skills such as woodworking, pottery, glassblowing, and textile arts, providing a space for creative expression and skill sharing, fashion shows, and design competitions for fashion enthusiasts.
</h10>
 <img src="https://i.postimg.cc/YC4986Tc/debate-academy.png">
 <br>
 <h11 style="font-size:25px;color:white">
NEXUS DEBATE Society:-<br>
The Debate Society cultivates critical thinking and persuasive communication through structured debates, workshops, and competitions, fostering a dynamic environment for members to engage in informed discourse and develop valuable skills for academic and professional pursuits.
</h11>
<br>
<img src="https://i.postimg.cc/0jWSK8K7/4ae80615-6b44-4e62-b571-2706d14be1f5.jpg">
 <br>
 <h12 style="font-size:25px;color:white">
Business Leaders Network:-<br>
A society aimed at fostering leadership skills, entrepreneurship, and networking opportunities among aspiring business professionals.Members participate in workshops, seminars, and networking events to develop business acumen, exchange ideas, and collaborate on entrepreneurial ventures.
</br>
</h12>
 <footer>
    &copy; 2024 NEXUS. All rights reserved.
  </footer>
</body>
</html>
