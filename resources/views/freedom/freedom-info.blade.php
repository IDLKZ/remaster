@extends('layout')

@section('content')

    <div class="container mx-auto">
        <div class="row">
            <div class="shadow-lg my-5 w-100 rounded-lg border border-success">
                <div class="col-12 text-center text-lg-left" style="background: #398f30; color: white; padding: 20px 10px 20px 10px">
                    <h2 class="text-white d-none d-lg-inline">Freedom Finance Credit - получение онлайн кредита/рассрочку</h2>
                    <h4 class="text-white d-inline d-lg-none">Freedom Finance Credit - получение онлайн кредита/рассрочку</h4>
                </div>

            </div>
            @if($data)
                <div class="col-12 py-3 px-2">
                    <ul class="list-group my-3">
                        @if(isset($data["result"]))
                            <li class="list-group-item d-flex align-items-center">
                                Статус:
                                @if($data["result"] == "REJECTED")
                                    <span class="badge badge-danger badge-pill ml-2">
                                    Отказано
                                </span>
                                @endif
                                @if($data["result"] == "APPROVED")
                                    <span class="badge badge-info badge-pill ml-2">
                                    Принято в обработку
                                </span>
                                @endif
                                @if($data["result"] == "ISSUED")
                                    <span class="badge badge-success badge-pill ml-2">
                                    Заявка завершена
                                </span>
                                @endif
                            </li>
                        @endif

                        @if(isset($data["uuid"]))
                            <li class="list-group-item d-flex align-items-center">
                                Уникальный идентификатор:
                                <span class="badge badge-danger badge-pill ml-2">
                                    {{$data["uuid"]}}
                            </span>
                            </li>
                        @endif
                        @if(isset($data["alternative_reason"]))
                            <li class="list-group-item d-flex align-items-center">
                                Причина:
                                <span class="badge badge-danger badge-pill ml-2">
                                    {{$data["alternative_reason"]}}
                            </span>
                            </li>
                        @endif
                        @if(isset($data["alternative_sum"]))
                            <li class="list-group-item d-flex align-items-center">
                                Альтернативная сумма:
                                <span class="badge badge-danger badge-pill ml-2">
                                    {{$data["alternative_sum"]}}
                            </span>
                            </li>
                        @endif
                        @if(isset($data["approved_params"]))
                            <li class="list-group-item d-flex align-items-center">
                                Месяцы:
                                <span class="badge badge-info badge-pill ml-2">
                                    {{$data["approved_params"]["period"]}}
                                </span>
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                Сумма:
                                <span class="badge badge-info badge-pill ml-2">
                                    {{$data["approved_params"]["principal"]}} KZT
                                </span>
                            </li>

                            <li class="list-group-item d-flex align-items-center">
                                Месячная оплата:
                                <span class="badge badge-info badge-pill ml-2">
                                    {{$data["approved_params"]["monthly_payment"]}} KZT
                                </span>
                            </li>
                        @endif
                        @if(isset($data["product"]))
                            <li class="list-group-item d-flex align-items-center">
                                Тип:
                                @if($data["product"] == "REMASTERKZ" || $data["product"] == "REMASTERKZ_24")
                                    <span class="badge badge-info badge-pill ml-2">
                                        Рассрочка
                                    </span>
                                @endif
                                @if($data["product"] == "REMASTERKZ_CR" || $data["product"] == "REMASTERKZ_CR48")
                                    <span class="badge badge-info badge-pill ml-2">
                                        Кредит
                                    </span>
                                @endif
                            </li>
                        @endif
                        @if(isset($data["iin"]))
                            <li class="list-group-item d-flex align-items-center">
                                ИИН:
                                <span class="badge badge-danger badge-pill ml-2">
                                    {{$data["iin"]}}
                            </span>
                            </li>
                        @endif
                        @if(isset($data["mobile_phone"]))
                            <li class="list-group-item d-flex align-items-center">
                                ИИН:
                                <span class="badge badge-danger badge-pill ml-2">
                                    {{$data["mobile_phone"]}}
                            </span>
                            </li>
                        @endif
                        @if(isset($data["first_name"]))
                            <li class="list-group-item d-flex align-items-center">
                                ИМЯ:
                                <span class="badge badge-danger badge-pill ml-2">
                                    {{$data["first_name"]}}
                            </span>
                            </li>
                        @endif
                        @if(isset($data["last_name"]))
                            <li class="list-group-item d-flex align-items-center">
                                Фамилия:
                                <span class="badge badge-danger badge-pill ml-2">
                                    {{$data["last_name"]}}
                            </span>
                            </li>
                        @endif
                        @if(isset($data["middle_name"]))
                            <li class="list-group-item d-flex align-items-center">
                                Отчество:
                                <span class="badge badge-danger badge-pill ml-2">
                                    {{$data["middle_name"]}}
                            </span>
                            </li>
                        @endif
                    </ul>
                    <hr/>
                </div>
            @endif


        </div>
    </div>

@endsection
