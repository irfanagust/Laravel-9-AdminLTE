<?php

namespace App\Http\Controllers\Ceklis;

use App\Http\Controllers\Controller;
use App\Models\Ceklis\Tool;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class ToolController extends Controller
{
    public $title;

    public function __construct() {
        $this->title = 'Perangkat';
    }

    function index() {
        $tools = Tool::query()->select('id','tools_name', 'tools_desc')->with([
            'list_tools',
            'checking_process_tools'
        ])->get();

        return view('perangkat.index', [
            'title' => $this->title,
            'tools' => $tools
        ]);
    }

    function create() : View {
        return view('perangkat.create', [
            'title' => $this->title,
        ]);
    }

    function store(Request $request) {
        try {
            $tools = new Tool();
            $tools->tools_name = $request->tools_name;
            $tools->tools_desc = $request->tools_desc;
            $tools->save();

            Alert::success('Berhasil', 'Data berhasil ditambahkan');
            
            return redirect()->route('tools.index');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            Alert::error('Gagal', 'Data gagal ditambahkan');
            return back()->with('error', $th->getMessage());
        }
    }
}
