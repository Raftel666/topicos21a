@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 class="float-left">Lista de Productos</h2>
                <a href="{{route('productos.create')}}">
                    <button type="button" class="btn btn-success float-right">Agregar Producto</button>
                </a>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio</th>
                        <th scope="col" class="justify-content-center">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td>{{$producto->name}}</td>
                            <td>{{$producto->descripcion}}</td>
                            <td>{{$producto->cantidad}}</td>
                            <td>{{$producto->precio}}</td>
                            <td>
                                <button type="button" class="btn btn-dark" data-toggle="modal"
                                        data-target="#show{{$producto->id}}">
                                    {{__('custom.show')}}
                                </button>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#edit{{$producto->id}}">
                                    {{__('custom.edit-button')}}
                                </button>
                                @role("admin")
                                <button type="button" class="btn btn-danger" data-toggle="modal" 
                                data-target="#delete{{$producto->id}}">
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
        @foreach($productos as $producto)
        <!-- Modal mostrar -->
            <div class="modal fade" id="show{{$producto->id}}" tabindex="-1" role="dialog" aria-labelledby="delete"
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
                            <h5 class="card-title">{{$producto->name}}</h5>
                            <p class="card-text">Descripción: {{$producto->descripcion}}</p>
                            <p class="card-text">Cantidad: {{$producto->cantidad}}</p>
                            <p class="card-text">Precio: {{$producto->precio}}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{__('custom.back')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Modal editar -->
            <div class="modal fade" id="edit{{$producto->id}}" tabindex="-1" role="dialog" aria-labelledby="delete"
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
                                    <form action="{{route('productos.update',$producto->id)}}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="form-group">
                                            <label for="name">Nombre</label>
                                            <div>
                                                <input id="name" type="text"
                                                       class="form-control @error('name') is-invalid @enderror"
                                                       name="name" value="{{$producto->name}}" required autocomplete="name"
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
                                                       name="descripcion" value="{{$producto->descripcion}}" required autocomplete="descripcion"
                                                       autofocus>
                                                @error('descripcion')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="cantidad">Cántidad</label>
                                            <div>
                                                <input id="cantidad" type="text"
                                                       class="form-control @error('cantidad') is-invalid @enderror"
                                                       name="cantidad" value="{{$producto->cantidad}}" required autocomplete="cantidad"
                                                       autofocus>
                                                @error('cantidad')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="precio">Precio</label>
                                            <div>
                                                <input id="precio" type="text"
                                                       class="form-control @error('precio') is-invalid @enderror"
                                                       name="precio" value="{{$producto->precio}}" required autocomplete="precio"
                                                       autofocus>
                                                @error('precio')
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
            <div class="modal fade" id="delete{{$producto->id}}" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
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
                            <form action="{{route('productos.destroy', $producto)}}" method="POST">
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
