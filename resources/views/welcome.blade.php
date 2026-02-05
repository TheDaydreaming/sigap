<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-blue-500 to-purple-600">

    <!-- Header Section -->
    <section class="relative flex items-center justify-center h-screen bg-cover bg-center" style="background-image: url('https://your-image-url.com');">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="text-center text-white z-10 px-6 md:px-12">
            <h1 class="text-4xl sm:text-5xl font-bold leading-tight mb-6">
                Selamat Datang di Aplikasi Kami!
            </h1>
            <p class="text-xl sm:text-2xl mb-6">
                Menyediakan solusi terbaik untuk kebutuhan Anda dengan teknologi terbaru.
            </p>
            <a href="/dashboard" class="inline-block py-3 px-6 bg-yellow-400 text-black font-semibold text-lg rounded-lg transition duration-300 transform hover:scale-105 hover:bg-yellow-500">
                Mulai Sekarang
            </a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 bg-gray-100 text-center">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-semibold text-gray-800 mb-6">
                Fitur Kami
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-12">
                <!-- Feature 1 -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Fitur 1</h3>
                    <p class="text-gray-600">Deskripsi fitur pertama yang memberikan kemudahan dalam penggunaan aplikasi.</p>
                </div>
                <!-- Feature 2 -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Fitur 2</h3>
                    <p class="text-gray-600">Deskripsi fitur kedua yang mempermudah proses kerja Anda dengan teknologi canggih.</p>
                </div>
                <!-- Feature 3 -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Fitur 3</h3>
                    <p class="text-gray-600">Deskripsi fitur ketiga yang membantu meningkatkan efisiensi dan produktivitas.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="bg-gray-800 text-white py-6 text-center">
        <p>&copy; 2026 Aplikasi Kami. All Rights Reserved.</p>
    </footer>

</body>
</html>
