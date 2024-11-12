@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>レシピ管理　春夏秋冬</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
                <div class="card col-md-3 m-3">
                    <img src="{{ asset('kayoimages/spring.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">春のレシピ－Spring Recipes</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <form action="items" method="post">
                            @csrf
                            <input type="submit" class="btn btn-sm btn-dark" value="レシピを見る">
                            <input type="hidden" name="season" value="春">
                        </form>
                    </div>
                </div>
                
                <div class="card col-md-3 m-3">
                    <img src="{{ asset('kayoimages/summer.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">夏のレシピ－Summer Recipes</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <form action="items" method="post">
                            @csrf
                            <input type="submit" class="btn btn-sm btn-dark" value="レシピを見る">
                            <input type="hidden" name="season" value="夏">
                        </form>
                    </div>
                </div>
                
            <div class="w-100"></div>


                <div class="card  col-md-3 m-3">
                    <img src="{{ asset('kayoimages/autumn.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">秋のレシピ－Autumn Recipes</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <form action="items" method="post">
                            @csrf
                            <input type="submit" class="btn btn-sm btn-dark" value="レシピを見る">
                            <input type="hidden" name="season" value="秋">
                        </form>
                    </div>
                </div>
            

            
                <div class="card col-md-3 m-3">
                    <img src="{{ asset('kayoimages/winter.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">冬のレシピ－winter Recipes</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <form action="items" method="post">
                            @csrf
                            <input type="submit" class="btn btn-sm btn-dark" value="レシピを見る">
                            <input type="hidden" name="season" value="冬">
                        </form>
                    </div>
                </div>
            </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
