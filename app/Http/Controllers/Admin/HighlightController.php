<?php

namespace App\Http\Controllers\Admin;

use App\Models\Highlight;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class HighlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.highlight.index',['highlight' => Highlight::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.highlight.create');
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
            'title' => 'required',
            'url' => 'required',
        ]);

        if($request->file('url')){
            $validasi['url'] = $request->file('url')->store('file','public');
        }

        Highlight::create($validasi);
        return redirect('/admin/highlight')->with('success','Data added succesfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Highlight  $highlight
     * @return \Illuminate\Http\Response
     */
    public function show(Highlight $highlight)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Highlight  $highlight
     * @return \Illuminate\Http\Response
     */
    public function edit(Highlight $highlight)
    {
        return view('admin.highlight.edit',['highlight' => $highlight]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Highlight  $highlight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Highlight $highlight)
    {
        $validasi = $this->validate($request,[
            'title' => 'required',
            'url' => 'required',
        ]);

        if($request->file('url')){
            if($request->lama){
                Storage::delete($request->lama);
            }
            $validasi['url'] = $request->file('url')->store('file','public');
        }

        Highlight::where('id',$highlight->id)->update($validasi);
        return redirect('/admin/highlight')->with('success','Data update succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Highlight  $highlight
     * @return \Illuminate\Http\Response
     */
    public function destroy(Highlight $highlight)
    {
        Highlight::destroy($highlight->id);
        return redirect('/admin/highlight')->with('success','Data succesfully deleted!');
    }
}
