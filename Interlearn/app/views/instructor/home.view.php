<?php $this->view("includes/header"); ?>
<div class="main-body-div">

        <?php $this->view("includes/sidebar_ins"); ?>
        <div class="top-to-bottom-content">
            <?php $this->view("includes/nav"); ?>
            <div class="all-middle-content">
                <div class="center-content">
                    <div class="teach_view_greeting">
                        <div class="teach_view_greet">Welcome Back,<br> <?= ucfirst(Auth::getusername()) ?>!</div>
                        <img src="<?= ROOT ?>/assets/images/education.png" alt="">
                    </div>
                    <div class="maindash">
                        <?php if (!empty($sums)) : ?>
                            <?php foreach ($sums as $sum) : ?>
                                <div class="teacher_crs_rectangle">

                                    <a href="<?= ROOT ?>/instructor/course/view/<?= $sum->course_id ?> ">
                                        <img src="<?= ROOT ?>/assets/images/book.jpg" alt="" class="teacher_crs_img">
                                        <br><br>
                                        <div class="teacher-home-text">
                                            <p>Grade <?= esc($sum->grade) ?> - <?= esc($sum->subject) ?></p>
                                            <p><?= esc($sum->teacherName) ?></p>
                                        </div>
                                        <div class="teacher-home-medium">
                                            <p><?= esc($sum->language_medium) ?> Medium</p>
                                        </div>
                                    </a>

                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="student_calendar">
                <?php $this->view("includes/calendar");?>
                <div id = "assignment_today" class ="assignment_today">


        </div>
    </div>
            </div>
        </div>
</div>
<!-- <div  id="overlay"></div> -->
</div>
<script defer src="<?=ROOT?>/assets/js/calendar_ins.js?v=<?php echo time(); ?>"></script>
<?php $this->view("includes/footer"); ?>