<?php $this -> view('includes/header'); ?>
<?php $this -> view('includes/purplenav'); ?>

<div class="otpcontent">
<img class="otp-success-tick" src="<?= ROOT ?>/assets/images/success.png" alt="">
<h1 class="otp-text"><?=$content?></h1>
<?php if(!empty($verify)):?>
<h4 class="otp-text"><?=$verify?></h4>

<?php endif;?>
<a href="http://localhost/Interlearn/public/home">
<button type="button" class="otp-verify-button">

Back to home

</button></a>
<br/>
</div><br/>
<?php $this -> view('includes/footer'); ?>