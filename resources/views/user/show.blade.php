@extends('layout.main')

@section('title', 'Użytkownik')

@section('sidebar')
    @parent
    Sidebar z dziecka
@endsection

@section('content')
    <h3>Informacje o użytkowniku</h3>
    <ul>
        <li>ID: {{ $user['id'] }}</li>
        <li>Imię: {{ $user['firstName'] }}</li>
        <li>Nazwisko: {{ $user['lastName'] }}</li>
        <li>Miasto: {{ $user['city'] }}</li>

        <li>
            Wiek: {{ $user['age'] }}
            @if ($user['age'] >= 18)
                <div>Osoba dorosła</div>
            @elseif ($user['age'] >= 16)
                <div>Prawie dorosła</div>
            @else
                <div>Nastolatek</div>
            @endif
        </li>

        @isset($nick)
            ISSET - true
        @else
            ISSET - false
        @endisset

        @empty($nick)
            Empty - true
        @else
            Empty - false
        @endempty

    </ul>

    <div>
        {{ $user['html'] }}
        <br>
        <?php echo $user['html'] ?>
        <br>
        {!! $user['html'] !!} {{-- Render html tags not as string --}}
    </div>

@endsection
