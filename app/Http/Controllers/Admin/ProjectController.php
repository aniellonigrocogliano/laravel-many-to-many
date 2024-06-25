<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Type;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $project = project::all();
        return view('admin.dashboard', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { {
            return view("admin.project.create");
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->all();
        if ($request->hasFile('cover_image')) {
            $image_path = Storage::put('cover_image', $request->file('cover_image'));
            $data['cover_image'] = $image_path;
        }
        $data['slug'] = Str::slug($data['title']);
        $data['creation_date'] = Carbon::now()->format('Y-m-d');
        $project = new Project();
        $project->fill($data);
        $project->save();
        return redirect()->route('admin.projects.show', $project->slug);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.project.show', compact('project'));
    }
    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Project $project)
    {
        $types = Type::all();
        return view('admin.project.edit', compact('project', 'types'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($data['title']);

        if ($request->hasFile('cover_image')) {
            if ($project->cover_image) {
                Storage::delete($project->cover_image);
            }
            $image_path = Storage::put('post_images', $request->cover_image);
            $data['cover_image'] = $image_path;
        }


        $project->update($data);
        return redirect()->route('admin.dashboard');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->cover_image) {
            Storage::delete($project->cover_image);
        }

        $project->delete();
        return redirect()->route('admin.dashboard')->with('message', 'Il proggetto ' . $project->title . ' è stato cancellato');
    }
}
