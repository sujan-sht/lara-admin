<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{adminRedirectRoute($route)}}">{{$name}}</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
                <h4 class="page-title">Create {{$name}}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="text-xl-end">
                        <a href="{{adminRedirectRoute($route)}}" class="btn btn-success ">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ adminStoreRoute($route) }}" method="POST" enctype="multipart/form-data" class="{{ $formclass ?? '' }}" id="{{ $formid ?? '' }}">
                        @csrf
                        {{ $content ?? '' }}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
