@extends('layouts.admin')
@section('title')
@parent Новости
@endsection
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Добавить новость</h1>
</div>
<div class="raw">
    @include('inc.messages')
    <form method="post" action="{{ route('admin.news.store') }}">
        @csrf
        <div class="form-group mt-2">
            <label for="category_id">Категория</label>
            <select name="category_id" id="category_id"
                class="form-control @error('category_id') alert-danger @enderror">
                <option selected disabled>Выберите категорию...</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected(old('category_id')==$category->id)>
                    {{ $category->title }}
                </option>
                @endforeach
            </select>
            @error('category_id')
            <strong style="color: red;">{{ $message }}</strong>
            @enderror
        </div>
        <div class="form-group mt-2">
            <label for="source_id">Источник</label>
            <select name="source_id" id="source_id" class="form-control @error('source_id') alert-danger @enderror">
                <option selected disabled>Выберите источник...</option>
                @foreach ($sources as $source)
                <option value="{{ $source->id }}" @selected(old('source_id')==$source->id)>
                    {{ $source->title }}
                </option>
                @endforeach
            </select>
            @error('source_id')
            <strong style="color: red">{{ $message }}</strong>
            @enderror
        </div>
        <div class="form-group mt-2">
            <label for="title">Заголовок</label>
            <input class="form-control @error('title') alert-danger @enderror" type="text" name="title" id="title"
                value="{{ old('title') }}">
            @error('title')
            <strong style="color: red">{{ $message }}</strong>
            @enderror
        </div>
        <div class="form-group mt-2">
            <label for="author">Автор</label>
            <input class="form-control @error('author') alert-danger @enderror" type="text" name="author" id="author"
                value="{{ old('author') }}">
            @error('author')
            <strong style="color: red">{{ $message }}</strong>
            @enderror
        </div>
        <div class="form-group mt-2">
            <label for="image">Изображение</label>
            <input class="form-control @error('image') alert-danger @enderror" type="file" name="image" id="image">
            @error('image')
            <strong style="color: red">{{ $message }}</strong>
            @enderror
        </div>
        <div class="form-group mt-2">
            <label for="status">Статус</label>
            <select class="form-control @error('status') alert-danger @enderror" name="status" id="status">
                <option @selected(old('status')==='DRAFT' )>DRAFT</option>
                <option @selected(old('status')==='ACTIVE' )>ACTIVE</option>
                <option @selected(old('status')==='BLOCKED' )>BLOCKED</option>
            </select>
            @error('status')
            <strong style="color: red">{{ $message }}</strong>
            @enderror
        </div>
        <div class="form-group mt-2">
            <label for="description">Описание</label>
            <textarea class="form-control @error('description') alert-danger @enderror" name="description"
                id="description">
                {!! old('description') !!}
            </textarea>
            @error('description')
            <strong style="color: red">{{ $message }}</strong>
            @enderror
        </div>
        <button class="btn btn-success mt-4" type="submit">Сохранить</button>
    </form>
</div>
@endsection