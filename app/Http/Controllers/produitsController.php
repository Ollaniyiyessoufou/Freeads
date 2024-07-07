<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class produitsController extends Controller
{
    function index(){
        return view("produits");
    }

    function profile(){
        return view("profile");
    }
    
    // fonction pour la recherche

    function search(Request $request){

        $search=$request->search;
        $data=product::where('name','Like','%'.$search.'%')->get();
        return view('produits',compact('data'));

    }

    // fonction pour le filtrage

    function filter(Request $request){
        $produits=product::where('category_id',$request->id)->get();
        return view('shop.categorie',compact('produits'));

    }

    // afficher les produits de la base et paginer

    // function afficheProduit(){

    //     $articles=product::paginate(5);
    //     return view(  <div> {{$articles->links()}} </div>  );

    // }

}
