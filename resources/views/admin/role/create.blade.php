@extends('admin.layouts.app')

@section('content')
<x-create-page name="role" route="roles">
    <x-slot name="content">
         @include('admin.layouts.modules.role.form')
    </x-slot>
 </x-create-page>
@endsection
