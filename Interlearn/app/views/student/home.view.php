<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<div class="std_view_container">

    <?php $this->view("includes/sidebar")?>

    <div class="std_view_content">
        <div class="std_view_greeting">
            <div class="std_view_greet">Welcome Back,<br> <?=$students[0]->fullname?>!</div>
            <img src="<?=ROOT?>/assets/images/education.png" alt="">
        </div>
        <br><br>

        <div class="std_view_announcement">
            <h3 class="std_view_text">Announcements</h3><br>
            <div class="std_view_box">
                <?php if(!empty($announcements)):?>
                    <?php foreach($announcements as $row):?>
                <div class="std_view_msg">
                    <h3><u><?=$row->title?></u></h3><br>
                    Dear Students,<br>
                    <p><?=$row->content?></p>
                    <p><a href="<?=$row->attachment?>" class="file_announcement"><?=$row->file_name?></a></p><br><br>
                    <p class="recp_ann_bot"><?=$row->date_time?></p><br>
                </div><br>
                <?php endforeach;?>
                <?php endif?>
            </div><br><br>
        </div>
    </div>
    <div class="student_calendar">
        <?php $this->view("includes/calendar");?>
        <div id = "assignment_today" class ="assignment_today">
           <!-- <a href ="http://localhost/Interlearn/public/student/coursepg/submissionstatus/4?id=M.Pavithra63fb0e481edef3.79614533"> <div  class ="assignment_card">
                <div class ="assignment_card_title"><p>Mathematics assignment 1 is due<p></div>
                <ul> 
                    <li> Deadline: 2020-02-04</li>
                    <li> Subject: Mathematics</li>
                </ul>
            </div>
                    </a> -->
           
        </div> 
    </div>
    <script defer src="<?=ROOT?>/assets/js/calendar.js?v=<?php echo time(); ?>"></script>

</div>

    <?php $this->view("includes/footer");?>