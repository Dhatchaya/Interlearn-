<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<div class="teacher_subm_container">
    <?php $this->view("includes/sidebar_teach");?>
    <div class="teacher_subm_content">
        <h2 class= "add_heading_init"><?=esc($courseTitle)?>-<?=esc($Grade)?></h2><br>
        <div class= "teacher_sub_form">
            <div id="record"></div>
            <form method= "POST" enctype="multipart/form-data" >
            <div id="errorall" class="display-error"></div>
                <?php if(!empty($errors)): ?>
                    <?php foreach($errors as $error):?>
                    <div id="error" class="display-error">*<?=esc($error)?></div><br>
                    <?php endforeach;?>
                <?php endif;?>
                    <label for ="name" >Name of Assignment</label>
                    <input type="text" value="<?php if(!empty($errors)){echo (esc(set_value('title')));}?>" name="title" class="teacher_subm_name"/><br><br>
                    <label for ="description">Description</label>
                    <textarea type="text" name = "description" class="teacher_subm_desc"><?php if(!empty($errors)){echo (esc(set_value('description')));}?> </textarea><br><br>
                    <label for ="file">Add files </label>
                    <input type="file" name="assignment_file[]" class="teacher_subm_file file_attachment" id="teacher_subm_file" multiple/><br><br>
                    <div id="file-name"></div>
                    <!-- <h4>assignment Type</h4>
                    <input type="checkbox" name="pdf" id="pdf">
                    <label for="" class="teacher_subm_type">.pdf</label>
                    <input type="checkbox" name="png" id="png">
                    <label for="" class="teacher_subm_type">.png</label>
                    <input type="checkbox" name="jpg" id="jpg">
                    <label for="" class="teacher_subm_type">.jpg</label>
                    <input type="checkbox" name="zip" id="zip">
                    <label for="" class="teacher_subm_type">.zip</label>
                    <input type="checkbox" name="all" id="all">
                    <label for="" class="teacher_subm_type">.*</label><br><br>
                    <h4>Maximum Number of Files</h4>
                    <input type="radio" name="1" id="1">
                    <label for="">1</label>
                    <input type="radio" name="5" id="5">
                    <label for="">5</label>
                    <input type="radio" name="10" id="10">
                    <label for="">10</label>
                    <input type="radio" name="20" id="20">
                    <label for="">20</label><br><br> -->
                    <label for ="deadline">Deadline</label>
                    <input type="datetime-local" value="<?php if(!empty($errors)){echo (esc(set_value('deadline')));}?>" name="deadline" id="teacher_subm_date" class="teacher_subm_date">    <br>  <br>
                    <label for ="acceptDate">Accept Date</label>
                    <input type="datetime-local" value="<?php if(!empty($errors)){echo (esc(set_value('acceptDate')));}?>" name="acceptDate" id="teacher_subm_accept_date" class="teacher_subm_date">

                    <br><br>
                    <div class="teacher_subm_butn">
                        <br>
                        <button name="assiSubmit" id="assiSubmit" type="submit" class="teacher_upl_btn">Upload</button>
                        <button type="reset" class="teacher_upl_btn" id="teacher_cancel_btn">Cancel</button>
                    </div>
            </form>
        </div>
    </div>

</div>


<script defer src="<?=ROOT?>/assets/js/assignmentEdit.js?v=<?php echo time(); ?>"></script>

    <?php $this->view("includes/footer");?>