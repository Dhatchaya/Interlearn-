<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<div class="std_view_container">

    <?php $this->view("includes/sidebar")?>

    <div class="std_view_content">
        <div class="std_view_greeting">
            <div class="std_view_greet">Welcome Back,<br> John!</div>
            <img src="<?=ROOT?>/assets/images/education.png" alt="">
        </div>
        <br><br>

        <div class="std_view_announcement">
            <h3 class="std_view_text">Announcements</h3><br>
            <div class="std_view_box">
                <div class="std_view_msg">
                    <h5>Mr. Edward</h5>
                    <h5>Mathematics</h5><br>
                    <p>Please note that tomorrow(24th) class has been cancelled.</p>
                </div><br>
                <div class="std_view_msg">
                    <h5>Mr. Edward</h5>
                    <h5>Mathematics</h5><br>
                    <p>Please note that tomorrow(24th) class has been cancelled.</p>
                </div><br>
                <div class="std_view_msg">
                    <h5>Mr. Edward</h5>
                    <h5>Mathematics</h5><br>
                    <p>Please note that tomorrow(24th) class has been cancelled.</p>
                </div>
            </div>
            
        </div>
    </div>
</div>

    <?php $this->view("includes/footer");?>
