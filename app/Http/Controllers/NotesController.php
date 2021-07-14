<?php

namespace App\Http\Controllers;

use App\Models\NotesAndResources;
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
        $data=new NotesAndResources();
            $request->validate([
                'title'=>'required',
                'file'=>'required'
            ]);

            $file=$request->file;
            $fileName= time().'.'.$file->getClientOriginalName();
            $request->file->move('Files',$fileName);

            $data->title=$request->title;
            $data->file=$fileName;

            $data->save();


//            $query=DB::table('Notes_and_resources')->insert([
//                'title'=>$request->input('title'),
//                'file'=>$request->input('file')
//            ]);

            if($data){
                return back()->with('success','successfully added');
            }
            else{
                return back()->with('fail','Something went wrong, try again');
            }
        }
}

