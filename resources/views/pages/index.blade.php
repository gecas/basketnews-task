@extends('layout')

@section('content')
    <game-list
        :count='@json($count)'
        :dates='@json($dates)'
        :games='@json($games)'
    ></game-list>
@endsection

