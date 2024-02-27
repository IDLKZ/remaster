<div class="container mx-auto">
    <div class="row">
        <div class="shadow-lg my-5 w-100 rounded-lg border border-success">
            <div class="col-12 text-center text-lg-left" style="background: #398f30; color: white; padding: 20px 10px 20px 10px">
                <h2 class="text-white d-none d-lg-inline">Freedom Finance Credit - получение онлайн кредита/рассрочку</h2>
                <h4 class="text-white d-inline d-lg-none">Freedom Finance Credit - получение онлайн кредита/рассрочку</h4>
            </div>
            @if($data)
                <div class="col-12 py-3 px-2">
                    <ul class="list-group my-3">
                        <li class="list-group-item d-flex align-items-center">
                            Статус:
                            @if($data["result"] == "REJECTED")
                                <span class="badge badge-danger badge-pill ml-2">
                                    Отказано
                                </span>
                            @endif
                            @if($data["result"] == "APPROVED")
                                <span class="badge badge-success badge-pill ml-2">
                                    Принято в обработку
                                </span>
                            @endif
                            @if($data["result"] == "ISSUED")
                                <span class="badge badge-success badge-pill ml-2">
                                    Заявка завершена
                                </span>
                            @endif
                        </li>
                        @if($data["result"] == "APPROVED")
                            @if($showSendButton)
                                <br/>
                                <div class="my-3">
                                    <a class="btn btn-success text-white" wire:click="sendSMSCode()">Отправить СМС на прохождение биометрии для завершения заявки</a>
                                </div>
                            @endif
                        @endif
                        @if($data["alternative_reason"])
                            <li class="list-group-item d-flex align-items-center">
                                Причина:
                                <span class="badge badge-danger badge-pill ml-2">
                                    {{$data["alternative_reason"]}}
                            </span>
                            </li>
                        @endif
                        @if($data["alternative_sum"])
                            <li class="list-group-item d-flex align-items-center">
                                Альтернативная сумма:
                                <span class="badge badge-danger badge-pill ml-2">
                                    {{$data["alternative_sum"]}}
                            </span>
                            </li>
                        @endif
                        @if($data["approved_params"])
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
                                Предоплата:
                                <span class="badge badge-info badge-pill ml-2">
                                    {{$data["approved_params"]["prepayment_amount"]}} KZT
                                </span>
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                Месячная оплата:
                                <span class="badge badge-info badge-pill ml-2">
                                    {{$data["approved_params"]["monthly_payment"]}} KZT
                                </span>
                            </li>
                        @endif
                        @if($data["product"])
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
                    </ul>
                    <hr/>
                    @if($additional_data)
                        <ul class="list-group my-3">
                            @if($additional_data["borrower_data"])
                                @if($additional_data["borrower_data"]["iin"])
                                    <li class="list-group-item d-flex align-items-center">
                                        ИИН Заявителя:{{$additional_data["borrower_data"]["iin"]}}
                                    </li>
                                @endif
                                @if($additional_data["borrower_data"]["email"])
                                    <li class="list-group-item d-flex align-items-center">
                                        ИИН Заявителя:{{$additional_data["borrower_data"]["email"]}}
                                    </li>
                                @endif
                                @if($additional_data["borrower_data"]["full_name"])
                                    <li class="list-group-item d-flex align-items-center">
                                        ФИО Заявителя:{{$additional_data["borrower_data"]["full_name"]}}
                                    </li>
                                @endif
                                    @if($additional_data["borrower_data"]["mobile_phone"])
                                        <li class="list-group-item d-flex align-items-center">
                                            Номер Заявителя:{{$additional_data["borrower_data"]["mobile_phone"]}}
                                        </li>
                                    @endif
                                    @if($additional_data["borrower_data"]["borrower_type"])
                                        <li class="list-group-item d-flex align-items-center">
                                            Тип Заявителя:{{$additional_data["borrower_data"]["borrower_type"]}}
                                        </li>
                                    @endif
                                    @if($additional_data["borrower_data"]["document_number"])
                                        <li class="list-group-item d-flex align-items-center">
                                            Номер Документа:{{$additional_data["borrower_data"]["document_number"]}}
                                        </li>
                                    @endif
                                    @if($additional_data["borrower_data"]["document_issue_date"])
                                        <li class="list-group-item d-flex align-items-center">
                                            Дата Документа:{{$additional_data["borrower_data"]["document_issue_date"]}}
                                        </li>
                                    @endif
                            @endif
                                @if($additional_data["signed_at"])
                                    <li class="list-group-item d-flex align-items-center">
                                        Дата Подписания:{{$additional_data["signed_at"]}}
                                    </li>
                                @endif
                        </ul>
                    @endif
                    <hr/>
                </div>
            @endif
        </div>


    </div>
</div>





