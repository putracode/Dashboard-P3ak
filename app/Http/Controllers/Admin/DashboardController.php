<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dashboard;

class DashboardController extends Controller
{
    public function index(){
        return view('admin.dashboard',['dashboard' => Dashboard::where('id','1')->first()]);
    }

    public function update(Request $request, $id){
        $validasi = $this->validate($request,[
            'name' => ['required']
        ]);

        Dashboard::where('id',$id)->update($validasi);
        return redirect('/admin/dashboard')->with('success','Dashboard update successfully!');
    }
    public function pdf(Request $request){
        dd($request);
        return response()->file($request);
    }
}
