<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $categories = Category::orderby('id', 'DESC')->paginate(20);
        return view('admin.category.category',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.add_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:categories',
        ]);
        $category = Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name, ('-')),
            'description'=>$request->description,
        ]);
        $notification = array(
            'message' => 'Category Created Successfully',
            'alert-type' => 'success'
        );
        return redirect('/category/create')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {

    }
    public function category_view($id){
        $category_view = DB::table('categories')->where('id',$id)->first();
        return view('admin.category.view_category',compact('category_view'));
    }
    public function category_destroy($id){
        $category_destroy = DB::table('categories')->where('id',$id)->delete();
        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'warning'
        );
        return redirect('category')->with($notification);
    }
    public function category_edit($id){
        $edit_category = Category::find($id);
        return view('admin.category.edit_category',compact('edit_category'));
    }
    public function category_update(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'required|unique:categories',
        ]);
        $category = Category::findorfail($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name, '-');
        $category->description = $request->description;
        $category->update();
        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect('category')->with($notification);
    }
}
