<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\repositories\DistrictRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
    protected $districtRepository;

    public function __construct(DistrictRepository $districtRepository){
        $this->districtRepository = $districtRepository;
    }

    public function getLocation(Request $request){
        $province_id = $request->input('province_id');
        $districts = $this->districtRepository->findDistrictByProvince($province_id);
        $response =[
            'html' => $this->renderHtml($districts),
        ];
        return response()->json($response);
    }

    public function renderHtml($districts){
        $html = '';
        foreach($districts as $district){
            $html .= '<option value="'.$district->code.'">'.$district->name.'</option>';
        }
        return $html;
    }
}
