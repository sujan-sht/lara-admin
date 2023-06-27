@extends('admin.layouts.app')

@section('content')

<x-edit-page name="user" route="users" :model="$user">
   <x-slot name="content">
        @include('admin.layouts.modules.user.form')
   </x-slot>
</x-edit-page>
@endsection
