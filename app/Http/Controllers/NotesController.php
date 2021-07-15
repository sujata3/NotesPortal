<?php

namespace App\Http\Controllers;

use App\Models\NotesAndResources;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Stroage;
use mysql_xdevapi\Exception;

//use App\Post;


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
                'file'=>'required|mimes:pdf|max:2048',

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
        public function showNotesList(){
        $data=NotesAndResources::all();
        return view('Notes.NotesAndresources', compact('data'));

        }

        public function downloadFile(Request $request, $file){

            return response()->download(public_path('Files/'.$file));


        }

        Public function view($id){
        $data=NotesAndResources::find($id);
        return view('Notes.ViewNotes', compact('data'));
        }
//
    public function notesUpdateList(){
        $data=NotesAndResources::all();
        return view('EditAndDelete.NotesEdit', compact('data'));

    }
    public function delete($id)
    {
       $data = NotesAndResources::find($id);
       if(!is_null($data)){
           $data->delete();
       }
        return redirect()->back();
    }
    public function edit($id)
    {
        $data = NotesAndResources::find($id);

        return view('EditAndDelete.UpdatePage')-> with('data',$data);


    }
    public function updatedata(Request $request,$id)
    {
        $data=NotesAndResources::find($id);
        $request->validate([
            'title'=>'required',
            'file'=>'required|mimes:pdf|max:2048',

        ],
            [
                'file.required' => 'Please upload pdf files only.'
            ]

        );
        if($request->hasfile('file')){
            $file=$request->file;
            $fileName= time().'.'.$file->getClientOriginalName();
            $request->file->move('Files',$fileName);
            $data->file=$fileName;
        }



        $data->title=$request->title;


        $data->save();

        if($data){
            return redirect("/Update")->with('data',$data);
        }
        else{
            return back()->with('update_fail','Something went wrong, try again');
        }
    }
}

