<div class="table-responsive">
    <table class="table text-uppercase" id="sports-table">
        <thead>
            <tr>
                <th>Id</th>
        <th>Name</th>
        <th>Type</th>
        <th>Created At</th>
        <th>Updated At</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($sports as $sport)
            <tr>
                <td>{{ $sport->id }}</td>
            <td>{{ $sport->name }}</td>
            <td>{{ $sport->type }}</td>
            <td>{{ $sport->created_at }}</td>
            <td>{{ $sport->updated_at }}</td>
                <td>
                    {!! Form::open(['route' => ['sports.destroy', $sport->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('sports.show', [$sport->id]) }}" class='btn btn-outline-primary btn-xs'><i class="im im-icon-Information"></i></a>
                        <a href="{{ route('sports.edit', [$sport->id]) }}" class='btn btn-outline-primary btn-xs'><i
                                class="im im-icon-File-Edit"></i></a>
                        {!! Form::button('<i class="im im-icon-Remove"></i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
