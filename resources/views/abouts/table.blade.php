<div class="table-responsive-sm">
    <table class="table table-striped" id="abouts-table">
        <thead>
            <tr>
                <th>Заголовок</th>
        <th>Подзаголовок</th>
        <th>Опыт работы</th>
        <th>Описание опыта работы</th>
        <th>Количество проектов</th>
        <th>Описание проектов</th>
        <th>Гарантия</th>
        <th>Описание гаранта</th>
                <th colspan="3">Действие</th>
            </tr>
        </thead>
        <tbody>
        @foreach($abouts as $about)
            <tr>
                <td>{{ $about->title }}</td>
            <td>{{ $about->subtitle }}</td>
            <td>{{ $about->skill }}</td>
            <td>{!! $about->skill_title !!}</td>
            <td>{{ $about->projects }}</td>
            <td>{!! $about->projects_title !!}</td>
            <td>{{ $about->warranty }}</td>
            <td>{!! $about->warranty_title !!}</td>
                <td>
                    {!! Form::open(['route' => ['abouts.destroy', $about->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('abouts.show', [$about->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('abouts.edit', [$about->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
