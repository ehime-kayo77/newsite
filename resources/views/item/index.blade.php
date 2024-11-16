@extends('adminlte::page')

@section('title', 'レシピ一覧')

@section('content_header')
    <h1>レシピ一覧</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="card col-md-12">
            <div class="card-header d-flex align-items-center justify-content-between">       
                <div class="mr-3">
                    <a class="btn btn-outline-primary" href="{{ url('items') }}" role="button">一覧表示</a>
                </div>

                <!-- 検索バー -->    
                <form action="{{ url('items') }}" method="post" class="d-flex align-items-center flex-grow-1">
                    @csrf
                    <div class="mr-3">
                        <select class="form-control" aria-label="Default select example" name="type" style="width: 200px;">
                            <option value="">カテゴリーを選択</option>
                            <option value="1" @if( $type == '1') selected @endif >主菜</option>
                            <option value="2" @if( $type == '2') selected @endif >副菜</option>
                            <option value="3" @if( $type == '3') selected @endif >汁物</option>
                            <option value="4" @if( $type == '4') selected @endif >めん類</option>
                            <option value="5" @if( $type == '5') selected @endif >スイーツ</option>
                            <option value="6" @if( $type == '6') selected @endif >その他</option>
                        </select> 
                    </div>

                    <div class="mr-3">             
                        <input type="search" class="form-control" name="keyword" value="{{ $keyword }}" placeholder="検索キーワードを入力">
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary mr-3">検索</button>
                    </div>
                </form>

                <!-- レシピ登録ボタン --> 
                <div>
                    <a href="{{ url('items/add') }}" class="btn btn-default">レシピ登録</a>
                </div>
            </div> 

            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>レシピ名</th>
                            <th>カテゴリー</th>
                            <th>おすすめの季節</th>
                            <th>調理時間（分）</th>
                            <th>費用（１人分）</th>
                            <th>詳細</th>
                            <th>編集</th>
                            <th>削除</th>
                            <th>更新日</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    @if($item->type == '1')
                                        主菜
                                    @elseif($item->type == '2')
                                        副菜
                                    @elseif($item->type == '3')
                                        汁物
                                    @elseif($item->type == '4')
                                        めん類
                                    @elseif($item->type == '5')
                                        スイーツ
                                    @else
                                        その他
                                    @endif
                                </td>
                                <td>{{ $item->season }}</td>
                                <td>{{ $item->duration_in_minutes }}</td>
                                <td>{{ '￥' . number_format ($item->cost_per_meal) }}</td>
                                <td><a href="/items/detail/{{$item->id}}" class="btn btn-primary" target="_blank" >詳細</a></td>
                                <td><a href="/items/edit/{{$item->id}}" class="btn btn-primary" target="_blank" >編集</a></td>
                                <td>
                                    <form action="{{ url('items/delete') }}" method="post"
                                        onsubmit="return confirm('削除します。よろしいですか？');">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <input type="submit" value="削除" class="btn btn-danger">
                                    </form>
                                </td>
                                <td>{{$item->updated_at->format('Y-m-d')}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- フッターここから -->
    <footer>
        <nav aria-label="Page navigation">
            <div class="pagination justify-content-end">
            {{ $items->links('vendor.pagination.bootstrap-4') }}
            </div>
        </nav>
        </footer> 
</div>
@stop
@section('css')
@stop

@section('js')
@stop
