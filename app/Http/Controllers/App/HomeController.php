<?php

namespace App\Http\Controllers\App;

use App\Models\Link;
use App\Models\Galeri;
use App\Models\Aplikasi;
use App\Models\Kategori;
use App\Models\Highlight;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dashboard;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class HomeController extends Controller
{
    public function index(){
        if( auth()->guest() ){
            return view('auth.password');
        }else{
            return view('app.home',['link' => Link::all(), 'kategori' => Kategori::all(), 'galeri' => Galeri::all(), 'highlight' => Highlight::all(), 'aplikasi' => Aplikasi::all(), 'dashboard' => Dashboard::where('id','1')->first()]);
        }
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required']
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('error','Login Failed!');
    }
    
    public function modal(Request $request){
        $kategori = Kategori::findOrFail($request->id);
        $link = Link::all()->where("kategori_id", $request->id);
        return response()->json(['data' => $link, 'kategori' => $kategori],200);
    }
}
