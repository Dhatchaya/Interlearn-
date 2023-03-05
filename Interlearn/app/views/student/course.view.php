<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<div class="std_crs_container">
    <?php $this->view("includes/sidebar");?>
        <!-- <h1 class="greeting">Good Morning Monica!</h1><br> -->
    <div class="std_crs_content">
        <!-- <div class="std_crs_heading"> -->
            <!-- <div class="std_crs_dropdown">
                <button onclick="myFunction()" class="std_crs_dropbtn">All</button>
                <div id="myDropdown" class="std_crs_dropdown-content">
                  <a href="#">Science</a>
                  <a href="#">Maths</a>
                  <a href="#">History</a>
                  <a href="#">Sinhala</a>
                  <a href="#">English</a>
                </div>
            </div> -->
            <!-- <div class="std_crs_search">
                <img src="<?=ROOT?>/assets/images/search.png" alt="" class="std_crs_searchIcon">
                <input type="text" placeholder="Search for classes" class="std_crs_searchbox">
            </div> -->
        <!-- </div>
        <br><br> -->
        <!-- <div class="std_crs_rectangle"> -->
        <?php if(!empty($sums)):?>
            <?php foreach($sums as $sum):?>

        <div class="recp_crs_rectangle">

            <a href="<?=ROOT?>/student/course/view/<?=$sum->course_id?>">
                <img src="<?=ROOT?>/assets/images/bookn.jpg" alt="" class="recp_crs_img">
                <br><br>
                <p>Grade <?=esc($sum->grade)?> - <?=esc($sum->subject)?></p>
                <p>(<?=esc($sum->language_medium)?>)</p>
                <p><?=esc($sum->fullname)?></p>
                <!-- <div class="recp_crs_butn2">
                    <a href="<?=ROOT?>/course/view/1/?id=<?=esc($sum->subject_id)?>">
                        <button class="recp_crs_btn2">More info</button>
                    </a>
                </div> -->
            </a>

        </div>
        <?php endforeach;?>
        <?php endif;?>
        <!-- </div> -->
        <!-- <div class="std_crs_rectangle">
            <a href="#">
                <img src="<?=ROOT?>/assets/images/bookn.jpg" alt="" class="std_crs_img">
                <p>Science by Mrs. V.J Ridmi</p>
            </a>
        </div>
        <div class="std_crs_rectangle">
            <a href="#">
                <img src="<?=ROOT?>/assets/images/bookn.jpg" alt="" class="std_crs_img">
                <p>Maths by Mrs. S.N. Perera</p>
            </a>
        </div>
        <div class="std_crs_rectangle">
            <a href="#">
                <img src="<?=ROOT?>/assets/images/bookn.jpg" alt="" class="std_crs_img">
                <p>Sinhala by Mrs. S.N. Perera</p>
            </a>
        </div>
        <div class="std_crs_rectangle">
            <a href="#">
                <img src="<?=ROOT?>/assets/images/bookn.jpg" alt="" class="std_crs_img">
                <p>History by Mrs. S.N. Perera</p>
            </a>
        </div>
        <div class="std_crs_rectangle">
            <a href="#">
                <img src="<?=ROOT?>/assets/images/bookn.jpg" alt="" class="std_crs_img">
                <p>English by Mrs. S.N. Perera</p>
            </a>
        </div> -->
    </div>
        
</div>
    <div  id="overlay"></div>
    <script defer src="/assets/js/dropdown.js"></script>
    <?php $this->view("includes/footer");?>