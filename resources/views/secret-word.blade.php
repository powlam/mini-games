@extends('layouts.main')

@section('title', 'Secret word')

@section('main')
    <div class="p-4 text-center bg-stone-200 dark:bg-stone-700 rounded shadow-xl">
        <h1 class="font-bold text-xl tracking-wide">Find the <span class="font-black text-shadow">Secret word</span></h1>

        <livewire:word />
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
