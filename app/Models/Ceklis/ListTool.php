<?php

namespace App\Models\Ceklis;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListTool extends Model
{
    use HasFactory;

    protected $guarded = [];

    function tool() {
        return $this->belongsTo(Tool::class, 'tool_id', 'id');
    }
}
