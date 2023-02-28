<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<div class="teacher_upl_container">
<?php $this->view("includes/sidebar_teach");?>
        <div class="teacher_upl_content">
        <?php if(!empty($courses)):print_r($courses);exit;?>
            <?php foreach($courses as $course):?>
            <h2>Grade <?=esc($course->grade)?> - <?=esc($course->subject)?></h2>
            <?php endforeach;?>
            <?php endif;?><br>
            <h3>Upload Materials/Recording</h3>
            <br>
            <form action="" method="post" enctype="multipart/form-data">
                <p>Name of the Upload</p>
                <input type="text" class="teacher_upl_name"><br><br>
                <input type="file" name="file" id="">
                <img src="<?=ROOT?>/assets/images/files.png" class="teacher_upl_img">
                <img src="<?=ROOT?>/assets/images/folder.png" class="teacher_upl_img">
                <div class="teacher_upl_box">
                    <div class="teacher_upl_inner_box"></div>
                </div>
                <br><br>
                <a href="<?=ROOT?>/teacher/course">
                    <button type="submit" class="teacher_upl_btn" name="submit">Upload</button>
                </a>    
                <button type="reset" class="teacher_upl_btn">Cancel</button>
            </form>
        </div>
    </div>

    <?php $this->view("includes/footer");?>