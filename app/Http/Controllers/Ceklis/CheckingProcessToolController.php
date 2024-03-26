<?php

namespace App\Http\Controllers\Ceklis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckingProcessToolController extends Controller
{
    public $title;

    public function __construct() {
        $this->title = 'Proses Pengecekan Perangkat';
    }

    function create($perangkat) {
        dd($perangkat);
        return view('proses.create', [
            'title' => $this->title
        ]);
    }
}
