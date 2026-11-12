<?php

include "header.php";
include "db.php";

if (isset($_POST['submit'])) {
    $student_name = $_POST['student_name'];
    $matric_number = $_POST ['matric_number'];
    $subject_number =$_POST['subject_number'];
    $subject_code =$_POST['subject_code'];
    $test_1 =$_POST['test_1'];
    $test_2 =$_POST['test_2'];
     $final =$_POST['final'];


     $total = $test_1 + $test_2 + $final;
    //80-100 A
    //65-79 B
    //50-64 C
    //40-49 D
    //0-39 E

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


     $sql = $conn->prepare("INSERT INTO results
     (student_name,matric_number,subject_number,subject_code,
     test_1,test_2,final,total,grade)VALUES
     ('$student_name','$matric_number', '$subject_number','$subject_code',
     $test_1,$test_2,$final,$total,'A')");

     if($sql->execute()) {
        header("Location: index.php");
     }
     
     

}

$student_name = "";
    $matric_number = "";
    $subject_name = "";
    $subject_code = "";
    $test_1 = "";
    $test_2 = "";
     $final = "";

?>
<style>
    label{
        display: inline-block;
        width: 15%;
    }
</style>

<h2>ADD RESULT</h2>


<?php
include "form.php";
 include "footer.php"
 ?>