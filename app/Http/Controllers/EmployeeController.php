<?php

namespace App\Http\Controllers;

use App\Models\EmployeeModel;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */ // عرض قائمة الموظفين
    public function index()
    {
        $employees = EmployeeModel::all();
        return response()->json($employees);
    }

    // عرض تفاصيل موظف معين
    public function show($id)
    {
        $employee = EmployeeModel::findOrFail($id);
        return response()->json($employee);
    }

    // إنشاء موظف جديد
    public function store(Request $request)
    {
        $employee = EmployeeModel::create($request->all());
        return response()->json($employee, 201);
    }

    // تحديث موظف معين
    public function update(Request $request, $id)
    {
        $employee = EmployeeModel::findOrFail($id);
        $employee->update($request->all());
        return response()->json($employee, 200);
    }

    // حذف موظف معين
    public function destroy($id)
    {
        EmployeeModel::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
