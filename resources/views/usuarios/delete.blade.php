@section('button')
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete">
        {{__('custom.delete-button')}}
    </button>
@endsection

@section('modal')
<!-- Modal -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('custom.alert-message')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{__('custom.aler-menssage2')}}
            </div>
            <div class="modal-footer">
                <form action="{{route('usuarios.destroy', $user)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('custom.cancel-button')}}</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
