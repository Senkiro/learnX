<?php

namespace App\Services;

use App\Models\User;

use App\Repositories\UserRepository;
use App\Services\Interfaces\UserServiceInterface;
use Carbon\Carbon;
use http\Client\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class UserService
 * @package App\Services
 */
class UserService implements UserServiceInterface
{
    protected $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function paginate()
    {
        $user = $this->userRepository->getAllPaginate();
        return $user;
    }

    public function create($request){
        DB::beginTransaction();
        try {

            $payload  = $request->except(['_token','send','re_password']);
            $carbonDate = Carbon::createFromFormat('Y-m-d', $payload['birthday']);
            $payload['birthday'] = $carbonDate->format('Y-m-d H:i:s');
            $payload['password'] = bcrypt($payload['password']);

//            dd($payload);
            $user = $this->userRepository->create($payload);
//            dd($user);

            DB::commit();
            return true;
        }catch (\Exception $exception){
            DB::rollBack();
            echo $exception->getMessage();
            return false;
        }
    }
}
