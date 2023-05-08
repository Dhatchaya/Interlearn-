<?php $this->view("includes/header");?>



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


<div class="view top-to-bottom-content">

    <?php $this->view("includes/nav");?>
    <div class="enq_right_body">
        <!-- <div class= "enq_full_body">
        <h2 class="add_heading">Enquiry <?=$enq->eid;?></h2>
        </div> -->
        <div class="enq_view_body">
        
            <!-- <button class="resolve-btn"> Resolved </button> -->
            <div class="enq-body">

                        <script>
                            var repId = <?php echo json_encode($enq->eid); ?>;
                        </script>
            
                        <?php if($enq->role != Auth::getrole()):?>
                        <div class="init_enq">
                        <?php else:?>
                            <div class="init_enq  sender">
                        <?php endif;?>
                    <!-- <span class="enq-view-titlebar">
                        <span>
                            Subject:  <?=$enq->title;?>
                        </span>
                        <span>
                            Status:<?=$enq->status;?>
                        </span>
                    </span> -->
                    <p class="view_content"><?=$enq->content;?></p>
                    <span class="view-date">
                        <?=$enq->date;?>
                        <?=$enq->role;?>
                    </span>
                </div>

                <?php if(!empty($reply)):?>
                    <?php foreach($reply as $reply):?>
                        <script>
                            var repId = <?php echo json_encode($reply->repId); ?>;
                        </script>
                        <?php if($reply->reply_user != Auth::getrole()):?>
                        <div class="init_enq">
                        <?php else:?>
                            <div class="init_enq  sender">
                        <?php endif;?>
                            <!-- <span class="enq-view-titlebar">
                                <span>
                                    Subject:  <?=$enq->title;?>
                                </span>
                                <span>
                                    Status:<?=$enq->status;?>
                                </span>
                            </span> -->
                            <p class="view_content"><?=$reply->content;?></p>
                            <span class="view-date">
                               
                                <?=$reply->date;?> -
                                <?=$reply->reply_user;?>
                            </span>
                     
                        </div>
                    <?php endforeach;?>
                <?php endif?>

        </div>   
        <?php if($enq->status != 'resolved'):?>
        <div class="enq_form_body">
                <form method="POST" class="enq-view-form" id="view-form">
                    <input name = "content" id="reply" type="text" placeholder="<?php echo($empty??"write your reply")?>"/></br>
                    <input class="reply-btn" type="submit" value="Reply" name = "reply_submit"/>
                    <!-- <input class="reply-btn" type="reset" value="Cancel" id = "reply_cancel" name = "reply_cancel"/> -->
                </form>
                </div>
        <?php endif?>
    </div>
    </div> 
    </div>
    </div>
    </div>
    </div>

<script defer src="<?=ROOT?>/assets/js/enqView.js?v=<?php echo time(); ?>"></script>
<?php $this->view("includes/footer");?>