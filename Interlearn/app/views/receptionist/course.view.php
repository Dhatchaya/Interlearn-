<?php $this->view("includes/header"); ?>
<div class="main-body-div">
    <?php $this->view("includes/sidebar_recep"); ?>
    <div class="top-to-bottom-content">
        <?php $this->view("includes/nav"); ?>
        <div class="all-middle-content">
            <div class="recp_crs_container">
                <div class="recp_crs_content">
                    <div class="class-view-top">
                        <div class="class-search-box">
                            <input type="text" name="class-search" id="class-search" onkeyup="search_classes()" placeholder="Search for subject name..">
                        </div>
                        <div class="add_crs_butn">
                            <a href="<?= ROOT ?>/receptionist/course/add">
                                <button class="add_crs_btn">Add new course</button>
                            </a>
                        </div>
                    </div>
                    <!-- <br><br> -->

                    <?php if (!empty($sums)) : ?>
                        <?php foreach ($sums as $sum) : ?>
                            <div class="empty-class-message" id="empty-class-message"></div>

                            <div class="recp_crs_rectangle">
                                <a href="<?= ROOT ?>/receptionist/course/view/1?id=<?= esc($sum->subject_id) ?> ">
                                    <div class="guest-view-image">
                                    <?php if ($sum->grade == 6) : ?>
                                            <img src="<?= ROOT ?>/assets/images/grades/6.png" alt="" class="guest_crs_img">
                                        <?php elseif ($sum->grade == 7) : ?>
                                            <img src="<?= ROOT ?>/assets/images/grades/7.png" alt="" class="guest_crs_img">
                                        <?php elseif ($sum->grade == 8) : ?>
                                            <img src="<?= ROOT ?>/assets/images/grades/8.png" alt="" class="guest_crs_img">
                                        <?php elseif ($sum->grade == 9) : ?>
                                            <img src="<?= ROOT ?>/assets/images/grades/9.png" alt="" class="guest_crs_img">
                                        <?php elseif ($sum->grade == 10) : ?>
                                            <img src="<?= ROOT ?>/assets/images/grades/10new.png" alt="" class="guest_crs_img">
                                        <?php elseif ($sum->grade == 11) : ?>
                                            <img src="<?= ROOT ?>/assets/images/grades/11.png" alt="" class="guest_crs_img">
                                        <?php elseif ($sum->grade == 12) : ?>
                                            <img src="<?= ROOT ?>/assets/images/grades/12.png" alt="" class="guest_crs_img">
                                        <?php else : ?>
                                            <img src="<?= ROOT ?>/assets/images/grades/13.png" alt="" class="guest_crs_img">
                                        <?php endif; ?>
                                    </div>
                                    <div class="grade-text">
                                        Grade <?= esc($sum->grade) ?>
                                    </div>
                                    <div class="subject-name">
                                        <?= esc($sum->subject) ?>
                                    </div>

                                </a>

                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>
<script defer src="<?= ROOT ?>/assets/js/classSearch.js?v=<?php echo time(); ?>"></script>
<?php $this->view("includes/footer"); ?>