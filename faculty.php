<?php

$conn = mysqli_connect("localhost","root","","login");


    function insert($conn, $sql){
        
        if ($conn->query($sql) === TRUE) {
        //    header('Location: done.php');
		//	exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
    }
if(!empty($_POST)){
   
  if(!empty($_POST)){
    echo "Selected Course: " . $_POST['courseSelect']; 
  }
    if(empty($_POST['courseSelect']))
        echo "Please enter course name";
    if(empty($_POST['question1']))
        echo "Please choose option";
        if(empty($_POST['question2']))
        echo "Please choose option";
    if(empty($_POST['question3']))
    echo "Please choose option";
        if(empty($_POST['question4']))
        echo "Please choose option";
    if(empty($_POST['question5']))
    echo "Please choose option";
        if(empty($_POST['question6']))
        echo "Please choose option";
    if(empty($_POST['question7']))
    echo "Please choose option";
        if(empty($_POST['question8']))
        echo "Please choose option";
    if(empty($_POST['question9']))
    echo "Please choose option";
        if(empty($_POST['question10']))
        echo "Please choose option";
    if(empty($_POST['question11']))
    echo "Please choose option";
        if(empty($_POST['userFeedback']))
        echo "Please choose option";
    
 $sql = "INSERT INTO facultyrate (c,Q1,Q2,Q3,Q4,Q5,Q6,Q7,Q8,Q9,Q10,Q11,Feedback) VALUES ('".$_POST['courseSelect'] ."', '" . $_POST['question1'] ."','".$_POST['question2'] ."','".$_POST['question3'] ."','".$_POST['question4'] ."','".$_POST['question5'] ."','".$_POST['question6'] ."','".$_POST['question7'] ."','".$_POST['question8'] ."','".$_POST['question9'] ."','".$_POST['question10'] ."','".$_POST['question11'] ."','".$_POST['userFeedback'] ."')";
      
        insert($conn, $sql);
        header('Location: done.php');
        exit;
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Nexus Faculty Ratings</title>
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
    .info {
   background-color:#e7ceb6;
      padding: 2px; 
      margin-bottom: 4px;
      width: 100%;
    }
    .info p {
      margin: 1px 0;
      font-size: 20px; 
    }
    .label {
      font-weight: bold;
      color:#3a0000;
    }

    #courseSelectContainer {
      text-align: center;
      
    }
    #courseSelect {
      font-size: 24px;
      padding: 10px;
      color:#f96b00;
    }
    #reviewForm
    {
    font-size: 20px;
      padding: 10px;
      color:white;
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
    #rform
    {
     font-size: 30px;
      padding: 10px;
      color:white;
    }
    #doneMessage {
      display: none;
      text-align: center;
      color: white;
      font-size: 24px;
      margin-top: 20px;
    }
   
  </style>
</head>
<body>
<header>
  <img src="https://i.postimg.cc/X7vQZ9mb/NEXUS.png" alt="NEXUS" border="0">
</header>
<br>
<br>
<br>
<h1>
  <p class="outset">FACULTY RATINGS</p>
</h1>
<h2 style="color:#3a0000;text-align:center; animation: fadeIn 2s ease forwards; font-size:24px;" >
<label for="feedbackInstructions">Instructions:</label><br>
<textarea id="feedbackInstructions" rows="4" cols="50" readonly style="color:#3a0000;background-color:pink;">
Please provide your honest feedback regarding the course and faculty. Your input helps us improve our services and better meet your needs. Feel free to share any suggestions, concerns, or additional comments you may have.
</textarea><br><br>
</h2>
<h3>
<h2 style="text-align:center; animation: fadeIn 2s ease forwards;color:white;">Some Faculty Reviews </h2>
<div class="side">
<div class="teacher-review">
  <h3>Professor John Smith</h3>
  <div class="star-rating">
    <span title="5 stars">&#9733;</span>
    <span title="5 stars">&#9733;</span>
    <span title="5 stars">&#9733;</span>
    <span title="5 stars">&#9733;</span>
    <span title="5 stars">&#9733;</span>
  </div>
