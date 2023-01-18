<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        // $projects = Project::paginate(4);
        $projects = Project::with('category','tecnologies')->paginate(4);
        return response()->json([
            'success' => true,
            'results' => $projects,
        ]);
    }

    public function show($slug)
    {
        $projects = Project::with('category','tecnologies')->where('slug', $slug)->first();
        if($projects){
            return response()->json([
                'success' => true,
                'results' => $projects
            ]);
        } else {
            return response()->json([
                'sucess' => false,
                'results' => 'Nessun project trovato'
            ]);
        }
    }
}
