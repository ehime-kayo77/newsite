@extends('adminlte::page')

@section('title', '商品登録')

@section('content_header')
    <h1>商品登録</h1>
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

            <div class="card card-primary">
                <form method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">レシピ名</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="名前" required>
                        </div>

                        <div class="form-group">
                            <label for="type">カテゴリー</label>
                                <select class="form-control" aria-label="Default select example" name="type" placeholder="種別" required>
                                    <option value="">カテゴリーを選択</option>
                                    <option value="1">主菜</option>
                                    <option value="2">副菜</option>
                                    <option value="3">汁物</option>
                                    <option value="4">めん類</option>
                                    <option value="5">スイーツ</option>
                                    <option value="6">その他</option>
                                </select> 
                        </div>

                        <div class="form-group">
                            <label for="type">おすすめの季節</label>
                                <select class="form-control" aria-label="Default select example" name="season" required>
                                    <option value="">カテゴリーを選択</option>
                                    <option value="1">春</option>
                                    <option value="2">夏</option>
                                    <option value="3">秋</option>
                                    <option value="4">冬</option>
                                    <option value="5">その他</option>
                                </select> 
                        </div>

                        <div class="form-group">
                            <label for="type">調理時間（分）</label>
                            <input type="text" class="form-control" id="type" name="duration_in_minutes" placeholder="種別">
                        </div>

                        <div class="form-group">
                            <label for="type">費用（1人分）</label>
                            <input type="text" class="form-control" id="type" name="cost_per_meal" placeholder="種別">
                        </div>

                        <div class="form-group">
                            <label for="detail">詳細</label>
                            <input type="text" class="form-control" id="detail" name="detail" value="{{ old('name') }}" placeholder="詳細説明" required>
                        </div>

                        <div class="form-group">
                            <label for="detail">movie</label>
                            <input type="text" class="form-control" id="link" name="link" value="{{ old('name') }}" placeholder="作り方動画">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">登録</button>
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
