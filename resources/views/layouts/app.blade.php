<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astra CRM</title>
    <link rel="favicon" href='favicon.ico' type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-blue-600 text-white p-4 flex justify-between">
        <div class="text-xl font-bold">Astra CRM</div>
        <div>
            <a href="/" class="px-3 hover:underline">Home</a>
            <a href="/customers" class="px-3 hover:underline">Customers</a>
        </div>
    </nav>

    <div class="flex flex-1">

        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md p-4">
            <ul class="space-y-4">
                <li><a href="/" class="block text-gray-700 hover:text-blue-600">Dashboard</a></li>
                <li><a href="/customers" class="block text-gray-700 hover:text-blue-600">Manage Customers</a></li>
                <li><a href="/investments" class="block text-gray-700 hover:text-blue-600">Investments</a></li>
                <li><a href="/policies" class="block text-gray-700 hover:text-blue-600">Policies</a></li>
                <li><a href="/followups" class="block text-gray-700 hover:text-blue-600">Follow Ups</a></li>
                <li><a href="/analytics" class="block text-gray-700 hover:text-blue-600">Analytics</a></li>
                <!-- Add more sidebar links here -->
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>

    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center p-4">
        &copy; {{ date('Y') }} Astra CRM. All rights reserved.
    </footer>

</body>
</html>
