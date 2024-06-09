<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Link Harvester')</title>
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">

    <!-- JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.2/cdn.min.js" defer></script>
</head>
<body>
    <div class="container">
        <header class="header">
            <h1 class="text-3xl font-bold text-gray-800">@yield('title', 'Link Harvester')</h1>
        </header>
        <main class="content">
            <div class="my-6">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
