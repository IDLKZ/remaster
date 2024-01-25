    <div class="container mx-auto">
        <div class="row">
            <div class="shadow-lg my-5 w-100 rounded-lg border border-success">
                <div class="col-12 text-center text-lg-left" style="background: #398f30; color: white; padding: 20px 10px 20px 10px">
                    <h2 class="text-white d-none d-lg-inline">Freedom Finance Credit - получение онлайн кредита/рассрочку</h2>
                    <h4 class="text-white d-inline d-lg-none">Freedom Finance Credit - получение онлайн кредита/рассрочку</h4>
                </div>
                @if($stepId == 1 || $stepId == 2)
                    <div class="col-12 md:col-6 py-5">
                        <div class="form-group">
                            <label for="iin">ИИН</label>
                            <input wire:model="iin" type="text" class="form-control" id="iin" aria-describedby="iin" placeholder="ИИН">
                            @error('iin') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="iin">Телефон</label>
                            <input wire:model="mobile_phone" type="text" class="form-control" id="mobile_phone" aria-describedby="mobile_phone" placeholder="Телефон">
                            @error('mobile_phone') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        @if($stepId == 2)
                            <div class="form-group">
                                <label for="code">Код пришедший на телефон</label>
                                <input wire:model="code" type="text" class="form-control" id="code" aria-describedby="code" placeholder="Код">
                                @error('code') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        @endif
                        @if($stepId == 1)
                            <div class="text-right">
                                    <button wire:loading.attr="disabled"
                                            wire:target="loading"
                                            wire:loading.attr="disabled"
                                            wire:click="sendOTP()"
                                            @unless(!$loading) disabled @endunless
                                            class="btn btn-success">
                                        Отправить
                                    </button>
                            </div>
                        @endif
                        @if($stepId == 2)
                            <div class="text-right">
                                    <button wire:loading.attr="disabled"
                                            wire:target="loading"
                                            wire:click="validateOTP()"
                                            @unless(!$loading) disabled @endunless
                                            class="btn btn-success">
                                        Отправить
                                    </button>
                            </div>

                        @endif
                    </div>
                @endif
                @if($stepId == 3)
                    <div class="col-12 md:col-6 py-5">
                        <div class="form-group">
                            <label for="iin">ИИН</label>
                            <input readonly wire:model="iin" type="text" class="form-control" id="iin" aria-describedby="iin" placeholder="ИИН">
                            @error('iin') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="iin">Телефон</label>
                            <input readonly wire:model="mobile_phone" type="text" class="form-control" id="mobile_phone" aria-describedby="mobile_phone" placeholder="Телефон">
                            @error('mobile_phone') <span class="text-danger">{{ $message }}</span> @enderror

                        </div>
                        <div class="form-group">
                            <label for="code">Код пришедший на телефон</label>
                            <input readonly wire:model="code" type="text" class="form-control" id="code" aria-describedby="code" placeholder="Код">
                            @error('code') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Ваша почта</label>
                            <input wire:model="email" type="email" class="form-control" id="email" aria-describedby="email" placeholder="Ваша почта">
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="types">Выберите тип кредита/рассрочки</label>
                            <select  class="form-control" wire:model="type_id" aria-label="Выберите ваш тип">
                                <option value="{{null}}">Выберите тип рассрочки/Кредита</option>
                                @foreach($types as $id => $type)
                                    <option value="{{$id}}">{{$type}}</option>
                                @endforeach
                            </select>
                            @error('type_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Сумма кредита</label>
                            <input wire:model="principal"
                                   type="number" min="100" max="100000000"
                                   class="form-control" id="principal" aria-describedby="principal" placeholder="Сумма кредитования/рассрочки">
                            @error('principal') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="text-right">
                            @if($showFinalButton)
                                <button
                                    x-bind:disabled="loading"
                                    id="sendToScrollButton"
                                    wire:loading.attr="disabled"
                                    wire:target="loading"
                                    wire:click="sendToScrollData()"
                                    @unless(!$loading) disabled @endunless
                                    type="submit"
                                    class="btn btn-success">Отправить</button>
                            @endif

                            @if($uuid)
                                <a class="text-success" href="{{route("freedom-info",$uuid)}}">Информация о заявке</a>
                            @endif
                        </div>

                    </div>
                @endif
            </div>


        </div>
    </div>

@push("scripts")
    <script>

    </script>
@endpush

