<?php

namespace App\Services;

use App\Models\Role;
use App\Models\User;

use App\Repositories\UserRepository;
use App\Services\Interfaces\UserServiceInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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


    public function paginate( $request)
    {
        $condition = [];
        $condition['keyword'] = addslashes($request->input('keyword', ''));
        $condition['publish'] = $request->integer('publish', 0);
        $condition['role_id'] = $request->integer('role_id', 0);
        $perPage = $request->integer('perpage', 20);

        $user = $this->userRepository->pagination(
            $this->paginateSelect(),
            $condition,
            [],
            ['path' => 'user/index'],
            $perPage,

        );

        return $user;
    }

    private function paginateSelect()
    {
        return ['id','email','phone','address','name','publish','role_id'];
    }

    public function create($request){
        DB::beginTransaction();
        try {

            $payload  = $request->except(['_token','send','re_password']);
            $payload['birthday'] = $this->converBirthdayDate($payload['birthday']);
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


    public function update($id,$request){
        DB::beginTransaction();
        try {

            $payload  = $request->except(['_token','send']);
            $payload['birthday'] = $this->converBirthdayDate($payload['birthday']);

            $user = $this->userRepository->update($id,$payload);
//            dd($user);

            if (!$user) {
                throw new \Exception('User not found or update failed.');
            }
            $roleIds = $request->input('role_ids', []);

            $roleNames = Role::whereIn('id', $roleIds)->pluck('name')->toArray();
//            dd($roleNames);
            $user->syncRoles($roleNames);

            if (!empty($roleIds)) {
                $primaryRoleId = $roleIds[0];
                $user->role_id = $primaryRoleId;
                $user->save();
            }
            DB::commit();
            return true;
        }catch (\Exception $exception){
            DB::rollBack();
            echo $exception->getMessage();
            return false;
        }
    }

    public function converBirthdayDate($birthday = ''){
        $carbonDate = Carbon::createFromFormat('Y-m-d',$birthday);
        $birthday = $carbonDate->format('Y-m-d H:i:s');
        return $birthday;
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $user = $this->userRepository->delete($id);
            DB::commit();
            return true;
        }catch (\Exception $exception){
            DB::rollBack();
            echo $exception->getMessage();
            return false;
        }
    }

    public function updateStatus($post = []){
        DB::beginTransaction();
        try {
            $payload[$post['field']] = (($post['value'])==1 ? 2 : 1);

            $user = $this->userRepository->update($post['modelId'],$payload);

            DB::commit();
            return true;
        }catch (\Exception $exception){
            DB::rollBack();
            echo $exception->getMessage();
            return false;
        }

    }

    public function updateStatusAll($post = []){
        DB::beginTransaction();
        try {
            $payload[$post['field']] = $post['value'];

            $flag = $this->userRepository->updateByWhereIn('id',$post['id'],$payload);

            DB::commit();
            return true;
        }catch (\Exception $exception){
            DB::rollBack();
            echo $exception->getMessage();
            return false;
        }

    }


}
