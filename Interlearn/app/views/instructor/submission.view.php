<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<div class="teacher_subm_container">
<?php $this->view("includes/sidebar_ins");?>
        <div class="teacher_subm_content">
            <h2>Mathematics</h2><br>
            <h4>Name of Submission</h4>
            <input type="text" class="teacher_subm_name"><br><br>
            <h4>Question</h4>
            <input type="text" class="teacher_subm_name"><br><br>
            <h4>Submission Type</h4>
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
            <label for="">20</label><br><br>
            <h4>Deadline</h4>
            <input type="datetime-local" name="" id="" class="teacher_subm_date">
            <br><br>
    <div class="teacher_subm_butn">
        <br>
        <button type="submit" class="teacher_upl_btn">Upload</button>
            <button type="reset" class="teacher_upl_btn">Cancel</button>
    </div>
        </div>
        
    </div>
    
            

    <?php $this->view("includes/footer");?>