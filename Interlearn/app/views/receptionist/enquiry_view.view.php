<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<div class= "enq_full_body">
    <h2 class="add_heading">Enquiry <?=$enq->eid;?></h2>
</div>
<div class="center-body view">
    <?php $this->view("includes/sidebar_recep");?>
    
    <div class="enq_view_body">
   
        <!-- <button class="resolve-btn"> Resolved </button> -->
        <div class="enq-body">

                     <script>
                        var repId = <?php echo json_encode($enq->eid); ?>;
                    </script>
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
              <?php if($enq->status == 'pending'):?>
                <div class="view-reply" id="enq-reply">
                    <img src = "<?=ROOT?>/assets/images/reply.png" alt="Reply"/>
                </div>
              <?php endif;?>
            </div>
            <form method="POST" class="enq-view-form" id="view-form">
                <input name = "content" id="reply" type="text" placeholder="write your reply"/></br>
                <input class="reply-btn" type="submit" value="Reply" name = "reply_submit"/>
                <input class="reply-btn" type="reset" 
                value="Cancel" id = "reply_cancel" name = "reply_cancel"/>
            </form>
            <?php if(!empty($reply)):?>
                <?php foreach($reply as $reply):?>
                    <script>
                        var repId = <?php echo json_encode($reply->repId); ?>;
                    </script>
                    <?php if($reply->reply_user != Auth::getrole()):?>
                    <div class="init_enq sender">
                    <?php else:?>
                        <div class="init_enq">
                    <?php endif;?>
                        <span class="enq-view-titlebar">
                            <span>
                                Subject:  <?=$enq->title;?>
                            </span>
                            <span>
                                Status:<?=$enq->status;?>
                            </span>
                        </span>
                        <p class="view_content"><?=$reply->content;?></p>
                        <span class="view-date">
                            <?=$reply->date;?>
                        </span>
                        <?php if($reply->status != 'replied'&& $reply->reply_user != Auth::getrole()):?>
                            <div class="view-reply" id="enq-reply">
                                <img src = "<?=ROOT?>/assets/images/reply.png" alt="Reply"/>
                            </div>
                        <?php endif;?>
                    </div>
                <?php endforeach;?>
            <?php endif?>

    </div>   
</div> 
   
</div>
<script defer src="<?=ROOT?>/assets/js/enqView.js?v=<?php echo time(); ?>"></script>
<?php $this->view("includes/footer");?>