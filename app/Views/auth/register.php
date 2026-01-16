<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TalentHub - Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen py-12 px-4 sm:px-6 lg:px-8">

    <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-lg shadow-md">
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-gray-900">Create an Account</h2>
            <p class="mt-2 text-sm text-gray-600">Join TalentHub as a Candidate or Recruiter</p>
        </div>

        <div id="registerError" class="text-red-500 text-sm text-center min-h-[20px]"></div>

        <form id="registerForm" action="/TalentHub/public/auth/registerPost" method="POST" class="mt-8 space-y-6">
            
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" id="username" name="username" 
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                    placeholder="John Doe">
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" id="email" name="email" 
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                    placeholder="john@example.com">
            </div>

            <div>
                <label for="role_id" class="block text-sm font-medium text-gray-700">I want to...</label>
                <select id="role_id" name="role_id" 
                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option value="2">Find a Job (Candidate)</option>
                    <option value="3">Hire Talent (Recruiter)</option>
                </select>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" 
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <p class="text-xs text-gray-500 mt-1">Must be at least 6 characters with a number.</p>
            </div>

            <div>
                <label for="confirm_password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" 
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div>
                <button type="submit" 
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                    Register
                </button>
            </div>
        </form>

        <div class="text-center text-sm">
            <p class="text-gray-600">
                Already have an account? 
                <a href="./login.php" class="font-medium text-indigo-600 hover:text-indigo-500">Log in</a>
            </p>
        </div>
    </div>

    <script src="../../public/assets/js/validation.js"></script>
</body>
</html>