</div>
<div class="teacher-review">
  <h3>Dr. Michael Rodriguez</h3>
  <div class="star-rating">
    <span title="3 stars">&#9733;</span>
    <span title="3 stars">&#9733;</span>
    <span title="3 stars">&#9733;</span>
    <span title="3 stars">&#9734;</span>
    <span title="3 stars">&#9734;</span>
  </div>
 </div>
 <div class="teacher-review">
  <h3>Dr. Jennifer Smith</h3>
  <div class="star-rating">
    <span title="5 stars">&#9733;</span>
    <span title="5 stars">&#9733;</span>
    <span title="5 stars">&#9733;</span>
    <span title="5 stars">&#9733;</span>
    <span title="5 stars">&#9733;</span>
  </div>
  </div>
</div>
<div class="side">
<div class="teacher-review">
  <h3>Dr. Emily Johnson</h3>
  <div class="star-rating">
    <span title="4 stars">&#9733;</span>
    <span title="4 stars">&#9733;</span>
    <span title="4 stars">&#9733;</span>
    <span title="4 stars">&#9733;</span>
    <span title="4 stars">&#9734;</span>
  </div>
</div>
<div class="teacher-review">
  <h3>Professor David Lee</h3>
  <div class="star-rating">
    <span title="4 stars">&#9733;</span>
    <span title="4 stars">&#9733;</span>
    <span title="4 stars">&#9733;</span>
    <span title="4 stars">&#9734;</span>
    <span title="4 stars">&#9734;</span>
  </div>
  </div>
  <div class="teacher-review">
  <h3>Professor Sarah Adams</h3>
  <div class="star-rating">
    <span title="5 stars">&#9733;</span>
    <span title="5 stars">&#9733;</span>
    <span title="5 stars">&#9733;</span>
    <span title="5 stars">&#9733;</span>
    <span title="5 stars">&#9733;</span>
  </div>
</div>
  </div>
</h3>
<h2 style="color:white;text-align:center; animation: fadeIn 2s ease forwards; font-size:24px;">Select Course to Review</h2>
<div id="courseSelectContainer" >

  <select id="courseSelect" name="courseSelect" onchange="toggleReviewForm()">
      <option value="">Select Course</option>
      <option value="DB">DATABASE SYSTEMS</option>
      <option value="OS">OPERATING SYSTEMS</option>
      <option value="Programming">DESIGN AND ANALYSIS OF ALGORITHMS</option>
      <option value="DLD"> DIGITAL LOGICAL DESIGN</option>
      <option value="AI">ARTIFICIAL INTELLIGENCE</option>
       <option value="DBLAB">DATABASE LAB</option>
        <option value="OSLAB">OPERATING SYSTEM  LAB</option>
        <input type="hidden" id="selectedCourse" name="selectedCourse" value=""></input>
  </select>
</div>


