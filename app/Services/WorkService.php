<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\WorkRepository;

class WorkService
{
    /**
     * repository
     *
     * @property WorkRepository
     */
    private $repository;

    public function __construct(WorkRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(Request $request)
    {
        return $this->repository->create($request);
    }

    public function show(int $id = null)
    {
        if ($id) {
            return $this->repository->find($id);
        }

        return $this->repository->findAll();
    }

    public function update(Request $request, $id)
    {
        return $this->repository->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->repository->delete($id);
    }
}
