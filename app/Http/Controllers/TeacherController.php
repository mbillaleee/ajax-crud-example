<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("pages.teacher.index");
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
        $request->validate([
            'name'=> 'required',
            'title'=> 'required',
            'institute'=> 'required',
        ]);
        $data = Teacher::insert([
            'name'=> $request->name,
            'title'=> $request->title,
            'institute'=> $request->institute,
        ]);
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        $data = Teacher::orderBy('id', 'DESC')->get();
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher, $id)
    {
        $data = Teacher::findOrFail($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($id);
        $request->validate([
            'name'=> 'required',
            'title'=> 'required',
            'institute'=> 'required',
        ]);
        $data = Teacher::findOrFail($id)->update([
            'name'=> $request->name,
            'title'=> $request->title,
            'institute'=> $request->institute,
        ]);
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher, $id)
    {
        Teacher::findOrFail($id)->delete();
        return response()->json();
    }

    public function ajaxindex()
    {
       return view("ajax.index");
    }
    public function ajaxstore(Request $request)
    {
      // dd($request->all());
        $teacher = new Teacher();
        $teacher->name = $request->data;
        $teacher->title = 'title';
        $teacher->institute = 'institute';
        $teacher->save();
        return true;
    }
}
