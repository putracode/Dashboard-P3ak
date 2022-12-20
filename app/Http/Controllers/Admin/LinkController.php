<?php

namespace App\Http\Controllers\Admin;

use App\Models\Link;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.link.index',['link' => link::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.link.create',['kategori' => Kategori::all()]);
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
            'title' => ['required'],
            'url'   => ['required'],
            'kategori_id'   => ['required']
        ]);

        if($request->file('url')){
            $validasi['url'] = $request->file('url')->store('pdf','public');
        }
        
        // if($request->file('url')){
        //     $validasi['url'] = Storage::putFile('public', $request->file('url'));
        // }
        // $rules = [
        //     'title' => ['required'],
        //     'url'   => ['required'],
        //     'kategori'   => ['required']
        // ];

        // if($request->file('url')){
        //     $rules['url'] = ['required'];
        //     $rules['url'] = $request->file('img')->store('pdf');
        // }else{
        //     $rules['url'] = ['required'];
        // }

        // $validasi = $request->validate($rules);

        link::create($validasi);
        return redirect('/admin/link')->with('success','Data added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function show(Link $link)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function edit(Link $link)
    {
        return view('admin.link.edit',['link' => $link, 'kategori' => kategori::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Link $link)
    {
        $validasi = $this->validate($request,[
            'title' => ['required'],
            'url' => ['required'],
            'kategori' => ['required'],
        ]);

        if($request->file('url')){
            if($request->lama){
                Storage::delete($request->lama);
            }
            $validasi['url'] = $request->file('url')->store('pdf');
        }

        link::where('id',$link->id)->update($validasi);
        return redirect('/admin/link')->with('success','Data update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {
        if($link->url){
            Storage::delete($link->url);
        }
        link::destroy($link->id);
        return redirect('/admin/link')->with('success','Data successfully deleted!');
    }
}
