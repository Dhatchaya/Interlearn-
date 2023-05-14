<?php $this->view("includes/header"); ?>


<div class="main-body-div">
    <?php $this->view("includes/sidebar_teach"); ?>
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
                                                <a href="<?=ROOT?>/staffs/allprofiles/student/<?=esc($row->uid)?>">
                                                    <button class="view_enq_btn" >View</button>
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


    </div>
</div>

<?php $this->view("includes/footer"); ?>