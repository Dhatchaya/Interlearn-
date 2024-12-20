<?php $this->view("includes/header"); ?>
<link rel="shortcut icon" href="<?=ROOT?>/assets/images/favicon/fv.png" type="image/x-icon">
<div class="main-body-div">
<?php if (Auth::logged_in()): ?>
        <?php if(Auth::getrole() == "Student"):?>
        <?php $this->view("includes/sidebar"); ?>
    <?php endif; ?>
    <?php endif; ?>
    <div class="top-to-bottom-content">
    <?php if (Auth::logged_in()): ?>
        <?php if(Auth::getrole() == "Student"):?>
        <?php $this->view("includes/nav"); ?>
        <?php else:?>
        <header class="staff_login_nav">
            <div class="staff_login_nav-left">
                <img src="<?=ROOT?>/assets/images/logo_bg_rm.png" alt="logo">
            </div>
            <div class="header_right">
                <div class="login-nav" id="login-nav">
                    <ul>
                    <li class="nav-li"> <a href="<?=ROOT?>/home">Home</a></li>
                    </ul>
                </div>
                <div class="dropdown">
                    <div class="loginas">
                        <button class="dropbtn">Login as</button>
                        <i class="material-icons">arrow_drop_down</i>
                    </div>
                    <div class="login-content">

                    <li class="nav-li">  <a href="<?= ROOT ?>/login/student">Student</a></li>
                    <li class="nav-li">  <a href="<?= ROOT ?>/login/staff">Staff</a></li>

                    </div>
                </div>
            </div>
        </header>
    <?php endif; ?>

       <?php else:?>
        <header class="staff_login_nav">
            <div class="staff_login_nav-left">
                <img src="<?=ROOT?>/assets/images/logo_bg_rm.png" alt="logo">
            </div>
            <div class="header_right">
                <div class="login-nav" id="login-nav">
                    <ul>
                    <li class="nav-li"> <a href="<?=ROOT?>/home">Home</a></li>
                    </ul>
                </div>
                <div class="dropdown">
                    <div class="loginas">
                        <button class="dropbtn">Login as</button>
                        <i class="material-icons">arrow_drop_down</i>
                    </div>
                    <div class="login-content">
                        
                    <li class="nav-li">  <a href="<?= ROOT ?>/login/student">Student</a></li>
                    <li class="nav-li">  <a href="<?= ROOT ?>/login/staff">Staff</a></li>

                    </div>
                </div>
            </div>
        </header>
    <?php endif; ?>


        <div class="all-middle-content">





            <div class="guest_crs_container">
                <?php if (Auth::logged_in() == "Student") : ?>
                    <div class="guest_crs_content-logged">
                    <?php else : ?>
                        <div class="guest_crs_content">
                        <?php endif; ?>
                        <div class="class-search-box">
                            <input type="text" name="class-search" id="class-search" onkeyup="search_classes()" placeholder="Search for subject name..">
                        </div>

                        <?php if (!empty($sums)) : ?>
                            <?php foreach ($sums as $sum) : ?>
                                <div class="empty-class-message" id="empty-class-message"></div>
                                <div class="guest_crs_rectangle">

                                    <div class="guest-view-image">
                                        <?php if ($sum->grade == 6) : ?>
                                            <img src="<?= ROOT ?>/assets/images/grades/6.png" alt="" class="guest_crs_img">
                                        <?php elseif ($sum->grade == 7) : ?>
                                            <img src="<?= ROOT ?>/assets/images/grades/7.png" alt="" class="guest_crs_img">
                                        <?php elseif ($sum->grade == 8) : ?>
                                            <img src="<?= ROOT ?>/assets/images/grades/8.png" alt="" class="guest_crs_img">
                                        <?php elseif ($sum->grade == 9) : ?>
                                            <img src="<?= ROOT ?>/assets/images/grades/9.png" alt="" class="guest_crs_img">
                                        <?php elseif ($sum->grade == 10) : ?>
                                            <img src="<?= ROOT ?>/assets/images/grades/10new.png" alt="" class="guest_crs_img">
                                        <?php elseif ($sum->grade == 11) : ?>
                                            <img src="<?= ROOT ?>/assets/images/grades/11.png" alt="" class="guest_crs_img">
                                        <?php elseif ($sum->grade == 12) : ?>
                                            <img src="<?= ROOT ?>/assets/images/grades/12.png" alt="" class="guest_crs_img">
                                        <?php else : ?>
                                            <img src="<?= ROOT ?>/assets/images/grades/13.png" alt="" class="guest_crs_img">
                                        <?php endif; ?>
                                    </div>

                                    <!-- <p>Grade 11 Mathematics</p> -->
                                    <div class="guest-subject-name">
                                        <!-- Grade <?= esc($sum->grade) ?> -->
                                        <?= esc($sum->subject) ?>
                                    </div>
                                    <div class="guest-grade-text">
                                        We have the best qualified teachers for <?= esc($sum->subject) ?> for grade <?= esc($sum->grade) ?> in <?= esc($sum->count) ?> mediums!
                                    </div>
                                    <div class="link-guest">
                                        <a href="<?= ROOT ?>/courses/index/view/1/?id=<?= esc($sum->subject_id) ?>" class="link-guest">
                                            <button class="guest-view-btn">More</button>

                                        </a>
                                    </div>



                                    <!-- </a> -->

                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>

                        </div>
                    </div>
            </div>
        </div>
    </div>
    <script defer src="<?= ROOT ?>/assets/js/courseSearch.js?v=<?php echo time(); ?>"></script>

    <?php $this->view("includes/footer"); ?>