<?php

namespace App\Repositories;

use App\Models\Work;

class WorkRepository
{

    public function __construct()
    {
        $this->model = new Work();
    }

    /**
     * findAll
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll(): \Illuminate\Database\Eloquent\Collection
    {
        return Work::orderByDesc('id')->get();
    }

    /**
     * find
     *
     * @param integer $id
     * @return \App\Models\Work
     */
    public function find(int $id): \App\Models\Work
    {
        return Work::find($id);
    }

    /**
     * delete
     *
     * @param integer $id
     * @return App\Models\Work
     */
    public function delete(int $id): \App\Models\Work
    {

        $work = Work::find($id);

        if ($work !== null) {
            $work->delete();
        }

        return $work;
    }

    /**
     * update
     *
     * @param object $work
     * @param integer $id
     * @return bool
     */
    public function update(object $workRequest, int $id): bool
    {
        $work = $this->model->find($id);

        $work->name = $workRequest->name;
        $work->description = $workRequest->description;
        $work->link = $workRequest->link;
        $work->image = $workRequest->image;
        $work->tags = $workRequest->tags;

        return $work->save();
    }

    /**
     * create
     *
     * @param WorkModel $work
     * @return bool
     */
    public function create(object $workRequest): bool
    {
        $this->model->name = $workRequest->name;
        $this->model->description = $workRequest->description;
        $this->model->link = $workRequest->link;
        $this->model->image = $workRequest->image;
        $this->model->tags = $workRequest->tags;

        return $this->model->save();
    }
}
