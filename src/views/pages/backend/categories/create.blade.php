@extends('Blog::layouts.master')
@section('content')
<section class="dashboard">
    <div class="col-md-10 offset-1">
        <div class="card">
            @if($categorie->uuid !=null)
            <div class="card-header">
                <h3 class="card-title">{{ $categorie->titre }}</h3>
            </div>
          <form action="{{route('categorie-update', $categorie->uuid)}}" method="Post" >
              @method('PUT')
            @else
            <div class="card-header">
                <h3 class="card-title">Nouvelle Catégorie</h3>
            </div>
          <form action="{{route('categorie-store')}}" method="POST">
              @method('POST')
            @endif
              @csrf
    <div class="card-body">
      <div class="form-group row d-flex">
          <label for="titre" class="col-md-3">Libellé de la Catégorie</label>
          <div class="col-md-9">
          <input type="text" class="form-control" name="titre" placeholder="Libellé de la Catégorie" value="{{old('titre')?? $categorie->titre}}" >
          </div>
      </div>
      <div class="card-footer text-center">
        <button class="btn btn-outline-info btn-sm">{{$button}}</button>
        @if ($categorie->uuid !=null)
        <a type="button" class="btn btn-default btn-sm mod mr-2" href="{{route('categorie-list')}}" >Annuler</a>
        @endif
      </div>
      @if ($categorie->uuid !=null)
      <div class="d-flex justify-content-end">
      <button type="button" class="btn btn-outline-danger btn-sm mr-2 text-light  mod" data-toggle="modal" data-target="#supp{{$categorie->uuid}}"><i class="fas fa-trash-alt text-light"></i>Supprimer</button>
      </div>
      @endif
  </div>
    </form>
    @if ($categorie->uuid != null)
     @include('vendor.partials._confirmation_modal', ['modalUrl'=>'categorie-delete','uuid'=>$categorie->uuid,'idModal' => "supp".$categorie->uuid ,'message'=>'Vous êtes sur le point de supprimer la catégorie '.$categorie->titre])
    @endif
    </div>
    </div>
</section>
    @endsection
