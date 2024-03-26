<?php

namespace App\Models\Ceklis;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    use HasFactory;

    protected $guarded = [];

    function list_tools() {
        return $this->hasMany(ListTool::class, 'tool_id', 'id');
    }

    function checking_process_tools() {
        return $this->hasMany(CheckingProcessTool::class, 'tool_id', 'id');
    }
}
