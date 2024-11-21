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
                    <tr><td colspan="3">FOREACH</td></tr>
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

                    <tr><td colspan="3">FOR</td></tr>
                    @for ($i = 0; $i < count($users); $i++)
                        @if ($i == 2)
                            @continue
                        @endif
                        {{-- LUB --}}
                        {{-- @continue($i == 2) równoważny zapis--}}
                        <tr>
                            <td>{{ $users[$i]['id'] }}</td>
                            <td>{{ $users[$i]['name'] }}</td>
                            <td>
                                <a href="{{
                                    route('blade.user.details', [
                                    'userId' => $users[$i]['id']
                                    ])
                                }}">
                                    Szczegóły
                                </a>
                            </td>
                        </tr>
                        @if ($i == 1)
                            @break
                        @endif
                        {{-- LUB --}}
                        {{-- @break($i == 1) - równoważny zapis --}}
                    @endfor


            </tbody>
        </taable>
    </html>
@endsection
