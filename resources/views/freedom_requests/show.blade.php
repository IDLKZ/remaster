@extends('layouts.app')

@section('content')
     <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('freedomRequests.index') }}">Freedom Request</a>
            </li>
            <li class="breadcrumb-item active">Detail</li>
     </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                 @include('coreui-templates::common.errors')
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card">
                             <div class="card-header">
                                 <strong>Details</strong>
                                  <a href="{{ route('freedomRequests.index') }}" class="btn btn-light">Назад</a>
                             </div>
                             <div class="card-body">
                                 @include('freedom_requests.show_fields')
                             </div>
                         </div>
                     </div>
                 </div>
          </div>
    </div>
@endsection
