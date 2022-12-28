<?php

namespace App\Http\Controllers\Admin;

use App\Models\Galeri;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.galeri.index',['galeri' => Galeri::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.galeri.create',['galeri' => Galeri::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = $this->validate($request,[
            'foto1' => ['required'],
            'foto2' => ['required'],
            'foto3' => ['required'],
            'foto4' => ['required'],
            'foto5' => ['required'],
            'caption1' => ['required'],
            'caption2' => ['required'],
            'caption3' => ['required'],
            'caption4' => ['required'],
            'caption5' => ['required'],
        ]);

        if($request->file('foto1')){
            $validasi['foto1'] = $request->file('foto1')->store('galeri','public');
        }
        if($request->file('foto2')){
            $validasi['foto2'] = $request->file('foto2')->store('galeri','public');
        }
        if($request->file('foto3')){
            $validasi['foto3'] = $request->file('foto3')->store('galeri','public');
        }
        if($request->file('foto4')){
            $validasi['foto4'] = $request->file('foto4')->store('galeri','public');
        }
        if($request->file('foto5')){
            $validasi['foto5'] = $request->file('foto5')->store('galeri','public');
        }


        Galeri::create($validasi);
        return redirect('/admin/galeri')->with('success','Data added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function show(Galeri $galeri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function edit(Galeri $galeri)
    {
        return view('admin.galeri.edit',['galeri' => $galeri]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Galeri $galeri)
    {
        $validasi = $this->validate($request,[
            'foto1' => ['image'],
            'foto2' => ['image'],
            'foto3' => ['image'],
            'foto4' => ['image'],
            'foto5' => ['image'],
            'caption1' => ['required'],
            'caption2' => ['required'],
            'caption3' => ['required'],
            'caption4' => ['required'],
            'caption5' => ['required'],
        ]);

        if($request->file('foto1')){
            if($request->lama1){
                Storage::disk('public')->delete($request->lama1);
            }
            $validasi['foto1'] = $request->file('foto1')->store('galeri','public');
        }
        if($request->file('foto2')){
            if($request->lama2){
                Storage::disk('public')->delete($request->lama2);
            }
            $validasi['foto2'] = $request->file('foto2')->store('galeri','public');
        }
        if($request->file('foto3')){
            if($request->lama3){
                Storage::disk('public')->delete($request->lama3);
            }
            $validasi['foto3'] = $request->file('foto3')->store('galeri','public');
        }
        if($request->file('foto4')){
            if($request->lama4){
                Storage::disk('public')->delete($request->lama4);
            }
            $validasi['foto4'] = $request->file('foto4')->store('galeri','public');
        }
        if($request->file('foto5')){
            if($request->lama5){
                Storage::disk('public')->delete($request->lama5);
            }
            $validasi['foto5'] = $request->file('foto5')->store('galeri','public');
        }

        Galeri::where('id',$galeri->id)->update($validasi);
        return redirect('/admin/galeri')->with('success','Data update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galeri $galeri)
    {
        if($galeri->foto1){
            Storage::disk('public')->delete($galeri->foto1);
        }
        if($galeri->foto2){
            Storage::disk('public')->delete($galeri->foto2);
        }
        if($galeri->foto3){
            Storage::disk('public')->delete($galeri->foto3);
        }
        if($galeri->foto4){
            Storage::disk('public')->delete($galeri->foto4);
        }
        if($galeri->foto5){
            Storage::disk('public')->delete($galeri->foto5);
        }

        galeri::destroy($galeri->id);
        return redirect('/admin/galeri')->with('success','Data successfully deleted!');
    }
}
