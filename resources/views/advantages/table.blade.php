<div class="table-responsive-sm">
    <table class="table table-striped" id="advantages-table">
        <thead>
            <tr>
                <th>Заголовок</th>
        <th>Подзаголовок</th>
        <th>Изображение</th>
                <th colspan="3">Действия</th>
            </tr>
        </thead>
        <tbody>
        @foreach($advantages as $advantage)
            <tr>
                <td>{{ $advantage->title }}</td>
            <td>{{ $advantage->sub_title }}</td>
            <td><img src="{{ $advantage->image_url }}" style="max-width: 200px"></td>
                <td>
                    {!! Form::open(['route' => ['advantages.destroy', $advantage->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('advantages.show', [$advantage->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('advantages.edit', [$advantage->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Вы уверены?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
