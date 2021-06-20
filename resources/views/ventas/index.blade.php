@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 class="float-left">Lista de Ventas</h2>
                <a href="{{route('ventas.create')}}">
                    <button type="button" class="btn btn-success float-right">Agregar Venta</button>
                </a>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">MetodoPago</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Total</th>
                        <th scope="col" class="justify-content-center">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($ventas as $venta)
                        <tr>
                            <td>{{$venta->name}}</td>
                            <td>{{$venta->descripcion}}</td>
                            <td>{{$venta->metodoPago}}</td>
                            <td>{{$venta->cantidad}}</td>
                            <td>{{$venta->total}}</td>
                            <td>
                                <button type="button" class="btn btn-dark" data-toggle="modal"
                                        data-target="#show{{$venta->id}}">
                                    {{__('custom.show')}}
                                </button>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#edit{{$venta->id}}">
                                    {{__('custom.edit-button')}}
                                </button>
                                @role("admin")
                                <button type="button" class="btn btn-danger" data-toggle="modal" 
                                data-target="#delete{{$venta->id}}">
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
        @foreach($ventas as $venta)
        <!-- Modal mostrar -->
            <div class="modal fade" id="show{{$venta->id}}" tabindex="-1" role="dialog" aria-labelledby="delete"
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
                            <h5 class="card-title">{{$venta->name}}</h5>
                            <p class="card-text">Descripción: {{$venta->descripcion}}</p>
                            <p class="card-text">MetodoPago: {{$venta->metodoPago}}</p>
                            <p class="card-text">Cantidad: {{$venta->cantidad}}</p>
                            <p class="card-text">Total: {{$venta->total}}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{__('custom.back')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Modal editar -->
            <div class="modal fade" id="edit{{$venta->id}}" tabindex="-1" role="dialog" aria-labelledby="delete"
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
                                    <form action="{{route('ventas.update',$venta->id)}}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="form-group">
                                            <label for="name">Nombre</label>
                                            <div>
                                                <input id="name" type="text"
                                                       class="form-control @error('name') is-invalid @enderror"
                                                       name="name" value="{{$venta->name}}" required autocomplete="name"
                                                       autofocus>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="descripcion">Descripción</label>
                                            <div>
                                                <input id="descripcion" type="text"
                                                       class="form-control @error('descripcion') is-invalid @enderror"
                                                       name="descripcion" value="{{$venta->descripcion}}" required autocomplete="descripcion"
                                                       autofocus>
                                                @error('descripcion')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="metodoPago">MetodoPago</label>
                                            <div>
                                                <input id="metodoPago" type="text"
                                                       class="form-control @error('metodoPago') is-invalid @enderror"
                                                       name="metodoPago" value="{{$venta->metodoPago}}" required autocomplete="metodoPago"
                                                       autofocus>
                                                @error('metodoPago')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="cantidad">Cantidad</label>
                                            <div>
                                                <input id="cantidad" type="text"
                                                       class="form-control @error('cantidad') is-invalid @enderror"
                                                       name="cantidad" value="{{$venta->cantidad}}" required autocomplete="cantidad"
                                                       autofocus>
                                                @error('cantidad')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="total">Cantidad</label>
                                            <div>
                                                <input id="total" type="text"
                                                       class="form-control @error('total') is-invalid @enderror"
                                                       name="total" value="{{$venta->total}}" required autocomplete="total"
                                                       autofocus>
                                                @error('total')
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
            <div class="modal fade" id="delete{{$venta->id}}" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
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
                            <form action="{{route('ventas.destroy', $venta)}}" method="POST">
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
