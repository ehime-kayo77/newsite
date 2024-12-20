@extends('adminlte::page')

@section('title', '商品登録')

@section('content_header')
    <h1>レシピ登録</h1>
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
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="レシピ名" required>
                        </div>

                        <div class="form-group">
                            <label for="type">カテゴリー</label>
                                <select class="form-control" aria-label="Default select example" name="type" value="{{ old('type') }}" placeholder="カテゴリーを選択" required>
                                    <option disabled {!! old('type') === null ? "selected" : "" !!}>カテゴリーを選択</option>
                                    <option value="1" {!! old('type') === 1 ? "selected" : "" !!}>主菜</option>
                                    <option value="2" {!! old('type') === 2 ? "selected" : "" !!}>副菜</option>
                                    <option value="3" {!! old('type') === 3 ? "selected" : "" !!}>汁物</option>
                                    <option value="4" {!! old('type') === 4 ? "selected" : "" !!}>めん類</option>
                                    <option value="5" {!! old('type') === 5 ? "selected" : "" !!}>スイーツ</option>
                                    <option value="6" {!! old('type') === 6 ? "selected" : "" !!}>その他</option>
                                </select> 
                        </div>

                        <div class="form-group">
                            <label for="type">おすすめの季節</label>
                                <select class="form-control" aria-label="Default select example" name="season" value="{{ old('season') }}" placeholder="おすすめの季節" required>
                                    <option disabled {!! old('season') === null ? "selected" : "" !!}>おすすめの季節を選択</option>
                                    <option value="1" {!! old('season') === 1 ? "selected" : "" !!}>春</option>
                                    <option value="2" {!! old('season') === 2 ? "selected" : "" !!}>夏</option>
                                    <option value="3" {!! old('season') === 3 ? "selected" : "" !!}>秋</option>
                                    <option value="4" {!! old('season') === 4 ? "selected" : "" !!}>冬</option>
                                    <option value="5" {!! old('season') === 5 ? "selected" : "" !!}>その他</option>
                                </select> 
                        </div>

                        <div class="form-group">
                            <label for="type">調理時間（分）</label>
                            <input type="text" class="form-control" id="type" name="duration_in_minutes" value="{{ old('duration_in_minutes') }}" placeholder="調理時間">
                        </div>

                        <div class="form-group">
                            <label for="type">費用（1人分）</label>
                            <input type="text" class="form-control" id="type" name="cost_per_meal" value="{{ old('cost_per_meal') }}"placeholder="費用">
                        </div>

                        <div class="form-group">
                            <label for="detail">レシピ材料</label>
                            <input type="text" class="form-control" id="detail" name="detail" value="{{ old('detail') }}" placeholder="レシピ材料" required>
                        </div>

                        <div class="form-group">
                            <label for="detail">movie</label>
                            <input type="text" class="form-control" id="link" name="link" value="{{ old('link') }}" placeholder="作り方動画">
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
