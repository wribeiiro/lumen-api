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
        return Work::orderByDesc('date_deploy')->get();
    }

    /**
     * find
     *
     * @param integer $id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function find(int $id): \Illuminate\Database\Eloquent\Collection
    {
        return Work::find($id);
    }

    /**
     * delete
     *
     * @param integer $id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function delete(int $id): \Illuminate\Database\Eloquent\Collection
    {

        $work = $this->model->where('id', $id)->first();

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

        $work->client       = $workRequest->name;
        $work->date_deploy  = $workRequest->price;
        $work->description  = $workRequest->description;
        $work->link         = $workRequest->link;
        $work->image        = $workRequest->image;
        $work->class        = $workRequest->class;
        $work->tags         = $workRequest->tags;

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
        $this->model->client       = $workRequest->name;
        $this->model->date_deploy  = $workRequest->price;
        $this->model->description  = $workRequest->description;
        $this->model->link         = $workRequest->link;
        $this->model->image        = $workRequest->image;
        $this->model->class        = $workRequest->class;
        $this->model->tags         = $workRequest->tags;

        return $this->model->save();
    }
}