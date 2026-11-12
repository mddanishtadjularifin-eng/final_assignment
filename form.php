<style>
    label{
        display: inline-block;
        width: 15%;
    }
</style>



<form method="post">
    <label for=""> Student Name :</label>
    <input type="text" name="student_name"
    value="<?php echo $student_name?>">
    <br><br>

     <label for=""> Matric No. :</label>
    <input type="text" name="matric_number"
    value="<?php echo $matric_number?>">
    <br><br>

     <label for=""> Subject :</label>
    <input type="text" name="subject_name"
     value="<?php echo $subject_name?>">
    <br><br>

     <label for=""> Subject Code :</label>
    <input type="text" name="subject_code"
     value="<?php echo $subject_code?>">
    <br><br>

     <label for=""> Test 1 (20%):</label>
    <input type="text" name="test_1" value="<?php echo $test_1?>">
    <label for=""> out of 20</label>
    <br><br>

     <label for=""> Test 2 (30%):</label>
    <input type="text" name="test_2" value="<?php echo $test_2?>">
    <label for=""> out of 30</label>
     
    <br><br>

     <label for=""> Final(50%) :</label>
    <input type="text" name="final" value="<?php echo $final?>">
    <label for=""> out of 50</label    <br><br>

    <input style='margin:5px;' type='submit' name='submit' value='SUBMIT'>

    

</form>