@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('advantages.index') !!}">Advantage</a>
          </li>
          <li class="breadcrumb-item active">Изменить</li>
        </ol>
    <div class="container-fluid">
         <div class="animated fadeIn">
             @include('coreui-templates::common.errors')
             <div class="row">
                 <div class="col-lg-12">
                      <div class="card">
                          <div class="card-header">
                              <i class="fa fa-edit fa-lg"></i>
                              <strong>Изменить преимущество</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($advantage, ['route' => ['advantages.update', $advantage->id], 'method' => 'patch','files' => true]) !!}

                              @include('advantages.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection
