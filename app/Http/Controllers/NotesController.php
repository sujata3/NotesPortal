<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class NotesController extends Controller
{
    public function get()
    {
        return view('Notes.SuccessLogin');
    }
    public function store(Request $request)
    {
            $request->validate([
                'id'=>'required:Notes_and_resources',
                'title'=>'required',
                'file'=>'required'
            ]);
            $query=DB::table('Notes_and_resources')->insert([
                'id'=>$request->input('id'),
                'title'=>$request->input('title'),
                'file'=>$request->input('file')
            ]);
            if($query){
                return back()->with('success','successfully added');
            }
            else{
                return back()->with('fail','Something went wrong, try again');
            }
        }
}

