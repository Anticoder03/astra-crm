<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dynamic Form')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900">

    <!-- Navbar -->
    <nav class="bg-blue-600 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-xl font-bold">Astra CRM</div>
            <div class="space-x-4">
                <a href="/" class="hover:underline">Home</a>
                <a href="/form/investments" class="hover:underline">Investments</a>
                <a href="/form/policies" class="hover:underline">Policies</a>
                <a href="/form/followups" class="hover:underline">Follow-ups</a>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main class="py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center py-4">
        &copy; {{ date('Y') }} Astra CRM. All rights reserved.
    </footer>

</body>
</html>
