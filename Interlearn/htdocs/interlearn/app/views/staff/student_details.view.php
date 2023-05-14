<?php $this->view("includes/header"); ?>


<div class="main-body-div">
    <?php $this->view("includes/sidebar_man"); ?>
    <div class="top-to-bottom-content">

        <?php $this->view("includes/nav"); ?>

        <div class="clm2 marginlow">

            <div class="class-search-box">
                <input type="text" name="class-search" id="class-search" onkeyup="search_classes()" placeholder="Search name here..">
            </div>
            <br>
            <div class="table-content-students">
                <div class="heading-students">
                    <div class="head2-table-std">
                        Student
                    </div>
                    <div class="head1-table-std">
                        First Name
                    </div>
                    <div class="head1-table-std">
                        Last Name
                    </div>
                    <div class="head2-table-std">
                        Actions
                    </div>
                </div>
                <br>

                <?php if (!empty($rows)) : ?>

                    <?php foreach ($rows as $row) : ?>
                        <div class="content-students">
                            <div class="head2-content-std">
                                <img src="<?= ROOT ?>/uploads/images/<?= esc($row->display_picture) ?>" alt="picture" class="display_picture_img" />
                            </div>
                            <div class="head1-content-std">
                                <?= esc($row->first_name) ?>
                            </div>
                            <div class="head1-content-std">
                                <?= esc($row->last_name) ?>
                            </div>
                            <div class="head2-content-std">
                                <a href="#">
                                    <button class="view_enq_btn">View</button>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="empty-class-message" id="empty-class-message"></div>
                    <div colspan="10">
                        No records found!
                    </div>
                <?php endif; ?>

            </div>

        </div>

    </div>
</div>
<script defer src="<?= ROOT ?>/assets/js/Registrations.js?v=<?php echo time(); ?>"></script>
<script defer src="<?= ROOT ?>/assets/js/addregistration.js?v=<?php echo time(); ?>"></script>
<script defer src="<?= ROOT ?>/assets/js/recepSearchStd.js?v=<?php echo time(); ?>"></script>
<?php $this->view("includes/footer"); ?>