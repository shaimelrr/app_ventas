<!-- resources/views/categories/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-18u1deH06tSOhYX9Oh5McC5m4Tjgi1j2G8EUF7FA5xZlbm2c0s6BceY5D6yxzFptf4N62kp3hEoBlTxQoxz7NA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        .header {
            background: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
        .header h1 {
            margin: 0;
        }
        .table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }
        .table th, .table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .table th {
            background: #333;
            color: #fff;
        }
        .actions {
            display: flex;
            gap: 10px;
        }
        .btn {
            padding: 5px 10px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            color: #fff;
            border-radius: 5px;
        }
        .btn-edit {
            background-color: #5cb85c;
        }
        .btn-delete {
            background-color: #d9534f;
        }
        .btn-add {
            background-color: #0275d8;
            margin-bottom: 20px;
        }
        .btn-print {
            background-color: #5bc0de;
            margin-bottom: 20px;
            margin-left: 10px;
        }
        .btn-clients {
            background-color: #f0ad4e;
            margin-bottom: 20px;
            margin-left: 10px;
        }
    </style>
    <script>
        function printReport() {
            window.print();
        }
    </script>
</head>
<body>
    <div class="header">
        <h1>Categories</h1>
    </div>
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div>
            <a href="{{ route('categories.create') }}" class="btn btn-add">
                <i class="fas fa-plus"></i> Añadir Categoria
            </a>
            <button onclick="printReport()" class="btn btn-print">
                <i class="fas fa-print"></i> Imprimir Reporte
            </button>
            <a href="{{ route('clients.index') }}" class="btn btn-clients">
                <i class="fas fa-users"></i> Clientes
            </a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Detail</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->detail }}</td>
                        <td>{{ $category->status ? 'Active' : 'Inactive' }}</td>
                        <td class="actions">
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-edit">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
