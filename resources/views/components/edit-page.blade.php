<div>
    <div class="content-body">
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
                <li class="breadcrumb-item"><a href="{{adminCreateRoute($route)}}">{{$name}}</a></li>
                <span class="mx-1">></span>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit {{$name}}</a></li>
            </ol>
        </div>

        <div class="container-fluid">

            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit {{$name}}</h4>
                            <div>
                                <a class="btn btn-primary btn-sm" href="{{adminRedirectRoute($route)}}">Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-validation">
                                <form action="{{ adminUpdateRoute($route, $model->id) }}" method="POST" enctype="multipart/form-data" class="{{ $formclass ?? '' }}" id="{{ $formid ?? '' }}">
                                    @csrf
                                    @method('PATCH')
                                    {{ $content ?? '' }}
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
