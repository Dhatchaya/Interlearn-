<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<div class="recp_det_container">
<?php $this->view("includes/sidebar");?>
    <div class="recp_det_content">
        <h4>Name of Course:</h4>
        <input type="text" class="recp_det_name"><br><br>
        <h4>Course ID:</h4>
        <input type="text" class="recp_det_name"><br><br>
        <h4>Teacher Name:</h4>
        <input type="text" class="recp_det_name"><br><br>
        <h4>Date: </h4>
        <div class="teacher_crs_dropdown">
            <button class="dropbtn">Sunday</button>
            <div class="teacher_crs_dropdown-content">
                <a href="#">Monday</a>
                <a href="#">Tuesday</a>
                <a href="#">Wednesday</a>
                <a href="#">Thursday</a>
                <a href="#">Friday</a>
                <a href="#">Saturday</a>
            </div>
        </div><br><br>
        <h4>Time:</h4>
        <div class="recp_det_dura">
            <input type="time" name="" id="" class="recp_det_time"> 
            <p> to </p>
            <input type="time" name="" id="" class="recp_det_time">
        </div>
        <br><br>
        <button type="submit" class="recp_det_btn">Save</button>
    </div>
</div>

<?php $this->view("includes/footer");?>
            