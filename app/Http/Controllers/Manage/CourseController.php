<?php

namespace App\Http\Controllers\Manage;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Repositories\CourseRepository;
use App\Http\Controllers\Controller;
use App\Services\CourseService;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    protected $courseService;
    protected $courseRepository;

    public function __construct(
        CourseService $courseService,
        CourseRepository $courseRepository)
    {
        $this->courseService = $courseService;
        $this->courseRepository = $courseRepository;
    }

    public function index(Request $request)
    {
        $courses = $this->courseService->paginate($request);

        $config= [
            'css' =>[
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
                'backend/css/plugins/switchery/switchery.css'
            ],
            'js' =>[
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                'backend/js/plugins/switchery/switchery.js',
            ]
        ];
        $config['seo'] = config('apps.course');
        $template = 'backend.course.course.index';
        return view('backend.dashboard.layout', compact(
            'template','config','courses'
        ));
    }

    public function create()
    {
        $config = [
            'css' =>[
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
            ],
            'js' =>[
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                'backend/plugin/ckeditor/ckeditor.js',
                'backend/plugin/ckfinder/ckfinder.js',
                'backend/library/location.js',
            ]
        ];
        $config['seo'] = config('apps.course');
        $config['method'] = 'create';
        $template = 'backend.course.course.store';
        return view('backend.dashboard.layout', compact(
            'template', 'config'
        ));
    }

    public function store(StoreCourseRequest $request)
    {
        if($this->courseService->create($request)){
            return redirect()->route('course.index')->with('success','Thêm mới thành công');
        }
        return redirect()->route('course.index')->with('error','Thêm mới thất bại');
    }

    public function edit($id)
    {
        $course = $this->courseRepository->findById($id);
        $config = [
            'css' =>[
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
            ],
            'js' =>[
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                'backend/plugin/ckeditor/ckeditor.js',
                'backend/plugin/ckfinder/ckfinder.js',
                'backend/library/location.js',
            ]
        ];
        $config['seo'] = config('apps.course');
        $config['method'] = 'edit';
        $template = 'backend.course.course.store';
        return view('backend.dashboard.layout', compact(
            'template', 'config', 'course'
        ));
    }

    public function update($id, UpdateCourseRequest $request)
    {
        if($this->courseService->update($id, $request)){
            return redirect()->route('course.index')->with('success','Update thành công');
        }
        return redirect()->route('course.index')->with('error','Update thất bại');
    }

    public function delete($id)
    {
        $config['seo'] = config('apps.course');
        $course = $this->courseRepository->findById($id);
        $template = 'backend.course.course.delete';
        return view('backend.dashboard.layout', compact(
            'template', 'course', 'config'
        ));
    }

    public function destroy($id)
    {
        if($this->courseService->destroy($id)){
            return redirect()->route('course.index')->with('success','Xóa thành công');
        }
        return redirect()->route('course.index')->with('error','Xóa thất bại');
    }
}
