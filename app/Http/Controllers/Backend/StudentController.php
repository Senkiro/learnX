<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\repositories\StudentRepository;
use App\Services\StudentService;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $studentRepository;
    protected $studentService;

    public function __construct(StudentService $studentService, StudentRepository $studentRepository)
    {
        $this->studentService = $studentService;
        $this->studentRepository = $studentRepository;
    }

    public function index(Request $request)
    {
        $courses = $this->studentService->paginate($request);

        $config= [
            'css' =>[
            ],
            'js' =>[
            ]
        ];
        $template = 'studentDashboard.course.index';
        return view('studentDashboard.dashboard.layout', compact(
            'config','courses','template'
        ));
    }
}
