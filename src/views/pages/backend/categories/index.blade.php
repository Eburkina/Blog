@extends('Blog::layouts.master')
@section('content')
<section class="dashboard">

    <div class="row">
        <div class="col-md-12 mb-2">
             @include('partials._notifications')
        </div>
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Catégorie</h3>
                    <div class="ml-auto pageheader-btn">
                        <a href="{{route('categorie-add')}}" class="btn btn-secondary btn-icon text-white">
                            <span>
                                <i class="fe fe-plus"></i>
                            </span> Ajouter catégorie
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data-table1" class="table table-striped table-bordered text-nowrap w-100">
                            <thead>
                                <tr>
                                    <th class="wd-15p">Titre</th>
                                    <th class="wd-15p">Date création</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categorie as $item)
                                    <tr>

                                        <td class=""> <a data-toggle="tooltip" data-placement="top" title="Voir le détail" href="{{route('categorie-edit', $item->uuid)}}">{{$item->titre}}</a></td>
                                        <td class=""> <a data-toggle="tooltip" data-placement="top" title="Voir le détail" href="{{route('categorie-edit', $item->uuid)}}">{{$item->created_at}}</a></td>

                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- TABLE WRAPPER -->
            </div>
            <!-- SECTION WRAPPER -->
        </div>
    </div>
</section>
@endsection
@push('head')
<script src="{{asset('js/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('js/datatable/datatable.js')}}"></script>
<script src="{{asset('js/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('js/datatable/fileexport/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('js/datatable/fileexport/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('js/datatable/fileexport/jszip.min.js')}}"></script>
<script src="{{asset('js/datatable/fileexport/pdfmake.min.js')}}"></script>
<script src="{{asset('js/datatable/fileexport/vfs_fonts.js')}}"></script>
<script src="{{asset('js/datatable/fileexport/buttons.html5.min.js')}}"></script>
<script src="{{asset('js/datatable/fileexport/buttons.print.min.js')}}"></script>
<script src="{{asset('js/datatable/fileexport/buttons.colVis.min.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush
