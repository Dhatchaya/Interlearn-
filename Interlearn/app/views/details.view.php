<?php $this->view("includes/header");?>
<?php $this->view("includes/nav"); 
$url = $_GET['url'];
$url = rtrim($url,'/');
$val = explode('/',$url);
?>


<div class="recp_cl_container">
    <div class="std-enroll-content">
        <?php if(!empty($subjects)):?>
            <a href="">
                <button type="submit" class="std-enroll-btn" name="enroll-btn" id="button28" onclick="openModal()">Enroll Me</button>
            </a>


        <h2>Grade <?=esc($subjects[0]->grade)?> - <?=esc($subjects[0]->subject)?></h2>
        <br><br>
        <h3>About this course</h3>
        <p><?=esc($subjects[0]->description)?></p>
        
        <?php endif;?>
        <br>
        <h4><i>Choose the language medium</i> </h4><br>
        <nav class="recp_cl_navbar">
            <ul class="recp_cl_medium">

            <?php if(!empty($mediums)):?>
                    <?php foreach($mediums as $medium):?>
                    <li><a href="<?=ROOT?>courses/view/1/?id=<?=$medium->subject_id?>" class="recp_cl_nav active"><?=$medium->language_medium?></a></li>
               <?php endforeach;?>
               <?php endif;?>
            </ul>
        </nav>
        <br>
        <!-- content table -->
        <div class="recp_cl_staff">
            <table class="std-enroll-table">
                <th>Day</th>
                <th>Time</th>
                <th>Teacher </th>
                <th>Instructor  </th>
                <?php if(!empty($subjects)):?>
                <?php foreach($subjects as $teacher):?>
                <tr>
                <?php if (!empty($enroll_error)) : ?>
                    <p class="warning"><?php echo $enroll_error; ?></p>
                <?php endif; ?>
                    <td><?=esc($teacher->day)?></td>
                    <td><?=esc($teacher->timefrom)?> - <?=esc($teacher->timeto)?></td>
                    <td><?=esc($teacher->teacherName)?>
                        <?php if(empty($teacher->teacherName)):?>
                            <?php echo "No teachers assigned!";?>
                        <?php endif?>
                    </td>
                    <td>
                    <?php if(!empty($teach_instructors)):?>
                        <?php foreach($teach_instructors as $teach_instructor):?>
                            <?=esc($teach_instructor->instructorName)?><br/>
                        <?php endforeach;?>
                    <?php else:?>
                            <?php echo "No instructors assigned!";?>
                    <?php endif?>
                    </td>
                </tr>
                <?php endforeach;?>
                <?php endif;?>
            </table>
        </div>
        <br><br>

        <!-- enrollment popup -->
        <div id="profileModal" class="popupModal">
            <div class="popupmodal-content">
                <span class="ann_close" onclick="closeModal()">&times;</span><br>
                <h3>Enroll Me</h3><br>
                <form action="" method="post" class="up-profile">
                    <label for="teacherID">Teacher ID: </label><br>
                    <select name="teacher" id="teacher" class="recp_ann_clz" onchange="getDateTime('<?php echo $subject_id?>')">
                        <option value="teacher" selected>--Select teacher name--</option>
                        <?php if(!empty($subjects)):?>
                        <?php foreach($subjects as $teacher):?>
                        <option value="<?=esc($teacher->teacher_id)?>"><?=esc($teacher->teacherName)?></option>
                        <?php endforeach;?>
                        <?php endif?>
                    </select><br>

                    <label for="DayTime">Day & Time: </label><br>
                    <select name="day" id="day" class="recp_ann_clz">
                        <option value="day" selected>--Select day and time--</option>
                    </select><br><br>
                    <button name="enroll-me" type="submit" class="recp_det_btn" onclick="enroll_student()">Enroll</button>

                </form>
            </div>
        </div>
    </div>
</div>
<script defer src="<?=ROOT?>/assets/js/stdenroll.js?v=<?php echo time(); ?>"></script>
<?php $this->view("includes/footer");?>