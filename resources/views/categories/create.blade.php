<!-- resources/views/categories/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Category</title>
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
        .form-container {
            background: #fff;
            padding: 20px;
            margin: 20px 0;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input, .form-group textarea, .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-group input[type="checkbox"] {
            width: auto;
            display: inline-block;
        }
        .form-group .status-label {
            display: inline-block;
            margin-left: 10px;
            font-weight: normal;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            color: #fff;
            border-radius: 5px;
            margin-right: 10px;
        }
        .btn-submit {
            background-color: #5cb85c;
        }
        .btn-cancel {
            background-color: #d9534f;
        }
        .error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Create Category</h1>
    </div>
    <div class="container">
        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-container">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <label for="detail">Detail</label>
                    <textarea id="detail" name="detail" rows="4">{{ old('detail') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" name="status" required>
                        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-submit">Create Category</button>
                <a href="{{ route('categories.index') }}" class="btn btn-cancel">Cancel</a>
            </form>
        </div>
    </div>
</body>
</html>
