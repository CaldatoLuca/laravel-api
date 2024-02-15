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
        $projects = Project::all();

        //risultato: array json, in data ho i progetti, success è un ulteriore  campo che indica se la richiesta ha avuto esito positivo o meno (
        return response()->json([
            "success" => true,
            "data" => $projects
        ]);
    }
}
