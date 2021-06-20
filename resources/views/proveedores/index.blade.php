@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 class="float-left">Lista de Proveedores</h2>
                <a href="{{route('proveedores.create')}}">
                    <button type="button" class="btn btn-success float-right">Agregar Proveedor</button>
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
                    @foreach ($proveedores as $proveedor)
                        <tr>
                            <td>{{$proveedor->name}}</td>
                            <td>{{$proveedor->rfc}}</td>
                            <td>{{$proveedor->email}}</td>
                            <td>{{$proveedor->direccion}}</td>
                            <td>{{$proveedor->telefono}}</td>
                            <td>
                                <button type="button" class="btn btn-dark" data-toggle="modal"
                                        data-target="#show{{$proveedor->id}}">
                                    {{__('custom.show')}}
                                </button>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#edit{{$proveedor->id}}">
                                    {{__('custom.edit-button')}}
                                </button>
                                @role("admin")
                                <button type="button" class="btn btn-danger" data-toggle="modal" 
                                data-target="#delete{{$proveedor->id}}">
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
        @foreach($proveedores as $proveedor)
    <!-- Modal mostrar -->
        <div class="modal fade" id="show{{$proveedor->id}}" tabindex="-1" role="dialog" aria-labelledby="delete"
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
                        <h5 class="card-title">{{$proveedor->name}}</h5>
                        <p class="card-text">RFC: {{$proveedor->rfc}}</p>
                        <p class="card-text">Correo: {{$proveedor->email}}</p>
                        <p class="card-text">Dirección: {{$proveedor->direccion}}</p>
                        <p class="card-text">Teléfono: {{$proveedor->telefono}}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{__('custom.back')}}</button>
                    </div>
                </div>
            </div>
        </div>
    <!-- Modal editar -->
        <div class="modal fade" id="edit{{$proveedor->id}}" tabindex="-1" role="dialog" aria-labelledby="delete"
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
                               <form action="{{route('proveedores.update',$proveedor->id)}}" method="POST">
                                   @csrf
                                   @method('put')
                                   <div class="form-group">
                                       <label for="name">Nombre</label>
                                       <div>
                                           <input id="name" type="text"
                                                  class="form-control @error('name') is-invalid @enderror"
                                                  name="name" value="{{$proveedor->name}}" required autocomplete="name"
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
                                                  name="rfc" value="{{$proveedor->rfc}}" required autocomplete="rfc"
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
                                                  name="email" value="{{$proveedor->email}}" required
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
                                                  name="direccion" value="{{$proveedor->direccion}}" required autocomplete="direccion"
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
                                                  name="telefono" value="{{$proveedor->telefono}}" required autocomplete="telefono"
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
        <div class="modal fade" id="delete{{$proveedor->id}}" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
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
                        <form action="{{route('proveedores.destroy', $proveedor)}}" method="POST">
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
