<?php

namespace App\Services;

use App\repositories\CourseRepository;
use App\Services\Interfaces\CourseServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Class UserService
 * @package App\Services
 */
class CourseService implements CourseServiceInterface
{
    protected $courseRepository;
    public function __construct(CourseRepository $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }


    public function paginate($request)
    {
        $condition['keyword'] = addslashes($request->input('keyword'));
        $condition['publish'] = $request->integer('publish');
        $perPage =$request->integer('perpage');
        $course = $this->courseRepository->pagination($this->paginateSelect(),$condition,[],
        ['path' => 'course/index'],$perPage);
        return $course;
    }

    private function paginateSelect()
    {
        return ['id','title','description','price','image','publish'];
//        return ['id','title','description','publish','user_catalogue_id'];
    }

    public function create($request){
        DB::beginTransaction();
        try {

            $payload  = $request->except(['_token','send']);

            if ($request->hasFile('image')) {
                $payload['image'] = $request->file('image')->store('images/courses', 'public');
            }

            $course = $this->courseRepository->create($payload);

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

            if ($request->hasFile('image')) {
                $payload['image'] = $request->file('image')->store('images/courses', 'public');
            }

            $user = $this->courseRepository->update($id,$payload);
//            dd($user);

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
            $user = $this->courseRepository->delete($id);
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

            $course = $this->courseRepository->update($post['modelId'],$payload);
            Log::info($course);
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

            $flag = $this->courseRepository->updateByWhereIn('id',$post['id'],$payload);

            DB::commit();
            return true;
        }catch (\Exception $exception){
            DB::rollBack();
            echo $exception->getMessage();
            return false;
        }

    }
}
