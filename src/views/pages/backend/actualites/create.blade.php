@extends('Blog::layouts.master')
@section('content')
<section class="dashboard">
<style>
a.mod{
    margin-left: 1rem;
}
.actualite.content {
    padding-left: 1%;
}
</style>
    <div class="container">

      <div class="row">
        @include('Blog::partials.sidebar')    
        <div class="col-md-9 mb-5 mt-5" >
          <div class="dashboard-contenu"><br>
           
            <h5 class="text-center mb-4">
              Ajout Actualité
            </h5>
                
            <div class="form-header"></div>
            <div class="container"> 
               
                @if($actualite->uuid != null)
                    <form action="{{route('actualite-update', $actualite->uuid)}}" method="Post" class="col-md-8 offset-md-2" enctype= 'multipart/form-data'>
                        @method('PUT')

                @else
                  
                    <form action="{{route('actualite-store')}}" method="POST" class="col-md-8 offset-md-2" enctype= 'multipart/form-data'>
                        @method('POST')

                @endif
                @csrf
                    <div class="form-content">
                        
                        <div class="form-row  ">
                            <div class="col-8 offset-2">
                                <label for="titre">Titre<span class="obligatoire">: *</span></label>
                            <input type="text" name="titre" class="form-control " value="{{old('titre')?? $actualite->titre}}">
                            {{-- @error('titre')<div class="invalid-feedback">{{ $message }}</div>@enderror --}}
                            </div>
                        </div>
                        <div class="form-row  ">

                            <div class="col-8 offset-2">
                                <label for="">Catégorie Actualite<span class="obligatoire">: *</span></label>
                                <select name="categorie" id="" class="form-control" >
                                    <option  disabled selected value="">Catégorie Actualite</option>
                                    @foreach ($categorie as $item)
                                    <option @if ($actualite->category_id == $item->uuid)
                                       selected
                                       
                                    @endif  value="{{$item->uuid}}">{{$item->titre}}</option>
                                    @endforeach
                                </select>
                                {{-- @error('categorie')<div class="invalid-feedback">{{ $message }}</div>@enderror --}}
                            </div>
                        </div>
                        <div class="form-row  ">

                            <div class="col-8 offset-2">
                                <label for="exampleFormControlTextarea1">Description </label>
                                <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="3">{{$actualite->body}}</textarea>
                            </div>
                        </div>
                        <div class="form-row ">

                            <div class="col-8 offset-2">
                                <label for="image">Image <span class="obligatoire">: *</span></label>
                        
                                <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                        </div>
                        <div class="form-row ">
                            <div class="col-8 offset-2">
                                <label for="tags">Tags <span class="obligatoire">: *</span></label><br>
                                <input data-role="tagsinput" class="" type="text" name="tags" value="{{old('tags')?? $actualite->tags}}" >
                            </div>
                        </div>
                    
                        <div class="col my-2 pl-5 d-flex justify-content-center">
                            <button class="btn btn-outline-info btn-sm">{{$button}}</button>

                            @if ($actualite->uuid !=null)                             
                         <a type="button" class="btn btn-danger mod" data-toggle="modal" data-target="#exampleModal{{$actualite->uuid}}">Supprimer</a>    
                        
                  </div>
                         @endif 
                        </div>
                        <br>
                    </div>
                </form>
               
            </div>
        </div>
    </div>
    </div>
    </section>
    @if ($actualite->uuid != null)
    <div class="modal fade" id="exampleModal{{$actualite->uuid}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Supprimer</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                Confirmer la suppression
            </div>
            <div class="modal-footer">
                <form action="{{route('actualite-delete', $actualite->uuid)}}" method="POST">
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