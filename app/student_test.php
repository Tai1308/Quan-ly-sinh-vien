<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;
class student_test extends Model
{
    public function getListCourse($id_user)
    {
        return  DB::table('register_course_student')
        			->join('student', 'student.student_id', '=', 'register_course_student.studentId')
        			->join('course_detail', 'course_detail.id', '=', 'register_course_student.courseId')
                    ->join('exam', 'exam.courseId', '=', 'register_course_student.courseId')
        			->select('course_detail.name as name_course', 'course_detail.id as courseId','student.student_id as id_student')
        			->where('student.id_user', $id_user)
        			->get();
    }

    public function getDetailCourse($id)
    {
        return  DB::table('course_detail')
                    ->join('studyshift', 'studyshift.id', '=', 'course_detail.id_studyShift')
                    ->join('studytime', 'studytime.id', '=', 'course_detail.id_studyTime')
                    ->join('exam', 'exam.courseId', '=', 'course_detail.id')
                    ->select('course_detail.*','studyshift.name_studyShift as name_studyShift', 'studytime.name_studyTime as name_studyTime', 'exam.time')
                    ->where('course_detail.id', $id)
                    ->get();
    }

    public function getCourseByid($id = 1)
    {
        return DB::table('course_detail')
        			->where('id','=',$id)->paginate(10);
    }

    public function getTimeCourse($id)
    {
        return DB::table('exam')
                    ->where('courseId','=',$id)
                    ->select('time')->get();
    }
    //DOCUMENT
    public function getListDocument($id_user)
    {
        return  DB::table('register_course_student')
                    ->join('student', 'student.student_id', '=', 'register_course_student.studentId')
                    ->join('document_course', 'document_course.courseId', '=', 'register_course_student.courseId')
                    ->join('course_detail', 'course_detail.id', '=', 'register_course_student.courseId')
                    ->select('course_detail.*')
                    ->where('student.id_user', $id_user)
                    ->get();
    }

    public function getListDocumentCourse($id)
    {
        return  DB::table('document_course')
                    ->select('document_course.*')
                    ->where('document_course.courseId', $id)
                    ->get();
    }

    public function getdataA($user_anwer)
    {
        return  DB::table('answer')
                    ->select('answer.correct_sentence')
                    ->where('answer.id', $user_anwer)
                    ->get();
    }

    public function insertResult($answer, $score, $id_student,$courseId, $id_exam, $quantity_correct, $quantity_incorrect)
    {   
        return  DB::table('history')
                    ->insertGetId([
                                        'id_student'        => $id_student,
                                        'courseId'          => $courseId,
                                        'id_exam'           => $id_exam,
                                        'answer'            => $answer,
                                        'score'             => $score,
                                        'quantity_correct'  => $quantity_correct,
                                        'quantity_incorrect'=> $quantity_incorrect
                                    ]);
    }

    public function getIdStudent($id)
    {   
        return  DB::table('student')
                    ->select('student.student_id')
                    ->where('student.id_user', $id)
                    ->get();
    }

    public function getTargetTrainee($id)
    {   
        return  DB::table('trainee')
                    ->select('trainee.target')
                    ->where('trainee.id', $id)
                    ->get();
    }

    public function getTimeOfCourse($id, $id_student)
    {   
        return  DB::table('history')
                    ->join('exam', 'exam.courseId', '=', 'history.courseId')
                    ->select('exam.time', 'exam.name_exam')
                    ->where('history.id_exam', $id)
                    ->where('history.id_student', $id_student)
                    ->get();
    }

    public function getHistoryTrainee($id)
    {   
        return  DB::table('trainee')
                    ->select('trainee.*')
                    ->where('trainee.id', $id)
                    ->get();
    }

    public function getHistoryOfCourse($id_exam, $id_student)
    {   
        return  DB::table('history')
                    ->select('history.*')
                    ->where('history.id_exam', $id_exam)
                    ->where('history.id_student', $id_student)
                    ->get();
    }


    public function insertTrainee($name_trainee, $email, $target, $id_card, $phone, $address, $sex)
    {   
        return  DB::table('trainee')
                    ->insertGetId([
                                        'name_trainee'  => $name_trainee,
                                        'email'         => $email,
                                        'target'        => $target,
                                        'id_card'       => $id_card,
                                        'phone'         => $phone,
                                        'address'       => $address,
                                        'sex'           => $sex
                                    ]);
    }

    public function updateScore($answer, $score, $id, $quantity_correct, $quantity_incorrect)
    {   
        return DB::table('trainee')
                ->where('trainee.id', '=', $id)
                ->update([
                            'answer'            => $answer,
                            'score'             => $score,
                            'quantity_correct'  => $quantity_correct,
                            'quantity_incorrect'=> $quantity_incorrect
                        ]);
    }

    public function updateCourseTrainee($id, $course)
    {   
        return DB::table('trainee')
                ->where('trainee.id', '=', $id)
                ->update([
                            'course' => $course
                        ]);
    }

    public function getCourseTrainee($id)
    {
        return  DB::table('trainee')
                    ->select('trainee.course')
                    ->where('trainee.id', $id)
                    ->get();
    }

    public function getTrainee()
    {
        return  DB::table('trainee')
                    ->select('trainee.*')
                    ->get();
    }

    public function getCourse()
    {
        return  DB::table('course_detail')
                    ->select('course_detail.*')
                    ->get();
    }

    public function registerTrainee($studentId, $courseId)
    {   
        return  DB::table('register_course_student')
                    ->insert([
                                        'studentId'        => $studentId,
                                        'courseId'          => $courseId
                                    ]);
    }

}
