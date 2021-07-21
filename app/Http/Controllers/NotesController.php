<?php

namespace App\Http\Controllers;

use App\Models\NotesAndResources;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Stroage;
use mysql_xdevapi\Exception;

//use App\Post;


class NotesController extends Controller
{
//   Login page
    public function index()
    {
        return view('auth.login');

    }

//    main page

//    public function adminPanel()
//    {
//        return view('Admin.admin-home');
//    }

//    home Page

    public function homePage()
    {
        return view('Admin.admin-home');
    }

//    Display available notes

    public function viewNotes(){
        //pull only non deleted data
        $notes_resources = NotesAndResources::all();
        return view('Notes.NotesAndResources', compact('notes_resources'));
    }

//    Add New Notes

    public function addNoteForm()
    {
        return view('Notes.add-notes');
    }

//    Store notes in database

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'file'=>'mimes:pdf|max:100000',

        ]);
            if(empty($request->file) && empty($request->link)){
                return back()->with('fail','Please attach a pdf file or provide a link');
            }
        $NotesAndResources=new NotesAndResources();
//        if($request->file->hasFile())
        if($request->hasfile('file')) {
            $file = $request->file;
            $fileName = rand(100, 99999) . '.' . $file->getClientOriginalName();
            $request->file->move('Files', $fileName);
            $NotesAndResources->file=$fileName;
        }
        if($request->has('link')){
            $NotesAndResources->link=$request->link;
        }
        $NotesAndResources->title=$request->title;


        $NotesAndResources->save();


        if($NotesAndResources){

            return redirect("/admin/notes")->with('data',$NotesAndResources);
        }
        else{
            return back()->with('fail','Something went wrong, try again');
        }
    }


//    Download note files

        public function downloadFile(Request $request, $file){

            return response()->download(public_path('Files/'.$file));
     }

//    View note files

        Public function view($id){
        $NotesAndResources=NotesAndResources::find($id);
        return view('Notes.ViewNotes', compact('NotesAndResources'));
        }

//Update Note page

    public function notesUpdateList(){
        $NotesAndResources=NotesAndResources::all();
        return view('EditAndDelete.NotesEdit', compact('NotesAndResources'));

    }

//    delete notes

    public function delete($id)
    {
        $NotesAndResources = NotesAndResources::find($id);
       if(!is_null($NotesAndResources)){
           $NotesAndResources->delete();
       }
        return redirect()->back();
    }

//    edit notes

    public function edit($id)
    {
        $NotesAndResources = NotesAndResources::find($id);

        return view('EditAndDelete.UpdatePage')-> with('NotesAndResources',$NotesAndResources);


    }
    public function updateData(Request $request,$id)
    {
        $NotesAndResources=NotesAndResources::find($id);
        $request->validate([
            'title'=>'required',
            'file'=>'mimes:pdf|max:20000',

        ],
            [
                'file.required' => 'Please upload pdf files only.'
            ]);

        if(empty($request->file) && empty($request->link)){
            return back()->with('fail','Please attach a pdf file or provide a link');
        }
        if($request->hasfile('file')){
            $file=$request->file;
            $fileName= time().'.'.$file->getClientOriginalName();
            $request->file->move('Files',$fileName);
            $NotesAndResources->file=$fileName;
        }
        if($request->has('link')){
            $NotesAndResources->link=$request->link;
        }


        $NotesAndResources->title=$request->title;


        $NotesAndResources->save();

        if($NotesAndResources){
            return redirect("/Update")->with('data',$NotesAndResources);
        }
        else{
            return back()->with('update_fail','Something went wrong, try again');
        }
    }

    public function logout()
    {
        return view(auth.login);
    }
}

