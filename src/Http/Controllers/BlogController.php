<?php
namespace Eburkina\Blog\Http\Controllers;

use App\Http\Controllers\Controller;
use Eburkina\Blog\Models\Actualite;
use Eburkina\Blog\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        
        return view('vendor.pages.frontend.actualites.index', ['actualite'=> Actualite::paginate(10)]);
    }

   public function show($uuid){
       $actu = Actualite::where('uuid', $uuid)->first();
       $actu->nombre_lus = $actu->nombre_lus +1;
       $actu->save();
       return view('vendor.pages.frontend.actualites.show',[
                    'actualite'=>Actualite::where('uuid', $uuid)->first(),
                    'categorie'=>Category::all(),
                    'actualites'=>Actualite::all()
                    ]);
   }

   public function search(Request $request)
   {
   
       return view('vendor.pages.frontend.actualites.search', [
           'search'=>Actualite::where('titre', 'LIKE',  "%{$request->search}%")
                                ->orwhere('body', 'LIKE',  "%{$request->search}%")
                                ->orwhere('tags', 'LIKE',  "%{$request->search}%")
                                ->paginate(6),
        'recherche' => $request->search

       ]);
   }

   public function actualitebycategorie($uuid)
   {
       return view('vendor.pages.frontend.actualites.actubycategorie',[
           'actualite'=>Actualite::where('category_id', $uuid)->get(),
           'categorie'=>Category::where('uuid', $uuid)->first()
           ]);
   }
   public function actualitebytags($tags)
   {
       return view('vendor.pages.frontend.actualites.actubytag', ['actualite'=>Actualite::where('tags', 'LIKE',  "%{$tags}%")->get(), 'tags'=>$tags]);
   }

}
