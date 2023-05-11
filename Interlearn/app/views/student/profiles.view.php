<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?=$title?></title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user-account.css?v=<?php echo time(); ?>">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

</head>

<body style="background-color: #FFFFFF;">


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

                    <input id="mobile-no" class="user-detail" placeholder="0<?= $userData[0]->mobile_number ?? '' ?>" readonly maxlength="10">
                    
                </div>
              


            </div>
            <div id="emp-detail" class="sub-div2">
            <div class="profile-data">
                    <label class="user-data-label" for="display-picture">ADDRESS</label>

                    <input id="address" class="user-detail" placeholder="<?= $userData[0]->address ?? '' ?>" readonly>
               
                </div>
                <div class="profile-data">
                    <label class="user-data-label" for="display-picture">Classes Enrolled</label>
                    <?php foreach ($userData as $users):?>
                    <input id="emp-no" class="user-detail" placeholder="<?= $users->subject?? '' ?> - Grade<?= $users->grade?? '' ?>(<?= $users->fullname?? '' ?>)" readonly>
                    <?php endforeach;?>
                </div>
                <div class="profile-data">
                    <label class="user-data-label" for="display-picture">PARENT NAME</label>
                    <input id="parent_name" class="user-detail" placeholder="<?= $userData[0]->parent_name ?? '' ?>" readonly>
            
                </div>

             

                <div class="profile-data">
                    <label class="user-data-label" for="display-picture">PARENT EMAIL</label>

                    <input id="parent_email" class="user-detail" placeholder="<?= $userData[0]->parent_email  ?? '' ?>" readonly>
      
                </div>

                <div class="profile-data">
                    <label class="user-data-label" for="display-picture">PARENT MOBILE</label>
                    <p class="leftmargin" id="errorSpace14"> </p>
                    <input id="parent_mobile" class="user-detail" placeholder="<?= $userData[0]->parent_mobile   ?? '' ?>" readonly>
            

                </div>

         

            </div>
          
        </div>

    </form>

</div>

<?php $this->view("includes/footer");?>



</body>


</html>