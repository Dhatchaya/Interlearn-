<?php $this->view("includes/header"); ?>
<?php $this->view("includes/nav");
$url = $_GET['url'];
$url = rtrim($url, '/');
$val = explode('/', $url);
$sub_id = $_GET['id'];
// echo $sub_id;die;

?>


<div class="recp_cl_container" onload="setTab()">
    <?php $this->view("includes/sidebar_recep"); ?>
    <div class="recp_cl_content">
        <button name="add-teacher" type="submit" class="recp_det_btn" id="button28" onclick="openModal()">+Add Teacher</button>
        <?php if (!empty($subjects)) : ?>

            <h2>Grade <?= esc($subjects[0][0]->grade) ?> - <?= esc($subjects[0][0]->subject) ?></h2>
            <br><br>
            <h3>About this course</h3>
            <p><?= esc($subjects[0][0]->description) ?></p>

        <?php endif; ?>
        <br>
        <h4>Choose the language medium</h4><br>
        <nav class="recp_cl_navbar">
            <ul class="recp_cl_medium">


                <?php if (!empty($mediums)) : ?>
                    <?php foreach ($mediums as $medium) : ?>

                        <?php if ($medium->language_medium == 'Sinhala') : ?>
                            <li><a href="<?= ROOT ?>/receptionist/course/view/1/?id=<?= $medium->subject_id ?>" id="Sinhala" class="recp_cl_nav"><?= $medium->language_medium ?></a></li>
                        <?php elseif ($medium->language_medium == 'English') : ?>
                            <li><a href="<?= ROOT ?>/receptionist/course/view/1/?id=<?= $medium->subject_id ?>" id="English" class="recp_cl_nav"><?= $medium->language_medium ?></a></li>
                        <?php else : ?>
                            <li><a href="<?= ROOT ?>/receptionist/course/view/1/?id=<?= $medium->subject_id ?>" id="Tamil" class="recp_cl_nav"><?= $medium->language_medium ?></a></li>
                        <?php endif; ?>

                    <?php endforeach; ?>
                <?php endif; ?>

            </ul>


            <!-- selecting the selected medium -->
            <?php $currentMedium = []; ?>
            <?php
            foreach ($mediums as $medium) {
                if ($medium->subject_id == $sub_id) {
                    $currentMedium = $medium->language_medium;
                }
            }
            ?>

            <!-- adding the class active to the selected id -->
            <script>
                const medium = '<?php echo $currentMedium; ?>';
                // console
                console.log(medium);
                var element = document.getElementById(medium);
                element.classList.add("active");
            </script>




        </nav>

        <!-- content table -->
        <div class="recp_cl_staff">
            <table class="teacher-class-table">


                <th>Day</th>
                <th>Time</th>
                <th>Teacher </th>
                <th>Instructor </th>
                <th>Action</th>
                <?php if (!empty($subjects)) :
                    $med_ID = 0;
                    $subject_id = 0;
                    if (isset($_GET['id'])) {
                        $subject_id = $_GET['id'];
                    }
                    // show($subject_id);die;
                    for ($x = 0; $x <= count($subjects); $x++) {
                        // show($subjects[$x][0]);
                        if ($subject_id == $subjects[$x][0]->subject_id) {
                            $med_ID = $x;
                            break;
                        }
                    }
                    // show($subjects[$med_ID]);die;
                ?>
                    <?php foreach ($subjects[$med_ID] as $teacher) :
                    ?>
                        <tr>

                            <td><?= esc($teacher->day) ?></td>
                            <td><?= esc($teacher->timefrom) ?> - <?= esc($teacher->timeto) ?></td>
                            <td><?= esc($teacher->teacherName) ?>

                                <?php if (empty($teacher->teacherName)) : ?>
                                    <?php echo "No teachers assigned!"; ?>
                                <?php endif ?>
                            </td>
                            <td>

                                <?php if (!empty($teach_instructors[$teacher->course_id])) : ?>
                                    <?php foreach ($teach_instructors[$teacher->course_id] as $teach_instructor) : ?>
                                        <?= esc($teach_instructor->instructorName) ?>
                                        <input type="hidden" value="<?= esc($teacher->day) ?>">

                                        <br />
                                    <?php endforeach; ?>
                                    <img src="<?= ROOT ?>/assets/images/plus.png" alt="" id="button29" class="teacher_crs_img2" onclick="getInstructorAvail(<?= esc($teacher->course_id) ?>)">
                                <?php else : ?>
                                    <?php echo "No instructors assigned!"; ?>
                                    <img src="<?= ROOT ?>/assets/images/plus.png" alt="" id="button29" class="teacher_crs_img2" onclick="getInstructorAvail(<?= esc($teacher->course_id) ?>)">
                                <?php endif ?>
                            </td>
                            <td>
                                <?php if (!empty($mediums)) : ?>
                                    <img src="<?= ROOT ?>/assets/images/delete.png" class="teacher_crs_img2" id="button35" onclick="openModal4(<?= esc($teacher->course_id) ?>)">
                                    <a href="<?=ROOT?>/receptionist/course/view/<?= esc($teacher->course_id) ?>/student_view">
                                    <img src="<?= ROOT ?>/assets/images/graduated.png" alt="" class="teacher_crs_img2">
                                    </a>
                                    <img src="<?= ROOT ?>/assets/images/edit.png" class="teacher_crs_img2" id="button30" onclick="openModal3(<?= esc($teacher->course_id) ?>)">

                                <?php endif; ?>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                <?php endif; ?>
            </table>
        </div>
        <br><br>


        <!-- edit teachers class -->
        <div id="profileModal3" class="popupModal">
            <div class="popupmodal-content">
                <span class="ann_close" onclick="closeModal3 ()">&times;</span><br>
                <h3>Edit Class</h3><br>
                <p id="addCourseerror" class="warning"></p>
                <form action="" method="post" class="up-profile">
                    <input type="hidden" name="course_id" id="course_id" value="">
                    <div class="class-edit-box">
                        <h4>Teacher ID: </h4>
                        <!-- <?php show($teacher); ?> -->
                        <input type="hidden" name="teacher_id" id="teacher_id" value="">
                        <input type="text" name="teacher_id" id="teacher_id_edit" value="" class="edit-class-disable" disabled>
                    </div><br>
                    <div class="class-edit-box">
                        <h4>Instructor ID: </h4>

                        <p style="font-size: small;" id="noInstructors"></p>
                        <!-- <input type="text" value="" id="instructorName" class="edit-class-disable" disabled>

                        <input type="hidden" value="<?= $teach_instructor->emp_id ?>" id="instructorID" name="instructorID">
                        <input type="hidden" value="<?= $teach_instructor->course_id ?>" id="courseID" name="courseID">
                        <button type="submit" id="submit-remove-instructor" class="remove_instructor" onsubmit="removeInstructor(<?= $teach_instructor->emp_id ?>, <?= $teach_instructor->course_id ?>)">
                            <span class="instructor-remove">&times;</span>
                        </button> <br>
                    </div><br> -->

                    <?php if(!empty($teach_instructors)):?>
                            <?php foreach ($teach_instructors as $teach_inst):?>
                        <?php foreach ($teach_inst as $teach_in):?>

                            <div>

                            <input type="text" value="<?= $teach_in->instructorName ?>" id="instructorName" class="edit-class-disable" disabled>

                            <input type="hidden" value="<?= $teach_in->emp_id ?>" id="instructorID" name="instructorID">
                            <input type="hidden" value="<?= $teach_in->course_id ?>" id="courseID" name="courseID">
                            <button type="button" id="submit-remove-instructor" class="remove_instructor" onclick="removeInstructor(this,'<?= $teach_in->emp_id ?>','<?= $teach_in->course_id ?>')">
                                <span class="instructor-remove">&times;</span>
                            </button>
                            </div>
                                <?php endforeach;?>
                            <?php endforeach;?>
                        <?php endif;?>
                            <br>
                    </div>
                    <br><br>
                    <div class="class-edit-box">
                        <h4>Day: </h4>
                        <select name="day" id="daysEdit" class="recp_ann_clz">
                            <option value="" selected></option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                            <option value="Sunday">Sunday</option>
                        </select>
                    </div><br>
                    <div class="class-edit-box">
                        <h4>Time:</h4>
                        <div class="recp_det_dura">
                            <input type="time" name="timefrom" value="" id="timefromEdit" class="recp_det_time">
                            <p> to </p>
                            <input type="time" name="timeto" value="" id="timetoEdit" class="recp_det_time">
                        </div>
                    </div>
                    <!-- <br><br> -->
                    <button name="edit-teacher" type="submit" id="edit_class_submit" class="recp_det_btn">Save</button>
                    <br><br>
                </form>
            </div>
        </div>


        <!-- delete course -->
        <div id="profileModal4" class="popupModal">
            <div class="tchr-popupmodal-content2">
                <span class="ann_close" onclick="closeModal4()">&times;</span><br>
                <h4>Delete Course</h4><br>
                <form action="" method="post" class="up-profile">
                    <div class="teacher-crs-activities2">
                        <label for="delete-sec" class="teacher-edit">Are you sure you want to delete this course? </label>
                        <!-- <input type="text" class="teacher-edit-title" name="title"> -->
                        <input type="hidden" value="" name="delete-course" id="delete-course">
                        <br><br>
                        <!-- <a href="<?= ROOT ?>/receptionist/course/view/1/?id=<?= esc($teacher->subject_id) ?>"> -->
                        <button type="submit" class="teacher_upl_btn" name="submit-delete-course" id="delete-course-btn">Yes</button>
                        <!-- </a> -->
                        <button type="reset" class="teacher_upl_btn" id="cancel-btn" onclick="closeModal4()">Cancel</button>
                    </div>
                </form>
            </div>
        </div>





        <!-- add teachers popup -->
        <div id="profileModal" class="popupModal">
            <div class="popupmodal-content">
                <span class="ann_close" onclick="closeModal()">&times;</span><br>
                <h3>Add Teachers</h3><br>
                <p id="addCourseerror1" class="warning"></p>
                <form action="" method="post" class="up-profile">
                    <div class="recp_det_box">
                        <h4>Teacher ID: </h4>
                        <select name="teacher_id" id="teacher_id" class="recp_ann_clz">
                            <option value="" selected>--Select teacher id--</option>
                            <?php if (!empty($teachers)) : ?>
                                <?php foreach ($teachers as $teacher) : ?>
                                    <option value="<?= $teacher->emp_id ?>"><?= esc($teacher->emp_id) ?>:<?= esc($teacher->teacherName) ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <!-- <?php if (!empty($errors)) : ?>
                            <p class="warning"><?= $errors['teacher_id']; ?></p>
                        <?php endif; ?> -->
                    </div>
                    <br><br>
                    <div class="recp_det_box">
                        <h4>Day: </h4>
                        <select name="day" id="dayAdd" class="recp_ann_clz">
                            <option value="slct" selected>--select day--</option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                            <option value="Sunday">Sunday</option>
                        </select>
                        <!-- <?php if (!empty($errors)) : ?>
                            <p class="warning"><?= $errors['day']; ?></p>
                        <?php endif; ?> -->
                    </div><br><br>
                    <div class="recp_det_box">
                        <h4>Time:</h4>
                        <div class="recp_det_dura">
                            <input type="time" name="timefrom" value="00:00" id="timefrom" class="recp_det_time">
                            <!-- <?php if (!empty($errors)) : ?>
                                <p class="warning"><?= $errors['timefrom']; ?></p>
                            <?php endif; ?> -->
                            <p> to </p>
                            <input type="time" name="timeto" value="00:00" id="timeto" class="recp_det_time">
                            <!-- <?php if (!empty($errors)) : ?>
                                <p class="warning"><?= $errors['timeto']; ?></p>
                            <?php endif; ?> -->
                        </div>
                    </div><br>
                    <div class="recp_det_box">
                        <h4>Capacity:</h4>
                        <input type="text" class="recp_ann_clz" name="capacity">
                        <?php if (!empty($errors)) : ?>
                            <p class="warning"><?= $errors['capacity']; ?></p>
                        <?php endif; ?>
                    </div><br>
                    <button name="add-teacher" type="submit" class="recp_det_btn">Save</button>
                    <br><br><br>
                </form>
            </div>
        </div>
        <br><br>


        <!-- add instructor popup         -->

        <div id="profileModal2" class="popupModal">
            <div class="popupmodal-content">
                <span class="ann_close" onclick="closeModal2()">&times;</span><br>
                <h3>Add Instructors</h3><br><br>
                <form action="" method="post" class="up-profile">
                    <h4>Instructor ID: </h4><br>
                    <div id="instructor_dd">
                        <input type="hidden" id="modal2_course_id" name="course_id">
                        <!-- <select name="emp_id" id="instructor_filter" class="recp_ann_clz">

                    <option value="slct" selected>--Select instructor id--</option>
                  <?php if (!empty($availinstructors)) : ?>
                    <?php foreach ($availinstructors as $instructor) : ?>
                        <option  value="<?= $instructor->emp_id ?>" ><?= esc($instructor->emp_id) ?>:<?= esc($instructor->instructorName) ?></option>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    </select> -->
                    </div>
                    <br><br>
                    <button name="add-instructor" type="submit" class="recp_det_btn">Save</button>
                    <br><br><br>
                </form>
            </div>
        </div>






    </div>
</div>
<script defer src="<?= ROOT ?>/assets/js/mediumBar.js?v=<?php echo time(); ?>"></script>
<script defer src="<?= ROOT ?>/assets/js/instructorTime.js?v=<?php echo time(); ?>"></script>
<script defer src="<?= ROOT ?>/assets/js/addcourse.js?v=<?php echo time(); ?>"></script>
<script defer src="<?= ROOT ?>/assets/js/courseTime.js?v=<?php echo time(); ?>"></script>
<script defer src="<?= ROOT ?>/assets/js/editCourse.js?v=<?php echo time(); ?>"></script>
<?php $this->view("includes/footer"); ?>