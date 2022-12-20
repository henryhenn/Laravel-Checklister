@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">{{ $page->title }}</div>

        <div class="card-body">
            {!! $page->content !!}
        </div>
    </div>
@endsection
