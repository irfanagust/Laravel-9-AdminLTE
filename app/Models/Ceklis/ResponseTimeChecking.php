<?php

namespace App\Models\Ceklis;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponseTimeChecking extends Model
{
    use HasFactory;

    protected $guarded = [];

    function checking_process_tool() {
        return $this->belongsTo(CheckingProcessTool::class, 'checking_process_tool_id', 'id');
    }

    function list_tool() {
        return $this->belongsTo(ListTool::class, 'list_tool_id', 'id');
    }
}
