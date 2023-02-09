<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<div class="teacher_upl_container">
<?php $this->view("includes/sidebar");?>
        <div class="teacher_upl_content">
            <h2>Mathematics</h2>
            <h3>Upload Materials/Recording</h3>
            <br>
            <h4>Name of the Upload</h4>
            <input type="text" class="teacher_upl_name"><br><br>
            <img src="<?=ROOT?>/assets/images/files.png" class="teacher_upl_img">
            <img src="<?=ROOT?>/assets/images/folder.png" class="teacher_upl_img">
            <div class="teacher_upl_box">
                <div class="teacher_upl_inner_box"></div>
            </div>
            <br><br>
            <button type="submit" class="teacher_upl_btn">Upload</button>
            <button type="reset" class="teacher_upl_btn">Cancel</button>
        </div>
    </div>