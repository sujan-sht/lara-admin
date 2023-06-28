@extends('admin.layouts.app')

@section('content')

<x-edit-page name="permission" route="permissions" :model="$permission">
   <x-slot name="content">
        @include('admin.layouts.modules.permission.form')
   </x-slot>
</x-edit-page>
@endsection
