<?php
// Create connection
$conn = new mysqli("localhost", "root", "", "login");

// Check connection
if ($conn->connect_error) 
{
    die("Connection failed ");
}

$sql = "SELECT UpdateType, ADate, Details FROM bulletinboard";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bulletin Board</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>

<h1>Bulletin Board</h1>

<table>
    <tr>
        <th>Update Type</th>
        <th>Date</th>
        <th>Details</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["UpdateType"]. "</td>
                    <td>" . $row["ADate"]. "</td>
                    <td>" . $row["Details"]. "</td>
                  </tr>";
        }
    } 
else 
{
        echo "<tr><td colspan='4'>Nothing's going on</td></tr>";
    }
    $conn->close();
    ?>
</table>

</body>
</html>
