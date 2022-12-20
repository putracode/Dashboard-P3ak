<?php

namespace App\Http\Controllers\App;

use App\Models\Link;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Symfony\Component\Console\Input\Input;

class HomeController extends Controller
{
    public function index(){
        return view('app.home',['link' => Link::all(), 'kategori' => Kategori::all(), 'galeri' => Galeri::all()]);
    }

    public function modal(Request $request){
        $kategori = Kategori::findOrFail($request->id);
        $link = Link::all()->where("kategori_id", $request->id);
        return response()->json(['data' => $link, 'kategori' => $kategori],200);
    }
}
