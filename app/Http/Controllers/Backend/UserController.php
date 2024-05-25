<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\repositories\DistrictRepository;
use App\repositories\ProvinceRepository;
use App\repositories\WardRepository;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;
    protected $provinceRepository;
    protected $districtRepository;

    protected $wardRepository;
    public function __construct(UserService $userService , ProvinceRepository $provinceRepository, DistrictRepository $districtRepository, WardRepository $wardRepository)
    {
        $this->userService=$userService;
        $this->provinceRepository=$provinceRepository;
        $this->districtRepository=$districtRepository;
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
        $districts = $this->districtRepository->getAll();
        $wards = $this->wardRepository->getAll();
        $config=[
            'css' =>[
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
            ],
            'js' =>[
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                'backend/library/location.js'
            ]
        ];
        $config['seo'] = config('apps.user');
        $template = 'backend.user.create';
        return view('backend.dashboard.layout', compact(
            'template','config','provinces','districts','wards'
        ));
    }

}
