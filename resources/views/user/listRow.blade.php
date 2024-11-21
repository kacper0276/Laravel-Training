<tr>
    <td>{{ $userData['id'] }}</td>
    <td>{{ $userData['name'] }}</td>
    <td>
        <a href="{{
            route('blade.user.details', [
                'userId' => $userData['id']
            ])
        }}">
            Szczegóły
        </a>
    </td>
</tr>
