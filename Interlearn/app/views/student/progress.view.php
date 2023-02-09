<?php $this -> view('includes/header'); ?>
<?php $this -> view('includes/nav'); ?>
<div class="mid-container">
    <div class="quizz_left">
        <?php $this -> view('includes/sidebar'); ?>
    </div>
    <div class="question_right">
        <!-- <h3>Hello progress !</h3> -->
        <div class="std_op_content">
            <h2>Overall Progress</h2>
            <p>Here, you can view the your progress of all the subjects regarding the Subjects.</p>
            <div class="std_op_progress">
                <div class="std_op_subject">
                    <br>
                    <h3>Mathematics</h3>
                    <div class="std_op_loader">
                        <p class="std_op_perc">50%</p>
                    </div>
                    <button class="std_op_btn">View Full Report</button>
                </div>
                <div class="std_op_subject">
                <br>
                    <h3>History</h3>
                    <div class="std_op_loader">
                        <p class="std_op_perc">50%</p>
                    </div>
                    <button class="std_op_btn">View Full Report</button>
                </div>
                <div class="std_op_subject">
                <br>
                    <h3>Science</h3>
                    <div class="std_op_loader">
                        <p class="std_op_perc">50%</p>
                    </div>
                    <button class="std_op_btn">View Full Report</button>
                </div>
                <div class="std_op_subject">
                <br>
                    <h3>English</h3>
                    <div class="std_op_loader">
                        <p class="std_op_perc">50%</p>
                    </div>
                    <button class="std_op_btn">View Full Report</button>
                </div>
                <div class="std_op_subject">
                <br>
                    <h3>ICT</h3>
                    <div class="std_op_loader">
                        <p class="std_op_perc">50%</p>
                    </div>
                    <button class="std_op_btn">View Full Report</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this -> view('includes/footer'); ?>