<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\repositories\DistrictRepository;
use App\repositories\ProvinceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
    protected $districtRepository;
    protected $provinceRepository;

    public function __construct(
        DistrictRepository $districtRepository,
        ProvinceRepository $provinceRepository
    ){
        $this->districtRepository = $districtRepository;
        $this->provinceRepository = $provinceRepository;
    }

    public function getLocation(Request $request){
        $get = $request->input();
//        dd($get);
        $html ='';

        if($get['target'] =='districts'){
            $provinces = $this->provinceRepository->findById($get['data']['location_id'],['code','name'],['districts']);
            $html = $this->renderHtml($provinces->districts);
        }else if($get['target']=='wards'){
            $districts = $this->districtRepository->findById($get['data']['location_id'],['code','name'],['wards']);
            $html = $this->renderHtml($districts->wards,'[Chọn Phường/Xã]');
        }

        $response =[
            'html' => $html,
        ];
        return response()->json($response);
    }

    public function renderHtml($districts,$root = '[Chọn Quận/huyện]'){
        $html = '<option value="0">'.$root.'</option>';
        foreach($districts as $district){
            $html .= '<option  value="'.$district->code.'">'.$district->name.'</option>';
        }
        return $html;
    }
}
