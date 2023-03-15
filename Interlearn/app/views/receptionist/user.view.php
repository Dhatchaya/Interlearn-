<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Payments</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user-account.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

</head>

<body style="background-color: #FFFFFF;">


    <?php $this->view("includes/nav"); ?>


    <?php $this->view("includes/sidebar_rece"); ?>
    <form action="#" method="post">

    

        <div class="profile-container">
            <div id="bio-data" class="sub-div">

                <div class="profile-data">

                    <label class="user-data-label" for="display-picture">PROFILE PICTURE</label>
                    <div class="circle-container">
                        
                        <img id="dp" class="display-picture" src="<?= ROOT ?>/assets/images/expert-teacher.png"alt="display picture">
                        
                    </div>

                    <div class="change-pic">
                        <input name="empImage " class="user-detail empImage" type="file" id="empImage" accept=".jpg">
                        <button id="change-dp" class="dp-edit edit-btn" type="button">🙎 Change Profile Picture</button>
                    </div>
                </div>

                <div class="profile-data">
                    <label class="user-data-label" for="f-name" place>FIRST NAME</label>
                    <input id="fname" class="user-detail" placeholder="<?= $userData[0]->first_name ?>" readonly="readonly">
                    <button id="change-fname" class="edit-btn" type="button">✒️ EDIT</button>
                </div>
                <div class="profile-data">
                    <label class="user-data-label" for="l-name">SECOND NAME</label>
                    <input id="lname" class="user-detail" value="<?= $userData[0]->last_name ?? '' ?>" readonly>
                    <button id="change-lname" class="edit-btn" type="button">✒️ EDIT</button>
                </div>

                <div class="profile-data">
                    <label class="user-data-label" for="email">EMAIL ADRESS</label>

                    <input id="email" class="user-detail" placeholder="gaganasamarasekara@gmail.com" readonly>
                    <button id="change-email" class="edit-btn" type="button">✒️ EDIT</button>
                </div>


            </div>
            <div id="emp-detail" class="sub-div2">

                <div class="profile-data">
                    <label class="user-data-label" for="phone-no">PHONE NO</label>

                    <input id="mobile-no" class="user-detail" placeholder="<?= $userData[0]->mobile_no ?? '' ?>" readonly maxlength="10">
                    <button id="change-monile-no" class="edit-btn" type="button">✒️ EDIT</button>
                </div>
                <div class="profile-data">
                    <label class="user-data-label" for="display-picture">ADDRESS</label>

                    <input id="address" class="user-detail" placeholder="<?= $userData[0]->Addressline1 ?? '' ?>" readonly>
                    <button id="change-address" class="edit-btn" type="button">✒️ EDIT</button>
                </div>
                <div class="profile-data">
                    <label class="user-data-label" for="display-picture">POSITION</label>

                    <input id="role" class="user-detail" placeholder="Manager" readonly>
                </div>

                <div class="profile-data">
                    <label class="user-data-label" for="display-picture">EMPLOYEE NO</label>

                    <input id="emp-no" class="user-detail" placeholder="7650272" readonly>
                </div>

                <div class="profile-data">
                    <label class="user-data-label" for="display-picture">JOINED DATE</label>

                    <input id="joined-date" class="user-detail" placeholder="2023/02/02" readonly>
                </div>

                <div class="profile-data">
                    <label class="user-data-label" for="display-picture">EMPLOYEMENT STATUS</label>

                    <input id="emp-status" class="user-detail" placeholder="Full-time" readonly>
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


        var div1 = document.querySelector(".student-payment");
        var div2 = document.querySelector(".footer-support");
        div2.style.height = div1.offsetHeight + "px";
    </script>




    <script defer src="<?= ROOT ?>/assets/js/edit-button.js?v=<?php echo time(); ?>"></script>


</body>


</html>