<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoteModel extends Model
{
    use HasFactory;
    protected $fillable = ['noteable_id', 'noteable_type', 'content'];

    public function noteable()
    {
        return $this->morphTo();
    }
}
