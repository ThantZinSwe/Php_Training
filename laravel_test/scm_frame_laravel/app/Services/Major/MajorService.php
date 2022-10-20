<?php

namespace App\Services\Major;

use App\Contracts\Dao\Major\MajorDaoInterface;
use App\Contracts\Services\Major\MajorServiceInterface;
use Illuminate\Http\Request;

class MajorService implements MajorServiceInterface
{
    /**
     * $majorDao
     */
    private $majorDao;

    /**
     * Class Constructor
     * @param MajorDaoInterface
     */
    public function __construct(MajorDaoInterface $majorDaoInterface)
    {
        $this->majorDao = $majorDaoInterface;
    }

    /**
     * To get all major
     * @return Object $majors to get major
     */
    public function index()
    {
        return $this->majorDao->index();
    }

    /**
     * To store major
     * @param Request $request request with inputs
     * @return Object $major to store major
     */
    public function store(Request $request)
    {
        return $this->majorDao->store($request);
    }

    /**
     * To edit student
     * @param $id
     * @return Major $major
     */
    public function edit($id)
    {
        return $this->majorDao->edit($id);
    }

    /**
     * To update major
     * @param Request $request with inputs
     * @param $id
     * @return Object $major to update major
     */
    public function update(Request $request, $id)
    {
        return $this->majorDao->update($request, $id);
    }

    /**
     * To delete major
     * @param $id
     */
    public function delete($id)
    {
        return $this->majorDao->delete($id);
    }

    /**
     * To paginate major
     * @return $majors
     */
    public function pagination()
    {
        return $this->majorDao->pagination();
    }
}
