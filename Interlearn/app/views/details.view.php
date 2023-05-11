<?php $this->view("includes/header");?>
<?php $this->view("includes/nav"); 
$url = $_GET['url'];
$url = rtrim($url,'/');
$val = explode('/',$url);
$sub_id = $_GET['id'];
?>


<div class="recp_cl_container" onload="setTab()">
    <div class="std-enroll-content">
        <?php if(!empty($subjects)):?>
            <?php $subject_id=0;
                    if(isset($_GET['id'])){
                        $subject_id = $_GET['id'];
                    }
                    // show($subject_id);die;
                    ?>
            <a href="">
                <button type="submit" class="std-enroll-btn" name="enroll-btn" id="button28" onclick="openModal()">Enroll Me</button>
            </a>


        <h2>Grade <?=esc($subjects[0][0]->grade)?> - <?=esc($subjects[0][0]->subject)?></h2>
        <br><br>
        <h3>About this course</h3>
        <p><?=esc($subjects[0][0]->description)?></p>
        
        <?php endif;?>
        <br>
        <h4><i>Choose the language medium</i> </h4><br>
        <nav class="recp_cl_navbar">
            <ul class="recp_cl_medium">

            <?php if (!empty($mediums)) : ?>
                    <?php foreach ($mediums as $medium) : ?>

                        <?php if ($medium->language_medium == 'Sinhala') : ?>
                            <li><a href="<?=ROOT?>/courses/index/view/1/?id=<?=$medium->subject_id?>" id="Sinhala" class="guest_cl_nav" ><?= $medium->language_medium ?></a></li>
                        <?php elseif ($medium->language_medium == 'English') : ?>
                            <li><a href="<?=ROOT?>/courses/index/view/1/?id=<?=$medium->subject_id?>" id="English" class="guest_cl_nav" ><?= $medium->language_medium ?></a></li>
                        <?php else : ?>
                            <li><a href="<?=ROOT?>/courses/index/view/1/?id=<?=$medium->subject_id?>" id="Tamil" class="guest_cl_nav" ><?= $medium->language_medium ?></a></li>
                        <?php endif; ?>

                    <?php endforeach; ?>
                <?php endif; ?>

            </ul>


            <!-- selecting the selected medium -->
            <?php $currentMedium = []; ?>
            <?php
            foreach ($mediums as $medium)
            {
                if ($medium->subject_id == $sub_id)
                {
                    $currentMedium = $medium->language_medium;
                }
            }
           ?>

            <!-- adding the class active to the selected id -->
           <script>
            const medium = '<?php echo $currentMedium;?>';
            // console
            console.log(medium);
            var element = document.getElementById(medium);
            element.classList.add("active");
           </script>

        </nav>
        <br>
        <!-- content table -->
        <div class="recp_cl_staff">
            <table class="std-enroll-table">
                <th>Day</th>
                <th>Time</th>
                <th>Teacher </th>
                <th>Instructor  </th>
                <?php if(!empty($subjects)):
                    $med_ID=0;
                    $subject_id=0;
                    if(isset($_GET['id'])){
                        $subject_id = $_GET['id'];
                    }
                    // show($subject_id);die;
                    for($x=0; $x<=count($subjects); $x++){
                        // show($subjects[$x][0]);
                        if($subject_id==$subjects[$x][0]->subject_id){
                            $med_ID=$x;
                            break;
                        }
                    }
                    // show($subjects[$med_ID]);die;
                    ?>
                    <?php if (!empty($enroll_error)) : ?>
                    <p class="warning"><?php echo $enroll_error; ?></p>
                <?php endif; ?>
                <?php foreach($subjects[$med_ID] as $teacher): ?>
                <tr>

                    <td><?=esc($teacher->day)?></td>

                    <td><?=esc($teacher->timefrom)?> - <?=esc($teacher->timeto)?></td>

                    <td><?=esc($teacher->teacherName)?>
                        <?php if(empty($teacher->teacherName)):?>
                            <?php echo "No teachers assigned!";?>
                        <?php endif?>
                    </td>

                    <td>
                    <?php if(!empty($teach_instructors[$teacher->course_id])):?>
                        <?php foreach($teach_instructors[$teacher->course_id] as $teach_instructor):?>
                            <?=esc($teach_instructor->instructorName)?>
                            <input type="hidden" value="<?=esc($teacher->day)?>">

                            <br/>
                        <?php endforeach;?>

                    <?php else:?>
                            <?php echo "No instructors assigned!";?>
                    <?php endif;?>
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
                <input type="hidden" value="" id="modal_subject_id" name="subject_id">
                <div>
                <label for="teacherID">Teacher ID: </label><br>
                    <select name="teacher" id="teacher" class="recp_ann_clz" onchange="getDateTime('<?php echo $subject_id?>')">
                        <option value="" selected>--Select teacher name--</option>
                        <?php if(!empty($distinctTeachers)):?>
                        <?php foreach($distinctTeachers as $teacher):?>
                        <option value="<?=esc($teacher->teacher_ID)?>"><?=esc($teacher->teacherName)?></option>
                        <?php endforeach;?>
                        <?php endif?>
                    </select>
                    <?php if(!empty($errors)):?>
                <p class="warning"><?=$errors['teacher'];?></p>
                <?php endif;?>
                </div>
                    <br>
                    <div>
                    <label for="DayTime">Day & Time: </label><br>
                    <select name="day" id="day" class="recp_ann_clz">
                        <option value="" selected>--Select day and time--</option>
                    </select>
                    <?php if(!empty($errors)):?>
                <p class="warning"><?=$errors['day'];?></p>
                <?php endif;?>
                    <br>
                    <button name="enroll-me" type="submit" id="enroll-std" class="recp_det_btn" onclick="enroll_student()">Enroll</button>
                    </div>
                    <br><br><br>
                    

                </form>
            </div>
        </div>
    </div>
</div>
<script defer src="<?=ROOT?>/assets/js/stdenroll.js?v=<?php echo time(); ?>"></script>
<?php $this->view("includes/footer");?>