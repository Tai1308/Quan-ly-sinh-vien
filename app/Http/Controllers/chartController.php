<?php
namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class chartController extends Controller
{
    public function getCourseChart()
    {
    	return view('admin.chart.chart');
    }
}
