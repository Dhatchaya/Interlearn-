<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<div class="std_subm_container">
<?php $this->view("includes/sidebar");?>
        <div class="std_subm_content">
            <h2>Mathematics</h2><br>
            <h3>Homework 1 - Submission</h3>
            <br><br>
            <div class="std_subm_outerline">
                <h4>File Submissions</h4>
                <p>Maximum File Size: 256MB, Maximum number of files: 10</p>
            </div><br>
            <div class="std_subm_file">
                <div title="Add files"><img src="<?=ROOT?>/assets/images/files.png" class="std_subm_img"></div>
                <div title="Create Folder"><img src="<?=ROOT?>/assets/images/folder.png" class="std_subm_img"></div>
            </div>
            <div class="std_subm_box">
                <div class="std_subm_inner_box"></div>
            </div>
            <br><br>
            <button type="submit" class="std_subm_btn">Submit</button>
            <button type="reset" class="std_subm_btn">Cancel</button>
        </div>
    </div>

    <?php $this->view("includes/footer");?>