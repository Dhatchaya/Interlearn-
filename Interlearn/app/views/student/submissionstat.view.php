<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<div class="std_sub_grd_container">
<?php $this->view("includes/sidebar");?>
        <div class="std_sub_grd_content">
            <h2>Mathematics</h2><br>
            <p style="font-size: large;">Submission Status</p><br><br>
            <div class="std_sub_grd_row1">
                <p class="std_sub_grd_col1">Submission Status</p>
                <p>No Attempt</p>
            </div>
            <div class="std_sub_grd_row2">
                <p class="std_sub_grd_col1">Grading Status</p>
                <p>Not Graded</p>
            </div>
            <div class="std_sub_grd_row1">
                <p class="std_sub_grd_col1">Due Date</p>
                <p>Sunday 11 March 2023, 12.00 P.M.</p>
            </div>
            <div class="std_sub_grd_row2">
                <p class="std_sub_grd_col1">Time Remaining</p>
                <p>7 days 5 hours</p>
            </div>
            <div class="std_sub_grd_row1">
                <p class="std_sub_grd_col1">Last Modified</p>
                <p>-</p>
            </div>
            <br><br>
            <div class="std_sub_grd_bottom">
                <button type="submit" class="std_sub_grd_btn">Add Submission</button><br><br>
                <p>You have not made a submission yet.</p>
            </div>
            
        </div>
    </div>

    <?php $this->view("includes/footer");?>