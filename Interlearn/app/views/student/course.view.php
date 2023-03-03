<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<div class="std_crs_container">
    <?php $this->view("includes/sidebar");?>
        <!-- <h1 class="greeting">Good Morning Monica!</h1><br> -->
    <div class="std_crs_content">
        <div class="std_crs_heading">
            <div class="std_crs_dropdown">
                <button onclick="myFunction()" class="std_crs_dropbtn">Dropdown</button>
                <div id="myDropdown" class="std_crs_dropdown-content">
                  <a href="#">Science</a>
                  <a href="#">Maths</a>
                  <a href="#">History</a>
                  <a href="#">Sinhala</a>
                  <a href="#">English</a>
                </div>
            </div>
            <div class="std_crs_search">
                <img src="<?=ROOT?>/assets/images/search.png" alt="" class="std_crs_searchIcon">
                <input type="text" placeholder="Search for classes" class="std_crs_searchbox">
            </div>
        </div>
        <div class="std_crs_rectangle">
            <a href="<?=ROOT?>/student/coursepg/view">
                <img src="<?=ROOT?>/assets/images/book.png" alt="" class="std_crs_img">
                <p>Science by Mr. V.J Viraj</p>
            </a>
        </div>
        <div class="std_crs_rectangle">
            <a href="#">
                <img src="<?=ROOT?>/assets/images/book.png" alt="" class="std_crs_img">
                <p>Science by Mrs. V.J Ridmi</p>
            </a>
        </div>
        <div class="std_crs_rectangle">
            <a href="#">
                <img src="<?=ROOT?>/assets/images/book.png" alt="" class="std_crs_img">
                <p>Maths by Mrs. S.N. Perera</p>
            </a>
        </div>
        <div class="std_crs_rectangle">
            <a href="#">
                <img src="<?=ROOT?>/assets/images/book.png" alt="" class="std_crs_img">
                <p>Sinhala by Mrs. S.N. Perera</p>
            </a>
        </div>
        <div class="std_crs_rectangle">
            <a href="#">
                <img src="<?=ROOT?>/assets/images/book.png" alt="" class="std_crs_img">
                <p>History by Mrs. S.N. Perera</p>
            </a>
        </div>
        <div class="std_crs_rectangle">
            <a href="#">
                <img src="<?=ROOT?>/assets/images/book.png" alt="" class="img">
                <p>English by Mrs. S.N. Perera</p>
            </a>
        </div>
    </div>
        
</div>
    <div  id="overlay"></div>
    <script defer src="/assets/js/dropdown.js"></script>
    <?php $this->view("includes/footer");?>