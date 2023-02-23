<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<div class="recp_cl_container">
<?php $this->view("includes/sidebar_recep");?>
    <div class="recp_cl_content">
        <?php if(!empty($subjects)):?>
        <?php foreach($subjects as $teacher):?>
        <h2>Grade <?=esc($teacher->grade)?> - <?=esc($teacher->subject)?></h2>
        <br><br>
        <h3>About this course</h3>
        <p><?=esc($teacher->description)?></p>
        <?php endforeach;?>
        <?php endif;?>
        <br>
        <h4><i>Choose the language medium</i> </h4><br>
        <nav class="recp_cl_navbar">
            <ul class="recp_cl_medium">
                <li><a href="<?=ROOT?>/receptionist/course/view/1/?id=<?=$subject_id?>" class="recp_cl_nav">Sinhala</a></li>
                <li><a href="<?=ROOT?>/receptionist/course/view/2/?id=<?=$subject_id?>" class="recp_cl_nav">English</a></li>
                <li><a href="<?=ROOT?>/receptionist/course/view/3/?id=<?=$subject_id?>" class="recp_cl_nav">Tamil</a></li>
            </ul>
        </nav>
        
        <br>

        <div class="recp_cl_staff">
            <div class="recp_cl_teacher">
                <h3>Teachers</h3>
                <div class="recp_cl_names">
                    <?php if(!empty($subjects)):?>
                    <?php foreach($subjects as $teacher):?>
                    <div class="recp_cl_row">
                        <p><?=esc($teacher->timefrom)?> - <?=esc($teacher->timeto)?></p>
                        <p><?=esc($teacher->teacherName)?> <?=esc($teacher->teacherName)?></p>
                    </div>
                    <?php endforeach;?>
                    <?php endif;?>
                </div>
                <br><br>
                <div class="recp_cl_head">
                    <a href="#popup">
                        <div class="recp_cl_butn">
                            <button class="recp_cl_btn">+Add new teacher</button>
                        </div>
                    </a>
                </div>
            </div>
            
            <br><br>

            <!-- <hr><br> -->

            <div class="recp_cl_instr">
                <h3>Instructors</h3>
                <div class="recp_cl_names">
                    <?php if(!empty($subjects)):?>
                    <?php foreach($subjects as $instructor):?>
                    <div class="recp_cl_row">
                        <p><?=esc($instructor->instructorName)?> <?=esc($instructor->instructorName)?></p>
                    </div>
                    <?php endforeach;?>
                    <?php else:?>
                        <br>
                        <p>No assigned instructors!</p>
                    <?php endif;?>
                </div>
                <br><br>
                <div class="recp_cl_head">
                    <a href="<?=ROOT?>/instructor/add">
                        <div class="recp_cl_butn">
                            <button class="recp_cl_btn">+Add new instructor</button>
                        </div>
                    </a>
                </div>
            </div>
            <br>
        </div>
        <!-- <div class="overlay_popup" id="divOne">
        <a href="#" class="close">&times;</a>
            <form action="">
                <div class="wrapper_popup">
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
                    <button type="submit" class="recp_det_btn">Save</button>  
                </div>
                   <br> 
                     
            </form>
                      
        </div>                 -->
        <div id="popup">
            <div class="popup-content">
                <span class="close" onclick="closePopup()">&times;</span>
                <h2>Login</h2>
                <form>
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
                    <button type="submit" class="recp_det_btn">Save</button>
                </form>
            </div>
        </div>
        
    </div>
</div>
<script defer src="<?=ROOT?>/assets/js/class.js ?>"></script>
<?php $this->view("includes/footer");?>