<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<div class="discuss_body">
<?php $this->view("includes/sidebar");?>
<div class="discuss_card">
    <div class="discuss_content">
        <div class="discuss_creator">
            <img src="<?=ROOT?>/uploads/images/<?= Auth::getdisplay_picture();?>" alt="picture"/> 
            <h3> <?=esc($discuss->creator)?></h3>
            <h6> <?=esc($discuss->date)?></h6>
        </div>
        <p> <?=esc($discuss->content)?> </p>
        <div class="forum-reply">
            <button class= "reply-btn send_reply">Reply</button>
        </div>
        
    </div>
            <form method="POST" class="enq-view-form" id="view-form">
                <input name = "content" id="reply" type="text" placeholder="write your reply"/></br>
                <input class="reply-btn" type="submit" value="Reply" name = "reply_submit"/>
                <input class="reply-btn" type="reset" 
                value="Cancel" id = "reply_cancel" name = "reply_cancel"/>
            </form>
</div>
</div>
<script defer src="<?=ROOT?>/assets/js/discuss.js?v=<?php echo time(); ?>"></script>
<?php $this->view("includes/footer");?>