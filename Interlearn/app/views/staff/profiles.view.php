<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profiles</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user-account.css?v=<?php echo time(); ?>">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

</head>

<body style="background-color: #FFFFFF;">


<div class="main-body-div">
<?php if(Auth::getrole() == "Receptionist"):?>
        <?php $this->view("includes/sidebar_recep");?>
<?php else:?>
        <?php  if(Auth::getrole() == "Manager"):?>
            <?php $this->view("includes/sidebar_man"); ?>

              

<?php endif;?>
<?php endif;?>




<div class="top-to-bottom-content">

    <?php $this->view("includes/nav"); ?>



    <div class="all-middle-content">
    <form action="#" method="post"   encType='multipart/form-data'>



        <div class="profile-container">
            <div id="bio-data" class="sub-div">

                <div class="profile-data " style="height:15rem; display: flex;">


                    <div class="circle-container">
                        <label class="user-data-label" for="display-picture">PROFILE PICTURE</label>
                        <img id="dp" class="display-picture" src="<?= ROOT ?>/uploads/images/<?=esc($userData[0]->display_picture)?>" alt="No profile picture" />

                        <!-- <?= ROOT ?>/assets/images/expert-teacher.png -->
                    </div>

                    <div class="change-pic">

                        <input  style="width: 248px;" name="display_picture " class="user-details empImage file_attachment" type="file" id="empImage" accept="jpg,png,jpeg">
                   
                    </div>
                </div>
                <div class="profile-data">
                    <label class="user-data-label" for="email">EMAIL ADDRESS</label>

                    <input id="email" class="user-detail" placeholder="<?= $userData[0]->email ?? '' ?>" readonly>

                </div>
                <div class="profile-data">
                    <label class="user-data-label" for="f-name" place>FIRST NAME</label>
                    <input id="fname" class="user-detail" placeholder="<?= $userData[0]->first_name ?>" readonly="readonly">
      
                </div>
                <div class="profile-data">
                    <label class="user-data-label" for="l-name">SECOND NAME</label>
                    <input id="lname" class="user-detail" placeholder="<?= $userData[0]->last_name ?? '' ?>" readonly>
    
                </div>



                <div class="profile-data">

                    <label class="user-data-label" for="phone-no">PHONE NO</label><p class="leftmargin" id="errorSpace11"> </p>

                    <input id="mobile-no" class="user-detail" placeholder="0<?= $userData[0]->mobile_no ?? '' ?>" readonly maxlength="10">
                
                </div>
                <div class="profile-data">
                    <label class="user-data-label" for="display-picture">ADDRESS</label>

                    <input id="address" class="user-detail" placeholder="<?= $userData[0]->Addressline1 ?? '' ?>" readonly>
                    
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

        


            </div>
          
        </div>

    </form>

</div>
</div>
</div>

<?php $this->view("includes/footer");?>





</body>


</html>