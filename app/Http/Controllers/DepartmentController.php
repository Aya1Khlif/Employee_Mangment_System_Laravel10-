<?php

namespace App\Http\Controllers;

use App\Models\DepartmentModel;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   // عرض قائمة الإدارات
   public function index()
   {
       $departments = DepartmentModel::all();
       return response()->json($departments);
   }

   // عرض تفاصيل إدارة معينة
   public function show($id)
   {
       $department = DepartmentModel::findOrFail($id);
       return response()->json($department);
   }

   // إنشاء إدارة جديدة
   public function store(Request $request)
   {
       $department = DepartmentModel::create($request->all());
       return response()->json($department, 201);
   }

   // تحديث إدارة معينة
   public function update(Request $request, $id)
   {
       $department = DepartmentModel::findOrFail($id);
       $department->update($request->all());
       return response()->json($department, 200);
   }

   // حذف إدارة معينة
   public function destroy($id)
   {
    DepartmentModel::findOrFail($id)->delete();
       return response()->json(null, 204);
   }
}
