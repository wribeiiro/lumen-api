<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkModel;

class WorkController extends Controller {
    
    public function index() {
        $works = WorkModel::all();

        return response()
            ->json([
                'body' => $works,
                'code' => 200
            ], 200);
    }

    public function create(Request $request) {
        $work = new WorkModel;

        $work->client       = $request->name;
        $work->date_deploy  = $request->price;
        $work->description  = $request->description;
        $work->link         = $request->link;
        $work->image        = $request->image;
        $work->class        = $request->class;
        $work->tags         = $request->tags;
        
        $request->validate(WorkModel::validate());
        
        $work->save();

        return response()
            ->json([
                'body' => $work,
                'code' => 201
            ], 201);
    }

    public function show($id) {
        $work = WorkModel::find($id);

        return response()
            ->json([
                'body' => $work,
                'code' => 200
            ], 200);
    }

    public function update(Request $request, $id) { 
        $work= WorkModel::find($id);
        
        $work->client      = $request->name;
        $work->date_deploy = $request->price;
        $work->description = $request->description;
        $work->link        = $request->link;
        $work->image       = $request->image;
        $work->class       = $request->class;
        $work->tags        = $request->tags;

        $request->validate(WorkModel::validate());
        
        $work->save();

        return response()
            ->json([
                'body' => $work,
                'code' => 200
            ], 200);
    }

    public function destroy($id) {
        $work = WorkModel::find($id);
        $work->delete();

        return response()
            ->json([
                'body' => $work,
                'code' => 204
            ], 204);
    }
}
