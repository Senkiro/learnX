<?php

namespace App\Services;

use App\Models\User;

use App\Repositories\UserCatalogueRepository;
use App\Services\Interfaces\UserCatalogueServiceInterface;
use Illuminate\Support\Facades\DB;

/**
 * Class UserService
 * @package App\Services
 */
class UserCatalogueService implements UserCatalogueServiceInterface
{
    protected $userCatalogueRepository;
    public function __construct(UserCatalogueRepository $userRepository)
    {
        $this->userCatalogueRepository = $userRepository;
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

    public function updateStatus($post = []){
        DB::beginTransaction();
        try {
            $payload[$post['field']] = (($post['value'])==1 ? 2 : 1);

            $userCatalogue = $this->userCatalogueRepository->update($post['modelId'],$payload);

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

            $flag = $this->userCatalogueRepository->updateByWhereIn('id',$post['id'],$payload);

            DB::commit();
            return true;
        }catch (\Exception $exception){
            DB::rollBack();
            echo $exception->getMessage();
            return false;
        }

    }
}
