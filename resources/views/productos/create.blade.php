@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Registrar Productos</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('productos.store') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripción</label>
                                <div class="col-md-6">
                                    <input id="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" value="{{ old('descripcion') }}" required autocomplete="descripcion">
                                    @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cantidad" class="col-md-4 col-form-label text-md-right">Cantidad</label>
                                <div class="col-md-6">
                                    <input id="cantidad" type="text" class="form-control @error('cantidad') is-invalid @enderror" name="cantidad" value="{{ old('cantidad') }}" required autocomplete="cantidad">
                                    @error('cantidad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="precio" class="col-md-4 col-form-label text-md-right">Precio</label>
                                <div class="col-md-6">
                                    <input id="precio" type="text" class="form-control @error('precio') is-invalid @enderror" name="precio" value="{{ old('precio') }}" required autocomplete="precio">
                                    @error('precio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
