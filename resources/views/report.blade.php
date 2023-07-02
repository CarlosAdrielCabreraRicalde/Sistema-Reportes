@extends('layouts.app')

@section('content')
<div class="card text-white mb-3">
    <div class="card-header bg-info">Dashboard</div>
    <div class="card-body text-dark">
        @if(count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="" method="POST">
            {{csrf_field()}}
            <div class="form-group">
                <label for="category_id">Categoría</label>
                <select name="category_id" id="" class="form-control">
                        <option value="">General</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="severity">Severidad</label>
                <select name="severity" id="" class="form-control">
                    <option value="M">Menor</option>
                    <option value="N">Normal</option>
                    <option value="A">Alta</option>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" class="form-control" name="title" value="{{old('title')}}">
            </div>
            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea name="description" id="" cols="30" rows="10" class="form-control">{{old('description')}}</textarea>
            </div>
            <div class="form-group mt-3">
                <button class="btn btn-info">Registrar</button>
            </div>
        </form>
    </div>
</div>
@endsection
