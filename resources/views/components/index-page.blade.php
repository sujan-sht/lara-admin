<div>
    <div class="content-body">
        <!-- row -->
        <div class="page-titles">
            <ol class="breadcrumb">
                <li><h5 class="bc-title">{{$name}}</h5></li>
                <li class="breadcrumb-item">
                    <a href="{{route('dashboard')}}">
                        <i class="fas fa-home"></i>
                    Dashboard
                    </a>
                </li>
                <span class="mx-1">></span>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{$name}}</a></li>
            </ol>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive active-projects style-1">
                                <div class="tbl-caption">
                                    <h4 class="heading mb-0">{{$plural_name}}</h4>
                                    <div>
                                        <a class="btn btn-primary btn-sm" href="{{adminCreateRoute($route)}}" >+ Add {{$name}}</a>
                                        {{-- <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                                                + Invite Employee
                                                </button> --}}
                                    </div>
                                </div>
                                <hr class="separator">
                                <div class="p-2">
                                    {{ $content ?? '' }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
