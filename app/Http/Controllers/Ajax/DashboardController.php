<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class DashboardController extends Controller
{

    public function __construct(

    ){

    }

    public function changeStatus(Request $request){
        $post = $request->input();
        Log::info('Request received', $post);
        $serviceInterfaceNamespace='\\App\\Services\\'.ucfirst($post['model']).'Service';
        if(class_exists($serviceInterfaceNamespace)){
            $serviceInterfaceInstance=app($serviceInterfaceNamespace);
        }
        $flag = $serviceInterfaceInstance->updateStatus($post);

        return response()->json(['flag'=>$flag]);
    }

    public function changeStatusAll(Request $request){
        $post = $request->input();
        $serviceInterfaceNamespace='\\App\\Services\\'.ucfirst($post['model']).'Service';
        if(class_exists($serviceInterfaceNamespace)){
            $serviceInterfaceInstance=app($serviceInterfaceNamespace);
        }
        $flag = $serviceInterfaceInstance->updateStatusAll($post);

        return response()->json(['flag'=>$flag]);
    }


}
