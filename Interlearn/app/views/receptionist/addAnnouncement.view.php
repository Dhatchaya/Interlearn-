<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<div class="recp_ann_container">
<?php $this->view("includes/sidebar_recep");?>
    <div class="recp_ann_content">
        <h3>Add Announcements</h3><br><br>
        

        <form method="POST" action="">
        

            <label for="">Announcement name: </label><br>
            <input type="text" class="recp_ann_name" name="title"><br><br>
            <label for="">Content: </label><br>
            <input type="text" class="recp_ann_cont" name="content"><br><br>
            <label for="">Attach Files: </label><br><br>
            <input type="file" class="recp_ann_name" name="attachment"><br>
            <label for="class">Class: </label><br>
                
            <select name="classid" id="class" class="recp_ann_clz">
                <option value="slect" selected>--Select the class--</option>
                <?php if(!empty($courses)):?>
                <?php foreach($courses as $course):?>
                <option value="g11maths">Grade <?=esc($course->grade)?> - <?=esc($course->subject)?> (<?=esc($course->language_medium)?>)</option>
                <?php endforeach;?>
                <?php endif?>
            </select>
            
            <br><br>
            <label for="tchr">Teacher Name:</label><br>
            
                
            <select name="teacherid" id="tchr" class="recp_ann_clz">
                <option value="tchrslct" selected>--Select the teacher--</option>
                <?php if(!empty($courses)):?>
                <?php foreach($courses as $course):?>
                <option value="a"><?=esc($course->teacher_id)?> - <?=esc($course->fullname)?></option>
                <?php endforeach;?>
                <?php endif?>
            </select>
            
            <button type="submit" class="recp_det_btn">Save</button>

            
        </form>
        
    </div>
</div>

<?php $this->view("includes/footer");?>