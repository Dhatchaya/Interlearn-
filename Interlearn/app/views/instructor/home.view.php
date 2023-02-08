<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<div class="teacher_view_container">
<?php $this->view("includes/sidebar");?>
    <div class="teacher_view_content">
        <h1 class="teacher_view_greeting">Good Morning Monica!</h1><br>
            <div class="teacher_view_rectangle">
                <a href="#">
                    <img src="<?=ROOT?>/assets/images/2023.jpg" alt="" class="teacher_view_Img">
                    <p>2023 A/L</p>
                    <p>Combined Maths</p>
                    <p>Hall No 04</p>
                </a>
            </div>
            <div class="teacher_view_Rectangle">
                <a href="#">
                    <img src="<?=ROOT?>/assets/images/2024.jpg" alt="" class="teacher_view_Img">
                    <p>2024 A/L</p>
                    <p>Combined Maths</p>
                    <p>Hall No 04</p>
                </a>
            </div>
            <div class="teacher_view_Rectangle">
                <a href="#">
                    <img src="<?=ROOT?>/assets/images/2025.jpeg" alt="" class="teacher_view_Img">
                    <p>2025 A/L</p>
                    <p>Combined Maths</p>
                    <p>Hall No 05</p>
                </a>
            </div>
            <div class="teacher_view_Rectangle">
                <a href="#">
                    <img src="<?=ROOT?>/assets/images/2023.jpg" alt="" class="teacher_view_Img">
                    <p>2023 A/L</p>
                    <p>Combined Maths</p>
                    <p>Paper Class</p>
                    <p>Hall No 05</p>
                </a>
            </div>
            <div class="teacher_view_Rectangle">
                <a href="#">
                    <img src="<?=ROOT?>/assets/images/2023.jpg" alt="" class="teacher_view_Img">
                    <p>2023 A/L</p>
                    <p>Combined Maths</p>
                    <p>Revision Class</p>
                    <p>Hall No 05</p>
                </a>
            </div>
        </div>
    </div> 
</div> 
    <div  id="overlay"></div>
    <script defer src="./enquiry.js"></script>
    <?php $this->view("includes/footer");?>