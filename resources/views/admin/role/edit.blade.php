@extends('admin.layouts.app')

@section('content')

<x-edit-page name="role" route="roles" :model="$role">
   <x-slot name="content">
        @include('admin.layouts.modules.role.form')
   </x-slot>
</x-edit-page>
@endsection

