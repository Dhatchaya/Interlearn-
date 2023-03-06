<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<div class="recp_ann_container">
<?php $this->view("includes/sidebar_recep");?>
    <div class="recp_ann_content">
        <a href="<?=ROOT?>/teacher/course/announcement/<?=$course_id?>/0/add">
            <button class="recp_cl_btn">+Add Announcements</button><br><br>
        </a>
        <br>
        <div class="recp_view_announcement">
            <h2 class="std_view_text">Announcements</h2><br>
            <div class="std_view_box">
                <?php if(!empty($announcements)):?>
                <?php foreach($announcements as $row):?>
                <div class="ann_view_msg">
                    
                    <?php 
                        $expiryTime = strtotime($row->date_time) + 60*60; // expiry time is 1 hour after creation
                        $currentTime = time(); //timestap
                        if($expiryTime > $currentTime): 
                        ?>
                        <img src="<?=ROOT?>/assets/images/edit.png" class="teacher_crs_img2" id="button28" onclick="openModal3()">
                    <?php else :?>
                        <?php echo "Editing is no longer allowed for this record.";?>
                    <?php endif; ?>
                    
                    <a href="<?=ROOT?>/receptionist/announcement/delete/<?=esc($row->aid)?>">
                        <img src="<?=ROOT?>/assets/images/delete.png" class="teacher_crs_img2">
                    </a>
                    <!-- <button class="recp_cl_btn" id="button1">+Add new teacher</button> -->
                    <!-- <div id="profileModal" class="popupModal">
                       <div class="popupmodal-content">
                           <span class="ann_close" onclick="closeModal()">&times;</span>
                           <form action="" method="post" class="up-profile">
                                <label for="">Announcement name: </label><br>
                                <input type="text" class="edit_ann_name" name="title"><br><br>
                                <label for="">Content: </label><br>
                                <textarea id="address" name="address" class="edit_ann_cont"></textarea><br><br>
                                <label for="">Attach Files: </label><br><br>
                                <input type="file" class="edit_ann_name" name="attachment"><br>


                               <div class="errors">
                                   <span class="form-error"></span>
                               </div>

                               <input type="submit" value="Save Changes" class="teacher-ann-edit-btn">
                           </form>
                       </div>
                    </div> -->


            <div id="profileModal3" class="popupModal">
                <div class="tchr-popupmodal-content3">
                    <span class="ann_close" onclick="closeModal3()">&times;</span><br>
                    <h4>--Edit Announcement--</h4><br>
                    <form action="" method="post" class="up-profile">
                        <div class="teacher-crs-activities2">
                            <label for="">Announcement name: </label><br>
                            <input type="text" class="edit_ann_name" name="title"><br><br>
                            <label for="">Content: </label><br>
                            <textarea id="address" name="address" class="edit_ann_cont"></textarea><br><br>
                            <label for="">Attach Files: </label><br><br>
                            <input type="file" class="edit_ann_name" name="attachment"><br><br>
                            <button type="submit" class="teacher_upl_btn" name="submit-title" id="add-btn">Save</button>
                            <button type="reset" class="teacher_upl_btn" id="cancel-btn">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>

                    <h3><?=$row->title?></h3>
                    <br>
                    Dear Students,<br>
                    <p><?=$row->content?></p><br>
                    
                    <div class="recp_ann_attachment">
                        <a href="">
                        <?=esc($row->attachment)?>
                        </a>
                    </div><br>
                    <p class="recp_ann_bot"><?=esc($row->fullname)?></p>
                    <p class="recp_ann_bot"><?=$row->date_time?></p><br>
                    
                </div><br>
                <?php endforeach;?>
                <?php endif?>
            </div>
        </div>
    </div>
</div>
<script defer src="<?=ROOT?>/assets/js/announcement.js?v=<?php echo time(); ?>"></script>
<?php $this->view("includes/footer");?>