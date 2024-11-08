@extends('adminlte::page')

@section('title', 'レシピ詳細')

@section('content_header')
    <h1>レシピ詳細</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="input-group input-group-sm">
                        <!-- ぱんくずリスト -->
                        <div class="row ms-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('login') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{ url('items') }}">レシピ一覧</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">レシピ詳細</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="detail col">
                        <ul class="list-group">
                        <li class="list-group-item list-group-item-info">※レシピ詳細</li>
                        <li class="list-group-item id">ID:{{$item->id}}</li>   
                        <li class="list-group-item name">レシピ名：{{$item->name}}</li>
                        <li class="list-group-item type">カテゴリー：
                        @if($item->type == '1')
                            主菜
                        @elseif($item->type == '2')
                            副菜
                        @elseif($item->type == '3')
                            汁物
                        @elseif($item->type == '4')
                            めん類
                        @elseif($item->type == '4')
                            スイーツ
                        @else
                            その他
                        @endif
                        </li>
                        <li class="list-group-item brand">おすすめの季節：{{$item->season}}</li>
                        <li class="list-group-item brand">調理時間（分）：{{$item->duration_in_minutes}}</li>
                        <li class="list-group-item price">費用（１人分）：￥{{ number_format($item->cost_per_meal) }}</li>
                        <li class="list-group-item detail">商品説明</li>
                        <li class="list-group-item detail">{!! nl2br(e($item->detail)) !!}</li>
                        </ul>
                    <!-- 登録日時・更新日時 -->
                        <div class="created_at mt-3">登録日{{$item->created_at->format('Y-m-d')}}</div>
                        <div class="updated_at">更新日{{$item->updated_at->format('Y-m-d')}}</div>            
                    </div> 
                    <!-- レシピ画像 -->           
                    <div class="image col d-block">
                        @if($item->season == '1')
                        <img src="{{ asset('kayoimages/woman.jpg')}}" class="img-fluid w-80" alt="春">
                        @elseif($item->season == '2')
                        <img src="{{ asset('kayoimages/woman.jpg')}}" class="img-fluid w-80" alt="夏">
                        @elseif($item->season == '3') 
                        <img src="{{ asset('kayoimages/woman.jpg')}}" class="img-fluid w-50" alt="秋">
                        @elseif($item->season == '4')
                        <img src="{{ asset('kayoimages/woman.jpg')}}" class="img-fluid w-80" alt="冬">
                        @else
                        <img src="{{ asset('kayoimages/woman.jpg')}}" class="img-fluid w-80" alt="その他">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
