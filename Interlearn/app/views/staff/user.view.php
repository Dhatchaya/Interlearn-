<?php
?>

<!DOCTYPE html>
<html lang="en">
<?php $this->view("includes/header");?>
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user-account.css?v=<?php echo time(); ?>">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="shortcut icon" href="<?=ROOT?>/assets/images/favicon/fv.png" type="image/x-icon">
</head>

<body style="background-color: #FFFFFF;">
<div class="main-body-div">
<?php if(Auth::getrole() == "Receptionist"):?>
        <?php $this->view("includes/sidebar_recep");?>
<?php else:?>
        <?php  if(Auth::getrole() == "Manager"):?>
            <?php $this->view("includes/sidebar_man"); ?>
<?php else:?>
        <?php  if(Auth::getrole() == "Teacher"):?>
            <?php $this->view("includes/sidebar_teach");?>
<?php else:?>
        <?php if(Auth::getrole() == "Instructor"):?>
            <?php $this->view("includes/sidebar_ins");?>
<?php endif;?>
<?php endif;?>
<?php endif;?>
<?php endif;?>




<div class="top-to-bottom-content">

    <?php $this->view("includes/nav"); ?>



    <div class="all-middle-content">
    <form action="#" method="post"   encType='multipart/form-data'>



        <div class="profile-container">
            <div id="bio-data" class="sub-div">

                <div class="profile-data " style="height:210px; display: flex;">


                    <div class="circle-container">
                        <label class="user-data-label" for="display-picture">PROFILE PICTURE</label>
                        <img id="dp" class="display-picture" src="<?= ROOT ?>/uploads/images/<?=esc($userData[0]->display_picture)?>" alt="No profile picture" />

                        <!-- <?= ROOT ?>/assets/images/expert-teacher.png -->
                    </div>

                    <div class="change-pic">

                        <input  style="width: 248px;" name="display_picture " class="user-details empImage file_attachment" type="file" id="empImage" accept="jpg,png,jpeg">
                        <button id="change-dp" class="dp-edit edit-btn" type="button">✒️ Change Profile Picture</button>
                    </div>
                </div>
                <div class="profile-data">
                    <label class="user-data-label" for="email">EMAIL ADDRESS</label>

                    <input id="email" class="user-detail" placeholder="<?= $userData[0]->email ?? '' ?>" readonly>

                </div>
                <div class="profile-data">
                    <label class="user-data-label" for="f-name" place>FIRST NAME</label>
                    <input id="fname" class="user-detail" placeholder="<?= $userData[0]->first_name ?>" readonly="readonly">
                    <button id="change-fname" class="edit-btn" type="button">✒️ EDIT</button>
                </div>
                <div class="profile-data">
                    <label class="user-data-label" for="l-name">SECOND NAME</label>
                    <input id="lname" class="user-detail" placeholder="<?= $userData[0]->last_name ?? '' ?>" readonly>
                    <button id="change-lname" class="edit-btn" type="button">✒️ EDIT</button>
                </div>



                <div class="profile-data">

                    <label class="user-data-label" for="phone-no">PHONE NO</label><p class="leftmargin" id="errorSpace11"> </p>

                    <input id="mobile-no" class="user-detail" placeholder="0<?= $userData[0]->mobile_no ?? '' ?>" readonly maxlength="10">
                    <button id="change-mobile-no" class="edit-btn" type="button">✒️ EDIT</button>
                </div>
                <div class="profile-data">
                    <label class="user-data-label" for="display-picture">ADDRESS</label>

                    <input id="address" class="user-detail" placeholder="<?= $userData[0]->Addressline1 ?? '' ?>" readonly>
                    <button id="change-address" class="edit-btn" type="button">✒️ EDIT</button>
                </div>


            </div>
            <div id="emp-detail" class="sub-div2">


                <div class="profile-data">
                    <label class="user-data-label" for="display-picture">POSITION</label>
                    <input id="role" class="user-detail" placeholder="<?= $userData[0]->role ?>" readonly>
                </div>

                <div class="profile-data">
                    <label class="user-data-label" for="display-picture">EMPLOYEE NO</label>

                    <input id="emp-no" class="user-detail" placeholder="<?= $userData[0]->emp_id ?? '' ?>" readonly>
                </div>

                <div class="profile-data">
                    <label class="user-data-label" for="display-picture">JOINED DATE</label>

                    <input id="joined-date" class="user-detail" placeholder="<?= $userData[0]->enrollment_date  ?? '' ?>" readonly>
                </div>

                <div class="profile-data">
                    <label class="user-data-label" for="display-picture">EMPLOYEMENT STATUS</label>

                    <input id="emp-status" class="user-detail" placeholder="<?= $userData[0]->emp_status   ?? '' ?>" readonly>
                </div>

                <div class="profile-data">

                    <label class="user-data-label" for="display-picture">CURRENT PASSWORD</label>
                    <p class="leftmargin" id="errorSpace10"> </p>
                    <input id="old-pw" class="user-detail" placeholder="">
                </div>

                <div class="profile-data">

                    <label class="user-data-label" for="display-picture">NEW PASSWORD</label>
                    <p class="leftmargin" id="errorSpace9"> </p>
                    <input id="new-pw" class="user-detail" placeholder="">
                </div>
                <div class="profile-data">

                    <label class="user-data-label" for="display-picture">CONFIRM PASSWORD</label>
                    <p class="leftmargin" id="errorSpace8"> </p>
                    <input id="confirm-pw" class="user-detail" placeholder="">
                </div>


            </div>
            <div style="height:50px">
                <button id="save-btn" class="form-btn" type="button">SAVE</button>
            </div>
            <div style="height:50px">
                <button id="cancel-btn" class="form-btn" type="button">CANCEL</button>
            </div>
        </div>

    </form>

</div>
</div>
</div>

    <div class="footer-support"></div>


    <?php $this->view("includes/manojge_footer_eka"); ?>

    <!-- <script src="salaryCal.js"></script> -->

    <script>
        // *******************************************************************************//



        const footer = document.querySelector(".footer")
        const sidebar = document.querySelector(".side-col")
        const container = document.querySelector(".sidebar-container")

        const footerApperOptions = {
            rootMargin: "0px 0px -100px 0px"
        };

        const observer = new IntersectionObserver(function(
                entries,
                observer
            ) {
                entries.forEach(entry => {
                    // console.log(entry.target)
                    if (entry.isIntersecting) {
                        sidebar.classList.add("sidebar-short");
                        container.classList.add("segment-out");
                    } else {
                        sidebar.classList.remove("sidebar-short");
                        container.classList.remove("segment-out");
                    }
                });
            },
            footerApperOptions);

        observer.observe(footer);


        //***********************footer support hright changer********************************//


        // var div1 = document.querySelector(".student-payment");
        // var div2 = document.querySelector(".footer-support");
        // div2.style.height = div1.offsetHeight + "px";
    </script>




    <script defer src="<?= ROOT ?>/assets/js/ProfileEdit.js?v=<?php echo time(); ?>"></script>
<!--    <script defer src="--><?php //= ROOT ?><!--/assets/js/changePW.js?v=--><?php //echo time(); ?><!--"></script>-->


</body>


</html>