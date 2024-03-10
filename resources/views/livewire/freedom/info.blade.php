<div class="container mx-auto">
    <div class="row">
        <div class="shadow-lg my-5 w-100 rounded-lg border border-success">
            <div class="col-12 text-center text-lg-left" style="background: #398f30; color: white; padding: 20px 10px 20px 10px">
                <h2 class="text-white d-none d-lg-inline">Freedom Finance Credit - получение онлайн кредита/рассрочку</h2>
                <h4 class="text-white d-inline d-lg-none">Freedom Finance Credit - получение онлайн кредита/рассрочку</h4>
            </div>
            @if($freedom_request)
                <div class="col-12 py-3 px-2">
                    <ul class="list-group my-3">
                        <li class="list-group-item d-flex align-items-center">
                            Статус:
                            @if($freedom_request->result == "REJECTED")
                                <span class="badge badge-danger badge-pill ml-2">
                                    Отказано
                                </span>
                            @endif
                            @if($freedom_request->result == "APPROVED")
                                <span class="badge badge-info badge-pill ml-2">
                                     Принято в обработку ( подтвердите биометрию отправленную в виде смс на ваш номер телефона )
                                </span>
                            @endif
                            @if($freedom_request->result == "ISSUED")
                                <span class="badge badge-success badge-pill ml-2">
                                    Выдана ( заявка завершена )
                                </span>
                            @endif
                        </li>
                        @if($freedom_request->result == "APPROVED")
                            @if($showSendButton && $this->send)
                                <br/>
                                <div class="my-3">
                                    <a class="btn btn-info text-white" wire:click="sendSMSCode()">Отправить СМС на прохождение биометрии для завершения заявки</a>
                                </div>
                            @else
                                @if($sendedBefore)
                                    <li class="list-group-item d-flex align-items-center text-warning">
                                        Вы ранее отправляли заявку, возможность отправить повторно будет возможно в: {{$sendedBefore->expired_at->format('d/m/Y H:i')}}
                                    </li>
                                @endif

                            @endif
                        @endif
                        @if($freedom_request->alternative_reason)
                            <li class="list-group-item d-flex align-items-center">
                                Причина:
                                <span class="badge badge-danger badge-pill ml-2">
                                    {{$freedom_request->alternative_reason}}
                            </span>
                            </li>
                        @endif
                        @if($freedom_request->alternative_sum)
                            <li class="list-group-item d-flex align-items-center">
                                Альтернативная сумма:
                                <span class="badge badge-warning badge-pill ml-2">
                                    {{$freedom_request->alternative_sum}}
                            </span>
                            </li>
                        @endif
                        @if($freedom_request->period)
                            <li class="list-group-item d-flex align-items-center">
                                Месяцы:
                                <span class="badge badge-info badge-pill ml-2">
                                    {{$freedom_request->period}}
                                </span>
                            </li>
                        @endif
                        @if($freedom_request->principal)
                            <li class="list-group-item d-flex align-items-center">
                                Сумма:
                                <span class="badge badge-info badge-pill ml-2">
                                    {{$freedom_request->principal}} KZT
                                </span>
                            </li>
                        @endif
                        @if($freedom_request->interest_rate)
                            <li class="list-group-item d-flex align-items-center">
                                Процентная ставка:
                                <span class="badge badge-info badge-pill ml-2">
                                    {{$freedom_request->interest_rate}}
                                </span>
                            </li>
                        @endif
                        @if($freedom_request->effective_rate)
                            <li class="list-group-item d-flex align-items-center">
                                Эффективная процентная ставка:
                                <span class="badge badge-info badge-pill ml-2">
                                    {{$freedom_request->effective_rate}}
                                </span>
                            </li>
                        @endif
                        @if($freedom_request->monthly_payment)
                            <li class="list-group-item d-flex align-items-center">
                                Месячная выплата:
                                <span class="badge badge-info badge-pill ml-2">
                                    {{$freedom_request->monthly_payment}}
                                </span>
                            </li>
                        @endif
                        @if($freedom_request->product)
                            <li class="list-group-item d-flex align-items-center">
                                Тип:
                                @if($freedom_request->product == "REMASTERKZ" || $freedom_request->product == "REMASTERKZ_24")
                                    <span class="badge badge-info badge-pill ml-2">
                                        Рассрочка
                                    </span>
                                @endif
                                @if($freedom_request->product == "REMASTERKZ_CR" || $freedom_request->product == "REMASTERKZ_CR48")
                                    <span class="badge badge-info badge-pill ml-2">
                                        Кредит
                                    </span>
                                @endif
                            </li>
                        @endif
                    </ul>


                </div>
            @endif
        </div>


    </div>
</div>





