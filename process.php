<?php

$conn = mysqli_connect('localhost','root', 'user', 'quizdb');

// if ($conn) {
//     echo"Connected to database ";
// }
// else{
//     echo "Could not connect to database ";
// }

    if(isset($_POST['submit'])) {
        if (!empty($_POST['quizcheck'])) {

            $count = count($_POST['quizcheck']);
            echo "5 out of " . $count. " entries <br>";

            $result = 0;
            $i = 1;

            $selected = $_POST['quizcheck'];
            print_r($selected);

            $q = "select * from  questions";
            $query = mysqli_query($conn, $q);

            while ($row = mysqli_fetch_array($query)) {
                print_r($row['ans_id']);

                $checked = $row['ans_id'] == $selected[$i];

                if($checked) {
                    $result++;
                }
                $i++;
            }

            echo "<br>correct => " . $result;
        }
    }