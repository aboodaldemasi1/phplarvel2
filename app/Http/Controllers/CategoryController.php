<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


use App\Http\Controllers\Controller;
use App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = Category::all();
        return view("CategoryFile.index",[
            "data"=>$data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    return view("CategoryFile.addCategory");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
[
"categroyname" => "required|min:5"


],
[
"categroyname.required"=>"يجب عليك ادخال هذه القمة",
"categroyname.min"=>"يجب ان يكون عدد الحروف اكثر من 5"
]

        );
       $categoryName = $request->post("categroyname");
       $category = new Category();
       $category->name = $categoryName;
       $category->user_id = Auth::id();
       $stuts=$category->save();
       if($stuts){
        Session::flash("inserttrue","insert Done");
 return redirect()->route("getallCategory");
       }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $category= Category::findOrFail($id);
        return view("CategoryFile.editCategroy",[
"category" => $category

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $category= Category::findOrFail($id);
        $category->name = $request->input("categroyname");
        $res =$category->update();
        if($res){
        return redirect()->route("getallCategory");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
       $category= Category::findOrFail($id);
       $numberofrows=$category->delete();
       if($numberofrows==1){
return redirect()->route("getallCategory");
       }
    }
}
