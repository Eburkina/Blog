@extends('Blog::layouts.master')
@section('content')
<section class="dashboard">
  
    <div class="container">

      <div class="row">
        @include('Blog::partials.sidebar')
        <div class="col-md-9 mb-5 mt-5" >
          <div class="dashboard-contenu"><br>
            @include('Blog::partials.notification')

         



            <h5 class="text-center mb-4">
              Categories
            </h5>
        
            <table class="table table-bordered">
                    <thead class="-sm">
                      <tr>
                        <th scope="col">N°</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Action</th>
                      

                      </tr>
                    </thead>
                    <tbody>

                   
                      @foreach ($categorie as $item)    
                      <tr>
                        
                        <td> <span>#{{ $loop->iteration }}</span></td>
                        <td> <a href="" class="text-dark" data-tooltip="Cliquer pour plus d'information" >  <span>{{$item->titre}}</span>  </a> </td>
                        <td> <a href="{{route('categorie-edit', $item->uuid)}}" class="text-dark" data-tooltip="Cliquer pour plus d'information" >  <span><i class="fas fa-edit"></i></span>  </a> </td>
                      </tr>
                      @endforeach
                                

                    </tbody>
                  </table>

                </div>
                <div class="text-center">

                  {{$categorie->links()}}
                </div>
        </div>
    </div>
    </div>
    </section>
@endsection