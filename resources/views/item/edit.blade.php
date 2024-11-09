@extends('adminlte::page')

@section('title', 'レシピ編集')

@section('content_header')
    <h1>レシピ編集</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                       @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                       @endforeach
                    </ul>
                </div>
            @endif
            <div class="row ml-2 ">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('login') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{ url('items') }}">レシピ一覧</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">レシピ編集</li>
                                </ol>
                            </nav>
            </div>

            <div class="card card-primary">
            
                <form action="{{ route('edit', $item->id) }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">レシピ名</label>
                            <input type="text" class="form-control" name="name" value="{{ $item-> name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="type">カテゴリー</label>
                            <input type="text" class="form-control" name="type" value="{{ $item-> type }}" required>
                        </div>

                        <div class="form-group">
                            <label for="type">おすすめの季節</label>
                            <input type="text" class="form-control" name="season" value="{{ $item-> season }}" required>
                        </div>

                        <div class="form-group">
                            <label for="type">調理時間（分）</label>
                            <input type="text" class="form-control" name="duration_in_minutes" value="{{ $item->duration_in_minutes }}" required>
                        </div>

                        <div class="form-group">
                            <label for="type">費用（1人分）</label>
                            <input type="text" class="form-control" name="cost_per_meal" value="{{ $item-> cost_per_meal }}" required>
                        </div>

                        <div class="form-group">
                            <label for="detail">詳細</label>
                            <input type="text" class="form-control" name="detail" value="{{ $item-> detail }}" required>
                        </div>

                        <div class="form-group">
                            <label for="detail">movie</label>
                            <input type="text" class="form-control" id="link" name="link" placeholder="movie">
                        </div>
                    </div>
                    <!--  編集ボタン -->
                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">編集</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
