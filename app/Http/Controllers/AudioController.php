<?php

namespace App\Http\Controllers;

use File;
use App\Audio;
use Illuminate\Http\Request;

class AudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        if($request->has('audiofile')){
            $audio = new Audio;
            $audio->filename = $this->upload($request);
            $audio->tagname = $request->tagname;
            $audio->content = $request->audio_content;
            $audio->cat_id = $request->category;
            $audio->save();
            
            return ($audio) ? redirect()->back()->with('success', 'Uploaded') :
            redirect()->back()->with('error', 'Error');
        } 
        return redirect()->back()->with('error', 'Error');

    }

    public function upload(Request $request) 
    {
        
        $filenameWithExt = $request->file('audiofile')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('audiofile')->getClientOriginalExtension();
        
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        
        $path = $request->file('audiofile')->storeAs('public/audio', $fileNameToStore);

        return $fileNameToStore;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function show(Audio $audio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function edit(Audio $audio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {  
        //return response()->json(['data' => $request->all()]);
        $audio = Audio::find($request->id);
        $audio->update([
            'category' => $request->category,
            'tagname' => $request->tagname,
            'content' => $request->content,
        ]);

        if($audio) {
            return response()->json(["data" => $audio]);
        }
        return response()->json(["data" => "Error"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Audio $audio)
    {
        //
    }
}
