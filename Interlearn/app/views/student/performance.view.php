<?php $this -> view('includes/header'); ?>
<?php $this -> view('includes/nav'); ?>
<div class="mid-container">
    <div class="quizz_left">
        <?php $this -> view('includes/sidebar'); ?>
    </div>
    <div class="que_right">
        <h3>Course progress</h3>
        <br><br>
        <div class="performance">
            <div class="performance-left">
                <h4>Grade - 6</h4>
                <span>Mathematics</span>
            </div>
            <div class="performance-right">
                <div class="std_per_subject">
                    <br>
                    <div class="std_op_loader">
                        <p class="std_op_perc">50%</p>
                    </div>
                    <div>
                        <h3>Overall progress</h3>
                    </div>
                </div>
            </div>
        </div>
        <h4>Progress Report</h4><br><br>
        <table>
            <tr>
                <th>Exam Month</th>
                <th>Exam Number</th>
                <th>Marks</th>
                <th>Grade</th>
            </tr>
            <tr>
                <td>October</td>
                <td>E001</td>
                <td>60</td>
                <td>C</td>
            </tr>
            <tr>
                <td>September</td>
                <td>E002</td>
                <td>80</td>
                <td>A</td>
            </tr>
            <tr>
                <td>November</td>
                <td>E003</td>
                <td>40</td>
                <td>S</td>
            </tr>
            <tr>
                <td>August</td>
                <td>E004</td>
                <td>50</td>
                <td>C</td>
            </tr>
            <tr>
                <td>July</td>
                <td>E005</td>
                <td>55</td>
                <td>C</td>
            </tr>
        </table>
    </div>
</div>

<?php $this -> view('includes/footer'); ?>