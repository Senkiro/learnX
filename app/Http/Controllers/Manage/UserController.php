<?php

namespace App\Http\Controllers\Manage;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\repositories\ProvinceRepository;
use App\repositories\WardRepository;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;
    protected $provinceRepository;
    protected $userRepository;

    protected $wardRepository;
    public function __construct(
        UserService $userService ,
        ProvinceRepository $provinceRepository,
        WardRepository $wardRepository,
        UserRepository $userRepository
    ){
        $this->userService=$userService;
        $this->provinceRepository=$provinceRepository;
        $this->wardRepository=$wardRepository;
        $this->userRepository=$userRepository;
    }
    public function index(Request $request){

        $users = $this->userService->paginate($request);

        $config= [
            'css' =>[
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
                'backend/css/plugins/switchery/switchery.css'
            ],
            'js' =>[
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                'backend/js/plugins/switchery/switchery.js',
            ]
        ]; ;
        $config['seo'] = config('apps.user');
        $template = 'backend.user.user.index';
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
        $config['method']='create';
        $template = 'backend.user.user.store';
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

    public function edit($id){
        $user = $this->userRepository->findById($id);
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
        $config['method']='edit';
        $template = 'backend.user.user.store';
        return view('backend.dashboard.layout', compact(
            'template','config','provinces','wards','user'
        ));
    }

    public function update($id,UpdateUserRequest $request)
    {
        if($this -> userService->update($id,$request)){
            return redirect()->route('user.index')->with('success','Update thành công');
        }
        return redirect()->route('user.index')->with('error','Update thất bại');
    }

    public function delete($id)
    {
        $config['seo'] = config('apps.user');
        $user = $this->userRepository->findById($id);
        $template = 'backend.user.user.delete';
        return view('backend.dashboard.layout', compact(
            'template','user','config'
        ));
    }

    public function destroy($id)
    {
        if($this -> userService->destroy($id)){
            return redirect()->route('user.index')->with('success','Xóa thành công');
        }
        return redirect()->route('user.index')->with('error','Xóa thất bại');

    }
}
