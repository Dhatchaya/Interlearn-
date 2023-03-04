<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<div class="std_view_container">

    <?php $this->view("includes/sidebar")?>

    <div class="std_view_content">
        <div class="std_view_greeting">
            <div class="std_view_greet">Welcome Back,<br> John!</div>
            <img src="<?=ROOT?>/assets/images/education.png" alt="">
        </div>
        <br><br>

        <div class="std_view_announcement">
            <h3 class="std_view_text">Announcements</h3><br>
            <div class="std_view_box">
            
                <!-- <div class="std_view_msg"> -->
                <?php if(!empty($announcements)):?>
                    <?php foreach($announcements as $row):?>
                <div class="std_view_msg">
                
                    <!-- <h5>Mr. Edward</h5>
                    <h5>Mathematics</h5><br> -->
                    <h3><?=$row->title?></h3>
                    <h5>Grade <?=esc($row->grade)?> - <?=esc($row->subject)?> (<?=esc($row->language_medium)?> Medium)</h5><br>
                    Dear Students,<br>
                    <p><?=$row->content?></p><br><br>
                    <p class="recp_ann_bot"><?=esc($row->fullname)?></p>
                    <p class="recp_ann_bot"><?=$row->date?></p><br>
                </div><br>
                <?php endforeach;?>
                <?php endif?>
                <!-- <div class="std_view_msg">
                    <h5>Mr. Edward</h5>
                    <h5>Mathematics</h5><br>
                    <p>Please note that tomorrow(24th) class has been cancelled.</p>
                </div><br>
                <div class="std_view_msg">
                    <h5>Mr. Edward</h5>
                    <h5>Mathematics</h5><br>
                    <p>Please note that tomorrow(24th) class has been cancelled.</p>
                </div> -->
            </div><br><br>
            <!-- <div class="std_view_bottom">
                <a href="<?=ROOT?>/courses"><h3>You may also like:</h3></a>
                <div class="std_view_like">
                    <a href="<?=ROOT?>/courses/view/1">
                   <img src="<?=ROOT?>/uploads/images/<?= Auth::getdisplay_picture();?>" alt="" class="recp_crs_img"> 
                    <img src="<?=ROOT?>/assets/images/bookn.jpg" alt="" class="recp_crs_img">
                     <p>Grade 11 Mathematics</p>
                    <p>Grade <?=esc($sum->grade)?> - <?=esc($sum->subject)?></p><br>
                    <div class="recp_crs_butn2">
                        <a href="<?=ROOT?>/courses/view/1/?id=<?=esc($sum->subject_id)?>">
                            <button class="recp_crs_btn2">More info</button>
                        </a>
                    </div>
                
                    </a>
          
                 <div class="std_view_rectangle">
                        <a href="#">
                        <img src="<?=ROOT?>/assets/images/bookn.jpg" alt="" class="std_view_img">
                        <p>Mathematics by Mrs. V.J. Kumari</p>
                        </a>
                    </div>
                    <div class="std_view_rectangle">
                        <a href="#">
                        <img src="<?=ROOT?>/assets/images/bookn.jpg" alt="" class="std_view_img">
                        <p>History by Mr. A.L. Perera</p>
                        </a>
                    </div>
                    <div class="std_view_rectangle">
                        <a href="#">
                        <img src="<?=ROOT?>/assets/images/bookn.jpg" alt="" class="std_view_img">
                        <p>Sinhala by Mr. A.B. Salgado</p>
                        </a>
                    </div> 
                </div>
                </div> -->
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
