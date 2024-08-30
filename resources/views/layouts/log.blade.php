
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        .form-container {        
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 450px; 
            margin-top:50px; 
        }

        .form-container h3 {
            font-weight: bold;
            margin-bottom: 15px;
            background-color: #343a40; 
            color: #fff;
            padding: 10px;
            border-radius: 5px 5px 0 0; 
        }

        .form-container p {
            margin-top: -10px;
            margin-bottom: 20px;
            color: #656565;
        }

        .form-container .form-group {
            margin-bottom: 15px;
        }

        .form-container .btn-container {
            text-align: center; 
        }

        .form-container button {
            width: 25%; 
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        @yield('content')
    </div>
</body>
</html>