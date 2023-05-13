<?php $this -> view('includes/header'); ?>
<?php $this -> view('includes/nav'); ?>
<head>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/styles3.css">
</head>
<div class="mid-container">
    <div class="quizz_left">
        <?php $this -> view('includes/sidebar_ins'); ?>
    </div>
    <div class="quizz_right">
        <div class="quiz-head">
            <h2>Add Information About Exam</h2>
            <p>
                <ul>
                    <li>You have to choose a csv file </li>
                    <li>In your csv file it should be two columns and one is <u>student id</u> and other one is <u>marks</u></li>
                </ul>
            </p>
        </div>
        <!-- <form action="" method="POST">
            <div class="quiz-name">
                <h3>Exam name *</h3>
                
                <input class="home_cnt_inp" type=text name="text" value="" placeholder="Eg : sample quiz">
            </div>

            <div class="quiz-description">
                <h3>Quiz Description *</h3>
                <textarea class="home_cnt_inp" id="message" name="message" placeholder="Insert a quiz description" style="height:50px"></textarea>
            </div>
            <hr><br>
            <input  class = "home_form_sbt" type="submit" value="Save & Continue">
            
        </form> -->

        <div class="tail">
            <form action="" method="POST" enctype="multipart/form-data">

                <label for="exam name">Exam name <strong> *</strong> : </label><br>
                <input class="choice_inp" type=text name="exam_name" value="" placeholder="exam - 1"> <br><br>  
                
                <label for="exam name">Exam month <strong> *</strong> : </label><br>
                <select name="exam_month" id="exam_month">
                    <option value="january"> January </option>
                    <option value="february"> February </option>
                    <option value="march"> March </option>
                    <option value="april"> April </option>
                    <option value="may"> May </option>
                    <option value="june"> June </option>
                    <option value="july"> July </option>
                    <option value="august"> August </option>
                    <option value="september"> September </option>
                    <option value="october"> October </option>
                    <option value="november"> November </option>
                    <option value="december"> December </option>
                </select>
                <br><br>
                <!-- <label for="course id">Course id <strong> *</strong> : </label><br>
                <input class="choice_inp" type=number name="course_id" value="" placeholder="10"><br><br> -->

                <!-- before -->
                <label for="upload_file">Choose csv file <strong> *</strong> : </label><br>
                <input type="file" name="myfile" class="form-control"><br><br>

                <input  class = "home_form_sbt" type="submit" value="Save">
            </form>
        </div>
    </div>
</div>

<?php $this -> view('includes/footer'); ?>