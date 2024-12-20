<?php $this->view("includes/header"); ?>
<div class="main-body-div">
    <?php $this->view("includes/sidebar"); ?>
    <div class="top-to-bottom-content">
        <?php $this->view("includes/nav"); ?>
        <div class="all-middle-content">
            <div class="std_crs_pg_container">
                <div class="std_crs_main">
                    <div class="std_crs_pg_content">
                        <div class="std_crs_pg_name">
                            <?php if (!empty($courses)) : ?>
                                <h2>Grade <?= $courses[0]->grade ?> - <?= $courses[0]->subject ?></h2>
                                <h3><?= $courses[0]->first_name ?> <?= $courses[0]->last_name ?></h3>
                            <?php endif; ?>
                        </div>
                        <div class="std_crs_pg_butn">
                            <a href="<?=ROOT?>/student/myprogress/view?id=<?php echo($id)?>">
                                <button class="std_crs_pg_btn">View Progress</button>
                            </a>
                        </div>
                    </div>
                    <div class="student_crs_content2">
                        <a href="<?= ROOT ?>/student/course/view/<?= $id ?>/announcement" class="teacher-course-announcement">
                            Announcements
                            <img src="<?= ROOT ?>/assets/images/next.png" alt="" class="teacher-course-ann-img">
                        </a>
                        <?php if(!empty($çourseWeeks)):?>
                        <?php
                        $i = 1;
                        foreach ($çourseWeeks as $value) {
                        ?>
                            <div class="teacher-grid-item" id="Week_<?= $i ?>">
                                <div class="teacher-card-content">
                                    <div class="teacher-card-title">
                                        <div class="teacher-card-head">
                                            <p class="teacher-card-head-title"><?= $value->week_name ?></p>
                                        </div>
                                    </div>
                                    <div class="teacher-card-body">
                                        <?php if (!empty($materials)) :

                                        ?>
                                            <?php foreach ($materials as $material) : ?>
                                                <?php if ($material->week_no == $i) : ?>
                                                    <?php if ($material->type == "material") : ?>

                                                        <?php if ($material->file_type === "application/pdf") : ?>
                                                            <p>
                                                                <a href="<?= $material->view_URL ?>" class="student-content">
                                                                    <img src="<?= ROOT ?>/assets/images/pdf-file.png" alt="" class="teacher_card_img3">
                                                                    <?= $material->upload_name ?>
                                                                </a>
                                                            </p>
                                                        <?php elseif ($material->file_type === "text/plain") : ?>
                                                            <p>
                                                                <a href="<?= $material->view_URL ?>" class="student-content">
                                                                    <img src="<?= ROOT ?>/assets/images/note.png" alt="" class="teacher_card_img3">
                                                                    <?= $material->upload_name ?>
                                                                </a>
                                                            </p>
                                                        <?php elseif ($material->file_type === "application/x-zip-compressed") : ?>
                                                            <p>
                                                                <a href="<?= $material->view_URL ?>" class="student-content">
                                                                    <img src="<?= ROOT ?>/assets/images/zip-new.png" alt="" class="teacher_card_img3">
                                                                    <?= $material->upload_name ?>
                                                                </a>
                                                            </p>
                                                        <?php else : ?>
                                                            <p>
                                                                <a href="<?= $material->view_URL ?>" class="student-content">
                                                                    <img src="<?= ROOT ?>/assets/images/documents.png" alt="" class="teacher_card_img3">
                                                                    <?= $material->upload_name ?>
                                                                </a>
                                                            </p>
                                                        <?php endif; ?>

                                                    <?php elseif ($material->type == "assignment") : ?>
                                                        <p>
                                                            <a href="<?= $material->studentView_URL ?>" class="student-content">
                                                                <img src="<?= ROOT ?>/assets/images/assignment.png" alt="" class="teacher_card_img3">
                                                                <?= $material->upload_name ?>
                                                            </a>
                                                        </p>

                                                    <?php elseif ($material->type == "quiz") : ?>
                                                        <p>
                                                            <a href="<?= $material->studentView_URL ?>" class="student-content">
                                                                <img src="<?= ROOT ?>/assets/images/quiz-new.png" alt="" class="teacher_card_img3">
                                                                <?= $material->upload_name ?>
                                                            </a>
                                                        </p>

                                                    <?php elseif ($material->type == "URL") : ?>
                                                        <p>
                                                            <a href="<?= $material->view_URL ?>" class="student-content">
                                                                <img src="<?= ROOT ?>/assets/images/web-new.png" alt="" class="teacher_card_img3">
                                                                <?= $material->upload_name ?>
                                                            </a>
                                                        </p>

                                                    <?php elseif ($material->type == "forum") : ?>
                                                        <p>
                                                            <a href="<?= $material->view_URL ?>" class="student-content">
                                                                <img src="<?= ROOT ?>/assets/images/discussion.png" alt="" class="teacher_card_img3">
                                                                <?= $material->upload_name ?>
                                                            </a>
                                                        </p>
                                                    <?php elseif ($material->type == "Note") : ?>
                                                        <p class="text-upload-crs">
                                                            <b><u><?= $material->upload_name ?></u></b><br>
                                                            <?= $material->view_URL ?>
                                                        </p>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php
                            $i++;
                        }
                        ?>

                         <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->view("includes/footer"); ?>