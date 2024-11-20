@extends('layout.main')

@section('content')
    <html>
        <h1>Users list</h1>

        <taable>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nick</th>
                    <th>Opcje</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="3">FOREACH</td>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user['id'] }}</td>
                            <td>{{ $user['name'] }}</td>
                            <td>
                                <a href="{{
                                    route('blade.user.details', [
                                    'userId' => $user['id']
                                    ])
                                }}">
                                    Szczegóły
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tr>
            </tbody>
        </taable>
    </html>
@endsection
