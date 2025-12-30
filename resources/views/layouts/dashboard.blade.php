<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jai Bangla Portal - Government of West Bengal</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Preline UI -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/preline@2.0.0/dist/preline.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Highcharts -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

        * {
            font-family: 'Inter', sans-serif;
        }

        :root {
            --primary: #1e40af;
            --secondary: #7c3aed;
            --accent: #f59e0b;
            --success: #10b981;
            --danger: #ef4444;
        }

        body {
            /* background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); */
            background-attachment: fixed;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .stat-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .scheme-card {
            background: white;
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .scheme-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .scheme-card:hover::before {
            transform: scaleX(1);
        }

        .scheme-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px rgba(102, 126, 234, 0.2);
        }

        .sidebar {
            background: linear-gradient(180deg, #1e293b 0%, #0f172a 100%);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .sidebar-link {
            transition: all 0.2s ease;
            position: relative;
        }

        .sidebar-link::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 0;
            height: 60%;
            background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
            transition: width 0.3s ease;
            border-radius: 0 4px 4px 0;
        }

        .sidebar-link:hover::before,
        .sidebar-link.active::before {
            width: 4px;
        }

        .sidebar-link.active {
            background: rgba(102, 126, 234, 0.15);
            color: #a5b4fc;
        }

        .chart-container {
            background: white;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid #e2e8f0;
        }

        .pulse-animation {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: .7;
            }
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #ef4444;
            color: white;
            border-radius: 9999px;
            width: 18px;
            height: 18px;
            font-size: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            /* background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); */
            border-radius: 10px;
            background-color: #667eea;
        }

        ::-webkit-scrollbar-thumb:hover {
            /* background: linear-gradient(135deg, #764ba2 0%, #667eea 100%); */
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div id="application-sidebar"
        class="sidebar hs-overlay [--auto-close:lg] hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform fixed top-0 start-0 bottom-0 z-[60] w-64 border-e border-gray-700 pt-7 pb-10 overflow-y-auto lg:block lg:translate-x-0 lg:end-auto lg:bottom-0">

        <!-- Logo Section -->
        <div class="px-6 mb-8">
            <div class="flex items-center gap-3">
                <div
                    class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center shadow-lg">
                    <i class="fas fa-landmark text-white text-xl"></i>
                </div>
                <div>
                    <h1 class="text-lg font-bold text-white">Jai Bangla Portal</h1>
                    <p class="text-xs text-gray-400">Govt. of West Bengal</p>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="px-4 w-full flex flex-col">
            <ul class="space-y-2">
                <li>
                    <a href="#dashboard"
                        class="sidebar-link active flex items-center gap-x-3 py-3 px-4 text-sm text-gray-300 rounded-lg hover:bg-gray-800">
                        <i class="fas fa-home w-5"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#schemes"
                        class="sidebar-link flex items-center gap-x-3 py-3 px-4 text-sm text-gray-300 rounded-lg hover:bg-gray-800">
                        <i class="fas fa-umbrella w-5"></i>
                        <span>All Schemes</span>
                        <span class="ml-auto bg-purple-500 text-white text-xs px-2 py-0.5 rounded-full">13</span>
                    </a>
                </li>
                <li>
                    <a href="#eligibility"
                        class="sidebar-link flex items-center gap-x-3 py-3 px-4 text-sm text-gray-300 rounded-lg hover:bg-gray-800">
                        <i class="fas fa-clipboard-check w-5"></i>
                        <span>Eligibility Checker</span>
                    </a>
                </li>
                <li>
                    <a href="#applications"
                        class="sidebar-link flex items-center gap-x-3 py-3 px-4 text-sm text-gray-300 rounded-lg hover:bg-gray-800 relative">
                        <i class="fas fa-file-alt w-5"></i>
                        <span>Applications</span>
                        <span class="notification-badge">5</span>
                    </a>
                </li>
                <li>
                    <a href="#analytics"
                        class="sidebar-link flex items-center gap-x-3 py-3 px-4 text-sm text-gray-300 rounded-lg hover:bg-gray-800">
                        <i class="fas fa-chart-line w-5"></i>
                        <span>Analytics</span>
                    </a>
                </li>
                <li>
                    <a href="#notifications"
                        class="sidebar-link flex items-center gap-x-3 py-3 px-4 text-sm text-gray-300 rounded-lg hover:bg-gray-800 relative">
                        <i class="fas fa-bell w-5"></i>
                        <span>Notifications</span>
                        <span class="notification-badge">12</span>
                    </a>
                </li>
                <li>
                    <a href="#help"
                        class="sidebar-link flex items-center gap-x-3 py-3 px-4 text-sm text-gray-300 rounded-lg hover:bg-gray-800">
                        <i class="fas fa-question-circle w-5"></i>
                        <span>Help & Support</span>
                    </a>
                </li>
            </ul>

            <!-- Divider -->
            <div class="my-6 border-t border-gray-700"></div>

            <!-- Scheme Categories -->
            <div class="px-2">
                <h3 class="text-xs font-semibold text-gray-500 uppercase mb-3">Categories</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="#"
                            class="flex items-center gap-x-3 py-2 px-3 text-sm text-gray-300 rounded-lg hover:bg-gray-800">
                            <div class="w-8 h-8 bg-pink-500/20 rounded-lg flex items-center justify-center">
                                <i class="fas fa-female text-pink-400 text-sm"></i>
                            </div>
                            <span>Women Welfare</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center gap-x-3 py-2 px-3 text-sm text-gray-300 rounded-lg hover:bg-gray-800">
                            <div class="w-8 h-8 bg-blue-500/20 rounded-lg flex items-center justify-center">
                                <i class="fas fa-graduation-cap text-blue-400 text-sm"></i>
                            </div>
                            <span>Student Schemes</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center gap-x-3 py-2 px-3 text-sm text-gray-300 rounded-lg hover:bg-gray-800">
                            <div class="w-8 h-8 bg-red-500/20 rounded-lg flex items-center justify-center">
                                <i class="fas fa-hand-holding-heart text-red-400 text-sm"></i>
                            </div>
                            <span>Social Security</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center gap-x-3 py-2 px-3 text-sm text-gray-300 rounded-lg hover:bg-gray-800">
                            <div class="w-8 h-8 bg-green-500/20 rounded-lg flex items-center justify-center">
                                <i class="fas fa-tractor text-green-400 text-sm"></i>
                            </div>
                            <span>Agriculture</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center gap-x-3 py-2 px-3 text-sm text-gray-300 rounded-lg hover:bg-gray-800">
                            <div class="w-8 h-8 bg-teal-500/20 rounded-lg flex items-center justify-center">
                                <i class="fas fa-user-md text-teal-400 text-sm"></i>
                            </div>
                            <span>Health & Medical</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="w-full lg:ps-64">
        <div class="p-4 sm:p-6 space-y-6">

            <!-- Header with Mobile Menu Toggle -->
            <div class="glass-effect rounded-2xl shadow-xl p-6">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div class="flex items-center gap-4">
                        <!-- Mobile Menu Toggle -->
                        <button type="button" class="lg:hidden -m-2.5 p-2.5 text-gray-700"
                            data-hs-overlay="#application-sidebar">
                            <i class="fas fa-bars text-xl"></i>
                        </button>

                        <div>
                            <h1 class="text-3xl font-bold gradient-text">Jai Bangla Portal</h1>
                            <p class="text-gray-600 mt-1">Unified platform for 13 government welfare schemes</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <span
                            class="inline-flex items-center gap-2 py-2 px-4 rounded-full text-sm font-medium bg-green-100 text-green-700">
                            <span class="w-2 h-2 bg-green-500 rounded-full pulse-animation"></span>
                            Live Portal
                        </span>

                        <div class="hs-dropdown relative inline-flex">
                            <button type="button"
                                class="hs-dropdown-toggle py-2.5 px-4 inline-flex items-center gap-2 rounded-xl border border-gray-300 bg-white text-gray-700 shadow-sm hover:bg-gray-50 font-medium">
                                <i class="fas fa-download"></i>
                                Export
                                <i class="fas fa-chevron-down text-xs"></i>
                            </button>
                            <div
                                class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-48 bg-white shadow-xl rounded-xl p-2 mt-2">
                                <a class="flex items-center gap-3 py-2.5 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100"
                                    href="#">
                                    <i class="fas fa-file-pdf text-red-500 w-5"></i>
                                    PDF Report
                                </a>
                                <a class="flex items-center gap-3 py-2.5 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100"
                                    href="#">
                                    <i class="fas fa-file-excel text-green-500 w-5"></i>
                                    Excel Data
                                </a>
                                <a class="flex items-center gap-3 py-2.5 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100"
                                    href="#">
                                    <i class="fas fa-file-csv text-blue-500 w-5"></i>
                                    CSV Export
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @yield('content')

        </div>
    </div>

    <!-- Preline UI JS -->
    <script src="https://cdn.jsdelivr.net/npm/preline@2.0.0/dist/preline.min.js"></script>

    <!-- Sidebar Active Link Handler -->
    <script>
        $(document).ready(function () {
            $('.sidebar-link').on('click', function () {
                $('.sidebar-link').removeClass('active');
                $(this).addClass('active');
            });
        });
    </script>

    @stack('scripts')
</body>

</html>