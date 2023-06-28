@extends('admin.layouts.app')

@section('content')
    <x-index-page name="permission" route="permissions">
        <x-slot name="content">
            @livewire('admin.permission.permission-table')
        </x-slot>
    </x-index-page>
@endsection
