<?php

namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\repositories\StudentRepository;
use App\Services\StudentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentDashboardController extends Controller
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
                'backend/css/course.css'
            ],
            'js' =>[
                'backend/library/course.js'
            ]
        ];
        $template = 'studentDashboard.course.index';
        return view('studentDashboard.dashboard.layout', compact(
            'config','courses','template','cartItems'
        ));
    }
}
