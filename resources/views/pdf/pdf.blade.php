<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daily Footfall Report</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px; text-align: center; }
        th { background-color: #f4f4f4; }
        .red { color: red; }
        .green { color: green; }
        .gray { color: gray; }
    </style>
</head>
<body>
    <h1>Raport {{ $date }}</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Week {{ $week }}</th>
                <th>2024</th>
                <th>2024 W-1</th>
                <th>2023</th>
                <th>Diff '24 to '23</th>
                <th>Diff '24 to '24 W-1</th>
                <th>Avg no. of visitors</th>
                <th>Diff '24 to Avg</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rows as $day => $data)
                <tr>
                    <td>{{ $day }}</td>
                    <td>{{ $data['2024'] }}</td>
                    <td>{{ $data['2024W1'] }}</td>
                    <td class="{{ $data['2024'] === null ? 'gray' : '' }}">
                        {{ $data['2023'] }}
                    </td>
                    <td class="{{ $data['diff_2024_2023'] !== null ? ($data['diff_2024_2023'] >= 0 ? 'green' : 'red') : '' }}">
                        {{ $data['diff_2024_2023'] }}
                    </td>
                    <td class="{{ $data['diff_2024_2024W1'] !== null ? ($data['diff_2024_2024W1'] >= 0 ? 'green' : 'red') : '' }}">
                        {{ $data['diff_2024_2024W1'] }}
                    </td>
                    <td>{{ $data['avgVisitors'] }}</td>
                    <td class="{{ $data['diff_2024_avg'] !== null ? ($data['diff_2024_avg'] >= 0 ? 'green' : 'red') : '' }}">
                        {{ $data['diff_2024_avg'] }}
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Total:</th>
                <th>{{ $totals['2024'] }}</th>
                <th>{{ $totals['2024W1'] }}</th>
                <th>{{ $totals['2023'] }}</th>
                <th class="{{ $totals['diff_2024_2023'] >= 0 ? 'green' : 'red' }}">
                    {{ $totals['diff_2024_2023'] }}
                </th>
                <th class="{{ $totals['diff_2024_2024W1'] >= 0 ? 'green' : 'red' }}">
                    {{ $totals['diff_2024_2024W1'] }}
                </th>
                <th>{{ $totals['avgVisitors'] }}</th>
                <th class="{{ $totals['diff_2024_avg'] >= 0 ? 'green' : 'red' }}">
                    {{ $totals['diff_2024_avg'] }}
                </th>
            </tr>
        </tfoot>
    </table>
</body>
</html>
