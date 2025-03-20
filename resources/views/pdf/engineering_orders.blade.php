<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Engineering Orders</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Engineering Orders for {{ $aircraft->aircraft_type ?? 'Unknown Aircraft' }}</h2>
    <p>Registration: {{ $aircraft->registration ?? 'N/A' }} - Customer: {{ $aircraft->customer ?? 'N/A' }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Engineering Order No</th>
                <th>Subject Title</th>
                <th>Start Date</th>
                <th>Finish Date</th>
                <th>Insp Stamp</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $index => $order)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $order->engineering_order_no }}</td>
                    <td>{{ $order->subject_title }}</td>
                    <td>{{ $order->start_date }}</td>
                    <td>{{ $order->finish_date }}</td>
                    <td>{{ $order->insp_stamp ? 'DONE' : '' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
