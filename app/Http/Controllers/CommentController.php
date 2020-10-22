<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\TravelPlace;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::guard('employee')->id();
        $dataAuth = Employee::find($id);
        $title = "Komentar";
        //
        $dataComment = Comment::with(['place'])->get();
        $dataCommentCount = Comment::count();
        return view('page.backend.admin.comment.index', compact('title', 'dataAuth', 'dataComment', 'dataCommentCount'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $id)
    {
        $place = TravelPlace::find($id->place_id);
        return view('page.backend.admin.comment.detail', compact('id', 'place'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $id)
    {
        $request->validate([
            'comment' => 'required',
        ]);

        Comment::where('id', $id->id)->update([
            'comment' => $request->comment
        ]);

        return redirect()->back()->with('success', 'diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comment::destroy($id);
        return redirect()->back()->with('success', 'dihapus');
    }
}
