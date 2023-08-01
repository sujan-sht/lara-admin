@extends('admin.layouts.app')

@section('content')
<x-create-page name="menu" route="menus">
   <x-slot name="content">
        @include('admin.layouts.modules.menu.form')
   </x-slot>
</x-create-page>
@endsection
