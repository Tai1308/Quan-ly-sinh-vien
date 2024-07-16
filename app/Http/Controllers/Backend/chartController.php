<?php
namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\course;
use App\CourseDetail;
use App\student;
use App\Http\Controllers\Controller;
class chartController extends Controller
{
    public function getCourseChart()
    {
        $charts = course::select(\DB::raw('COUNT("category_id") as number_course, category_id'))->with('category')
            ->groupBy('category_id')->get();
       $data = [];
       foreach ($charts as $chart) {
           $data[] = [
                'label' => $chart->category->name,
                'y' => $chart->number_course
           ];
       }
        $students = CourseDetail::with(['students' => function ($query) {
            $query->with('student');
        }, 'category'])->get();

        
        $dataChart = json_encode($data);

        $student = student::count();
        $courseDetail = CourseDetail::count();
        $totalMoney = 0;

        foreach ($students as $key => $item) {
            $totalMoney = $totalMoney + $item->students->sum('tuition');
        }

        $viewData = [
            'dataChart' => $dataChart,
            'students'  => $students,
            'student'  => $student,
            'courseDetail'  => $courseDetail,
            'totalMoney'  => $totalMoney,
        ];
    	return view('admin.chart.chart', $viewData);
    }

    public function getCourseDetail($id)
    {
        $course_details = CourseDetail::with(['students' => function ($query) {
            $query->with('student');
        }, 'category'])->find($id);

        $viewData = [
            'course_details' => $course_details,
        ];

        return view('admin.chart.student', $viewData);
    }
}

