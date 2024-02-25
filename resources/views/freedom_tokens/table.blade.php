<div class="table-responsive-sm">
    <table class="table table-striped" id="freedomTokens-table">
        <thead>
            <tr>
                <th>Refresh Token</th>
        <th>Access Token</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($freedomTokens as $freedomToken)
            <tr>
                <td style="
 max-width: 100px;
 overflow: hidden;
 text-overflow: ellipsis;
 white-space: nowrap;
">{{ $freedomToken->refresh_token }}</td>
            <td style="
 max-width: 100px;
 overflow: hidden;
 text-overflow: ellipsis;
 white-space: nowrap;
">{{ $freedomToken->access_token }}</td>
                <td>
                    {!! Form::open(['route' => ['freedomTokens.destroy', $freedomToken->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('freedomTokens.show', [$freedomToken->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('freedomTokens.edit', [$freedomToken->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
