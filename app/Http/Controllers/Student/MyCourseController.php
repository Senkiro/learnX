<?php

namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\repositories\StudentRepository;
use App\Services\StudentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyCourseController extends Controller
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
        $cartItems = Cart::where('user_id', Auth::id())->get();

        $config= [
            'css' =>[
                'backend/css/plugins/course.css'
            ],
            'js' =>[
                'backend/js/plugins/course.js'
            ]
        ];
        $template = 'studentDashboard.myCourse.index';
        return view('studentDashboard.dashboard.layout', compact(
            'config','courses','template','cartItems'
        ));
    }
}
