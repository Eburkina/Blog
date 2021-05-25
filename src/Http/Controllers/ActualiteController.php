<?php

namespace Eburkina\Blog\Http\Controllers;

use App\Http\Controllers\Controller;
use Eservice\Blog\Models\Actualite;
use Eservice\Blog\Http\Requests\StoreActualiteRequest;
use Eservice\Blog\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class ActualiteController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}
    public function index(){
        return view('Blog::pages.backend.actualites.index', ['actualite'=>Actualite::paginate(4)]);
    }
    
    public function create(){
        $actualite = new Actualite;
        
        return view('Blog::pages.backend.actualites.create',[ 
            "actualite"=> new Actualite(),
             "categorie"=>Category::all(),
             'button'=>'Ajouter' 
              ]);
    }

    public function store(StoreActualiteRequest $request){
        
        $actualite=  new Actualite();

        $actualite->titre        =$request->titre;
        $actualite->category_id =$request->categorie;
        $actualite->body         =$request->body;
        $actualite->tags         = $request->tags;
        $actualite->auteur      = Auth::user()->id];
        // "auteur"      =>$request->titre,
        $actualite->image_couverture = $request->file('image')->store('actualites');
        $actualite->nombre_lus=0;
        $actualite->save();
        Session::flash('success', 'Actualité créée avec success');
        return redirect()->route('actualite-liste');

    }

    public function edit($uuid){
        return view('Blog::pages.backend.actualites.create', [
            'actualite'=>Actualite::where('uuid', $uuid)->first(),
             'categorie'=>Category::all(),
             'button'=>'Modifier'
             ]);
    }

     public function update(Request $request, $uuid)
    {
        $actualite=  Actualite::where('uuid', $uuid)->first();
        $actualite->titre        =$request->titre;
        $actualite->category_id  =$request->categorie;
        $actualite->body         =$request->body;
        $actualite->tags         = $request->tags;
        // $actualite->auteur       =1;
        //"auteur"      =>$request->titre,
        // $actualite->nombre_lus   =0;

        if ($request->hasFile('image')) {
            $actualite->image_couverture = $request->file('image')->store('actualites');
        }
        $actualite->save();
      
        return redirect()->route('actualite-liste')->with('success', 'Actualité créée avec success');
    }

    public function delete($uuid){  
        Actualite::where('uuid', $uuid)->delete();
        return redirect()->route('actualite-liste')->with('success','Actualité supprimée avec success.');
       
    }
}
