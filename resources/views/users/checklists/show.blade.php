@extends('layouts.app')

@section('content')
    <div class="fade-in">
        @livewire('checklist-show', ['checklist' => $checklist])
    </div>
@endsection
