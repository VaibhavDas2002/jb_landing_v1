<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>West Bengal Pension Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* Smooth transitions for map interactions */
        path {
            transition: all 0.3s ease;
            cursor: pointer;
        }
        path:hover {
            opacity: 0.8;
            stroke: #ffffff;
            stroke-width: 2;
        }
        /* Specific coloring for loading state */
        .loading-overlay {
            backdrop-filter: blur(2px);
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 font-sans h-screen flex flex-col overflow-hidden">

    <header class="bg-blue-900 text-white p-4 shadow-md flex justify-between items-center z-10">
        <div>
            <h1 class="text-xl font-bold">West Bengal Pension Portal</h1>
            <p class="text-sm text-blue-200">Administrative Drill-down Map</p>
        </div>
        <div class="flex gap-4 text-sm">
            <div id="breadcrumb" class="bg-blue-800 px-3 py-1 rounded cursor-pointer hover:bg-blue-700 transition">
                West Bengal
            </div>
        </div>
    </header>

    <div class="flex flex-1 relative overflow-hidden">
        
        <aside class="w-80 bg-white border-r border-slate-200 p-6 flex flex-col shadow-lg z-10">
            <h2 class="text-lg font-bold mb-4 text-slate-700" id="selected-region-name">West Bengal</h2>
            
            <div class="space-y-4">
                <div class="bg-blue-50 p-4 rounded-lg border border-blue-100">
                    <p class="text-xs text-blue-600 font-bold uppercase">Total Beneficiaries</p>
                    <p class="text-2xl font-bold text-blue-900" id="stat-total">-</p>
                </div>

                <div class="grid grid-cols-2 gap-2">
                    <div class="bg-green-50 p-3 rounded-lg border border-green-100">
                        <p class="text-xs text-green-600 font-bold">Approved</p>
                        <p class="text-lg font-bold text-green-900" id="stat-approved">-</p>
                    </div>
                    <div class="bg-yellow-50 p-3 rounded-lg border border-yellow-100">
                        <p class="text-xs text-yellow-600 font-bold">Verified</p>
                        <p class="text-lg font-bold text-yellow-900" id="stat-verified">-</p>
                    </div>
                </div>
                
                <div class="bg-purple-50 p-3 rounded-lg border border-purple-100">
                    <p class="text-xs text-purple-600 font-bold">Entered</p>
                    <p class="text-lg font-bold text-purple-900" id="stat-entered">-</p>
                </div>
            </div>

            <div class="mt-auto text-xs text-slate-400">
                Click on a region to drill down.<br>
                Current Level: <span id="current-level" class="font-bold text-slate-600">District</span>
            </div>
        </aside>

        <main class="flex-1 bg-slate-100 relative flex items-center justify-center p-4">
            
            <div id="tooltip" class="absolute pointer-events-none hidden bg-black/80 text-white text-xs p-3 rounded shadow-xl z-50 w-48 backdrop-blur-sm">
                <strong id="tt-name" class="block text-sm mb-1 border-b border-gray-600 pb-1">Name</strong>
                <div class="flex justify-between"><span>Total:</span> <span id="tt-total" class="font-mono">0</span></div>
                <div class="flex justify-between text-green-300"><span>Appr:</span> <span id="tt-approved" class="font-mono">0</span></div>
            </div>

            <svg id="wb-map" viewBox="0 0 800 1000" class="w-full h-full max-h-[90vh]" preserveAspectRatio="xMidYMid meet">
                <defs>
                    <filter id="shadow" x="-20%" y="-20%" width="140%" height="140%">
                        <feDropShadow dx="2" dy="2" stdDeviation="3" flood-opacity="0.3"/>
                    </filter>
                </defs>
                
                <g id="map-paths" filter="url(#shadow)">
                    <path d="M300,400 L400,350 L450,450 L350,500 Z" 
                          fill="#3b82f6" stroke="white" stroke-width="1"
                          data-id="1" data-name="North 24 Parganas" data-type="district"></path>

                    <path d="M300,100 L350,50 L400,100 L350,150 Z" 
                          fill="#3b82f6" stroke="white" stroke-width="1"
                          data-id="2" data-name="Darjeeling" data-type="district"></path>
                     
                     <path d="M380,550 L420,550 L420,600 L380,600 Z" 
                          fill="#3b82f6" stroke="white" stroke-width="1"
                          data-id="3" data-name="Kolkata" data-type="district"></path>
                </g>
            </svg>

            <div id="loader" class="absolute inset-0 bg-white/50 loading-overlay flex items-center justify-center hidden">
                <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-900"></div>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            
            // State
            let currentLevel = 'district'; // district -> block -> gp
            let parentId = null;

            // DOM Elements
            const mapGroup = document.getElementById('map-paths');
            const tooltip = document.getElementById('tooltip');
            const loader = document.getElementById('loader');
            const breadcrumb = document.getElementById('breadcrumb');
            
            // API Endpoints (Replace with your actual Laravel Routes)
            const API_BASE = '/api/pension/map'; 

            // --- 1. Map Interaction Logic ---

            // Tooltip Logic
            mapGroup.addEventListener('mousemove', (e) => {
                if(e.target.tagName === 'path') {
                    const rect = mapGroup.getBoundingClientRect();
                    
                    // Show Tooltip
                    tooltip.classList.remove('hidden');
                    tooltip.style.left = `${e.clientX + 15}px`;
                    tooltip.style.top = `${e.clientY + 15}px`;

                    // Populate Tooltip (In real app, data might be in 'data-' attributes or a lookup object)
                    document.getElementById('tt-name').textContent = e.target.dataset.name;
                    // These would ideally come from a cached data object keyed by ID
                    fetchStatsForHover(e.target.dataset.id); 
                }
            });

            mapGroup.addEventListener('mouseout', () => {
                tooltip.classList.add('hidden');
            });

            // Click / Drill Down Logic
            mapGroup.addEventListener('click', async (e) => {
                if(e.target.tagName === 'path') {
                    const id = e.target.dataset.id;
                    const name = e.target.dataset.name;
                    const type = e.target.dataset.type;

                    if (currentLevel === 'district') {
                        await loadLevelData('block', id, name);
                    } else if (currentLevel === 'block') {
                        await loadLevelData('gp', id, name);
                    }
                }
            });

            // Breadcrumb Reset
            breadcrumb.addEventListener('click', () => {
                loadLevelData('district', null, 'West Bengal');
            });

            // --- 2. Data Fetching Logic ---

            async function loadLevelData(level, id, name) {
                showLoader(true);
                
                try {
                    // 1. Fetch Map Vectors (SVG Paths)
                    // URL example: /api/pension/map/vectors?level=block&parent_id=1
                    const vectorResponse = await fetch(`${API_BASE}/vectors?level=${level}&parent_id=${id || ''}`);
                    const vectorData = await vectorResponse.json();

                    // 2. Fetch Aggregated Stats for the sidebar
                    // URL example: /api/pension/map/stats?level=district&id=1
                    const statsResponse = await fetch(`${API_BASE}/stats?level=${level}&id=${id || ''}`);
                    const statsData = await statsResponse.json();

                    // 3. Render
                    renderMap(vectorData, level);
                    updateSidebar(statsData, name, level);
                    
                    // Update State
                    currentLevel = level;
                    parentId = id;

                } catch (error) {
                    console.error("Failed to load map data", error);
                    alert("Error loading map data. Please ensure API is running.");
                } finally {
                    showLoader(false);
                }
            }

            // Mock function to simulate "Hover" stats (since we don't want to API call on every pixel move)
            // Ideally, map data response should include the basic stats for every region in one go.
            function fetchStatsForHover(id) {
                // In production: Look up 'id' in a global 'currentMapData' object
                // For demo: Random numbers
                document.getElementById('tt-total').textContent = Math.floor(Math.random() * 5000) + 1000;
                document.getElementById('tt-approved').textContent = Math.floor(Math.random() * 1000) + 500;
            }

            // --- 3. Rendering Logic ---

            function renderMap(paths, level) {
                mapGroup.innerHTML = ''; // Clear current map
                
                // Color scale based on performance?
                const colors = level === 'district' ? '#3b82f6' : (level === 'block' ? '#10b981' : '#8b5cf6');

                paths.forEach(item => {
                    const path = document.createElementNS("http://www.w3.org/2000/svg", "path");
                    path.setAttribute("d", item.path_d); // The SVG Path string
                    path.setAttribute("fill", colors);
                    path.setAttribute("stroke", "white");
                    path.setAttribute("stroke-width", "0.5");
                    path.setAttribute("data-id", item.id);
                    path.setAttribute("data-name", item.name);
                    path.setAttribute("data-type", level);
                    
                    mapGroup.appendChild(path);
                });
            }

            function updateSidebar(stats, name, level) {
                document.getElementById('selected-region-name').textContent = name;
                document.getElementById('current-level').textContent = level.toUpperCase();
                
                // Animate numbers (simple implementation)
                document.getElementById('stat-total').textContent = stats.total.toLocaleString();
                document.getElementById('stat-approved').textContent = stats.approved.toLocaleString();
                document.getElementById('stat-verified').textContent = stats.verified.toLocaleString();
                document.getElementById('stat-entered').textContent = stats.entered.toLocaleString();
            }

            function showLoader(show) {
                if(show) loader.classList.remove('hidden');
                else loader.classList.add('hidden');
            }

            // Initialize
            // In a real scenario, uncomment this to load data on start
            // loadLevelData('district', null, 'West Bengal');
        });
    </script>
</body>
</html>