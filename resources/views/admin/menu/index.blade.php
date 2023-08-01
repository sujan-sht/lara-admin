@extends('admin.layouts.app')

@section('content')
    <x-index-page name="menu" route="menus">
        <x-slot name="content">
            @livewire('admin.menu.menu-table')
        </x-slot>
    </x-index-page>
@endsection
