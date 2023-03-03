<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<div class="recp_det_container">
<?php $this->view("includes/sidebar_recep");?>
    <div class="recp_det_content">
        <h2>--Add a new course--</h2><br>
        <form method="post" action="" enctype="multipart/form-data">
            <!-- <input type="bu" name="sub"  onclick="myFunction1()">Already existing subject
            <input type="radio" name="sub"  onclick="myFunction2()">Add a new subject -->
            <!-- <button onclick="myFunction1()">Already existing subject</button>
            <button onclick="myFunction2()">Add a new subject</button>
            <br><br> -->
            <div class="recp_det_box" id="already">
                
                <!-- <select name="subject" id="" class="recp_ann_clz">
                    <option value="subj" selected>--select subject--</option>
                    <?php if(!empty($subjects)):?>
                    <?php foreach($subjects as $subject):?>
                    <option value="<?=$subject->subject_id?>" <?=set_select('subject_id',$subject->subject_id)?>><?=esc($subject->subject_id)?> - <?=esc($subject->subject)?></option>
                    <?php endforeach;?>
                    <?php endif;?>
                </select> -->
            </div>
            <h4>Subject:</h4>
            <div class="recp_det_box" id="new">
                <input  name="subject" type="text" class="recp_det_name">
                <?php if(!empty($error['subject'])):?>
                    <small><?=$error['subject']?></small>
                <?php endif;?>
            </div>
            <br><br>
            <h4>Subject Description:</h4>
            <div class="recp_det_box" id="new">
                <!-- <input  name="description" type="text" class="recp_det_name"> -->
                <textarea name="description" id="" cols="136" rows="10"></textarea>
                <?php if(!empty($error['description'])):?>
                    <small><?=$error['description']?></small>
                <?php endif;?>
            </div>
            <br><br>
            <div class="recp_det_box">
                <h4>Language Medium:</h4>
                <select name="language_medium" id="" class="recp_ann_clz">
                    <option value="language_medium" selected>--select language medium--</option>
                    <option value="Sinhala">Sinhala</option>
                    <option value="English">English</option>
                    <option value="Tamil">Tamil</option>
                </select>
            </div>
            <br><br>
            <div class="recp_det_box">
            <h4>Grade:</h4>
            <select name="grade" id="" class="recp_ann_clz">
                    <option value="grade" selected>--select grade--</option>
                    <option value="1">Grade 1</option>
                    <option value="2">Grade 2</option>
                    <option value="3">Grade 3</option>
                    <option value="4">Grade 4</option>
                    <option value="5">Grade 5</option>
                    <option value="6">Grade 6</option>
                    <option value="7">Grade 7</option>
                    <option value="8">Grade 8</option>
                    <option value="9">Grade 9</option>
                    <option value="10">Grade 10</option>
                    <option value="11">Grade 11</option>
                    <option value="A/L">A/L</option>
                </select>
            </div><br><br>
            <div class="recp_det_box">
            <h4>Teacher ID:</h4>
            <select name="teacher_id" id="" class="recp_ann_clz">
                <option value="" selected>--Select teacher id--</option>
                <?php if(!empty($teachers)):?>
                <?php foreach($teachers as $teacher):?>
                    <?=esc($teacher->firstname)?>
                <option  value="<?=$teacher->teacher_id?>" ><?=esc($teacher->teacher_id)?>:<?=esc($teacher->firstname)?></option>
                <?php endforeach;?>
                <?php endif;?>
            </select>
            </div><br><br>
            <div class="recp_det_box">
            <h4>Day: </h4>
            <select name="day" id="day" class="recp_ann_clz">
            <option value="slct" selected>--select day--</option>
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>
                <option value="Sunday">Sunday</option>
            </select>
            </div><br><br>
            <div class="recp_det_box">
                <h4>Time:</h4>
                <div class="recp_det_dura">
                    <input type="time" name="timefrom" value="08:00" id="" class="recp_det_time"> 
                    <p> to </p>
                    <input type="time" name="timeto" value="08:00" id="" class="recp_det_time">
                </div>
            </div>
            <br><br>
            <div class="recp_det_box">
                <h4>Upload image:</h4><br>
                <div class="recp_det_dura">
                    <input type="file" name="uploadimg" id="uploadimg">
                </div>
            </div>
            <br><br>
            <a href="<?=ROOT?>/receptionist/course">
                <button type="button" class="recp_det_btn">Cancel</button>
            </a>
                <button name="courseSubmitBtn" type="submit" class="recp_det_btn" id="courseSubmitBtn">Save</button>
            <?php if(isset($msg)){echo $msg;} ?>
        </form>
    </div>
</div>
<script src="<?=ROOT?>/public/assets/js/addcourse.js"></script>
<?php $this->view("includes/footer");?>

            