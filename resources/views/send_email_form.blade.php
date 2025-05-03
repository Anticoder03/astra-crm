<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send CRM Notification</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-10">

    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Send CRM Notification</h1>

        <form action="{{ route('sendEmailToAllCustomers') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="subject" class="block text-gray-700">Subject</label>
                <input type="text" name="subject" id="subject" class="w-full p-3 border border-gray-300 rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="message" class="block text-gray-700">Message</label>
                <textarea name="message" id="message" rows="4" class="w-full p-3 border border-gray-300 rounded-md" required></textarea>
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white p-3 rounded-md hover:bg-blue-600">Send Email</button>
        </form>
    </div>

</body>
</html>
