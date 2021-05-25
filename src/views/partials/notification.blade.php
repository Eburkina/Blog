
    @if(\Session::has('success') )

        <div class="alert bg-success  radius-bordered  alert-dismissible fade show" role="alert" >
            <span class="ml-2 mt-1"> 
                <i class=" fa fa-check-square-o text-white" aria-hidden="true"  ></i>
                {!! session('success') !!}
            </span>
            <button  class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

