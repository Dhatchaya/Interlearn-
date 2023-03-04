<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<div class="teacher_upl_container">
<?php $this->view("includes/sidebar_teach");?>
        <div class="teacher_upl_content">
        <?php if(!empty($courses)):?>
            <?php foreach($courses as $course):?>
            <h2>Grade <?=esc($course->grade)?> - <?=esc($course->subject)?></h2>
            <?php endforeach;?>
            <?php endif;?><br>
            <h3>Upload Materials</h3>
            <br><br>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="week_no" value="<?=$week_no?>">
                <p>Name of the Upload:</p>
                <input type="text" class="teacher_upl_name" name="upload_name"><br><br><br>
                <input type="file" name="file" id="file-input" class="teacher-upload-file">
                <label class="teacher-upload-btn" for="file-input">Choose a file</label>
                <span id="teacher-upload-name"></span>

                <!-- <img src="<?=ROOT?>/assets/images/files.png" class="teacher_upl_img">
                <img src="<?=ROOT?>/assets/images/folder.png" class="teacher_upl_img">
                <div class="teacher_upl_box">
                    <div class="teacher_upl_inner_box"></div>
                </div> -->
                <br><br><br>
                <a href="<?=ROOT?>/teacher/course">
                    <button type="submit" class="teacher_upl_btn" name="submit">Upload</button>
                </a>    
                <button type="reset" class="teacher_upl_btn">Cancel</button>
            </form>

            <script>
                const fileInput = document.querySelector('#file-input');
                const fileName = document.querySelector('#teacher-upload-name');

                fileInput.addEventListener('change', (event) => {
                  const selectedFile = event.target.files[0];
                  fileName.textContent = selectedFile ? selectedFile.name : '';
                });
                fileName.textContent = 'No file chosen';
            </script>
        </div>
    </div>

    <?php $this->view("includes/footer");?>