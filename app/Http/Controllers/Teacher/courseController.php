<?php
namespace App\Http\Controllers\Teacher;
use App\course;
use App\student;
use App\test;
use App\list_time;
use DB,DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class courseController extends Controller
{
    public function getCourseIntensive(Request $request)
    {
    	$course = new Course();
        $id_user = Auth::user()->id;
        $list_time = new list_time();
        $studyTime = $list_time->getListStudyTime();
        $studyShift = $list_time->getListStudyShift();
        $courses = DB::table('register_course_teacher')
                        ->join('course_detail','course_detail.id','=','register_course_teacher.courseId')
                        ->join('teacher','teacher.teacher_id','=','register_course_teacher.teacherId')
                        ->where('category_id','=',$request->id)
                        ->where('teacher.id_user','=',$id_user)
                        ->get(); 
    	return view('teacher.more2level.course_intensive',[ 'courses'        => $courses, 
                                                            'category_id'   =>  $request->id,
                                                            'studyTime'     => $studyTime,
                                                            'studyShift'    => $studyShift
                                                        ]);
    }

    public function editCourseIntensive()
    {
    	return view('teacher.more2level.course_intensive');
    }

    public function addCourseIntensive(Request $request)
    {
        $now        = getdate();
        $date_now   = strtotime($now['year'].'-'.$now['mon'].'-'.$now['mday']);
        $startDate  = strtotime($request->startDate);
        $endDate    = strtotime($request->endDate);
        $date_valid = strtotime("$request->startDate +2 months");
        if($startDate < $date_now || $endDate < $date_valid)
        {
            return redirect()->back()->withInput()->with('loi', 'Ngày bắt đầu phải sau ngày kết thúc và ngày kết thúc phải lớn hơn ngày bắt đầu ít nhất 2 tháng');
        }
        else
        {
            $this->validate($request,
            [
                'name' => 'required|unique:course_detail'
            ],
            [
                'name.required' => 'Tên lớp không được để trống',
                'name.unique' => 'Lớp học đã tồn tại'
            
            ]);
            $course                 = new course;
            $course->name           = strtoupper($request->name);
            $course->startDate      = $request->startDate;
            $course->endDate        = $request->endDate;
            $course->category_id    = $request->category_id;
            $course->id_studyTime   = $request->studyTime;
            $course->id_studyShift  = $request->studyShift;
            $course->save();
            return redirect("teacher/more2level/courseIntensive/{$course->category_id}")->with('thongbao','Thêm thành công'); 
        }
        
    }


    public function deleteCourseIntensive(Request $request)
    {
    	course::where(['id' => $request->id])->delete();
        return redirect("teacher/more2level/courseIntensive/{$request->category_id}")->with('thongbao','Xóa khóa học thành công');
    }

    public function registerTeacher(Request $request)
    {
        $course = new Course();

        $courses = $course->insertTeacher($request->teacherId, $request->courseId );

    	return redirect("teacher/more2level/infoCourse/{$request->courseId }")->with('thongbao','Thêm giáo viên thành công');
    }

    public function deleteTeacher(Request $request)
    {
        $course = new Course();

        $courses = $course->deleteTeacher($request->id );

    	return redirect("teacher/more2level/infoCourse/{$request->courseId }")->with('thongbao','Xóa giáo viên thành công');
    }

    public function listStudent(Request $request)
    {
       $course = new Course();
       $students   = $course->getStudentOfCourse($request->id);
       $exstudents  =  $course->getListStudent();
       return view('teacher.more2level.student_intensive',[  'exstudents' => $exstudents ,'students' => $students,
                                                            'courseId' => $request->id,
                                                                 ]);
    }
   // thêm  học vien đã ghi danh trong lớp học 
    public function registerStudent(Request $request)
    {
        $data_trung = '';
        if(empty($request->student_attend))
        {
            return redirect("teacher/more2level/infoCourse/{$request->courseId }")->with('loi','Không có học viên nào được chọn ghi danh vào lớp học');
        }
        else
        {
            foreach ($request->student_attend as $sa) 
            {
                $course = new Course();
                $id_registerSudent = $course->checkIdStudent($sa, $request->courseId);
                if($id_registerSudent > 0)
                {
                    $data_trung .= $sa.' ';
                }
                else
                {
                    $courses = $course->insertStudent($sa, $request->courseId);
                    $data_students = $course->getDataStudent($sa,$request->courseId);
                    foreach ($data_students as $data_student => $student) 
                    {
                        $data = ['name_student' => $student->student_name, 'email' => $student->email, 'name_course' => $student->name_course, 'startDate' => $student->startDate, 'endDate' => $student->endDate];
                        Mail::send('emails.form_emails',$data,function($message)use ($data)
                        {
                            $message->from('linhlinhlinh0105@gmail.com', 'Linh Lê');
                            $message->to($data['email'], 'Học viên')->subject('Mail thông báo ghi danh');
                        });
                    }
                    
                }
            }
            if($data_trung != '')
            {
                return redirect("teacher/more2level/infoCourse/{$request->courseId }")->with('loi', 'Học viên '.$data_trung.' đã được ghi danh');
            }
            return redirect("teacher/more2level/infoCourse/{$request->courseId }")->with('thongbao', 'Ghi danh và thông báo ghi danh học viên thành công');
        }
    }

    // xóa học vien đã ghi danh trong lớp học 
    public function deleteStudent(Request $request)
    {
    	$course = new Course();
        $courses = $course->deleteStudent($request->id );
        return redirect("teacher/more2level/infoCourse/{$request->courseId }")->with('thongbao','Xóa học viên thành công');
    }

    //Giao diện thêm mới học viên
    public function getPageInfoCourse(Request $request)
    {
        $course     = new Course();
        $test       = new test();
        $courses    = $course->getCourseByid( $request->id );
        $students   = $course->getStudentOfCourse($request->id);
        $exstudents = $course->getListStudent();
        $exteacher = $course->getListTeacher();
        $count_student =  DB::table('register_course_student')
                                    ->where('courseId',  $request->id)
                                    ->count();        
        $teachers   = $course->getTeacherOfCourse($request->id);
        $data_idStudyTime = $course->getIdStudyTime($request->id);
        $data_idStudyShift = $course->getIdStudyShift($request->id);
        $idStudyTime = $data_idStudyTime[0]->id_studyTime;
        $idStudyShift = $data_idStudyShift[0]->id_studyShift;
        $data_teachingSchedule = $course->getDataTeaching();
        $data_document = $course->getDataDocument($request->id);
        $student_exam           = $course->getDataExam($request->id);
        $check_exam             = $course->checkExam($request->id);
        $history_score          = $course->getHistoryScore($request->id);
        $a = array();
        foreach ($data_teachingSchedule as $keyschedule => $valueschedule) {
            if(($idStudyTime == $valueschedule->id_studyTime) && ($idStudyShift == $valueschedule->id_studyShift))
            {
            
                    $a[] = (object) array(
                        'teacher_name' => $valueschedule->teacher_name,
                        'teacher_id' => $valueschedule->teacher_id
                    );
                
            }
        }
        
        $exteachers = array();
        $exteachers = !empty($a) ? $a : $exteacher;
        $level      = $test->getListLevel();
        $data_exam  = $test->getListExam( $request->id);            
        $periods    = DB::table('period')
                        ->join('studyshift', 'studyshift.id', '=', 'period.id_studyShift')
                        ->join('teacher', 'teacher.teacher_id', '=', 'period.teacherId')
                        ->select('period.*','teacher.teacher_name as teacher_name','studyshift.name_studyShift as name_studyShift','studyshift.start_time as start_time', 'studyshift.end_time as end_time')
                        ->where('period.courseId', '=', $request->id)
                        ->get();
        
        $data_study = DB::table('course_detail')
                        ->join('studyshift', 'studyshift.id', '=', 'course_detail.id_studyShift')
                        ->join('studytime', 'studytime.id', '=', 'course_detail.id_studyTime')
                        ->select('studyshift.name_studyShift as name_studyShift', 'studytime.name_studyTime as name_studyTime', 'studyshift.start_time as start_time', 'studyshift.end_time as end_time', 'studyshift.id as id_studyShift', 'studytime.id as id_studyTime')
                        ->where('course_detail.id', '=', $request->id)
                        ->get();
        return view('teacher.more2level.infoCourse',[ 
                                                        'courses'       => $courses,
                                                        'category_id'   => $request->id,
                                                        'data_document' => $data_document,
                                                        'exstudents'    => $exstudents ,
                                                        'students'      => $students,
                                                        'courseId'      => $request->id,
                                                        'exteachers'    => $exteachers ,
                                                        'teachers'      => $teachers,
                                                        'periods'       => $periods,
                                                        'level'         => $level,
                                                        'count_student' => $count_student,
                                                        'data_exam'     => $data_exam,
                                                        'data_study'    => $data_study,
                                                        'student_exam'  => $student_exam,
                                                        'check_exam'    => $check_exam,
                                                        'history_score' => $history_score
                                                    ]);
    }

    public function getPageAddstudent(Request $request)
    {
        $course = new Course();
        $courses = $course->getCourseByid( $request->id );
        $exstudents  =  $course->getListStudent();
        return view('teacher.more2level.newStudents', [     'courses' => $courses,
                                                            'courseId' => $request->id,
                                                            'exstudents' => $exstudents
                                                    ]);
    }

    public function addPeriodofCourse(Request $request)
    {
        $periodOfCourse = new Course();
        $now        = getdate();
        $date_now   = strtotime($now['year'].'-'.$now['mon'].'-'.$now['mday']);
        $date_study  = strtotime($request->date_study);
        $startDate = strtotime($request->startDate);
        $endDate = strtotime($request->endDate);
        $data_period = DB::table('period')
                        ->select('period.period','period.courseId', 'period.date_study')
                        ->where('period.courseId', '=', $request->courseId)
                        ->get();
        foreach ($data_period as $keyd => $valued) 
        {
            $data_time = strtotime($valued->date_study);
            echo "<pre>";
            print_r($valued->period);
            if($request->period == $valued->period && $request->courseId == $valued->courseId)
            {
                return redirect()->back()->withInput()->with('loi', 'Buổi học đã có');
            }
            elseif ($date_study == $data_time && $request->courseId == $valued->courseId) 
            {
                return redirect()->back()->withInput()->with('loi', 'Thời gian buổi học bị trùng với thời gian đã tạo');
            }
            
        }

        if($date_study < $date_now)
        {
            return redirect()->back()->withInput()->with('loi', 'Ngày học phải sau ngày hiện tại');
        }
        elseif ($date_study < $startDate) 
        {
            return redirect()->back()->withInput()->with('loi', 'Ngày học phải sau ngày bắt đầu khóa học');
        }
        elseif ($date_study > $endDate) 
        {
            return redirect()->back()->withInput()->with('loi', 'Ngày học không được sau ngày kết thúc khóa học');
        }
        else
        {
            $this->validate($request,
            [
                'period' => 'required',
                'date_study' => 'required'
            ],
            [
                'period.required' => 'Buổi học không được để trống',
                'date_study.required' => 'Ngày học không được để trống',
            
            ]);
            $periodOfCourses = $periodOfCourse->insertPeriod($request->period,  $request->courseId, $request->teacherId, $request->skill, $request->date_study, $request->id_studyShift);
            return redirect("teacher/more2level/infoCourse/{$request->courseId}")->with('thongbao', 'Thêm buổi học thành công');
        }
    }
    
    public function deletePeriodofCourse(Request $request)
    {
        DB::table('period')
            ->where('id', '=', $request->id)
            ->delete();
        return redirect("teacher/more2level/infoCourse/{$request->courseId}")->with('thongbao', 'Xóa buổi học thành công'); 
    }
    public function postAddDocument(Request $request)
    {
        $course = new Course();
        $date_post = date("Y-m-d");
        $this->validate($request,
            [
                'document_name'         => 'required|min:3|max:200',
                'detail_doc'            => 'required',
            ],
            [
                'document_name.required'    => 'Tài liệu không được để trống',
                'document_name.min'         => 'Tên tài liệu phải chứa ít nhất 3 ký tự',
                'document_name.max'         => 'Tên tài liệu không hợp lệ',
                'detail_doc.required'       => 'Mô tả không được để trống',
            ]);
        if($request->hasFile('file'))
        {   
            $file= $request->file('file');
            $name = $file->getClientOriginalName();
            $file_doc = str_random(4)."_".$name;
            while (file_exists("uploads/document/".$file)) 
            {
                $file_doc = str_random(4)."_".$name;
            }
            $file->move("uploads/document", $file_doc);
            $document = $file_doc;
        }
        else
        {
            $document = "";
        }
        $documents = $course->insertDocument($request->document_name, $request->detail_doc, $request->courseId, $date_post, $document);
        return redirect("teacher/more2level/infoCourse/{$request->courseId}")->with('thongbao','Thêm tài liệu luyện tập thành công');
    }

    public function postUpdateDocument (Request $request)
    { 
        $this->validate($request,
            [
                'name_doc'      => 'required|min:3|max:200',
                'detail_doc'    =>'required'
            ],
            [
                'name_doc.required'     => 'Tên tài liệu không được để trống',
                'name_doc.min'          => 'Tên tài liệu phải chứa ít nhất 3 ký tự',
                'name_doc.max'          => 'Tên tài liệu không hợp lệ',
                'detail_doc.required'   => 'Mô tả không được để trống'
            ]);
        $data_doc = [ 
                        'name'      => $request->name_doc,
                        'detail'    => $request->detail_doc
                    ];
        DB::table('document_course')
                ->where('id', '=', $request->document_id)
                ->update($data_doc);
        return redirect("teacher/more2level/infoCourse/{$request->courseId}")->with('thongbao','Sửa tài liệu luyện tập thành công');
    }
    public function postDeleteDocument(Request $request)
    {
        $course = new Course();

        $data_document = $course->deleteDocument($request->document_id);

        return redirect("teacher/more2level/infoCourse/{$request->courseId}")->with('thongbao','Xóa tài liệu luyện tập thành công');
    }
}
