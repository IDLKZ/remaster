@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('abouts.index') !!}">О Нас</a>
          </li>
          <li class="breadcrumb-item active">Редактировать</li>
        </ol>
    <div class="container-fluid">
         <div class="animated fadeIn">
             @include('coreui-templates::common.errors')
             <div class="row">
                 <div class="col-lg-12">
                      <div class="card">
                          <div class="card-header">
                              <i class="fa fa-edit fa-lg"></i>
                              <strong>Редактировать</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($about, ['route' => ['abouts.update', $about->id], 'method' => 'patch']) !!}

                              @include('abouts.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'skill_title' );
        CKEDITOR.replace( 'projects_title' );
        CKEDITOR.replace( 'warranty_title' );
    </script>
@endpush
