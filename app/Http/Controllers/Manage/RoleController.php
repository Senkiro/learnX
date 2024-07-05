<?php

namespace App\Http\Controllers\Manage;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Controllers\Controller;
use App\repositories\RoleRepository;
use App\Services\RoleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RoleController extends Controller
{
protected $userCatalogueRepository;
protected $userCatalogueService;
    public function __construct(
        RoleService             $userCatalogueService,
        RoleRepository $userCatalogueRepository
    ){
        $this->userCatalogueService = $userCatalogueService;
        $this->userCatalogueRepository = $userCatalogueRepository;
    }
    public function index(Request $request){

        $roles = $this->userCatalogueService->paginate($request);

        $config= [
            'css' =>[
                'backend/css/plugins/switchery/switchery.css'
            ],
            'js' =>[
                'backend/js/plugins/switchery/switchery.js',
            ]
        ]; ;
        $config['seo'] = config('apps.userCatalogue');
        $template = 'backend.user.catalogue.index';
        return view('backend.dashboard.layout', compact(
            'template','config','roles'
        ));
    }

    public function create(){
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
        $config['seo'] = config('apps.userCatalogue');
        $config['method']='create';
        $template = 'backend.user.catalogue.store';
        return view('backend.dashboard.layout', compact(
            'template','config'
        ));
    }

    public function store(StoreRoleRequest $request)
    {

        if($this -> userCatalogueService->create($request)){
            return redirect()->route('user.catalogue.index')->with('success','Thêm mới thành công');
        }
        return redirect()->route('user.catalogue.index')->with('error','Thêm mới thất bại');
    }

    public function edit($id){
        $role= $this->userCatalogueRepository->findById($id);
        $config=[
            'css' =>[
            ],
            'js' =>[

            ]
        ];
        $config['seo'] = config('apps.userCatalogue');
        $config['method']='edit';
        $template = 'backend.user.catalogue.store';
        return view('backend.dashboard.layout', compact(
            'template','config','role'
        ));
    }

    public function update($id, StoreRoleRequest $request)
    {
        if($this -> userCatalogueService->update($id,$request)){
            return redirect()->route('user.catalogue.index')->with('success','Update thành công');
        }
        return redirect()->route('user.catalogue.index')->with('error','Update thất bại');
    }

    public function delete($id)
    {
        $config['seo'] = config('apps.user');
        $userCatalogue = $this->userCatalogueRepository->findById($id);
        $template = 'backend.user.catalogue.delete';
        return view('backend.dashboard.layout', compact(
            'template','userCatalogue','config'
        ));
    }

    public function destroy($id)
    {
        if($this -> userCatalogueService->destroy($id)){
            return redirect()->route('user.catalogue.index')->with('success','Xóa thành công');
        }
        return redirect()->route('user.catalogue.index')->with('error','Xóa thất bại');

    }
}
