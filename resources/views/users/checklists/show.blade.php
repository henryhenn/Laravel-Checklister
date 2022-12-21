@extends('layouts.app')

@section('content')
    <div class="fade-in">
        <div class="card">
            <div class="card-body">
                {{ $checklist->name }}
            </div>
        </div>
    </div>
@endsection
