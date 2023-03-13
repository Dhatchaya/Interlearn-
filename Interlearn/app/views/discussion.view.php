<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<div class="discuss_body">
    <?php $this->view("includes/sidebar");?>
    <div class="all_discussions" id = "all_discussions">
        <div class="each_thread">
            <div class="discuss_card"  data-thread-id='<?=esc($forum->forum_id)?>'>
               <div class="discuss_content">
                    <div class="discuss_creator">
                            <img class="user_img" src="<?=ROOT?>/uploads/images/<?=esc($forum->display_picture)?>" alt="picture"/>
                            <div class = "user_title">
                                <h3><?=esc($forum->topic)?></h3>
                                <h2> By: <?=esc($forum->username)?> <?=date("D M d Y  h:i A", strtotime($forum->date));?></h2>
                            </div>
                    </div>
                    <div class="forum_para">
                        <p> <?=esc($forum->content)?> </p>
                    </div>
                    <?php if (!empty($forum->attachment)):?>
                    <a href="<?=ROOT?>/uploads/<?=esc($forum->course_id)?>/forum_files/<?=esc($forum->attachment)?>" class= "attachment-link">View Attachment</a>
                    <?php endif; ?>
                    <!-- <iframe src="<?=ROOT?>/uploads/forum_files/<?=esc($forum->attachment)?>" width="100%" height="500"></iframe> -->

                    <div class="forum-reply" id="forum-reply">
                        <button class= "forum_reply_btn reply-btn">Reply</button>
                        <button class= "forum_Edit_btn reply-btn">Edit</button>
                    </div>
                </div>

                    <form method="POST" class="forum_reply_form" id="forum_reply_box"  enctype="multipart/form-data" >
                        <input name = "parent_id" id="parent_id" type="hidden"  value='<?=esc($forum->forum_id)?>'/></br>
                        <textarea name = "content" id="reply" type="text" placeholder="write your reply" class="reply-textarea" ></textarea>
                        <input type ="file"  class = "file_attachment" name="attachment" /></br>


                        <input class="reply-btn" type="submit" value="Reply" name = "reply_submit"  />
                        <input class="forum_cancel_btn reply-btn" type="reset" value="Cancel" id = "forum_cancel_btn" name = "reply_cancel"/>
                    </form>

            </div>

        </div>
    </div>
</div>
<script defer src="<?=ROOT?>/assets/js/discuss.js?v=<?php echo time(); ?>"></script>
<?php $this->view("includes/footer");?>