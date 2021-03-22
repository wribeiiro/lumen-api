<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Validations\WorkValidation;
use App\Services\WorkService;

class WorkController extends Controller
{
    /**
     * work_service
     *
     * @property WorkService
     */
    private $work_service;

    public function __construct(WorkService $workService)
    {
        $this->work_service = $workService;
    }

    public function index()
    {
        try {
            $response['code'] = 200;
            $response['data'] =  $this->work_service->show();
        } catch (\Exception $e) {
            $response['code'] = 500;
            $response['data'] = $e->getMessage();
        }

        return response()->json($response, $response['code']);
    }

    public function create(Request $request)
    {

        $response['code'] = 201;
        $response['data'] = [];

        //$validate = $this->validate($request, WorkValidation::validate());

        try {
            $result           = $this->work_service->create($request);
            $response['data'] = $result;
        } catch (\Exception $e) {
            $response['code'] = 500;
            $response['data'] = $e->getMessage();
        }

        return response()->json($response, $response['code']);
    }

    public function show($id)
    {
        try {
            $response['code'] = 200;
            $response['data'] =  $this->work_service->show($id);
        } catch (\Exception $e) {
            $response['code'] = 500;
            $response['data'] = $e->getMessage();
        }

        return response()->json($response, $response['code']);
    }

    public function update(Request $request, $id)
    {
        $response['code'] = 200;
        $response['data'] = [];

        //$validate = $this->validate($request, WorkValidation::validate());

        try {
            $result           = $this->work_service->update($request, (int) $id);
            $response['data'] = $result;
        } catch (\Exception $e) {
            $response['code'] = 500;
            $response['data'] = $e->getMessage();
        }

        return response()->json($response, $response['code']);
    }

    public function destroy($id)
    {

        try {
            $response['code'] = 204;
            $response['data'] = $this->work_service->destroy((int) $id);
        } catch (\Exception $e) {
            $response['code'] = 500;
            $response['data'] = $e->getMessage();
        }

        return response()->json($response, $response['code']);
    }
}
