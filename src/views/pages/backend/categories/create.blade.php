@extends('Blog::layouts.master')
@section('content')
<section class="dashboard">
    <div class="container">

      <div class="row">
        @include('Blog::partials.sidebar')    
        <div class="col-md-9 mb-5 mt-5" >
          <div class="dashboard-contenu"><br>
           
       


            <h5 class="text-center mb-4">
              Categories
            </h5>
                <div class="row">
                @if($categorie->uuid !=null)
                    <form action="{{route('categorie-update', $categorie->uuid)}}" method="Post" class="col-md-8 offset-md-2">
                        @method('PUT')

                @else
                  
                    <form action="{{route('categorie-store')}}" method="POST" class="col-md-8 offset-md-2">
                        @method('POST')

                @endif
                        @csrf
                        <div class="col-12 ml-10 ">
                            <input type="text" name="titre" class="form-control " value="{{old('titre')?? $categorie->titre}}" placeholder="Titre de la catégorie">
                            {{-- @error('profession')<div class="invalid-feedback">{{ $message }}</div>@enderror --}}
                        </div> <br>
                        <div class="text-center">
                            <button type="submit" class="btn btn-outline-info btn-sm">{{$button}}</button>    
                         @if ($categorie->uuid !=null)
                             
                         <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$categorie->uuid}}">Supprimer</a>    
                         <div class="modal fade" id="exampleModal{{$categorie->uuid}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Supprimer</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                  COnfirmer la suppression
                              </div>
                              <div class="modal-footer">
                                  <form action="{{route('categorie-delete', $categorie->uuid)}}" method="POST">
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-primary">Confirmer</button>
                                  </form>
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                      </div>
                         @endif   
                         <br>  <br> </div>                       
                    </form>
                </div>

               
            </div>
        </div>
    </div>
    </div>
    </section>

    @if ($categorie->uuid !=null)
                             
   
    <div class="modal fade" id="exampleModal{{$categorie->uuid}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Supprimer</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
             COnfirmer la suppression
         </div>
         <div class="modal-footer">
             <form action="{{route('categorie-delete', $categorie->uuid)}}" method="POST">
                 @method('DELETE')
                 <button type="submit" class="btn btn-primary">Confirmer</button>
             </form>
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         </div>
       </div>
     </div>
 </div>
    @endif  
@endsection