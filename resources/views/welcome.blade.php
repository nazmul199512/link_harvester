<!DOCTYPE html>
<html>
<head>
    <title>Laravel 11 with Alpine.js</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <div x-data="{ message: 'Hello, Alpine!' }">
        <h1 x-text="message"></h1>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>