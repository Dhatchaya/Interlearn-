<?php $this->view("includes/header");?>
<link rel="shortcut icon" href="<?=ROOT?>/assets/images/favicon/fv.png" type="image/x-icon">
<div class="main-body-div">
<?php if(Auth::getrole() == "Student"):?>
        <?php $this->view("includes/sidebar");?>
    <?php else:?>
        <?php  if(Auth::getrole() == "Teacher"):?>
            <?php $this->view("includes/sidebar_teach");?>
    <?php else:?>
        <?php if(Auth::getrole() == "Instructor"):?>
            <?php $this->view("includes/sidebar_ins");?>
    <?php endif;?>
    <?php endif;?>
    <?php endif;?>

<div class="discuss_body  top-to-bottom-content">
<?php $this -> view('includes/nav'); ?>
    <div class="all_discussions" id = "all_discussions">
        <div class="each_thread">
            <div class="discuss_card"  data-thread-id='<?=esc($forum->forum_id)?>'>
            <input name = "session_alt" id="session_alt" type="hidden"  value='<?=esc(Auth::getuid())?>'/></br>
               <div class="discuss_content">
                    <div class="discuss_creator">
                            <img class="user_img" src="<?=ROOT?>/uploads/images/<?=esc($forum->display_picture)?>" alt="picture"/>
                            <div class = "user_title">
                                <h3><?=esc($forum->topic)?></h3>
                                <h2> By: <?=esc($forum->username)?> <?=date("D M d Y  h:i A", strtotime($forum->date));?></h2>
                            </div>
                    </div>
                    <div class="forum_body_all" id="forum_body_all">
                    <div class="forum_para">
                        <p> <?=esc($forum->content)?> </p>
                    </div>
                    <?php if (!empty($forum->attachment)):?>
                    <a href="<?=ROOT?>/uploads/<?=esc($forum->course_id)?>/forum_files/<?=esc($forum->attachment)?>" class= "attachment-link">View Attachment</a>
                    <?php endif; ?>
                    <!-- <iframe src="<?=ROOT?>/uploads/forum_files/<?=esc($forum->attachment)?>" width="100%" height="500"></iframe> -->

                    <div class="forum-reply" id="forum-reply">
                    <?php if ($forum->uid === Auth::getuid()):?>

                        <button class= "forum_Edit_btn reply-btn"  onclick="editDiscussion(<?=esc($forum->forum_id)?>,'forum')">Edit</button>
                        <?php endif; ?>
                        <button class= "forum_reply_btn reply-btn">Reply</button>
                  
                        
                    </div>
                    </div>
                </div>

                    <form method="POST" class="forum_reply_form" id="forum_reply_box"  enctype="multipart/form-data" >
                        <input name = "parent_id" id="parent_id" type="hidden"  value='<?=esc($forum->forum_id)?>'/></br>
                        <p id="content_type_error" class="warning"></p>
                        <textarea name = "content" id="reply" type="text" placeholder="write your reply" class="reply-textarea" ></textarea>
                        <input type ="file"  class = "file_attachment" name="attachment" /></br>
                        <p id="file_type_error" class="warning"></p>

                        <input class="reply-btn" type="submit" value="Reply" name = "reply_submit"  />
                        <input class="forum_cancel_btn reply-btn" type="reset" value="Cancel" id = "forum_cancel_btn" name = "reply_cancel"/>
                    </form>

            </div>

        </div>
    </div>
</div>
</div>
<script defer src="<?=ROOT?>/assets/js/discuss.js?v=<?php echo time(); ?>"></script>
<?php $this->view("includes/footer");?>