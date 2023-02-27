<?php $this->view('includes/header'); ?>
<div class="side-bar">
    <div class="top">
        <div class="aboutme">
            <img src="<?= ROOT ?>/uploads/images/<?= Auth::getdisplay_picture(); ?>" alt="picture" />
            <span class="user-name">

                <?= ucfirst(Auth::getusername()) ?>
            </span>
            <div>

            </div>
        </div>
        <hr>
    </div>
    <div class="middle">

        <div class="profile">
            <a href="<?= ROOT ?>/student/profile">
                <img src="<?= ROOT ?>/assets/images/sidebar_icons/profile.png" alt="profile"></br>
                <span>Edit Profile</span>
            </a>
        </div>


        <div class="dashboard">
            <a href="<?= ROOT ?>/student/course">
                <img src="<?= ROOT ?>/assets/images/sidebar_icons/dashboard.png" alt="Dashboard"></br>
                <span>Dashboard</span>
            </a>
        </div>


        <div class="home">
            <a href="<?= ROOT ?>/student/payment">
                <img src="<?= ROOT ?>/assets/images/sidebar_icons/card.png" alt="card"></br>
                <span>My payments</span>
            </a>
        </div>

        <div class="enquiry">
            <a href="<?= ROOT ?>/student/enquiry">
                <img src="<?= ROOT ?>/assets/images/sidebar_icons/enquiry.png" alt="enquiry"></br>
                <span>Enquiry</span>

            </a>
        </div>
        <div class="Progress">
            <a href="<?= ROOT ?>/student/progress">
                <img src="<?= ROOT ?>/assets/images/sidebar_icons/progress.svg" alt="progress"></br>
                <span>Progress</span>
            </a>
        </div>



    </div>
    <div class="bottom">
        <a href="#">
            <img src="<?= ROOT ?>/assets/images/sidebar_icons/Group.png" alt="logout">
            <a href="<?= ROOT ?>/logout"> Logout </a>

    </div>


</div>
</body>

</html>