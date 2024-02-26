<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\ProjectList;
use App\Models\ProjectMembers;
use App\Models\TaskList;
use Illuminate\Http\Request;

class ManagerProjectController extends Controller
{
    public function projects()
    {
        $user = auth()->user()->id;
        $projects = ProjectList::where('manager_id','=', $user)->get()->all();
        return view('manager.projects.project-list', compact('projects'));
    }

    public function view($id)
    {
        $details = ProjectList::findOrfail($id);
        $projectId = $details->id;
        $tasks = TaskList::where('project_id','=', $projectId)->get()->all();
        $members = ProjectMembers::where('project_id','=', $projectId)->get()->all();
        return view('manager.projects.view-details', compact('details', 'members', 'tasks'));
    }
}
