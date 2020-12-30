@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
         <a href="{!! route('contacts.index') !!}">Контакт</a>
      </li>
      <li class="breadcrumb-item active">Создать</li>
    </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                @include('coreui-templates::common.errors')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus-square-o fa-lg"></i>
                                <strong>Создать контакт</strong>
                            </div>
                            <div class="card-body">
                                {!! Form::open(['route' => 'contacts.store']) !!}

                                   @include('contacts.fields')

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
           </div>
    </div>
@endsection
@push('scripts')
    <script src="/js/jquery.inputmask.js"></script>
    <script>
        $(document).ready(function(){
            $('#phone').inputmask({"mask": "+9 (999) 999-9999"}); //specifying options
        });
    </script>
@endpush
