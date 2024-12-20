<?php $this->view("includes/header"); ?>
<div class="main-body-div">
    <?php $this->view("includes/sidebar_recep"); ?>
    <div class="top-to-bottom-content">
        <?php $this->view("includes/nav"); ?>
        <div class="all-middle-content">
            <div class="recp_ann_container">
                <div class="recp_ann_content">
                    <a href="<?= ROOT ?>/receptionist/announcement/add">
                        <button class="recp_cl_btn">+Add Announcements</button><br><br>
                    </a>
                    <br>
                    <div class="recp_view_announcement">
                        <h2 class="std_view_text">Announcements</h2><br>
                        <div class="std_view_box">
                            <?php if (!empty($announcements)) : ?>
                                <?php foreach ($announcements as $row) : ?>
                                    <div class="ann_view_msg">
                                        <?php if ($editable) : ?>
                                            <img src="<?= ROOT ?>/assets/images/edit.png" class="teacher_crs_img2" id="button28" onclick="openModal3('<?= esc($row->aid) ?>')">
                                        <?php else : ?>
                                            <!-- <?php echo "Editing is no longer allowed for this record."; ?> -->
                                        <?php endif; ?>

                                        <img src="<?= ROOT ?>/assets/images/delete.png" class="teacher_crs_img2" onclick="openModal6('<?= esc($row->aid) ?>')">
                                        <!-- <button class="recp_cl_btn" id="button1">+Add new teacher</button> -->


                                        <h3><u><?= $row->title ?></u></h3><br>
                                        Dear Students,<br>
                                        <p><?= $row->content ?></p><br>

                                        <div class="recp_ann_attachment">
                                            <a href="<?= esc($row->attachment) ?>">
                                                <?= esc($row->file_name) ?>
                                            </a>
                                        </div><br>
                                        <p class="recp_ann_bot"><?= $row->date_time ?></p><br>

                                    </div><br>



                                    <!-- edit announcement popup -->
                                    <div id="profileModal3" class="popupModal">
                                        <div class="popupmodal-content">
                                            <span class="ann_close" onclick="closeModal3()">&times;</span>
                                            <form action="" method="post" class="up-profile" enctype="multipart/form-data">

                                                <input type="hidden" value="" name="edit-announcement" id="edit-announcement">
                                                <label for="">Announcement name: </label><br>
                                                <input type="text" class="edit_file_ann_name" value="" name="title" id="title"><br><br>
                                                <label for="">Content: </label><br>
                                                <input type="text" id="content" name="content" value="" class="edit_ann_cont"><br><br>
                                                <div class="recp_file_box">
                                                    <label for="">Attach Files: </label>
                                                    <input type="hidden" id="attachment_file">
                                                    <div><input type="text" id="file_recp_announcement" disabled><span class="edit_file_announcement">&times;</span></div>
                                                    <br>
                                                    <input type="file" name="attach_recp_file" id="attach_recp_file" value="">
                                                </div><br>
                                                <label for="">File name: </label><br>
                                                <input type="text" class="edit_file_ann_name" value="" name="title" id="file_name_recp"><br><br><br>
                                                <button type="submit" class="teacher_upl_btn" id="submit-edit-ann" name="submit-edit-announcement" onclick="closeModal3()">Update</button>
                                            </form>
                                        </div>
                                    </div>




                                    <!-- delete announcement -->
                                    <div id="profileModal6" class="popupModal">
                                        <div class="tchr-popupmodal-content2">
                                            <span class="ann_close" onclick="closeModal6()">&times;</span><br>
                                            <h4>--Delete Announcement--</h4><br>
                                            <form action="" method="post" class="up-profile">
                                                <div class="teacher-crs-activities2">
                                                    <label for="delete-sec" class="teacher-edit">Are you sure you want to delete this announcement? </label>
                                                    <!-- <input type="text" class="teacher-edit-title" name="title"> -->
                                                    <input type="hidden" value="" name="delete-announcement" id="delete-announcement">
                                                    <br><br>
                                                    <!-- <a href="<?= ROOT ?>/receptionist/course/view/1/?id=<?= esc($teacher->subject_id) ?>"> -->
                                                    <button type="submit" class="teacher_upl_btn" name="submit-delete-announcement" id="add-btn">Yes</button>
                                                    <!-- </a> -->
                                                    <button type="reset" class="teacher_upl_btn" id="cancel-btn" onclick="closeModal6()">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script defer src="<?= ROOT ?>/assets/js/recp_announcement.js?v=<?php echo time(); ?>"></script>
<?php $this->view("includes/footer"); ?>