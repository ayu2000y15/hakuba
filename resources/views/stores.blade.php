@extends('layouts.app')

@section('title', '店舗案内')

@section('content')
    <img src="{{ asset($background->file_path . $background->file_name) }}" alt="タイトル" class="w-full h-auto"
        style="object-fit: contain;">

@endsection