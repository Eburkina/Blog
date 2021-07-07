
<div id={!! $idModal !!} class="modal fade" aria-labelledby="exampleModalLabel" >
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header ">
                    <h4 class="modal-title  text-danger">Attention!!!</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <input name='tout'>

                    <div class="row mb-2">
                        <div class="col-md-12 col-sm-12">
                            <p class=""> {{ $message }}.</p>
                            <p class="text-warning ">Veuillez Confirmer la suppression</p>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <form action="{{route($modalUrl,$uuid)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm">Confirmer</button>
                    </form>
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Fermer</button>
                </div>
            </form>
        </div>
    </div>

