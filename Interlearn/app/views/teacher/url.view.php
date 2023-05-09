<?php $this->view("includes/header"); ?>
<div class="main-body-div">
    <?php $this->view("includes/sidebar_teach"); ?>
    <div class="top-to-bottom-content">
        <?php $this->view("includes/nav"); ?>
        <div class="all-middle-content">
            <div class="teacher_upl_container">
                <div class="teacher_upl_content">
                    <?php if (!empty($courses)) : ?>
                        <?php foreach ($courses as $course) : ?>
                            <h2>Grade <?= esc($course->grade) ?> - <?= esc($course->subject) ?></h2>
                        <?php endforeach; ?>
                    <?php endif; ?><br>

                    <?php if (!empty($errors)) : ?>
                        <?php foreach ($errors as $error) : ?>
                            <div id="error" class="display-error">*<?= esc($error) ?></div><br>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <h3>Post URL Links</h3>
                    <br><br>
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="week_no" value="<?= $week_no ?>">
                        <p>Name to be displayed:</p><br>
                        <input type="text" class="teacher_upl_name" name="upload_name"><br><br><br>

                        <p>Paste your URL here:</p><br>
                        <input type="text" class="teacher_upl_name" name="URL">

                        <!-- <label class="teacher-upload-container" for="file-input">
                    <span id="teacher-upload-name" class="teacher-upload-title">Drag and drop your files here</span>
                    or
                    <input type="file" name="file" id="file-input" class="teacher-upload-file">
                </label> -->

                        <br><br><br><br><br>
                        <a href="<?= ROOT ?>/teacher/course">
                            <button type="submit" class="teacher_upl_btn" name="submit">Upload</button>
                        </a>
                        <button type="reset" class="teacher_upl_btn">Cancel</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->view("includes/footer"); ?>