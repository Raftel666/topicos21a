@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 class="float-left">Lista de Clientes</h2>
                <a href="{{route('clientes.create')}}">
                    <button type="button" class="btn btn-success float-right">Agregar Cliente</button>
                </a>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">RFC</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col" class="justify-content-center">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($clientes as $cliente)
                        <tr>
                            <td>{{$cliente->name}}</td>
                            <td>{{$cliente->rfc}}</td>
                            <td>{{$cliente->email}}</td>
                            <td>{{$cliente->direccion}}</td>
                            <td>{{$cliente->telefono}}</td>
                            <td>
                                <button type="button" class="btn btn-dark" data-toggle="modal"
                                        data-target="#show{{$cliente->id}}">
                                    {{__('custom.show')}}
                                </button>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#edit{{$cliente->id}}">
                                    {{__('custom.edit-button')}}
                                </button>
                                @role("admin")
                                <button type="button" class="btn btn-danger" data-toggle="modal" 
                                data-target="#delete{{$cliente->id}}">
                                    {{__('custom.delete-button')}}
                                </button>
                                @endrole
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @foreach($clientes as $cliente)
        <!-- Modal mostrar -->
            <div class="modal fade" id="show{{$cliente->id}}" tabindex="-1" role="dialog" aria-labelledby="delete"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{__('custom.info')}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5 class="card-title">{{$cliente->name}}</h5>
                            <p class="card-text">RFC: {{$cliente->rfc}}</p>
                            <p class="card-text">Correo: {{$cliente->email}}</p>
                            <p class="card-text">Dirección: {{$cliente->direccion}}</p>
                            <p class="card-text">Teléfono: {{$cliente->telefono}}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{__('custom.back')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Modal editar -->
            <div class="modal fade" id="edit{{$cliente->id}}" tabindex="-1" role="dialog" aria-labelledby="delete"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{__('custom.info')}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-11 m-2">
                                    <form action="{{route('clientes.update',$cliente->id)}}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="form-group">
                                            <label for="name">Nombre</label>
                                            <div>
                                                <input id="name" type="text"
                                                       class="form-control @error('name') is-invalid @enderror"
                                                       name="name" value="{{$cliente->name}}" required autocomplete="name"
                                                       autofocus>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="rfc">RFC</label>
                                            <div>
                                                <input id="rfc" type="text"
                                                       class="form-control @error('rfc') is-invalid @enderror"
                                                       name="rfc" value="{{$cliente->rfc}}" required autocomplete="rfc"
                                                       autofocus>
                                                @error('rfc')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">{{ __('E-Mail Address') }}</label>
                                            <div>
                                                <input id="email" type="email"
                                                       class="form-control @error('email') is-invalid @enderror"
                                                       name="email" value="{{$cliente->email}}" required
                                                       autocomplete="email">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="direccion">Dirección</label>
                                            <div>
                                                <input id="direccion" type="text"
                                                       class="form-control @error('direccion') is-invalid @enderror"
                                                       name="direccion" value="{{$cliente->direccion}}" required autocomplete="direccion"
                                                       autofocus>
                                                @error('direccion')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="telefono">Teléfono</label>
                                            <div>
                                                <input id="telefono" type="text"
                                                       class="form-control @error('telefono') is-invalid @enderror"
                                                       name="telefono" value="{{$cliente->telefono}}" required autocomplete="telefono"
                                                       autofocus>
                                                @error('telefono')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-danger float-right m-1" data-dismiss="modal">
                                            {{__('custom.cancel-button')}}</button>
                                        <button type="submit"
                                                class="btn btn-primary float-right m-1">{{__('custom.update-button')}}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Modal eliminar -->
            <div class="modal fade" id="delete{{$cliente->id}}" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
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
                            <form action="{{route('clientes.destroy', $cliente)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">{{__('custom.cancel-button')}}</button>
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
