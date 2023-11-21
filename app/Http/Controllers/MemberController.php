<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.show');
    }
    public function indexsearch()
    {

        $members = Member::all();
        // dd($members);
        return view('pages.member-search-table', compact('members'));
    }



    public function search(Request $request)
    {
        $search = $request->input('search');
        
        $members = Member::where('name', 'like', "%$search%")
                     ->orWhere('email', 'like', "%$search%")
                     ->get();
        
        return view('pages.member-search-table', compact('members'));
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
        if($request->ajax()){
            //create new member
            $member = new Member();
            $member->name = $request->input('name');
            $member->email = $request->input('email');
            $member->description = $request->input('description');
            $member->save();

            return response($member);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        $members = Member::all();
        return view('pages.member-list', compact('members'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        if($request->ajax()){
            //create new member
            $member = Member::find($request->id);
            $member->name = $request->input('name');
            $member->email = $request->input('email');
            $member->description = $request->input('description');
            $member->update();

            return response($member);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Member $member)
    {
        if($request->ajax()){
            Member::destroy($request->id);
        }
    }
}
