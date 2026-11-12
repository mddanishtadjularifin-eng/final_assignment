<?php
include "db.php";
include "auth.php";

$search = $_GET['search'] ?? '';

$like = "%$search%";

//$sql = "SELECT * FROM result";
$sql = $conn->prepare("SELECT * FROM result
WHERE student_name LIKE ? OR matric_number LIKE ?
OR subject_name LIKE ? OR subject_code LIKE ?");

$sql->bind_param("ssss", $like, $like, $like, $like);
//s stands for string, i stands for integer, d stands for double, b stands for blob

$sql->execute();

$result = $sql->get_result();

include "header.php";
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final Assessment - Grading System</title>
</head>

<body>
    

    <h2>STDENT RECORDS</h2>

    <a href="">+ Add Result </a><br><br>

    <form method="get">
        <input type="text" name="search" placeholder="Search by name or id"
        value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit">Search</button>
        <a href="index.php">Show All</a><br><br>
</form>

  

    <div>
        <table border="1">
            <tr>
                <th>No.</th>
                <th>Student Name</th>
                <th>Matric No.</th>
                <th>Subject</th>
                <th>Test 1 (20%)</th>
                <th>Test 2 (30%)</th>
                <th>Final (50%)</th>
                <th>Total (100%)</th>
                <th>Grade</th>
                <th>Action</th>
            </tr>

            <?php
            $no = 1;
            //if else,while loop, for loop, switch case
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $no++ . "</td>";
                echo "<td>" . $row['student_name'] . "</td>";
                echo "<td>" . $row['matric_number'] . "</td>";
                echo "<td>" . $row['subject_name'] ."<br>" . $row['subject_code'] . "</td>";
                echo "<td>" . $row['test_1'] . "</td>";
                echo "<td>" . $row['test_2'] . "</td>";
                echo "<td>" . $row['final'] . "</td>";
                echo "<td>" . $row['total'] . "</td>";
                echo "<td>" . $row['grade'] . "</td>"; 
                echo "<td>";
                echo "<button><a href='edit.php?id=" . $row['id'] . "'>Edit</a></button>";
                echo "<form method='post' action='delete.php'
                onsubmit='return confirm(\"Are you sure you want to delete this record?\")'>";
                echo "<input type='hidden' name='delete' value='" . (int) $row['id'] . "'>";
                echo"<button type='submit'>Delete</button>";
                echo"</form>";
                echo"</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>

</body>

</html>