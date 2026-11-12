<?php 
include "db.php";
include "header.php";

//fallback, ?? equal ti if else
$id = $_GET['id'] ?? 0;

$sql = $conn->prepare("SELECT * FROM result WHERE id = $id");

$sql->execute();

$row = $sql->get_result()->fetch_assoc();
/*row = [id,student_name,matric_no.......]
[1,Ali,22200202,]
[2,Mubir,434903490349]
*/

    $student_name = $row['student_name'];
    $matric_number = $row['matric_number'];
    $subject_name =$row['subject_name'];
    $subject_code =$row['subject_code'];
    $test_1 =$row['test_1'];
    $test_2 =$row['test_2'];
     $final =$row['final'];

     if (isset(($_POST['submit']))) {
         $student_name = $_POST['student_name'];
         $matric_number = $_POST['matric_number'];
         $subject_name =$_POST['subject_name'];
         $subject_code =$_POST['subject_code'];
         $test_1 =$_POST['test_1'];
         $test_2 =$_POST['test_2'];
         $final =$_POST['final'];

          $total = $test_1 + $test_2 + $final;

            if($total >= 80)
        $grade = 'A';
    else if ($total >= 65)
        $grade = 'B';
    else if ($total >= 50)
        $grade = 'C';
    else if ($total >= 40)
        $grade = 'D';
     else  
        $grade = 'E';
     
     
      $sql = $conn->prepare("UPDATE result SET
         student_name = '$student_name',
         matric_number = '$matric_number',
         subject_name ='$subject_name',
         subject_code ='$subject_code',
         test_1 ='$test_1', 
         test_2 ='$test_2',
         final ='$final',
         total ='$total',
         grade ='$grade'
         WHERE id = $id");


    

     if($sql->execute()) {
        header("Location: index.php");
     }
     }
?>

<h2> Edit Result</h2>


<?php
include "form.php";
include "footer.php";
?>