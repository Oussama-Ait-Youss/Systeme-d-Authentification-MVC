<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TalentHub - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center h-screen">

    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-8">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-indigo-600">TalentHub</h1>
            <p class="text-gray-500 mt-2">Welcome back! Please login to your account.</p>
        </div>

        <div id="loginError" class="text-red-500 text-sm text-center mb-4 min-h-[20px]"></div>

        <form id="loginForm" action="/TalentHub/public/auth/loginPost" method="POST" class="space-y-6">
            
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <div class="mt-1">
                    <input type="email" id="email" name="email" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 outline-none transition"
                        placeholder="you@example.com">
                </div>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <div class="mt-1">
                    <input type="password" id="password" name="password" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 outline-none transition"
                        placeholder="••••••••">
                </div>
            </div>

            <div>
                <button type="submit" 
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                    Sign In
                </button>
            </div>
        </form>

        <div class="mt-6 text-center text-sm">
            <p class="text-gray-600">
                Don't have an account? 
                <a href="./register.phpf" class="font-medium text-indigo-600 hover:text-indigo-500">Register here</a>
            </p>
        </div>
    </div>

    <script src="../../public/assets/js/validation.js"></script>
</body>
</html>