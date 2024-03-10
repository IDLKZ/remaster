<div class="table-responsive-sm">
    <table class="table table-striped" id="freedomRequests-table">
        <thead>
            <tr>
                <th>ИИН</th>
        <th>Телефон</th>
        <th>Код верификации</th>
        <th>Почта заявителя</th>
        <th>Продукт</th>
        <th>Период</th>
        <th>Сумма</th>
        <th>Уникальный ID</th>
        <th>Отправлено</th>
        <th>Результат</th>
        <th>Статус</th>
        <th>Статус Код</th>
        <th>Дата</th>
                <th colspan="3">Действия</th>
            </tr>
        </thead>
        <tbody>
        @foreach($freedomRequests as $freedomRequest)
            <tr>
                <td>{{ $freedomRequest->iin }}</td>
            <td>{{ $freedomRequest->mobile_phone }}</td>
            <td>{{ $freedomRequest->verification_sms_code }}</td>
            <td>{{ $freedomRequest->email }}</td>
            <td>{{ $freedomRequest->product }}</td>
            <td>{{ $freedomRequest->period }}</td>
            <td>{{ $freedomRequest->principal }}</td>
            <td>{{ $freedomRequest->uuid }}</td>
            <td>{{ $freedomRequest->is_success ? "Отправлено" : "Не отправлено" }}</td>
            <td>{{ $freedomRequest->result}}</td>
            <td>{{ $freedomRequest->status}}</td>
            <td>{{ $freedomRequest->status_code}}</td>
            <td>{{ $freedomRequest->created_at->format("H:i d/m/Y") }}</td>
                <td>
                    {!! Form::open(['route' => ['freedomRequests.destroy', $freedomRequest->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('freedomRequests.show', [$freedomRequest->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('freedomRequests.edit', [$freedomRequest->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Вы уверены?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="flex justify-content-center align-items-center w-100">
        {{$freedomRequests->links()}}
    </div>
</div>
