<div class="table-responsive-sm">
    <table class="table table-striped" id="freedomResponses-table">
        <thead>
            <tr>
                <th>Данные</th>
                <th colspan="3">Действия</th>
            </tr>
        </thead>
        <tbody>
        @foreach($freedomResponses as $freedomResponse)
            <tr>
            <td>
                <pre>
                    {{ json_encode($freedomResponse->data)}}
                </pre>
            </td>
                <td>
                    {!! Form::open(['route' => ['freedomResponses.destroy', $freedomResponse->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('freedomResponses.show', [$freedomResponse->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('freedomResponses.edit', [$freedomResponse->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
