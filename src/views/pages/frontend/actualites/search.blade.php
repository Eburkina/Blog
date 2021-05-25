@extends('Blog::layouts.blog')
@section('blog')
<style>
.container { margin-top: 20px; }
.mb20 { margin-bottom: 20px; } 

hgroup { padding-left: 15px; border-bottom: 1px solid #ccc; }
hgroup h1 { font: 500 normal 1.625em "Roboto",Arial,Verdana,sans-serif; color: #2a3644; margin-top: 0; line-height: 1.15; }
hgroup h2.lead { font: normal normal 1.125em "Roboto",Arial,Verdana,sans-serif; color: #2a3644; margin: 0; padding-bottom: 10px; }

.search-result .thumbnail { border-radius: 0 !important; }
.search-result:first-child { margin-top: 0 !important; }
.search-result { margin-top: 20px; }
.search-result .col-md-2 { border-right: 1px dotted #ccc; min-height: 140px; }
.search-result ul { padding-left: 0 !important; list-style: none;    display: flex;   margin-left: -1rem;  }
.search-result ul li { font: 400 normal .85em "Roboto",Arial,Verdana,sans-serif;  line-height: 30px;    padding: 1rem; }
.search-result ul li i { padding-right: 5px;  }
.search-result .col-md-7 { position: relative; }
.search-result h3 { font: 500 normal 1.375em "Roboto",Arial,Verdana,sans-serif; margin-top: 0 !important; margin-bottom: 10px !important; }
.search-result h3 > a, .search-result i { color: #248dc1 !important; }
.search-result p { font: normal normal 1.125em "Roboto",Arial,Verdana,sans-serif; } 
.search-result span.plus { position: absolute; right: 0; top: 126px; }
.search-result span.plus a { background-color: #248dc1; padding: 5px 5px 3px 5px; }
.search-result span.plus a:hover { background-color: #414141; }
.search-result span.plus a i { color: #fff !important; }
.search-result span.border { display: block; width: 97%; margin: 0 15px; border-bottom: 1px dotted #ccc; }
.search-result img {
	width: 8rem;
    height: 75%;
}
.search-result {
    
    display: flex;
}
.excerpet {
    margin-left: 1%;
}
</style>


{{-- @include('partials._breack') --}}
<div class="container">
    <hgroup class="mb20">
		<h1>Resultats Recherche</h1>
		<h2 class="lead"><strong class="text-danger">{{$search->count()}}</strong> résultats trouvés pour la recherche pour <strong class="text-danger">{{$recherche}}</strong></h2>								
	</hgroup>

    <section class="col-xs-12 col-sm-6 col-md-12">
    @foreach ($search as $items)

        <article class="search-result">
			<div class=" ">
				<a href="" title="Lorem ipsum" class="thumbnail">
                <img src="{{asset('storage/'.$items->image_couverture)}}" alt="Lorem ipsum" />
                </a>
			</div>
		
			<div class=" excerpet">
				<h3><a href="" title="">{{$items->titre}}</a></h3>
				<p>@if (strlen($items->body) > 500)
				
					{{Illuminate\Support\Str:: substr($items->body,0, 200)}}
					@else
					{{$items->body}}
				@endif</p>	
								
                {{-- <span class="plus"><a href="" title="{{$items->titre}}"><i class="fa fa-plus"></i></a></span> --}}
				<ul class="meta-search">
					<li><i class="fa fa-calendar"></i> <span>{{\Carbon\Carbon::parse($items->created_at)->formatLocalized('%d %b %Y')}}</span></li>
					
					<li><i class="fa fa-tag"></i><span>{{$items->tags}}</span></li>
					<li> <a href="{{route('actualites-show', $items->uuid)}}"><i>Lire plus</i></a> </li>
				</ul>
			</div>
			<span class="clearfix borda"></span>
		</article>        
    @endforeach
    <br>    
		  {{$search->withQueryString()->links() }}
	</section><br><br>
</div>
@endsection