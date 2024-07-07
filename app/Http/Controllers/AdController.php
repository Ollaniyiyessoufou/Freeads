<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdRequest;
use App\Models\Ad;
use App\Models\User;
use App\Models\Category;
use App\Models\MyCategories;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Auth;



class AdController extends Controller
{
    public function showAds(){

        $allAds = Ad::join('categories', 'ads.category_id', '=', 'categories.id')
            ->join('users','ads.user_id','=','users.id')
            ->select('ads.id as ad_id','ads.price as ad_price','ads.title as ad_title','users.login as ad_login','ads.photo as ad_photo','ads.description as ad_description','categories.name as cat_name')
            ->orderBy('ads.created_at',"DESC")
            ->paginate(6);
            
        return view('index',compact('allAds'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $ads = Ad::join('categories', 'ads.category_id', '=', 'categories.id')
            ->select('ads.id as ad_id','ads.price as ad_price','ads.title as ad_title','categories.name as cat_name')
            ->where('ads.user_id',Auth::id())
            ->orderBy('ads.created_at',"DESC")
            ->get();

        return view('Posts.indexAd', compact('ads'));
    }


public function research(Request $request)
{
    $query = Ad::query();

    if ($request->filled('search')) {
        $query->where('title', 'like', '%' . $request->input('search') . '%');
    }

    if ($request->filled('category')) {
        $query->where('category_id', $request->category);
    }

    if ($request->filled('min_price')) {
        $query->where('price', '>=', $request->input('min_price'));
    }

    if ($request->filled('max_price')) {
        $query->where('price', '<=', $request->input('max_price'));
    }


    $allAds = $query->join('categories', 'ads.category_id', '=', 'categories.id')
        ->join('users','ads.user_id','=','users.id')
        ->select('ads.id as ad_id','ads.price as ad_price','ads.title as ad_title','ads.photo as ad_photo','users.login as ad_login','ads.description as ad_description')
        ->orderBy('ads.created_at',"DESC")
        ->get();


    return view('index', compact('allAds'));
}


    function search(){

        return view('index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view('Posts.createAd',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data= $request->validate([
            'title'=>'required|max:255',
            'description'=>'required',
            'location'=>'required',
            'price'=>'required|numeric|gt:0',
        ]);
        $ad = new Ad();
        $ad->title = $request->title;
        $ad->description = $request->description;
        $ad->location = $request->location;
        $ad->price = $request->price;
        $image = $request->file('image');

        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->storeAs('images',$imageName,'public');
        $ad->photo =$imageName;

        $ad->category_id= $request->category;
        $ad->user_id = $request->user_id;
        $ad->save();

        $my_cat= new MyCategories();
        $my_cat->category_id=$request->category;
        $my_cat->user_id = $request->user_id;
        $my_cat->ads_id = $ad->id;
        $my_cat->save();



        $ads = Ad::join('categories', 'ads.category_id', '=', 'categories.id')
            ->select('ads.id as ad_id','ads.price as ad_price','ads.title as ad_title','ads.description as ad_description','categories.name as cat_name')
            ->where('ads.user_id',$request->user()->id)
            ->orderBy('ads.created_at',"DESC")
            ->get();

        return view('Posts.indexAd', compact('ads'));
        //return back()->with('message','Ad created successfully');

        //$ad->slug = Str::slug($request->get('title'),'-');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        /* $category =  Ad::join('categories', 'ads.category_id', '=', 'categories.id')
                ->select('categories.name')
                ->where('ads.id',$id)
                ->get();
                //dd($category);
        $ad = Ad::find($id); */

        $ads = Ad::join('categories', 'ads.category_id', '=', 'categories.id')
            ->join('users','ads.user_id','=','users.id')
            ->select('ads.price as ad_price','ads.title as ad_title','ads.created_at as ad_ca','ads.updated_at as ad_ua','ads.location as ad_loc','users.login as ad_login','ads.photo as ad_photo','ads.description as ad_description','categories.name as cat_name')
            ->where('ads.id',$id)
            /* ->orderBy('ads.created_at',"DESC") */
            ->get();
            /* dd($ad);
 */
        return view("Posts.showAd",compact('ads'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ad = Ad::findOrFail($id);
        $categories=Category::all();
        return view('Posts.editAd',compact('ad','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $id)
    {
        $data= $request->validate([
            'title'=>'required',
            'description'=>'required',
            'location'=>'required',
            'price'=>'required',
            'image' => ['required', File::image()->types(['jpeg,png,jpg,gif'])],
        ]);

        $ad=Ad::find($id);
        $ad->title = $request->title;
        $ad->description = $request->description;
        $ad->location = $request->location;
        $ad->price = $request->price;
        $image = $request->file('image');

        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->storeAs('images',$imageName,'public');
        $ad->photo =$imageName;
        $ad->category_id= $request->category;
        $ad->save();

        MyCategories::where('ads_id',$id)
            ->update(['category_id' => $request->category]);

        return back()->with('message',"Ad successfully modified!");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ad = Ad::find($id);
        $ad->delete();
        return redirect('posts');
    }


}