<div id="facultyReviewForm" style="display: none;">
    <h2 style="color:white;text-align:center; animation: fadeIn 2s ease forwards; font-size:30px;">Faculty Review Form</h2>
    <div id="rForm">
    <form id="reviewForm" action="" method="post">
        <label for="question1">How would you rate the effectiveness of the faculty in delivering course content and facilitating learning?</label><br>
        <select id="question1" name="question1">
            <option value="Excellent">Excellent</option>
            <option value="Good">Good</option>
            <option value="Fair">Fair</option>
            <option value="Poor">Poor</option>
        </select><br>
        <label for="question2">Do you believe the faculty members demonstrate a strong understanding of the subject matter they teach?</label><br>
        <select id="question2" name="question2">
            <option value="Yes, definitely">Yes, definitely</option>
            <option value="Mostly">Mostly</option>
            <option value="Somewhat">Somewhat</option>
            <option value="No, not at all">No, not at all</option>
        </select><br>
        <label for="question3">How would you assess the faculty's responsiveness to student questions, concerns, or feedback?</label><br>
        <select id="question3" name="question3">
            <option value="Very responsive">Very responsive</option>
            <option value="Somewhat responsive">Somewhat responsive</option>
            <option value="Not very responsive">Not very responsive</option>
            <option value="Not responsive at all">Not responsive at all</option>
        </select><br>
        <label for="question4">How well does the faculty encourage critical thinking and problem-solving skills?</label><br>
        <select id="question4" name="question4">
            <option value="Very well">Very well</option>
            <option value="Moderately well">Moderately well</option>
            <option value="Satisfactorily">Satisfactorily</option>
            <option value="Needs improvement">Needs improvement</option>
        </select><br>
        <label for="question5">Are the course materials provided by the faculty comprehensive and helpful?</label><br>
        <select id="question5" name="question5">
            <option value="Highly comprehensive and helpful">Highly comprehensive and helpful</option>
            <option value="Mostly comprehensive and helpful">Mostly comprehensive and helpful</option>
            <option value="Somewhat comprehensive and helpful">Somewhat comprehensive and helpful</option>
            <option value="Not comprehensive and helpful">Not comprehensive and helpful</option>
        </select><br>
        <label for="question6">How engaging are the lectures delivered by the faculty?</label><br>
        <select id="question6" name="question6">
            <option value="Highly engaging">Highly engaging</option>
            <option value="Moderately engaging">Moderately engaging</option>
            <option value="Somewhat engaging">Somewhat engaging</option>
            <option value="Not engaging">Not engaging</option>
        </select><br>
        <label for="question7">Do you feel the faculty encourages student participation and interaction?</label><br>
        <select id="question7" name="question7">
            <option value="Strongly encourages">Strongly encourages</option>
            <option value="Encourages to some extent">Encourages to some extent</option>
            <option value="Does not encourage">Does not encourage</option>
            <option value="I'm not sure">I'm not sure</option>
        </select><br>
        <label for="question8">How effectively does the faculty provide feedback on assignments and assessments?</label><br>
        <select id="question8" name="question8">
            <option value="Provides detailed and timely feedback">Provides detailed and timely feedback</option>
            <option value="Provides feedback, but it could be more detailed or timely">Provides feedback, but it could be more detailed or timely</option>
            <option value="Provides limited feedback">Provides limited feedback</option>
            <option value="Rarely provides feedback">Rarely provides feedback</option>
        </select><br>
        <label for="question9">How accessible is the faculty outside of class hours for additional help or clarification?</label><br>
        <select id="question9" name="question9">
            <option value="Very accessible">Very accessible</option>
            <option value="Somewhat accessible">Somewhat accessible</option>
            <option value="Not very accessible">Not very accessible</option>
            <option value="Not accessible at all">Not accessible at all</option>
        </select><br>
        <label for="question10">Overall, how satisfied are you with the faculty's performance in this course?</label><br>
        <select id="question10" name="question10">
            <option value="Very satisfied">Very satisfied</option>
            <option value="Satisfied">Satisfied</option>
            <option value="Neutral">Neutral</option>
            <option value="Dissatisfied">Dissatisfied</option>
            <option value="Very dissatisfied">Very dissatisfied</option>
        </select><br>
        <label for="question11">Would you like to study from them again?</label><br>
        <select id="question11" name="question11">
            <option value="yes">Yes</option>
            <option value="No">No</option>
             <option value="Maybe">Maybe</option>
        </select><br>
        <label for="userFeedback">Your Feedback:</label><br>
<textarea id="userFeedback" name="userFeedback" rows="6" cols="50" placeholder="Enter your feedback here..."></textarea>

<button type="submit" >Submit Review</button>
</form>

</div>
</div>
<div id="submitConfirmation" style="display: none;">
    Thank you for your review!
</div>


<script>
    function toggleReviewForm()  {
    var courseSelect = document.getElementById('courseSelect');
    var selectedCourseInput = document.getElementById('selectedCourse');
    var facultyReviewForm = document.getElementById('facultyReviewForm');
    
    if (courseSelect.value !== '') {
        selectedCourseInput.value = courseSelect.value;
        facultyReviewForm.style.display = 'block';
    } else {
        facultyReviewForm.style.display = 'none';
    }
}
    
    function showDoneMessage() {
    var submitConfirmation = document.getElementById('submitConfirmation');
    submitConfirmation.style.display = 'block';
}


</script>

</body>
</html>
