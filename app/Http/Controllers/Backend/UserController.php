<?php

namespace App\Http\Controllers\Backend;
use Http\Client\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\repositories\ProvinceRepository;
use App\repositories\WardRepository;
use App\Services\UserService;

class UserController extends Controller
{
    protected $userService;
    protected $provinceRepository;

    protected $wardRepository;
    public function __construct(
        UserService $userService ,
        ProvinceRepository $provinceRepository,
        WardRepository $wardRepository
    ){
        $this->userService=$userService;
        $this->provinceRepository=$provinceRepository;
        $this->wardRepository=$wardRepository;
    }
    public function index(){

        $users = $this->userService->paginate();

        $config= [
            'js' =>[
                'backend/js/plugins/switchery/switchery.js'
            ],
            'css' =>[
                'backend/css/plugins/switchery/switchery.css'
            ]
        ]; ;
        $config['seo'] = config('apps.user');
        $template = 'backend.user.index';
        return view('backend.dashboard.layout', compact(
            'template','config','users'
        ));
    }

    public function create(){
        $provinces = $this->provinceRepository->getAll();
        $wards = $this->wardRepository->getAll();
        $config=[
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
        $config['seo'] = config('apps.user');
        $template = 'backend.user.create';
        return view('backend.dashboard.layout', compact(
            'template','config','provinces','wards'
        ));
    }

    public function store(StoreUserRequest $request)
    {
        if($this -> userService->create($request)){
            return redirect()->route('user.index')->with('success','Thêm mới thành công');
        }
        return redirect()->route('user.index')->with('error','Thêm mới thất bại');
    }


}
