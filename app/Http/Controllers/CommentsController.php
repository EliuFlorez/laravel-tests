<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use App\Models\Comment;
use Illuminate\Http\Request;
use Auth;

class CommentsController extends Controller
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
        $results = Comment::latest()->paginate(10);

        return view('comments.index', compact('results'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'publication_id' => 'required',
            'content' => 'required',
        ]);

        $input = $request->all();
        $input['user_id'] = Auth::id();
        
        Comment::create($input);

        // Send Email - Testing
        //SendEmail::dispatch([
        //    'email' => Auth::user()->email,
        //]);

        return redirect()->back()->with('success', 'Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Comment::find($id);

        return view('comments.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $model
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Comment::find($id);

        return view('comments.show', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int                       $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'content' => 'required',
        ]);

        $model = Comment::find($id);
        $model->update($request->all());

        return redirect()->route('comments.index')->with('success', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Comment::find($id);
        $model->delete();

        return redirect()->route('comments.index')->with('success', 'Deleted successfully');
    }
}
