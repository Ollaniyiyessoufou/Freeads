<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use App\Models\MyCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyCategoriesController extends Controller
{
    public function index(){
        $categories = Category::join('my_categories','my_categories.category_id','=','categories.id')
            ->select('categories.name as name_cat','categories.id as cat_id', Category::raw("count(my_categories.ads_id) as count"))
            ->where('my_categories.user_id',Auth::id())
            ->groupBy('my_categories.category_id')
            ->get();

        return view("Categories.categoryAd",compact('categories'));
    }

   /*  public function store(Request $request){
        $data= $request->validate([
            'name'=>'required',

            ]);

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        $categories = Category::all()->sortByDesc('created_at');
        return view('Categories.categoryAd', compact('categories'));
    } */

    public function destroy(string $id)
    {
        $category = MyCategories::where('category_id',$id);
        $category->delete();
        $ads=Ad::where('category_id',$id);
        $ads->delete();

        return redirect('category');
    }

}
