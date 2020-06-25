<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class PostController extends Controller
{
    public function all_post(){
        $posts = Post::all();
        return view('admin.post.all_post',compact('posts'));
    }
    public function add_post(){
        $categories = Category::all();
        return view('admin.post.add_post',compact('categories'));
    }
    public function save_post(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|unique:posts',
            'image' => 'required|image',
            'description' => 'required',
            'category_id' => 'required',
        ]);
        $image = $request->file('image');
        $image_full_name = time().'.'.$image->getClientOriginalExtension();
        $location = 'admin/images/';
        $img_url = $location.$image_full_name;
        $image->move($location, $img_url);
        $posts = new Post();
        $posts['title'] = $request['title'];
        $posts['slug'] = Str::slug($request->title, '-');
        $posts['image'] = $img_url;
        $posts['description'] = $request['description'];
        $posts['category_id'] = $request['category_id'];
        $posts['user_id'] = auth()->user()->id;
        $posts['published_at'] = Carbon::now();
        $posts->save();
        $notification = array(
            'message' => 'Post Saved Successfully',
            'alert-type' => 'success'
        );
        return redirect('add_post')->with($notification);
    }
    public function edit_post($id){
        $edit_post = Post::find($id);
        $categories = Category::all();
        return view('admin.post.edit_post',compact(['edit_post', 'categories']));
    }
    public function update_post(Request $request, $id){
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
        ]);
        $image = $request->file('image');
        if($image){
            $update_post = Post::findorfail($id);
            unlink($update_post->image);
            $image = $request->file('image');
            $image_full_name = time().'.'.$image->getClientOriginalExtension();
            $location = 'admin/images/';
            $img_url = $location.$image_full_name;
            $image->move($location, $img_url);
            $update_post['title'] = $request['title'];
            $update_post['slug'] = Str::slug($request->title, '-');
            $update_post['image'] = $img_url;
            $update_post['description'] = $request['description'];
            $update_post['category_id'] = $request['category_id'];
            $update_post['user_id'] = auth()->user()->id;
            $update_post['published_at'] = Carbon::now();
            $update_post->update();
            $notification = array(
                'message' => 'Post Updated Successfully',
                'alert-type' => 'info'
            );
            return redirect('all_post')->with($notification);
        }else{
            $update_post = Post::findorfail($id);
            $update_post['title'] = $request['title'];
            $update_post['slug'] = Str::slug($request->title, '-');
            $update_post['description'] = $request['description'];
            $update_post['category_id'] = $request['category_id'];
            $update_post['user_id'] = auth()->user()->id;
            $update_post['published_at'] = Carbon::now();
            $update_post->update();
            $notification = array(
                'message' => 'Post Updated Successfully',
                'alert-type' => 'info'
            );
            return redirect('all_post')->with($notification);
        }
    }
    public function delete_post($id){
        $delete_post = Post::find($id);
        $delete_image = $delete_post->image;
        unlink($delete_image);
        $delete_post->delete();
        $notification = array(
            'message' => 'Post Deleted Successfully',
            'alert-type' => 'warning'
        );
        return redirect('all_post')->with($notification);
    }
}
