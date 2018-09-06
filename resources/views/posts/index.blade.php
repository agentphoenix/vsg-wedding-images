@extends('layouts.app')

@section('content')
    <post-list :posts="{{ $posts }}"></post-list>
@endsection
