<?php

namespace Eburkina\Blog\Http\Controllers;

use App\Http\Controllers\Controller;
use Eburkina\Blog\Models\Actualite;
use Eburkina\Blog\Http\Requests\StoreActualiteRequest;
use Eburkina\Blog\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class ActualiteController extends Controller
{
    public function __construct()
{
    $this->middleware('AdminAuth');
}
    public function index(){
        return view('vendor.pages.backend.actualites.index', [
            'actualite'=>Actualite::where('publish',true)->get(),
            'titre'=>'Actualités Publiées'
        ]);
    }
        public function brouillon(){
            return view('vendor.pages.backend.actualites.index', [
                'actualite'=>Actualite::where('publish',false)->get(),
                'titre'=>'Actualités non Publiées'
            ]);
        }


    public function create(){
        $actualite = new Actualite;

        return view('vendor.pages.backend.actualites.create',[
            "actualite"=> new Actualite(),
             "categorie"=>Category::all(),
             'button'=>'Ajouter'
              ]);
    }

    public function store(StoreActualiteRequest $request){
        // dd($request->all());
        // dd(Auth::Guard('admin')->user());
        $actualite=  new Actualite();

        $actualite->titre        =$request->titre;
        $actualite->category_id =$request->categorie;
        $actualite->body         =$request->body;
        $actualite->tags         = $request->tags;
        $actualite->auteur      = Auth::guard('admin')->user()->uuid;
        // "auteur"      =>$request->titre,
        $actualite->image_couverture = $request->file('image')->store('actualites');
        $actualite->nombre_lus=0;
        $actualite->save();
        Session::flash('success', 'Votre article a été créé et placé dans le brouillon');
        return redirect()->route('actualite.brouillon');
    }

    public function edit($uuid){
        return view('vendor.pages.backend.actualites.create', [
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

        if ($request->hasFile('image')) {
            $actualite->image_couverture = $request->file('image')->store('actualites');
        }
        $actualite->save();
        if ($actualite->publish == 1) {
            return redirect()->route('actualite-liste')->with('success', 'L\'article a été modifié');
        }else {
            return redirect()->route('actualite.brouillon')->with('success', 'L\'article a été modifié');
        }
    }

    public function delete($uuid){
        Actualite::where('uuid', $uuid)->delete();
        return redirect()->route('actualite-liste')->with('success','Article supprimé.');

    }

    public function publish($uuid)
    {
        $actualite=  Actualite::where('uuid', $uuid)->first();

        if ($actualite->publish == false) {
            $actualite->publish =true;
            $actualite->save();
            return redirect()->back()->with('success','L\'article '.$actualite->titre.' a été publié.');
        }else {
            $actualite->publish =false;
            $actualite->save();
            return redirect()->back()->with('success','La publication de l\'article '.$actualite->titre.' a été stoppées.');
        }
    }
}
