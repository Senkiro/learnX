<?php

namespace App\Services;


use App\repositories\StudentRepository;
use App\Services\Interfaces\StudentServiceInterface;

/**
 * Class UserService
 * @package App\Services
 */
class StudentService implements StudentServiceInterface
{
    protected $studentRepository;
    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }


    public function paginate( $request)
    {
        $condition = [];
        $condition['keyword'] = addslashes($request->input('keyword', ''));
        $perPage = $request->integer('perpage');

        $user = $this->studentRepository->pagination(
            $this->paginateSelect(),
            $condition,
            [],
            ['path' => 'studentdashboard/index'],
            $perPage,

        );

        return $user;
    }

    private function paginateSelect()
    {
        return ['id','title','description','price','image','publish'];
    }

}
