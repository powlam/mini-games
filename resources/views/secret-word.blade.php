@extends('layouts.main')

@section('title', 'Secret word')

@section('main')
    <div class="text-center">
        <h1 class="font-bold text-xl">Secret word</h1>

        <livewire:word secret='hello' />
    </div>
@endsection

@section('styles')
    @parent
    @livewireStyles
@endsection

@section('scripts')
    @parent
    @livewireScripts
@endsection
