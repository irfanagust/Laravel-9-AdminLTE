<?php

namespace App\Http\Controllers\Ceklis;

use App\Http\Controllers\Controller;
use App\Models\Ceklis\Tool;
use App\Models\CeklistDate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResponseTimeCheckingController extends Controller
{
    function index() {
        $data = CeklistDate::whereDate('created_at', '=', now()->toDateString())->first();
        $dataExists = $data ? true : false;

        return view('page.ceklis.index', compact('dataExists'));
    }
    
    public function dataTable(Request $request)
    {
        $totalFilteredRecord = $totalDataRecord = $draw_val = "";
        $columns_list = array(
            0 => 'date_checking_response_time',
            1 => 'created_by',
            2 => 'user_image',
            3 => 'id',
        );

        $totalDataRecord = CeklistDate::count();

        $totalFilteredRecord = $totalDataRecord;

        $limit_val = $request->input('length');
        $start_val = $request->input('start');
        $order_val = $columns_list[$request->input('order.0.column')];
        $dir_val = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            $akun_data = CeklistDate::where('id','!=',Auth::id())
            ->offset($start_val)
            ->limit($limit_val)
            ->orderBy($order_val,$dir_val)
            ->get();
        } else {
            $search_text = $request->input('search.value');

            $akun_data =  CeklistDate::where('id','!=',Auth::id())
            ->where('id','LIKE',"%{$search_text}%")
            ->orWhere('date_checking_response', 'LIKE',"%{$search_text}%")
            ->orWhere('created_by', 'LIKE',"%{$search_text}%")
            ->offset($start_val)
            ->limit($limit_val)
            ->orderBy($order_val,$dir_val)
            ->get();

            $totalFilteredRecord = CeklistDate::where('id','!=',Auth::id())
            ->where('id','LIKE',"%{$search_text}%")
            ->orWhere('date_checking_response', 'LIKE',"%{$search_text}%")
            ->orWhere('created_by', 'LIKE',"%{$search_text}%")
            ->count();
        }

        $data_val = array();
        if(!empty($akun_data))
        {
            foreach ($akun_data as $akun_val)
            {
                $url = route('akun.edit',['id' => $akun_val->id]);
                $urlHapus = route('akun.delete',$akun_val->id);
                if ($akun_val->user_image) {
                    $img = $akun_val->user_image;
                } else {
                    $img = asset('vendor/adminlte3/img/user2-160x160.jpg');
                }
                $akunnestedData['name'] = $akun_val->name;
                $akunnestedData['email'] = $akun_val->email;
                $akunnestedData['user_image'] = "<img src='$img' class='img-thumbnail' width='200px'>";
                $akunnestedData['options'] = "<a href='$url'><i class='fas fa-edit fa-lg'></i></a> <a style='border: none; background-color:transparent;' class='hapusData' data-id='$akun_val->id' data-url='$urlHapus'><i class='fas fa-trash fa-lg text-danger'></i></a>";
                $data_val[] = $akunnestedData;
            }
        }
        $draw_val = $request->input('draw');
        $get_json_data = array(
        "draw"            => intval($draw_val),
        "recordsTotal"    => intval($totalDataRecord),
        "recordsFiltered" => intval($totalFilteredRecord),
        "data"            => $data_val
        );

        echo json_encode($get_json_data);
    }

    function create() {
        $data = Tool::query()->with('list_tools', 'checking_process_tools')->get();
        // dd($data);
        return view('page.ceklis.create', compact('data'));
    }

    function store(Request $request) {
        dd($request->all());

    }
}
