@extends('Blog::layouts.master')
@section('content')
<section class="dashboard">
<style>
a.mod{
    margin-left: 1rem;
}

</style>
<div class="container">
    <div class="page-header">
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{ route('actualite-liste') }}">Actualités</a></li>
                @if($actualite->uuid ==null)
                <li class="breadcrumb-item"><a href="#">Nouvelle Actualité</a></li>
                @else
				<li class="breadcrumb-item"><a href="#">{{ $actualite->titre }}</a></li>
                @endif
            </ol>
        </div>

    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-2">
        @include('partials._notifications')
    </div>
    <div class="card ">
        @if($actualite->uuid != null)
        <div class="card-header">
            <h3 class="card-title">{{$actualite->titre}}</h3>
        </div>
            <form action="{{route('actualite-update', $actualite->uuid)}}" method="Post"  enctype= 'multipart/form-data'>
                @method('PUT')

        @else
        <div class="card-header">
            <h3 class="card-title">Nouvelle actualité</h3>
        </div>
            <form action="{{route('actualite-store')}}" method="POST"  enctype= 'multipart/form-data'>
                @method('POST')

        @endif
        @csrf
        <div class="card-body ">
            <div class="row">
                <div class="col-md-12 d-flex">
                    <div class="col-sm-8">
                        <div class="form-group row  d-flex">
                            <label for="colFormLabelSm" class="col-sm-3 col-form-label text-right">Titre:</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" name="titre"  placeholder="Titre actualité" value="{{old('titre')?? $actualite->titre}}" >
                            </div>
                        </div>
                        <div class="form-group row d-flex">
                            <label for="colFormLabelSm" class="col-sm-3 col-form-label text-right">Tags:</label>
                            <div class="col-sm-9">
                                <input type="text" name="tags" data-role="tagsinput" placeholder="Tags" class="form-control" value="{{old('tags')?? $actualite->tags}}" />
                            </div>
                        </div>
                        <div class="form-group form-group row d-flex">
                            <label for="colFormLabelSm" class="col-sm-3 col-form-label text-right">Image de couverture:</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="image" placeholder="Image" value="{{old('image')?? $actualite->image}}" onchange="previewFile(this)" >
                            </div>
                        </div>
                        <div class="form-group row d-flex">
                            <label for="colFormLabelSm" class="col-sm-3 col-form-label text-right">Catégorie:</label>
                            <div class="col-sm-9">
                                <select name="categorie" id="options" class="form-control form-control custom-select select2-show-search">
                                    <option  selected="" value="">Veuillez choisir le tribunal de grande instance </option>
                                    @foreach ($categorie as $item)
                                    <option @if ($actualite->category_id == $item->uuid)
                                        selected

                                    @endif  value="{{$item->uuid}}">{{$item->titre}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 offset-1 thumbnail">
                            <img id="preview" src="{{ asset('storage/'.$actualite->image_couverture)}}" alt="image de couverture" class="thumbimg ">
                    </div>
                </div>
                <div class="col-md-12 mt-2">
                    <div class="form-group form-group row d-flex mx-2">
                        <label for="colFormLabelSm" class="col-sm-2 col-form-label text-right">Description:</label>
                        <div class="col-sm-10">
                            <textarea id="my-textarea" class="form-control descriptionText" name="body" placeholder="Description" rows="2">{{old('body')?? $actualite->body}}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer text-center">
                <button class="btn btn-outline-default btn-sm mr-2"><i class="fas fa-edit"></i> {{$button}}</button>
                @if ($actualite->uuid !=null)
                <a type="button" class="btn btn-outline-default btn-sm mod mr-2" href="{{route('actualite-liste')}}" ><i class="fas fa-undo    "></i> Annuler</a>
                @if ($actualite->publish ==false)
                <button type="button" class="btn btn-outline-success btn-sm mr-2" data-toggle="modal" data-target="#publish{{$actualite->uuid}}" data-whatever="@mdo"><i class="fas fa-check-double"></i> Publier</button>
                @else
                <button type="button" class="btn btn-outline-default btn-sm mr-2" data-toggle="modal" data-target="#publish{{$actualite->uuid}}" data-whatever="@mdo"><i class="fas fa-ban    "></i> Brouillon</button>
                @endif
                @endif
            </div>
            <div class="d-flex justify-content-end">
                @if ($actualite->uuid !=null)
                <a type="button" class="btn btn-danger btn-sm mr-2 text-light mod" data-toggle="modal" data-target="#exampleModal{{$actualite->uuid}}" data-whatever="@fat"><i class="fas fa-trash-alt text-light"></i>Supprimer</a>
                @include('vendor.partials._confirmation_modal', ['modalUrl'=>'publish','idModal' => "publish".$actualite->uuid,'uuid'=>$actualite->uuid,'message'=>'Vous êtes sur le point de modifier l\'affichage de l\'article '.$actualite->titre])
                @endif
            </div>
        </div>

    </form>
</div>
</div>
@if ($actualite->uuid != null)

@include('vendor.partials._confirmation_modal', ['modalUrl'=>'actualite-delete','uuid'=>$actualite->uuid,'idModal' => "exampleModal".$actualite->uuid,'message'=>'Vous êtes sur le point de supprimer l\'article '.$actualite->titre])
@endif



@endsection
@push('head')
<script>
    (function($) {
    $('.descriptionText').richText();
})(jQuery);

 //affichage de la photo de profil-------------
 function previewFile(input){
            var file = $('input[type="file"]').get(0).files[0];

                if (file) {
                    var reader = new FileReader();
                    reader.onload = function() {
                        $('#preview').attr('src', reader.result);
                    }
                    reader.readAsDataURL(file)
                }
        }

</script>
@endpush
