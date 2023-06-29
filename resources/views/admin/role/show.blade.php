@extends('admin.layouts.app')

@section('content')
<x-show-page name="role" route="roles">
    <x-slot name="content">

        @livewire('admin.role.role-has-permission-table', ['role' => $role])


    </x-slot>
</x-show-page>
@endsection
