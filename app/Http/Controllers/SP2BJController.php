<?php

namespace App\Http\Controllers;

use App\Models\sp2bj;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SP2BJController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page.sp2bj.index');
    }

    public function datatable(Request $request)
    {
        $totalFilteredRecord = $totalDataRecord = $draw_val = "";
        $columns_list = array(
            0 => 'tentang',
            1 => 'dibuat_oleh',
            2 => 'file_url',
            3 => 'id',
        );

        $totalDataRecord = sp2bj::count();

        $totalFilteredRecord = $totalDataRecord;

        $limit_val = $request->input('length');
        $start_val = $request->input('start');
        $order_val = $columns_list[$request->input('order.0.column')];
        $dir_val = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            $akun_data = sp2bj::where('id','!=',Auth::id())
            ->offset($start_val)
            ->limit($limit_val)
            ->orderBy($order_val,$dir_val)
            ->get();
        } else {
            $search_text = $request->input('search.value');

            $akun_data =  sp2bj::where('id','!=',Auth::id())
            ->where('id','LIKE',"%{$search_text}%")
            ->orWhere('tentang', 'LIKE',"%{$search_text}%")
            ->orWhere('email', 'LIKE',"%{$search_text}%")
            ->offset($start_val)
            ->limit($limit_val)
            ->orderBy($order_val,$dir_val)
            ->get();

            $totalFilteredRecord = sp2bj::where('id','!=',Auth::id())
            ->where('id','LIKE',"%{$search_text}%")
            ->orWhere('tentang', 'LIKE',"%{$search_text}%")
            ->orWhere('email', 'LIKE',"%{$search_text}%")
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
                $akunnestedData['tentang'] = $akun_val->name;
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
