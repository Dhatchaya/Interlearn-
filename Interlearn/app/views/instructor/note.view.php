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

                    <h3>Post a Note</h3>
                    <br><br>
                    <form action="" method="post">
                        <input type="hidden" name="week_no" value="<?= $week_no ?>">
                        <p>Title for the content:</p><br>
                        <input type="text" class="teacher_upl_name" name="upload_name"><br><br><br>

                        <p>Add your content:</p><br>
                        <input type="text" class="teacher_upl_name" name="content">


                        <br><br><br><br><br>
                        <a href="<?= ROOT ?>/instructor/course">
                            <button type="submit" class="teacher_upl_btn" name="submit">Post</button>
                        </a>
                        <button type="reset" class="teacher_upl_btn">Cancel</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->view("includes/footer"); ?>