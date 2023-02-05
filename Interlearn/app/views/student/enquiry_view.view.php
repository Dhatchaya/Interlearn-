<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<div class="center-body view">
    <?php $this->view("includes/sidebar");?>
    
    <div class="enq_view_body">
        <h2 class="add_heading">Enquiry <?=$enq->eid;?></h2>
        <div class="enq-body">
            <div class="init_enq">
                <span class="enq-view-titlebar">
                    <span>
                        Subject:  <?=$enq->title;?>
                    </span>
                    <span>
                        Status:<?=$enq->status;?>
                    </span>
                </span>
                <p class="view_content"><?=$enq->content;?></p>
                <span class="view-date">
                    <?=$enq->date;?>
                </span>
                <div class="view-reply" id="enq-reply">
                    <img src = "<?=ROOT?>/assets/images/reply-arrow.png" alt="Reply"/>
                </div>
            </div>
            <form method="POST" class="enq-view-form" id="view-form">
                <input name = "reply" id="reply" type="text" placeholder="write your reply"/></br>
                <input type="submit" value="Reply" name = "reply_submit"/>
            </form>
   
  
    </div>   
</div> 
   
</div>
<script defer src="<?=ROOT?>/assets/js/enqView.js?v=<?php echo time(); ?>"></script>
<?php $this->view("includes/footer");?>