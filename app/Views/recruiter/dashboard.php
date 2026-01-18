<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recruiter Dashboard - TalentHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

    <nav class="bg-indigo-700 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex-shrink-0 flex items-center">
                    <h1 class="text-white text-xl font-bold tracking-wider">TalentHub <span class="text-indigo-200 text-sm">| Recruiter</span></h1>
                </div>
                
                <div class="flex items-center space-x-4">
                    <span class="text-indigo-100 text-sm">
                        Welcome, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>
                    </span>
                    <a href="<?php echo BASE_URL; ?>/auth/logout" class="bg-indigo-800 hover:bg-indigo-900 text-white px-3 py-2 rounded-md text-sm font-medium transition">
                        Logout
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        
        <div class="md:flex md:items-center md:justify-between mb-8">
            <div class="flex-1 min-w-0">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    Company Dashboard
                </h2>
            </div>
            <div class="mt-4 flex md:mt-0 md:ml-4">
                <button type="button" class="ml-3 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    + Post New Job
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-5 sm:grid-cols-3 mb-8">
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <dt class="text-sm font-medium text-gray-500 truncate">Active Job Postings</dt>
                    <dd class="mt-1 text-3xl font-semibold text-gray-900">0</dd>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <dt class="text-sm font-medium text-gray-500 truncate">Total Applicants</dt>
                    <dd class="mt-1 text-3xl font-semibold text-gray-900">0</dd>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <dt class="text-sm font-medium text-gray-500 truncate">Interviews Scheduled</dt>
                    <dd class="mt-1 text-3xl font-semibold text-gray-900">0</dd>
                </div>
            </div>
        </div>

        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Your Recent Job Offers</h3>
            </div>
            <ul role="list" class="divide-y divide-gray-200">
                <li class="px-4 py-8 text-center text-gray-500">
                    <p>You haven't posted any jobs yet.</p>
                    <p class="text-sm mt-1">Click the "Post New Job" button to get started.</p>
                </li>
            </ul>
        </div>

    </div>

</body>
</html>