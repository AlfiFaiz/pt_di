<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quality and Safety</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-doughnutlabel"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body { font-family: Arial, sans-serif; font-size: 10px; }
        table { width: 100%; border-collapse: collapse; font-size: 10px; }
        th, td { border: 1px solid black; padding: 4px; text-align: left; }
        th { background-color: #347ec9; color: white; }
        h1, p { margin: 0; }
    </style>
</head>
<body class="bg-gray-100 text-xs"> 

<!-- Header -->
<header class="bg-white px-6 py-2 border-b border-gray-300 shadow-md">
    <div class="grid grid-cols-3 items-center">
        <!-- Logo -->
        <div>
            <img src="{{ asset('images/icon.png') }}" alt="Company Logo" class="h-12">


        </div>

        <!-- Title -->
        <div class="text-center">
            <h1 class="text-xl font-bold uppercase">LIST OF ENGINEERING ORDER</h1>
            <p class="text-sm">Program: Re-assembly and Customizing</p>
        </div>

        <!-- Aircraft Information -->
        <div class="text-xs leading-tight text-left">
            <p><strong>AC. TYPE:</strong> {{ $aircraft->aircraft_type }}</p>
            <p><strong>AC. SERIAL NUMBER:</strong> </p>
            <p><strong>AC. REGISTRATION:</strong> {{ $aircraft->registration }}</p>
            <p><strong>AC. OWNER:</strong> {{ $aircraft->customer }}</p>
        </div>
    </div>
</header>



<!-- Wrapper Scroll -->
<div class="mt-6 bg-white p-3 rounded-lg shadow-lg mx-4">
    <div class="overflow-auto border border-gray-600 p-2">
        
        @foreach ($orders->groupBy('type_order') as $type => $group)
            <!-- Header Type Order -->
            <h3 class="bg-gray-800 text-white text-sm font-bold px-3 py-1 mt-2">{{ $type }}</h3>
            
            <!-- Tabel -->
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Engineering Order No</th>
                        <th>Subject Title</th>
                        <th>Start Date</th>
                        <th>Finish Date</th>
                        <th>Insp Stamp</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($group as $index => $order)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $order->engineering_order_no }}</td>
                            <td>{{ $order->subject_title }}</td>
                            <td>{{ $order->start_date }}</td>
                            <td>{{ $order->finish_date }}</td>
                            <td>{{ $order->insp_stamp }}</td>
                            <td class="text-center font-bold">
                                @if ($order->finish_date && $order->insp_stamp)
                                    <span class="text-green-600">DONE</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        @endforeach
    </div>
    <!-- Section Inspection Stamp -->
<div class="mt-6 text-center">
    <h3 class="text-sm font-semibold">INSPECTION STAMP.</h3>
    <div class="flex justify-center mt-2">
        <img src="{{ asset('images/inspection_stamp.png') }}" alt="Inspection Stamp" class="h-16">
    </div>
</div>

</div>

</body>
</html>
