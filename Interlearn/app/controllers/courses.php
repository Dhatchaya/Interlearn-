<?php
/**
 *home class
 */
class Courses extends Controller
{
    public function index($action = null, $id = null)
    {   
        $subject = new Subject();
        $course = new Course();
        $staff = new Staff();
        $course_instructor = new CourseInstructor();
        $students = new Students();
        $data = [];
        $data['sums']= $subject -> distinctSubject([],'grade');
        // show($data['sums']);die;
        
        if($action == 'view')
        {
            $data = [];
                $data['action'] = $action;
                $data['id'] = $id;
                $subject = new Subject();
                //show($data['id']);die;

                //if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                    if(isset($_GET['id'])){
                        $subject_id = $_GET['id'];
                        $data['subject_id'] = $subject_id;
                        // $allSubjects = $subject -> where(['subject_id'=>$subject_id],'subject_id');
                        $subjectGrade = $subject -> getSubjectGrade($subject_id);
                        // show($subjectGrade->subject_id);die;
                        $subjectName = $subjectGrade[0]->subject;
                        $grade = $subjectGrade[0]->grade;
                        //  echo $subjectName;
                        //  echo $grade;die;
                        $data['mediums'] = $subject -> getMedium($subjectName,$grade);
                          //show($data['mediums']);die;

                        //show($data['subjectgrd']);die;
                                // show($allSubjects);die;

                                $medium = "Sinhala";
                    
                                //  $data['subjects']=$subject->selectTeachers(['subject'=>$allSubjects[0]->subject, 'grade'=>$allSubjects[0]->grade],$medium,$subject_id);
                                $data['subjects'] = [];
                                $a = [];
                                for($i=0; $i<count($data['mediums']);$i++){
                                    $subjectDetails = $subject -> selectTeachers(['subject_id'=>$data['mediums'][$i]->subject_id],$data['mediums'][$i]->language_medium);
                                    // $data['subjects'] = $subject -> selectTeachers(['subject_id'=>$data['mediums'][$i]->subject_id],$data['mediums'][$i]->language_medium);
                                    array_push($a,$subjectDetails);
                                    // show($allTeachers);
            
                                }
                                $data['subjects'] = $a;
                                // show($data['subjects']);die;
                                // $data['subjects'] = $subjectDetails=$subject -> selectTeachers(['subject_id'=>$data['mediums']->subject_id],$data['mediums']->language_medium);
                                
                                $data['sinhalaid'] = $subject->getSubjectId($subjectName,$grade,"Sinhala");
                                $data['englishid'] = $subject->getSubjectId($subjectName,$grade,"English");
                                $data['tamilid'] = $subject->getSubjectId($subjectName,$grade,"Tamil");
                                // show($data['subjects']);die;

                                // show($_GET['id']);die;
                                $data['distinctTeachers'] = $course->getDistinctTeachers($_GET['id']);
                                // show($data['distinctTeachers']);die;
            
                                $data['teach_instructors'] = [];
                                $extra = [];
                                if($data['subjects']){
                                    for($i=0; $i<count($data['subjects']); $i++){
                                        for($x=0; $x<count($data['subjects'][$i]); $x++){
                                            // show($data['subjects'][$i][$x]->course_id);die;
                                            if(!empty($data['subjects'][$i][$x]->course_id)){
                                                // show($data['subjects'][$i][$x]->course_id);die;
                                                $extra= $course_instructor -> getInstructors($data['subjects'][$i][$x]->course_id);
                                                if(!empty($extra)){
                                                    // show($extra);die;
                                                    $data['teach_instructors'][$data['subjects'][$i][$x]->course_id] = $extra;
                                                }
                                            }
                                        }
                                    }
                                // show($data['teach_instructors']);die;
                                // show($data['subjects']);die;
                                }
                    // show($data['teach_instructors']);
                    // //
                    // die;
                    // }
                }


                if(isset($_POST['enroll-me'])){
                    $enroll_req = new RequestEnroll();
                    $student_course = new StudentCourse();
                    $_POST['emp_id'] = 4;
                    $teacher_id = $_POST['teacher'];
                    // show($_POST);die;
                    // show($teacher_id);die;
                    // show($subject_id);die;
                    $timeslot = explode('-',$_POST['day']);
                    $day = $timeslot[0];
                    $timefrom = $timeslot[1];
                    $timeto = $timeslot[2];
                    // show($day);
                    // show($timefrom);
                    // show($timeto);die;
                    if(!Auth::logged_in())
		            {
		            	message('please login');
		            	redirect('login/student');
                        exit;
		            }else{
                        $user = Auth::getUID();
                        $student_id = $students -> getStudentID($user);
                        // show($student_id);die;
                        $_POST['student_id'] = $student_id[0]->studentID;
                        // show($user);die;
                        $course = $course -> getCourseID($subject_id, $teacher_id, $day, $timefrom, $timeto);
                        // show($course[0]->course_id);die;
                        $course_id = $course[0]->course_id;
                        $_POST['course_id'] = $course_id;
                        // show($_POST);die;
                        // show($course_id);die;
                        $data['courses'] = $student_course -> getCourses($student_id[0]->studentID);
                        $courses = $data['courses'];
                        // show($data['courses']);die;

                        $data['requestedCourses'] = $enroll_req -> getRequestedCourses($_POST['student_id']);
                        // show($data['requestedCourses']);die;
                        $reqCourses = $data['requestedCourses'];

                        $flag = 0;
                        foreach($courses as $enroll_course => $val) {
                            // show($val);
                            foreach($val as $req_course => $value) {
                                // show($value);
                                if($value == $_POST['course_id']){
                                    $flag = 1;
                                    break;
                                }
                            }
                        }

                        foreach($reqCourses as $val) {
                            // show($requested_course);
                            foreach($val as $req_course => $value) {
                                // show($value);
                                if($value == $_POST['course_id']){
                                    $flag = 2;
                                    break;
                                }
                            }
                        }

                        if($flag == 0){
                            $result = $enroll_req -> insert($_POST);
                        }
                        elseif($flag == 2){
                            $data['enroll_error'] = "You have already requested for this class!\nWait for the response of the request!";
                        }
                        else{
                            // echo "hi";
                            $data['enroll_error'] = "You are already enrolled in this class!";
                            // echo $enroll_error;
                        }
                        //   die;

                        // show($result);die;
                    }
                    // if(!Auth::is_student()){
                    //     redirect('home');

                    //     $user = Auth::getUID();
                    //     show($user);die;
                    //     $course_id = $course -> getCourseID($subject_id, $teacher_id, $day, $timefrom, $timeto);
                    //     $result = $enroll_req -> insert($_POST['emp_id'],$user,$course_id);
                    //     show($result);die;

                    // }
                }

                $data['teachers'] = $staff->select([],'emp_id','asc');
                $data['instructors'] = $staff->select([],'emp_id','asc');

            $this->view('details',$data);
            exit;

        }

        if($action == 'select'){
            $subject_id = $_POST['subjectId'];
            $teacher_id = $_POST['teacherId'];
            $result = $course -> getDays($subject_id, $teacher_id);

            echo json_encode($result); die;
        }

        $data['rows']= $course->select([],'course_id');
        $data['sums']= $subject -> distinctSubject([],'subject');
        //show($data['sums']);die;
        $this->view('courses',$data);
    }


    // public function edit()
    // {
    //     echo "edit page";
    //     $this->view('edit',$data);
    // }

    // public function delete($id1)
    // {
    //     echo "delete page".$id1;
    // }

    // public function courses()
    // {
    //     // echo "edit page";
    //     $this->view('courses');
    // }
}