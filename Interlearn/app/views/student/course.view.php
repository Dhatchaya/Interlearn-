<?php $this->view("includes/header"); ?>
<div class="main-body-div">
    <?php $this->view("includes/sidebar"); ?>
    <div class="top-to-bottom-content">
        <?php $this->view("includes/nav"); ?>
        <div class="all-middle-content">
            <div class="std_crs_container">
                <div class="class-search-box">
                    <input type="text" name="class-search" id="class-search" onkeyup="search_classes()" placeholder="Search here.."/>
                </div><br>
                <div class="std_crs_content">

                    <?php if (!empty($sums)) : ?>
                 
                        <?php foreach ($sums as $sum) : ?>
                            <div class="empty-class-message" id="empty-class-message"></div>

                            <div class="recp_crs_rectangle">

                                <a href="<?= ROOT ?>/student/course/view/<?= $sum->course_id ?>">
                                    <img src="<?= ROOT ?>/assets/images/bookn.jpg" alt="" class="std_crs_img_new">
                                    <br><br>
                                    <p class="std-subject-name"><b>Grade <?= esc($sum->grade) ?> - <?= esc($sum->subject) ?></b> <br><br>
                                        <?= esc($sum->language_medium) ?> Medium <br><br>
                                        <b><?= esc($sum->fullname) ?></b>
                                    </p>
                                </a>

                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
</div>
<div id="overlay"></div>
<script defer src="<?= ROOT ?>/assets/js/stdClassSearch.js?v=<?php echo time(); ?>"></script>
<?php $this->view("includes/footer"); ?>