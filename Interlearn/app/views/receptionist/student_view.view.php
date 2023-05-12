<?php $this->view("includes/header"); ?>


<div class="main-body-div">
    <?php $this->view("includes/sidebar_man"); ?>
    <div class="top-to-bottom-content">

        <?php $this->view("includes/nav"); ?>

        <div class="clm2 marginlow">

            <div id="enq_tab_content" class="enq_tab_content">
                <div id="reg_all_content" class="content-tab">
                    <table border=1 class='enq_tbl'>
                        <tr>
                            <th>Student</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th class="enq_action_clm2">Actions</th>
                        </tr>

                        <?php if (!empty($students)) : ?>
                            <?php foreach ($students as $row) : ?>
                                <tr>

                                    <td><img src="<?= ROOT ?>/uploads/images/<?= esc($row->display_picture) ?>" alt="picture" class="display_picture_img" /></td>
                                    <td><?= esc($row->first_name) ?></td>
                                    <td><?= esc($row->last_name) ?></td>
                                    <td>
                                        <div class="enq_actions">
                                            <div class="enq_view">
                                                <a href="#">
                                                    <button class="view_enq_btn" onclick="openModal4('<?= esc($row->student_id) ?>')">Delete</button>
                                                </a>
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="10">No records found!</td>
                            </tr>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </div>


        <!-- delete student -->
        <div id="profileModal4" class="popupModal">
            <div class="tchr-popupmodal-content4">
                <span class="ann_close" onclick="closeModal4()">&times;</span><br>
                <h4>Delete Student</h4><br>
                <form action="" method="post" class="up-profile">
                    <div class="teacher-crs-activities2">
                        <label for="delete-sec" class="teacher-edit">Are you sure you want to delete this student from this course? </label>
                        <!-- <input type="text" class="teacher-edit-title" name="title"> -->
                        <input type="hidden" value="" name="delete-student" id="delete-student">
                        <br><br>

                    </div>
                    <button type="submit" class="teacher_upl_btn" name="submit-delete-student" id="delete-student-btn">Yes</button>
                        <!-- </a> -->
                        <button type="reset" class="teacher_upl_btn" id="cancel-btn" onclick="closeModal4()">Cancel</button>
                </form>
            </div>
        </div>

    </div>
</div>

<script defer src="<?=ROOT?>/assets/js/deleteStd.js?v=<?php echo time(); ?>"></script>
<?php $this->view("includes/footer"); ?>