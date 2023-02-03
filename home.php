<?php
$conn = mysqli_connect('localhost','root', 'user', 'quizdb');

// if ($conn) {
//     echo"Connected to database ";
// }
// else{
//     echo "Could not connect to database ";
// }

// mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>start-quizz</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Interlearn Quizz center</h1>
    <div class="card1">
        <h2>Start the quizz</h2>
    </div><br>

    <form action="process.php" method="POST">
    <?php

    $i = 0;
    for ($i = 0; $i < 6; $i++) {
        $q = "select * from questions where qid = $i";
        $query = mysqli_query($conn, $q);

        while ($row = mysqli_fetch_array($query)) {
            ?>
        <div class="get-question">
            <h4><?php echo $row['question']; ?></h4>

        <?php
        $q = "select * from answers where ans_id = $i";
        $query = mysqli_query($conn, $q);

        while ($row = mysqli_fetch_array($query)) {
            ?> 
                <div class="get-answers">
                    <input type="radio" name="quizcheck[<?php echo $row['ans_id']; ?>]" value="<?php echo $row['aid'] ?>">
                    <?php echo $row['answer']; ?>
                </div>
        

<?php
        }
        }
    }
    ?>
    <br>
    <input type="submit" name="submit" value="Submit">

</form>
</div>
</body>
</html>