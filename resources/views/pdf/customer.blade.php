<!DOCTYPE html>
<html>
<head>
    <title>Daftar Customers</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        h2 {
            text-align: center;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
        }
        th, td {
            border: 1px solid #333;
            padding: 6px 8px;
            text-align: left;
        }
        th {
            background-color: #eee;
        }
    </style>
</head>
<body>
    <h2>Daftar Customers</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Telp</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $index => $customer)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->nik }}</td>
                <td>{{ $customer->nama }}</td>
                <td>{{ $customer->telp }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
