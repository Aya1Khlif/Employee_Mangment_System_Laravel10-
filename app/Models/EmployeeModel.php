<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeModel extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'last_name', 'email', 'department_id', 'position'];

    public function department()
    {
        return $this->belongsTo(DepartmentModel::class);
    }

    public function projects()
    {
        return $this->belongsToMany(ProjectModel::class);
    }

    public function notes()
    {
        return $this->morphMany(NoteModel::class, 'noteable');
    }
}
