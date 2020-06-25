<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function all_tags(){
        $tags = DB::table('tags')->orderBy('id', 'DESC')->paginate(20);
        return view('admin.tag.all_tag',compact('tags'));
    }
    public function add_tag(){
        return view('admin.tag.add_tag');
    }
    public function save_tag(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:tags',
        ]);
        $tags = new Tag();
        $tags['name'] = $request['name'];
        $tags['slug'] = Str::slug($request->name, '-');
        $tags['description'] = $request['description'];
        $tags->save();
        $notification = array(
            'message' => 'Tags Created Successfully',
            'alert-type' => 'success'
        );
        return redirect('add_tag')->with($notification);
    }
    public function edit_tag($id){
        $tag = Tag::find($id);
        return view('admin.tag.edit_tag',compact('tag'));
    }
    public function update_tag(Request $request, $id){
        $update_tag = Tag::findorfail($id);
        $update_tag['name'] = $request['name'];
        $update_tag['slug'] = Str::slug($request->name, '-');
        $update_tag['description'] = $request['description'];
        $update_tag->update();
        $notification = array(
            'message' => 'Tags Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect('all_tags')->with($notification);
    }
    public function delete_tag($id){
        $delete_tag = Tag::findorfail($id);
        $delete_tag->delete();
        $notification = array(
            'message' => 'Tags Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect('all_tags')->with($notification);
    }
}
