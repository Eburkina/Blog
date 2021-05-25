@extends('Blog::layouts.master')
@section('content')
<section class="dashboard">
    <div class="container">
        <div class="row">
            @include('Blog::partials.sidebar')
            <div class="col-md-9 mb-5 mt-5" >
             @include('Blog::partials.notification')
                <div class="dashboard-contenu"><br>
                
                    <h5 class="text-center mb-4">Actualités</h5>
                   
                    <table class="table table-bordered">
                        <thead class="-sm">
                        <tr>
                            <th scope="col">N°</th>
                            <th scope="col">Titre</th>
                            <th scope="col">Categories</th>
                            <th scope="col">Action</th>

                        </tr>
                        </thead>
                        <tbody>

                    
                        @foreach ($actualite as $item)      
                        <tr>    
                            <td> <a href="" class="text-dark" data-tooltip="Cliquer pour plus d'information" >  <span>#{{$loop->iteration}}</span>  </a> </td>
                            <td> <a href="" class="text-dark" data-tooltip="Cliquer pour plus d'information" >  <span>{{$item->titre}}</span>  </a> </td>
                            <td> <a href="" class="text-dark" data-tooltip="Cliquer pour plus d'information" >  <span>{{$item->categorie->titre}} </span>  </a> </td>
                            <td> <a href="{{route('actualite-edit', $item->uuid)}}" class="text-dark" data-tooltip="Cliquer pour plus d'information" >  <span><i class="fas fa-edit"></i></span>  </a> </td>
                        </tr>
                        @endforeach   
                                    

                        </tbody>
                    </table>
                    <div class="center-text">
                        {{$actualite->links()}}
                    </div><br>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection