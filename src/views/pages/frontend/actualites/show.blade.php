@extends('Blog::layouts.blog')
@section('blog')
<?php
setlocale(LC_TIME, "fr_FR", "French");
// $titre= $actualite->titre
?>
{{-- @extends('Blog::layouts.blog')
@section('blog')
<meta property="og:title" content="{{ $actualite->titre }}" />
<meta property="og:description" content="{!! $actualite->body !!} ">
<meta property="og:image" content="{{ asset('storage/'.$actualite->image_couverture) }}" />
<meta property="og:url" content="{{url()->current()}}">
<meta property="og:type" content="website" /> --}}
<style>
    form.formu {
    display: flex;
}
</style>
<section class="actualite">
    <div class="container">

        <div class="row">

          <!-- Blog Entries Column -->
          <h2 class="my-4 text-capitalize font-weight-bold">{{$actualite->titre}}</h2>
          <div class="col-md-8">


            <!-- Blog Post -->
            <div class="card my-4">
              <img class="card-img-top" src="{{asset('storage/'.$actualite->image_couverture)}}" alt="Card image cap"style="height:450px">
              <div class="card-body">
                <h2 class="card-title">{{$actualite->categorie->titre}}</h2>
                <p class="card-text">{!! $actualite->body !!}</p>

              </div>
              <div class="card-footer text-muted">
                  <div class="row">
                      <div class="col-12 col-md-12">
                        Posté le  {{  \Carbon\Carbon::parse($actualite->created_at)->formatLocalized('%d %B %Y')  }} par
                        <a href="#">{{$actualite->admin->nom}} {{$actualite->admin->prenom}}</a>
                      </div>

                  </div>

              </div>
              <div class=""><br>

                    <div class="sharethis-inline-share-buttons"></div>
                  <br>
            </div>
            </div>


          </div>

          <!-- Sidebar Widgets Column -->
          <div class="col-md-4">

            <!-- Search Widget -->
            <div class="card my-4">
              <h5 class="card-header">Rechercher</h5>
              <div class="card-body">
                <div class="input-group">
                    <form action="{{route('search')}}"  method="get" class="formu">

                        <input type="text"  name="search" class="form-control" placeholder="Rechercher des nouvelles...">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="submit">Chercher</button>
                        </span>
                    </form>
                </div>
              </div>
            </div>

            <!-- Categories Widget -->
            <div class="card my-3">
              <h5 class="card-header">Categories</h5>
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-12">
                    <ul class="list-group mb-0">
                      @foreach ($categorie as $item)
                        <li class="list-group-item">
                          <a href="{{route('acticlebycategorie', $item->uuid)}}">{{$item->titre}}</a>
                        </li>
                      @endforeach
                    </ul>
                  </div>

                </div>
              </div>
            </div>

            <!-- Side Widget -->
            <div class="card my-4">
              <h5 class="card-header">Tags</h5>
              <div class="card-body">
                <ul class="tags">
                    @foreach ($actualites as $item)

                    <li><a href="{{route('actubystags', $item->tags)}} " class="tag">{{$item->tags}}</a></li>
                    @endforeach

                </ul>
              </div>
            </div>


          </div>

        </div>
        <!-- /.row -->

      </div>
</section>

@endsection
