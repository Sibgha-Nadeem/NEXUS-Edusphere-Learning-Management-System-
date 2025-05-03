<?php
// Start session
session_start();

// Check if session variables exist
if(isset($_SESSION['Uid']) && isset($_SESSION['psw'])) 
{
    // Retrieve Uid from session
    $Uid = $_SESSION['Uid'];

    $conn = mysqli_connect("localhost", "root", "", "login");

    function insert($conn, $sql)
    {
        if ($conn->query($sql) === TRUE) {
            header('Location: done.php');
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    if (!empty($_POST)) {
        if (!isset($_POST['course_select']) || !is_array($_POST['course_select'])) {
            echo "Invalid course selection.";
        } else {
            $selectedCourses = $_POST['course_select'];
            $totalCreditHours = 0; // Initialize total credit hours
            
            // Prepare an array to hold the values for each course
            $values = array();

            foreach ($selectedCourses as $course) {
                // Extract course code and credit hours from the selected option
                $courseInfo = explode("|", $course);
                $courseCode = $courseInfo[0];
                $creditHours = $courseInfo[1];

                // Calculate total credit hours
                $totalCreditHours += $creditHours;
                
                // Push the values for each course into the array
                $values[] = "('$courseCode', '1', '$creditHours', '$Uid')";
            }
            
            // Construct the SQL query with multiple value sets
            $sql = "INSERT INTO courseregister (courses, count, credithrs, RollNo) VALUES " . implode(",", $values);
            
            // Insert all selected courses into the database
            insert($conn, $sql);

            // Redirect to a confirmation page or display a success message
            echo "Courses registered successfully. Total Credit Hours: $totalCreditHours";
        }
    }
}
?>




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

    .container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 10px;
      background-color: #e7ceb6; /* light beige */
       animation: fadeIn 2s ease forwards; 
    }

    label {
      font-weight: bold;
      color: #3a0000; /* dark brown */
    }

    select, input[type="submit"] {
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
<header>
  <img src="https://i.postimg.cc/X7vQZ9mb/NEXUS.png" alt="NEXUS" border="0">
</header>

<h1>
  <br>
  <br>
  <p class="outset">COURSE REGISTRATIONS</p>
</h1>

<div class="container">
  <form id="course_registration_form" action="" method="post">
    <label for="course_select">Select Course(s) to Register:</label><br>
     <select id="course_select" name="course_select[]" multiple size="6">
      <option value="AF1001|3" data-credit-hours="3" title="Fundamentals of Accounting: This course covers the basic principles and concepts of accounting. Topics include financial statements, accounting cycles, and basic accounting principles.">Fundamentals of Accounting</option>
      <option value="AF2031|3" data-credit-hours="3" title="Accounting and Finance: This course explores advanced topics in accounting and finance, including financial analysis, investment strategies, and financial markets.">Accounting and Finance</option>
      <option value="CL2005|1" data-credit-hours="1" title="Database Systems - Lab: This lab course provides hands-on experience with database management systems. Students will learn to design, implement, and query databases using SQL.">Database Systems - Lab</option>
      <option value="CL2006|1" data-credit-hours="1" title="Operating Systems - Lab: This lab course covers the fundamentals of operating systems, including process management, memory management, and file systems.">Operating Systems - Lab</option>
      <option value="CL3001|1" data-credit-hours="1" title="Computer Networks - Lab: This lab course focuses on practical aspects of computer networks, including network configuration, troubleshooting, and security.">Computer Networks - Lab</option>
      <option value="CS2005|3" data-credit-hours="3" title="Database Systems: This course covers database design, implementation, and management. Topics include relational database concepts, SQL programming, and database administration.">Database Systems</option>
      <option value="CS2006|3" data-credit-hours="3" title="Operating Systems: This course explores the design and implementation of operating systems. Topics include process management, memory management, and file systems.">Operating Systems</option>
      <option value="CS2008|3" data-credit-hours="3" title="Numerical Computing: This course introduces numerical methods for solving mathematical problems using computers. Topics include numerical integration, interpolation, and solving linear systems.">Numerical Computing</option>
      <option value="CS2009|3" data-credit-hours="3" title="Design and Analysis of Algorithms: This course covers fundamental algorithms and their analysis. Topics include sorting algorithms, graph algorithms, and dynamic programming.">Design and Analysis of Algorithms</option>
      <option value="CS3001|3" data-credit-hours="3" title="Computer Networks: This course provides an in-depth study of computer networks and protocols. Topics include network architecture, routing algorithms, and network security.">Computer Networks</option>
      <option value="CS3005|3" data-credit-hours="3" title="Theory of Automata: This course covers the theoretical foundations of automata theory and formal languages. Topics include finite automata, context-free grammars, and Turing machines.">Theory of Automata</option>
      <option value="CS4031|3" data-credit-hours="3" title="Compiler Construction: This course covers the principles and techniques of compiler design. Topics include lexical analysis, syntax analysis, and code generation.">Compiler Construction</option>
      <option value="CS4055|3" data-credit-hours="3" title="Digital Image Processing: This course explores techniques for digital image processing and analysis. Topics include image enhancement, image segmentation, and image compression.">Digital Image Processing</option>
      <option value="EE1009|2" data-credit-hours="2" title="Digital Logic Design: This course covers the fundamentals of digital logic design. Topics include Boolean algebra, combinational and sequential circuits, and logic synthesis.">Digital Logic Design</option>
      <option value="EL1009|1" data-credit-hours="1" title="Digital Logic Design - Lab: This lab course provides hands-on experience with digital logic design. Students will design and implement digital circuits using hardware description languages.">Digital Logic Design - Lab</option>
      <option value="MG1001|3" data-credit-hours="3" title="Fundamentals of Management: This course provides an introduction to the principles of management. Topics include planning, organizing, leading, and controlling.">Fundamentals of Management</option>
      <option value="MG1002|3" data-credit-hours="3" title="Marketing Management: This course covers the principles and practices of marketing management. Topics include market research, product development, and promotional strategies.">Marketing Management</option>
      <option value="MG1006|3" data-credit-hours="3" title="Principles of Economics: This course introduces basic economic concepts and principles. Topics include supply and demand, market equilibrium, and elasticity.">Principles of Economics</option>
      <option value="MG1007|3" data-credit-hours="3" title="Freelancing: This course explores freelancing as a career option. Topics include finding clients, managing projects, and legal considerations for freelancers.">Freelancing</option>
      <option value="MG3013|3" data-credit-hours="3" title="Brand Management: This course focuses on managing brand identity and brand equity. Topics include brand positioning, brand communication, and brand extensions.">Brand Management</option>
      <option value="MG3033|3" data-credit-hours="3" title="Principles of Leadership: This course examines theories and practices of leadership. Topics include leadership styles, team dynamics, and ethical leadership.">Principles of Leadership</option>
      <option value="MG4011|3" data-credit-hours="3" title="Entrepreneurship: This course explores the principles and practices of entrepreneurship. Topics include opportunity recognition, business planning, and venture financing.">Entrepreneurship</option>
      <option value="MT2005|3" data-credit-hours="3" title="Probability and Statistics: This course covers basic probability theory and statistical methods. Topics include probability distributions, hypothesis testing, and regression analysis.">Probability and Statistics</option>
      <option value="MT3001|3" data-credit-hours="3" title="Graph Theory: This course covers the fundamentals of graph theory. Topics include graph representation, connectivity, and graph algorithms.">Graph Theory</option>
      <option value="SS1018|1" data-credit-hours="1" title="Understanding Holy Quran: This course provides an introduction to the principles and teachings of the Holy Quran. Topics include interpretation, memorization, and application of Quranic verses.">Understanding Holy Quran</option>
      <option value="SS2002|3" data-credit-hours="3" title="Micro Economics: This course covers microeconomic principles and theories. Topics include consumer behavior, market structures, and welfare economics.">Micro Economics</option>
      <option value="SS2003|3" data-credit-hours="3" title="Psychology: This course provides an overview of psychology as a scientific discipline. Topics include cognitive processes, behavior analysis, and psychological disorders.">Psychology</option>
      <option value="SS2005|3" data-credit-hours="3" title="Sociology: This course examines social structures, institutions, and processes. Topics include socialization, social stratification, and social change.">Sociology</option>
      <option value="SS2032|3" data-credit-hours="3" title="Chinese Language: This course introduces the basics of the Chinese language. Topics include pronunciation, grammar, and basic conversation skills.">Chinese Language</option>
      <option value="SS2036|3" data-credit-hours="3" title="Modern Politics and Government: This course examines contemporary political systems and governance models. Topics include democracy, authoritarianism, and global governance.">Modern Politics and Government</option>
      <option value="SS2037|3" data-credit-hours="3" title="Organizational Behavior: This course explores individual and group behavior within organizations. Topics include motivation, leadership, and organizational culture.">Organizational Behavior</option>
      <option value="SS2038|3" data-credit-hours="3" title="Critical Thinking: This course develops critical thinking skills and analytical reasoning. Topics include argument analysis, logical reasoning, and decision-making.">Critical Thinking</option>
      <option value="SS2040|3" data-credit-hours="3" title="Mass Communication: This course explores theories and practices of mass communication. Topics include media effects, media ethics, and media industries.">Mass Communication</option>
      <option value="SS4002|3" data-credit-hours="3" title="Foreign Policy of Pakistan: This course examines the foreign policy of Pakistan. Topics include historical context, regional dynamics, and diplomatic relations.">Foreign Policy of Pakistan</option>
    </select><br>

    <input type="submit" value="Register">
  </form>

  <div id="selected_courses_info">Selected Courses:</div>
  <div id="credit_hours_info">Total Credit Hours: 0</div>
</div>

<script>
  function updateSelectedCourses() {
    var selectedCoursesInfo = document.getElementById("selected_courses_info");
    var selectedCourses = [];
    var selectedOptions = document.getElementById("course_select").selectedOptions;
    
    for (var i = 0; i < selectedOptions.length; i++) {
      selectedCourses.push(selectedOptions[i].textContent);
    }
    
    selectedCoursesInfo.textContent = "Selected Courses: " + selectedCourses.join(", ");
  }

  function calculateTotalCreditHours() {
    var totalCreditHours = 0;
    var selectedOptions = document.getElementById("course_select").selectedOptions;
    
    for (var i = 0; i < selectedOptions.length; i++) {
      var creditHours = parseInt(selectedOptions[i].getAttribute("data-credit-hours"));
      totalCreditHours += creditHours;
    }
    
    return totalCreditHours;
  }
  document.getElementById("course_select").addEventListener("change", function() {
    updateSelectedCourses();
    
    var totalCreditHours = calculateTotalCreditHours();
    var creditHoursInfo = document.getElementById("credit_hours_info");

    if (totalCreditHours > 17) {
      alert("You can only register for a maximum of 17 credit hours.");
      this.options[this.selectedIndex].selected = false;
      updateSelectedCourses();
    } else {
      creditHoursInfo.textContent = "Total Credit Hours: " + totalCreditHours;
    }
  });
  updateSelectedCourses();
</script>
<h3 style="color:white;">
                                 INSTRUCTIONS:<br>
1. Log in to the NEXUS University student portal using your credentials provided during enrollment. Navigate to the "Course Registration" section.<br>
2. Browse available courses and check details including description, prerequisites, schedule, and instructor information.<br>
3. Add desired courses to your cart and review selections before finalizing.<br>
4. Confirm your course registration, agree to terms if required, and make necessary payments.<br>
5. Review your registration status to ensure all selected courses are successfully added to your schedule.<br>
6. Print or save a copy of your course registration confirmation or schedule for your records.<br>
7. Contact NEXUS University support for assistance if needed.<br>
8. Periodically check your email or the student portal for updates regarding your course registration and any changes to course schedules.<br>
Remember to adhere to registration deadlines and academic policies outlined by NEXUS University for a smooth registration process.
</h3>
 <footer>
    &copy; 2024 NEXUS. All rights reserved.
  </footer>
</body>
</html>
