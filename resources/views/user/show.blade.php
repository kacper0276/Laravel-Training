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
    </ul>

    <div>
        {{ $user['html'] }}
        <br>
        <?php echo $user['html'] ?>
        <br>
        {!! $user['html'] !!} {{-- Render html tags not as string --}}
    </div>

@endsection
