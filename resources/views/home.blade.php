@extends('layouts.app')

@section('title-block')Главная страница@endsection

@section('content')
<h1>Главная страница</h1>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium ab
     quod deleniti vel accusantium unde reiciendis, libero error aliquid natus 
     sed nisi, in dignissimos a veritatis iusto repellat assumenda neque?
</p>
@endsection

@section('aside')
    @parent
    <p>Дополнительный текст</p>
@endsection