<!-- resources/views/clients/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Client</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-18u1deH06tSOhYX9Oh5McC5m4Tjgi1j2G8EUF7FA5xZlbm2c0s6BceY5D6yxzFptf4N62kp3hEoBlTxQoxz7NA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            width: 50%;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        input[type=text], input[type=date], select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            background-color: #0275d8;
            color: white;
            cursor: pointer;
            border-radius: 4px;
            text-decoration: none;
        }
        .btn-cancel {
            background-color: #d9534f;
        }
        .btn-container {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Client</h2>
        <form action="{{ route('clients.update', $client->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="ci">CI:</label>
                <input type="text" id="ci" name="ci" value="{{ old('ci', $client->ci) }}" required>
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name', $client->name) }}" required>
            </div>
            <div class="form-group">
                <label for="birth_date">Birth Date:</label>
                <input type="date" id="birth_date" name="birth_date" value="{{ old('birth_date', optional($client->birth_date)->format('Y-m-d')) }}" required>
            </div>

            <div class="form-group">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="male" {{ old('gender', $client->gender) === 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender', $client->gender) === 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ old('gender', $client->gender) === 'other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>
            <div class="btn-container">
                <button type="submit" class="btn">Update</button>
                <a href="{{ route('clients.index') }}" class="btn btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
