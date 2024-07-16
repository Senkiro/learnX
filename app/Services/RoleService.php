<?php

namespace App\Services;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use App\Services\Interfaces\RoleServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Class UserService
 * @package App\Services
 */
class RoleService implements RoleServiceInterface
{
    protected $userCatalogueRepository;
    protected $userRepository;
    public function __construct(RoleRepository $userCatalogueRepositoryRepository, UserRepository $userRepository)
    {
        $this->userCatalogueRepository = $userCatalogueRepositoryRepository;
        $this->userRepository = $userRepository;
    }


    public function paginate($request)
    {
        $condition['keyword'] = addslashes($request->input('keyword'));
        $condition['publish'] = $request->integer('publish');
        $perPage =$request->integer('perpage');
        $userCatalogues = $this->userCatalogueRepository->pagination($this->paginateSelect(),$condition,[],
        ['path' => 'user/catalogue/index'],$perPage,['users']
        );
//        dd($userCatalogues);
        return $userCatalogues;
    }

    private function paginateSelect()
    {
        return ['id','name','description','publish'];
    }

    public function create($request){
        DB::beginTransaction();
        try {

            $payload  = $request->except(['_token','send']);
            $user = $this->userCatalogueRepository->create($payload);

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

            $user = $this->userCatalogueRepository->update($id,$payload);

            DB::commit();
            return true;
        }catch (\Exception $exception){
            DB::rollBack();
            echo $exception->getMessage();
            return false;
        }
    }


    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $userCatalogue = $this->userCatalogueRepository->delete($id);
            DB::commit();
            return true;
        }catch (\Exception $exception){
            DB::rollBack();
            echo $exception->getMessage();
            return false;
        }
    }

    public function addPermissionToRole($roleId)
    {
        $permissions = Permission::get();
        $role = Role::findOrFail($roleId);
        $rolePermissions =  DB::table('role_has_permissions')
            ->where('role_has_permissions.role_id', $role->id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        return view('role-permission.role.add-permissions', [
            'role' => $role,
            'permissions' => $permissions,
            'rolePermissions' => $rolePermissions
        ]);
    }

    public function givePermissionToRole(Request $request, $roleId)
    {
        $request->validate([
            'permission' => 'required'
        ]);

        $role = Role::findOrFail($roleId);
        $role->syncPermissions($request->permission);

        return redirect()->back()->with('status','Permissions added to role');
    }

    public function updateStatus($post = []){
        DB::beginTransaction();
        Log::info($post);
        try {
            $payload[$post['field']] = (($post['value'])==1 ? 2 : 1);
            Log::info('Payload', $payload);

            $role = $this->userCatalogueRepository->update($post['modelId'],$payload);

            $this->changeUserStaus($post,$payload[$post['field']]);

            DB::commit();
            return true;
        }catch (\Exception $exception){
            DB::rollBack();
            echo $exception->getMessage();
            return false;
        }
    }

    public function updateStatusAll($post){
        DB::beginTransaction();
        try {
            $payload[$post['field']] = $post['value'];

            $flag = $this->userCatalogueRepository->updateByWhereIn('id',$post['id'],$payload);

            $this->changeUserStaus($post,$post['value']);

            DB::commit();
            return true;
        }catch (\Exception $exception){
            DB::rollBack();
            echo $exception->getMessage();
            return false;
        }

    }

    public function changeUserStaus($post,$value)
    {
        DB::beginTransaction();
        try {
            $array = [];
            if(isset($post['modelId'])){
                $array[] = $post['modelId'];
            }else{
                $array = $post['id'];
            }

            $payload[$post['field']] = $value;

            $this->userRepository->updateByWhereIn('id',$array,$payload);

            DB::commit();
            return true;
        }catch (\Exception $exception){
            DB::rollBack();
            echo $exception->getMessage();
            return false;
        }


    }
}
