<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<div class="recp_cl_container">
<?php $this->view("includes/sidebar_recep");?>
    <div class="recp_cl_content">
    <h2>Grade 11 - Mathematics</h2><br><br>
    <div class="recp_cl_head">
            <!-- <a href="<?=ROOT?>/teacher/add"> -->
                <div class="recp_crs_butn">
                    <button class="recp_crs_btn" onclick="openTheForm()">Enroll Me</button>
                </div>
                <div class="recp_det_box" id="popup">
                <h4>Teacher ID:</h4>
                <select name="teacher_id" id="" class="recp_ann_clz">
                    <option value="" selected>--Select teacher id--</option>
                    <?php if(!empty($teachers)):?>
                    <?php foreach($teachers as $teacher):?>
                        <?=esc($teacher->firstname)?>
                    <option  value="<?=$teacher->teacher_id?>" <?=set_select('teacher_id',$teacher->teacher_id)?>><?=esc($teacher->teacher_id)?>:<?=esc($teacher->firstname)?></option>
                    <?php endforeach;?>
                    <?php endif;?>
                </select>
                <button type="submit">Enroll</button>
                <button type="button" onclick="closeTheForm()">Cancel</button>
                </div>
            <!-- </a> -->
        </div>
        <h3>About this course</h3>
        <p>This is Grade 11 Mathematics</p><br><br>
        <div class="recp_cl_head">
            <h3>Teachers</h3>
        </div>
        <br>
        <div class="recp_cl_names">
        <?php if(!empty($teachers)):?>
            <?php foreach($teachers as $teacher):?>
            <div class="recp_cl_row">
                <p><?=esc($teacher->teacher_id)?>:<?=esc($teacher->firstname)?> <?=esc($teacher->lastname)?></p>
            </div>
            <?php endforeach;?>
            <?php endif;?>
            <!-- <div class="recp_cl_row1">
                <p>2. Mr. V.J. Viraj</p>
            </div>
            <div class="recp_cl_row">
                <p>3. Ms. P. Dhatchaya</p>
            </div>
            <div class="recp_cl_row1">
                <p>4. Mr. A.N. Ahamed</p>
            </div>
            <div class="recp_cl_row">
                <p>5. Mr. M.N. Pavithra</p>
            </div> -->
        </div>
        <br><br><hr><br>
        <div class="recp_cl_head">
            <h3>Instructors</h3>
        </div><br>
        <div class="recp_cl_names">
            <?php if(!empty($instructors)):?>
            <?php foreach($instructors as $instructor):?>
            <div class="recp_cl_row">
                <p><?=esc($instructor->instructor_id)?>:<?=esc($instructor->firstname)?> <?=esc($instructor->lastname)?></p>
            </div>
            <?php endforeach;?>
            <?php endif;?>
            <!-- <div class="recp_cl_row1">
                <p>2. Mr. V.J. Viraj</p>
            </div>
            <div class="recp_cl_row">
                <p>3. Ms. P. Dhatchaya</p>
            </div>
            <div class="recp_cl_row1">
                <p>4. Mr. A.N. Ahamed</p>
            </div>
            <div class="recp_cl_row">
                <p>5. Mr. M.N. Pavithra</p>
            </div> -->
        </div><br><br>
    </div>
</div>

<script src=""></script>
<?php $this->view("includes/footer");?>
