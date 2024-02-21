<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        //array con tutti i progetti
        // $projects = Project::all();

        //array con anche type e technologies paginati
        $projects = Project::with(['type', 'technologies'])->paginate(6);

        //array con anche type e technologies non paginati
        // $projects = Project::with(['type', 'technologies'])->get();

        //risultato: array json, in data ho i progetti, success è un ulteriore  campo che indica se la richiesta ha avuto esito positivo o meno (
        return response()->json([
            "success" => true,
            "data" => $projects
        ]);
    }

    public function show(string $slug)
    {

        //prendo il project con slug uguale a quello passato in get, first e non get
        $project = Project::where('slug', $slug)->with('type', 'technologies')->first();

        return response()->json([
            "success" => true,
            "data" => $project
        ]);
    }
}
