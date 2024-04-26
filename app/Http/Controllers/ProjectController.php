<?php

namespace App\Http\Controllers;

use App\Models\ProjectModel;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // عرض قائمة المشاريع
    public function index()
    {
        $projects = ProjectModel::all();
        return response()->json($projects);
    }

    // عرض تفاصيل مشروع معين
    public function show($id)
    {
        $project = ProjectModel::findOrFail($id);
        return response()->json($project);
    }

    // إنشاء مشروع جديد
    public function store(Request $request)
    {
        $project = ProjectModel::create($request->all());
        return response()->json($project, 201);
    }

    // تحديث بيانات مشروع معين
    public function update(Request $request, $id)
    {
        $project = ProjectModel::findOrFail($id);
        $project->update($request->all());
        return response()->json($project, 200);
    }

    // حذف مشروع معين
    public function destroy($id)
    {
        ProjectModel::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
