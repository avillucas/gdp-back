<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notices = Notice::all();
        return view('notice.list', compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notice.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'subtitle' => 'max:255',
            'url' => 'url',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5120'
        ]);
        $notice = new Notice();
        if ($request->hasFile('image')) {
            $fileName = time() . '_' . $request->image->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('uploads', $fileName);
            $request->image->move(public_path('uploads'), $fileName);
            $notice->image =  $filePath;
        }
        $notice->title = $request->title;
        $notice->subtitle = $request->subtitle;
        $notice->url = $request->url;
        $notice->save();
        return redirect()->route('notice.index')
            ->with('success', 'La noticia fue creada .')
            ->with('image', $fileName);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function edit(Notice $notice)
    {
        return view('notice.edit', compact('notice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notice $notice)
    {
        $request->validate([
            'title' => 'required|max:255',
            'subtitle' => 'max:255',
            'link' => 'url',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:5120'
        ]);
        if ($request->hasFile('image')) {
            $fileName = time() . '_' . $request->image->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('uploads', $fileName);
            $request->image->move(public_path('uploads'), $fileName);
            $notice->image =  $filePath;
        }
        $notice->update($request->all());
        return redirect()->route('notice.index')
            ->with('success', 'Noticia actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notice $notice)
    {
        $notice->delete();
        return redirect()->route('notice.index')
            ->with('success', 'La noticia se borro correctamente');
    }
}
