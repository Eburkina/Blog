<?php
namespace Eburkina\Blog\Http\Controllers;

use App\Http\Controllers\Controller;
use Eservice\Blog\Models\Actualite;
use Eservice\Blog\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        
        return view('Blog::pages.frontend.actualites.index', ['actualite'=> Actualite::latest()->take(4)->get()]);
    }

   public function show($uuid){
       $actu = Actualite::where('uuid', $uuid)->first();
       $actu->nombre_lus = $actu->nombre_lus +1;
       $actu->save();
       return view('Blog::pages.frontend.actualites.show',[
                    'actualite'=>Actualite::where('uuid', $uuid)->first(),
                    'categorie'=>Category::all(),
                    'actualites'=>Actualite::all()
                    ]);
   }

   public function search(Request $request)
   {
   
       return view('Blog::pages.frontend.actualites.search', [
           'search'=>Actualite::where('titre', 'LIKE',  "%{$request->search}%")
                                ->orwhere('body', 'LIKE',  "%{$request->search}%")
                                ->orwhere('tags', 'LIKE',  "%{$request->search}%")
                                ->paginate(6),
        'recherche' => $request->search

       ]);
   }

   public function actualitebycategorie($uuid)
   {
       return view('Blog::pages.frontend.actualites.actubycategorie',[
           'actualite'=>Actualite::where('category_id', $uuid)->get(),
           'categorie'=>Category::where('uuid', $uuid)->first()
           ]);
   }

}
