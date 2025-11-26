<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CA Practice Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --primary: #7c3aed;
            --primary-light: #8b5cf6;
            --secondary: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
            --bg-dark: #0f172a;
            --bg-card: #1e293b;
            --bg-card-hover: #334155;
            --text-primary: #f1f5f9;
            --text-secondary: #cbd5e1;
            --border: #374151;
            --shadow: rgba(0, 0, 0, 0.35);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--bg-dark);
            color: var(--text-primary);
            transition: all 0.3s ease;
            overflow-x: hidden;
        }

        .container {
            display: grid;
            grid-template-columns: 250px 1fr;
            grid-template-rows: 70px 1fr;
            grid-template-areas: 
                "sidebar header"
                "sidebar main";
            min-height: 100vh;
        }

        /* Header Styles */
        header {
            grid-area: header;
            background-color: var(--bg-card);
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 6px var(--shadow);
            z-index: 10;
            border-bottom: 1px solid var(--border);
        }

        .header-left h1 {
            font-size: 1.5rem;
            font-weight: 600;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .search-bar {
            display: flex;
            align-items: center;
            background: var(--bg-dark);
            border-radius: 8px;
            padding: 0.5rem 1rem;
            width: 300px;
        }

        .search-bar input {
            background: transparent;
            border: none;
            color: var(--text-primary);
            width: 100%;
            padding: 0.5rem;
            outline: none;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            cursor: pointer;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        /* Sidebar Styles */
        .sidebar {
            grid-area: sidebar;
            background-color: var(--bg-card);
            padding: 1.5rem 0;
            display: flex;
            flex-direction: column;
            border-right: 1px solid var(--border);
            box-shadow: 4px 0 6px var(--shadow);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0 1.5rem 1.5rem;
            border-bottom: 1px solid var(--border);
        }

        .logo i {
            font-size: 1.75rem;
            color: var(--primary);
        }

        .logo h2 {
            font-size: 1.25rem;
            font-weight: 600;
        }

        .nav-links {
            display: flex;
            flex-direction: column;
            margin-top: 2rem;
            gap: 0.5rem;
            padding: 0 1rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            color: var(--text-secondary);
            text-decoration: none;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .nav-link:hover, .nav-link.active {
            background-color: var(--primary);
            color: white;
        }

        .nav-link i {
            font-size: 1.25rem;
        }

        /* Main Content Styles */
        main {
            grid-area: main;
            padding: 2rem;
            overflow-y: auto;
        }

        .page {
            display: none;
            animation: fadeIn 0.5s ease-out;
        }

        .page.active {
            display: block;
        }

        .dashboard-title {
            margin-bottom: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .dashboard-title h2 {
            font-size: 1.75rem;
            font-weight: 600;
        }

        .date-display {
            color: var(--text-secondary);
            font-size: 1rem;
        }

        /* Summary Tiles */
        .summary-tiles {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .tile {
            background-color: var(--bg-card);
            border-radius: 12px;
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            box-shadow: 0 4px 6px var(--shadow);
            transition: all 0.3s ease;
            border-left: 4px solid var(--primary);
            animation: fadeIn 0.5s ease-out;
        }

        .tile:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px var(--shadow);
            background-color: var(--bg-card-hover);
        }

        .tile-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .tile-title {
            font-size: 0.9rem;
            color: var(--text-secondary);
        }

        .tile-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(124, 58, 237, 0.2);
            color: var(--primary);
        }

        .tile-value {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .tile-growth {
            font-size: 0.85rem;
            color: var(--secondary);
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .tile-danger {
            color: var(--danger);
        }

        /* Dashboard Grid */
        .dashboard-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 1.5rem;
        }

        .card {
            background-color: var(--bg-card);
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 6px var(--shadow);
            animation: slideUp 0.5s ease-out;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
        }

        .card-actions {
            display: flex;
            gap: 0.5rem;
        }

        .btn {
            padding: 0.5rem 1rem;
            border-radius: 8px;
            border: none;
            background-color: var(--primary);
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn:hover {
            background-color: var(--primary-light);
            transform: translateY(-2px);
        }

        .btn-secondary {
            background-color: var(--bg-dark);
            border: 1px solid var(--border);
        }

        /* Activity Stream */
        .activity-stream {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .activity-item {
            display: flex;
            gap: 1rem;
            padding: 1rem;
            border-radius: 8px;
            background-color: var(--bg-dark);
            transition: all 0.3s ease;
            animation: fadeIn 0.5s ease-out;
        }

        .activity-item:hover {
            background-color: var(--bg-card-hover);
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .activity-icon.meeting {
            background-color: rgba(16, 185, 129, 0.2);
            color: var(--secondary);
        }

        .activity-icon.alert {
            background-color: rgba(239, 68, 68, 0.2);
            color: var(--danger);
        }

        .activity-icon.communication {
            background-color: rgba(124, 58, 237, 0.2);
            color: var(--primary);
        }

        .activity-content {
            flex: 1;
        }

        .activity-title {
            font-weight: 500;
            margin-bottom: 0.25rem;
        }

        .activity-time {
            font-size: 0.85rem;
            color: var(--text-secondary);
        }

        /* Client Table */
        .client-table {
            width: 100%;
            border-collapse: collapse;
        }

        .client-table th {
            text-align: left;
            padding: 0.75rem 1rem;
            border-bottom: 1px solid var(--border);
            color: var(--text-secondary);
            font-weight: 500;
        }

        .client-table td {
            padding: 1rem;
            border-bottom: 1px solid var(--border);
        }

        .client-table tr:last-child td {
            border-bottom: none;
        }

        .client-table tr {
            transition: all 0.3s ease;
        }

        .client-table tr:hover {
            background-color: var(--bg-dark);
        }

        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .status-on-track {
            background-color: rgba(16, 185, 129, 0.2);
            color: var(--secondary);
        }

        .status-at-risk {
            background-color: rgba(245, 158, 11, 0.2);
            color: var(--warning);
        }

        .status-overdue {
            background-color: rgba(239, 68, 68, 0.2);
            color: var(--danger);
        }

        /* Task Board */
        .task-board {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
        }

        .task-column {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .task-column-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem;
            border-radius: 8px;
            background-color: var(--bg-dark);
        }

        .task-column-title {
            font-weight: 500;
        }

        .task-count {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background-color: var(--primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
        }

        .task-item {
            background-color: var(--bg-dark);
            border-radius: 8px;
            padding: 1rem;
            box-shadow: 0 2px 4px var(--shadow);
            transition: all 0.3s ease;
            animation: slideIn 0.5s ease-out;
            border-left: 4px solid var(--primary);
        }

        .task-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 10px var(--shadow);
        }

        .task-item.urgent {
            border-left-color: var(--danger);
        }

        .task-item.warning {
            border-left-color: var(--warning);
        }

        .task-title {
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .task-meta {
            display: flex;
            justify-content: space-between;
            font-size: 0.8rem;
            color: var(--text-secondary);
        }

        /* Charts */
        .chart-container {
            height: 250px;
            margin-top: 1rem;
        }

        /* Client Details Page */
        .client-details {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 1.5rem;
        }

        .client-info-card {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .client-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid var(--border);
        }

        .client-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            font-weight: bold;
        }

        .client-name {
            font-size: 1.5rem;
            font-weight: 600;
        }

        .client-meta {
            color: var(--text-secondary);
        }

        .info-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .info-label {
            font-size: 0.85rem;
            color: var(--text-secondary);
        }

        .info-value {
            font-weight: 500;
        }

        /* Tasks Page */
        .tasks-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .filter-options {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .filter-btn {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            background-color: var(--bg-dark);
            border: 1px solid var(--border);
            color: var(--text-secondary);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .filter-btn.active {
            background-color: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        /* Invoices Page */
        .invoices-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .invoice-card {
            background-color: var(--bg-card);
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 6px var(--shadow);
            transition: all 0.3s ease;
            border-left: 4px solid var(--primary);
        }

        .invoice-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px var(--shadow);
        }

        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }

        .invoice-id {
            font-weight: 600;
            color: var(--primary);
        }

        .invoice-status {
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .status-paid {
            background-color: rgba(16, 185, 129, 0.2);
            color: var(--secondary);
        }

        .status-pending {
            background-color: rgba(245, 158, 11, 0.2);
            color: var(--warning);
        }

        .status-overdue {
            background-color: rgba(239, 68, 68, 0.2);
            color: var(--danger);
        }

        .invoice-details {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .invoice-amount {
            font-size: 1.5rem;
            font-weight: 700;
            margin-top: 0.5rem;
        }

        /* Reports Page */
        .reports-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .report-card {
            background-color: var(--bg-card);
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 6px var(--shadow);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .report-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px var(--shadow);
        }

        .report-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(124, 58, 237, 0.2);
            color: var(--primary);
            font-size: 1.5rem;
        }

        .report-title {
            font-weight: 600;
            font-size: 1.1rem;
        }

        .report-description {
            color: var(--text-secondary);
            font-size: 0.9rem;
        }

        /* Settings Page */
        .settings-grid {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 1.5rem;
        }

        .settings-nav {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .settings-nav-item {
            padding: 1rem;
            border-radius: 8px;
            background-color: var(--bg-card);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .settings-nav-item.active {
            background-color: var(--primary);
        }

        .settings-nav-item:hover:not(.active) {
            background-color: var(--bg-card-hover);
        }

        .settings-content {
            background-color: var(--bg-card);
            border-radius: 12px;
            padding: 1.5rem;
        }

        .setting-group {
            margin-bottom: 1.5rem;
        }

        .setting-label {
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .setting-control {
            width: 100%;
            padding: 0.75rem;
            border-radius: 8px;
            background-color: var(--bg-dark);
            border: 1px solid var(--border);
            color: var(--text-primary);
        }

        .toggle-switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 24px;
        }

        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .toggle-slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: var(--bg-dark);
            border: 1px solid var(--border);
            transition: .4s;
            border-radius: 24px;
        }

        .toggle-slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 4px;
            bottom: 3px;
            background-color: var(--text-secondary);
            transition: .4s;
            border-radius: 50%;
        }

        input:checked + .toggle-slider {
            background-color: var(--primary);
        }

        input:checked + .toggle-slider:before {
            transform: translateX(26px);
            background-color: white;
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideUp {
            from { transform: translateY(20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        @keyframes slideIn {
            from { transform: translateX(-10px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .dashboard-grid, .client-details, .settings-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .container {
                grid-template-columns: 1fr;
                grid-template-areas: 
                    "header"
                    "main";
            }
            
            .sidebar {
                display: none;
            }
            
            .summary-tiles, .invoices-grid, .reports-grid {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            }
            
            .task-board {
                grid-template-columns: 1fr;
            }
            
            .header-right {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <header>
            <div class="header-left">
                <h1>CA Practice Dashboard</h1>
            </div>
            <div class="header-right">
                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search clients, tasks...">
                </div>
                <div class="user-profile">
                    <div class="user-avatar">CA</div>
                    <div>
                        <div class="user-name">Rahul Sharma</div>
                        <div class="user-role">Chartered Accountant</div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                <i class="fas fa-chart-line"></i>
                <h2>PracticePulse</h2>
            </div>
            <div class="nav-links">
                <a class="nav-link active" data-page="dashboard">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
                <a class="nav-link" data-page="clients">
                    <i class="fas fa-users"></i>
                    <span>Clients</span>
                </a>
                <a class="nav-link" data-page="tasks">
                    <i class="fas fa-tasks"></i>
                    <span>Tasks</span>
                </a>
                <a class="nav-link" data-page="invoices">
                    <i class="fas fa-file-invoice"></i>
                    <span>Invoices</span>
                </a>
                <a class="nav-link" data-page="reports">
                    <i class="fas fa-chart-pie"></i>
                    <span>Reports</span>
                </a>
                <a class="nav-link" data-page="settings">
                    <i class="fas fa-cog"></i>
                    <span>Settings</span>
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <main>
            <!-- Dashboard Page -->
            <div class="page active" id="dashboard">
                <div class="dashboard-title">
                    <h2>Practice Overview</h2>
                    <div class="date-display" id="currentDate"></div>
                </div>

                <!-- Summary Tiles -->
                <div class="summary-tiles">
                    <div class="tile">
                        <div class="tile-header">
                            <div class="tile-title">Total Active Clients</div>
                            <div class="tile-icon">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                        <div class="tile-value">45</div>
                        <div class="tile-growth">
                            <i class="fas fa-arrow-up"></i>
                            <span>+5 from last month</span>
                        </div>
                    </div>
                    <div class="tile">
                        <div class="tile-header">
                            <div class="tile-title">Pending Tasks (Urgent)</div>
                            <div class="tile-icon">
                                <i class="fas fa-exclamation-circle"></i>
                            </div>
                        </div>
                        <div class="tile-value">5</div>
                        <div class="tile-growth tile-danger">
                            <i class="fas fa-arrow-up"></i>
                            <span>+2 from yesterday</span>
                        </div>
                    </div>
                    <div class="tile">
                        <div class="tile-header">
                            <div class="tile-title">Overdue Tasks</div>
                            <div class="tile-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                        </div>
                        <div class="tile-value">2</div>
                        <div class="tile-growth">
                            <i class="fas fa-minus"></i>
                            <span>No change</span>
                        </div>
                    </div>
                    <div class="tile">
                        <div class="tile-header">
                            <div class="tile-title">Unbilled Hours</div>
                            <div class="tile-icon">
                                <i class="fas fa-hourglass-half"></i>
                            </div>
                        </div>
                        <div class="tile-value">₹1,85,000</div>
                        <div class="tile-growth">
                            <i class="fas fa-arrow-up"></i>
                            <span>+₹25,000 this week</span>
                        </div>
                    </div>
                    <div class="tile">
                        <div class="tile-header">
                            <div class="tile-title">Accounts Receivable</div>
                            <div class="tile-icon">
                                <i class="fas fa-rupee-sign"></i>
                            </div>
                        </div>
                        <div class="tile-value">₹3,42,500</div>
                        <div class="tile-growth tile-danger">
                            <i class="fas fa-arrow-up"></i>
                            <span>+₹42,500 overdue</span>
                        </div>
                    </div>
                    <div class="tile">
                        <div class="tile-header">
                            <div class="tile-title">This Month's Revenue</div>
                            <div class="tile-icon">
                                <i class="fas fa-chart-line"></i>
                            </div>
                        </div>
                        <div class="tile-value">₹2,15,000</div>
                        <div class="tile-growth">
                            <i class="fas fa-arrow-up"></i>
                            <span>+12% from last month</span>
                        </div>
                    </div>
                </div>

                <!-- Dashboard Grid -->
                <div class="dashboard-grid">
                    <!-- Left Column -->
                    <div class="left-column">
                        <!-- Activity Stream -->
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Daily Updates & Activity Stream</div>
                                <div class="card-actions">
                                    <button class="btn btn-secondary">
                                        <i class="fas fa-filter"></i>
                                        Filter
                                    </button>
                                </div>
                            </div>
                            <div class="activity-stream">
                                <div class="activity-item">
                                    <div class="activity-icon meeting">
                                        <i class="fas fa-video"></i>
                                    </div>
                                    <div class="activity-content">
                                        <div class="activity-title">Meeting with ABC Traders</div>
                                        <div class="activity-time">Today, 10:30 AM</div>
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon communication">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div class="activity-content">
                                        <div class="activity-title">Email from XYZ Ltd received</div>
                                        <div class="activity-time">Today, 09:15 AM</div>
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon alert">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </div>
                                    <div class="activity-content">
                                        <div class="activity-title">GST Return due for MNO Enterprises in 2 days</div>
                                        <div class="activity-time">Alert • High Priority</div>
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon alert">
                                        <i class="fas fa-file-invoice"></i>
                                    </div>
                                    <div class="activity-content">
                                        <div class="activity-title">Tax Audit report for PQR Ltd is pending review</div>
                                        <div class="activity-time">Alert • Medium Priority</div>
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon alert">
                                        <i class="fas fa-rupee-sign"></i>
                                    </div>
                                    <div class="activity-content">
                                        <div class="activity-title">Payment of ₹25,000 from Client STU is overdue by 15 days</div>
                                        <div class="activity-time">Alert • High Priority</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Client Portfolio -->
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Client Portfolio Overview</div>
                                <div class="card-actions">
                                    <button class="btn">
                                        <i class="fas fa-plus"></i>
                                        Add Client
                                    </button>
                                </div>
                            </div>
                            <div class="table-container">
                                <table class="client-table">
                                    <thead>
                                        <tr>
                                            <th>Client Name</th>
                                            <th>Services</th>
                                            <th>Last Contact</th>
                                            <th>Next Deadline</th>
                                            <th>Status</th>
                                            <th>Outstanding</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>ABC Traders</td>
                                            <td>GST, Taxation</td>
                                            <td>2 days ago</td>
                                            <td>15 Nov 2023</td>
                                            <td><span class="status-badge status-on-track">On Track</span></td>
                                            <td>₹0</td>
                                        </tr>
                                        <tr>
                                            <td>XYZ Ltd</td>
                                            <td>Audit, Compliance</td>
                                            <td>1 week ago</td>
                                            <td>30 Nov 2023</td>
                                            <td><span class="status-badge status-at-risk">At Risk</span></td>
                                            <td>₹45,000</td>
                                        </tr>
                                        <tr>
                                            <td>MNO Enterprises</td>
                                            <td>GST, Bookkeeping</td>
                                            <td>3 days ago</td>
                                            <td>20 Nov 2023</td>
                                            <td><span class="status-badge status-on-track">On Track</span></td>
                                            <td>₹0</td>
                                        </tr>
                                        <tr>
                                            <td>PQR Ltd</td>
                                            <td>Tax Audit, ROC</td>
                                            <td>2 weeks ago</td>
                                            <td>25 Nov 2023</td>
                                            <td><span class="status-badge status-overdue">Overdue</span></td>
                                            <td>₹75,000</td>
                                        </tr>
                                        <tr>
                                            <td>STU & Co.</td>
                                            <td>GST, Taxation, Advisory</td>
                                            <td>5 days ago</td>
                                            <td>10 Dec 2023</td>
                                            <td><span class="status-badge status-on-track">On Track</span></td>
                                            <td>₹25,000</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="right-column">
                        <!-- Task & Compliance Tracker -->
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Task & Compliance Tracker</div>
                                <div class="card-actions">
                                    <button class="btn">
                                        <i class="fas fa-plus"></i>
                                        Add Task
                                    </button>
                                </div>
                            </div>
                            <div class="task-board">
                                <div class="task-column">
                                    <div class="task-column-header">
                                        <div class="task-column-title">To Do</div>
                                        <div class="task-count">3</div>
                                    </div>
                                    <div class="task-item urgent">
                                        <div class="task-title">File GSTR-3B for Client ABC</div>
                                        <div class="task-meta">
                                            <span>Due: 20 Nov</span>
                                            <span>High</span>
                                        </div>
                                    </div>
                                    <div class="task-item">
                                        <div class="task-title">Prepare Financial Statements for XYZ Ltd</div>
                                        <div class="task-meta">
                                            <span>Due: 25 Nov</span>
                                            <span>Medium</span>
                                        </div>
                                    </div>
                                    <div class="task-item">
                                        <div class="task-title">Review TDS Compliance for MNO</div>
                                        <div class="task-meta">
                                            <span>Due: 28 Nov</span>
                                            <span>Medium</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="task-column">
                                    <div class="task-column-header">
                                        <div class="task-column-title">In Progress</div>
                                        <div class="task-count">2</div>
                                    </div>
                                    <div class="task-item warning">
                                        <div class="task-title">Finalize TDS Return for Q2 - PQR Ltd</div>
                                        <div class="task-meta">
                                            <span>Due: Tomorrow</span>
                                            <span>High</span>
                                        </div>
                                    </div>
                                    <div class="task-item">
                                        <div class="task-title">Draft Audit Report for STU & Co.</div>
                                        <div class="task-meta">
                                            <span>Due: 5 Dec</span>
                                            <span>Medium</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="task-column">
                                    <div class="task-column-header">
                                        <div class="task-column-title">Completed</div>
                                        <div class="task-count">4</div>
                                    </div>
                                    <div class="task-item">
                                        <div class="task-title">Income Tax Return - Individual Client</div>
                                        <div class="task-meta">
                                            <span>Completed: Today</span>
                                            <span>✓</span>
                                        </div>
                                    </div>
                                    <div class="task-item">
                                        <div class="task-title">GST Registration for New Client</div>
                                        <div class="task-meta">
                                            <span>Completed: Yesterday</span>
                                            <span>✓</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Financial Health -->
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Financial Health Snapshot</div>
                                <div class="card-actions">
                                    <button class="btn btn-secondary">
                                        <i class="fas fa-download"></i>
                                        Export
                                    </button>
                                </div>
                            </div>
                            <div class="chart-container">
                                <canvas id="revenueChart"></canvas>
                            </div>
                        </div>

                        <!-- Quick Actions -->
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Quick Actions</div>
                            </div>
                            <div class="quick-actions" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                                <button class="btn" style="justify-content: center;">
                                    <i class="fas fa-user-plus"></i>
                                    New Client
                                </button>
                                <button class="btn" style="justify-content: center;">
                                    <i class="fas fa-tasks"></i>
                                    Create Task
                                </button>
                                <button class="btn" style="justify-content: center;">
                                    <i class="fas fa-file-invoice"></i>
                                    Generate Invoice
                                </button>
                                <button class="btn" style="justify-content: center;">
                                    <i class="fas fa-calendar-plus"></i>
                                    Schedule
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Clients Page -->
            <div class="page" id="clients">
                <div class="dashboard-title">
                    <h2>Client Management</h2>
                    <button class="btn">
                        <i class="fas fa-user-plus"></i>
                        Add New Client
                    </button>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="card-title">All Clients</div>
                        <div class="card-actions">
                            <button class="btn btn-secondary">
                                <i class="fas fa-filter"></i>
                                Filter
                            </button>
                            <button class="btn btn-secondary">
                                <i class="fas fa-download"></i>
                                Export
                            </button>
                        </div>
                    </div>
                    <div class="table-container">
                        <table class="client-table">
                            <thead>
                                <tr>
                                    <th>Client Name</th>
                                    <th>Services</th>
                                    <th>Contact</th>
                                    <th>Last Contact</th>
                                    <th>Next Deadline</th>
                                    <th>Status</th>
                                    <th>Outstanding</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>ABC Traders</td>
                                    <td>GST, Taxation</td>
                                    <td>abc@example.com</td>
                                    <td>2 days ago</td>
                                    <td>15 Nov 2023</td>
                                    <td><span class="status-badge status-on-track">On Track</span></td>
                                    <td>₹0</td>
                                    <td>
                                        <button class="btn" style="padding: 0.25rem 0.5rem; font-size: 0.8rem;">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>XYZ Ltd</td>
                                    <td>Audit, Compliance</td>
                                    <td>xyz@example.com</td>
                                    <td>1 week ago</td>
                                    <td>30 Nov 2023</td>
                                    <td><span class="status-badge status-at-risk">At Risk</span></td>
                                    <td>₹45,000</td>
                                    <td>
                                        <button class="btn" style="padding: 0.25rem 0.5rem; font-size: 0.8rem;">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>MNO Enterprises</td>
                                    <td>GST, Bookkeeping</td>
                                    <td>mno@example.com</td>
                                    <td>3 days ago</td>
                                    <td>20 Nov 2023</td>
                                    <td><span class="status-badge status-on-track">On Track</span></td>
                                    <td>₹0</td>
                                    <td>
                                        <button class="btn" style="padding: 0.25rem 0.5rem; font-size: 0.8rem;">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>PQR Ltd</td>
                                    <td>Tax Audit, ROC</td>
                                    <td>pqr@example.com</td>
                                    <td>2 weeks ago</td>
                                    <td>25 Nov 2023</td>
                                    <td><span class="status-badge status-overdue">Overdue</span></td>
                                    <td>₹75,000</td>
                                    <td>
                                        <button class="btn" style="padding: 0.25rem 0.5rem; font-size: 0.8rem;">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>STU & Co.</td>
                                    <td>GST, Taxation, Advisory</td>
                                    <td>stu@example.com</td>
                                    <td>5 days ago</td>
                                    <td>10 Dec 2023</td>
                                    <td><span class="status-badge status-on-track">On Track</span></td>
                                    <td>₹25,000</td>
                                    <td>
                                        <button class="btn" style="padding: 0.25rem 0.5rem; font-size: 0.8rem;">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>EFG Industries</td>
                                    <td>Taxation, Consulting</td>
                                    <td>efg@example.com</td>
                                    <td>1 month ago</td>
                                    <td>15 Dec 2023</td>
                                    <td><span class="status-badge status-on-track">On Track</span></td>
                                    <td>₹0</td>
                                    <td>
                                        <button class="btn" style="padding: 0.25rem 0.5rem; font-size: 0.8rem;">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>HIJ Solutions</td>
                                    <td>GST, Audit</td>
                                    <td>hij@example.com</td>
                                    <td>3 weeks ago</td>
                                    <td>5 Jan 2024</td>
                                    <td><span class="status-badge status-at-risk">At Risk</span></td>
                                    <td>₹15,000</td>
                                    <td>
                                        <button class="btn" style="padding: 0.25rem 0.5rem; font-size: 0.8rem;">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Tasks Page -->
            <div class="page" id="tasks">
                <div class="tasks-header">
                    <h2>Task Management</h2>
                    <button class="btn">
                        <i class="fas fa-plus"></i>
                        Add New Task
                    </button>
                </div>

                <div class="filter-options">
                    <button class="filter-btn active">All Tasks</button>
                    <button class="filter-btn">Urgent</button>
                    <button class="filter-btn">Today</button>
                    <button class="filter-btn">This Week</button>
                    <button class="filter-btn">Overdue</button>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Task Board</div>
                        <div class="card-actions">
                            <button class="btn btn-secondary">
                                <i class="fas fa-filter"></i>
                                Filter
                            </button>
                        </div>
                    </div>
                    <div class="task-board">
                        <div class="task-column">
                            <div class="task-column-header">
                                <div class="task-column-title">To Do</div>
                                <div class="task-count">5</div>
                            </div>
                            <div class="task-item urgent">
                                <div class="task-title">File GSTR-3B for Client ABC</div>
                                <div class="task-meta">
                                    <span>Due: 20 Nov</span>
                                    <span>High</span>
                                </div>
                            </div>
                            <div class="task-item">
                                <div class="task-title">Prepare Financial Statements for XYZ Ltd</div>
                                <div class="task-meta">
                                    <span>Due: 25 Nov</span>
                                    <span>Medium</span>
                                </div>
                            </div>
                            <div class="task-item">
                                <div class="task-title">Review TDS Compliance for MNO</div>
                                <div class="task-meta">
                                    <span>Due: 28 Nov</span>
                                    <span>Medium</span>
                                </div>
                            </div>
                            <div class="task-item">
                                <div class="task-title">Draft Annual Report for EFG Industries</div>
                                <div class="task-meta">
                                    <span>Due: 5 Dec</span>
                                    <span>Low</span>
                                </div>
                            </div>
                            <div class="task-item">
                                <div class="task-title">Client Meeting Preparation - HIJ Solutions</div>
                                <div class="task-meta">
                                    <span>Due: 10 Dec</span>
                                    <span>Medium</span>
                                </div>
                            </div>
                        </div>
                        <div class="task-column">
                            <div class="task-column-header">
                                <div class="task-column-title">In Progress</div>
                                <div class="task-count">3</div>
                            </div>
                            <div class="task-item warning">
                                <div class="task-title">Finalize TDS Return for Q2 - PQR Ltd</div>
                                <div class="task-meta">
                                    <span>Due: Tomorrow</span>
                                    <span>High</span>
                                </div>
                            </div>
                            <div class="task-item">
                                <div class="task-title">Draft Audit Report for STU & Co.</div>
                                <div class="task-meta">
                                    <span>Due: 5 Dec</span>
                                    <span>Medium</span>
                                </div>
                            </div>
                            <div class="task-item">
                                <div class="task-title">Tax Planning for FY 2023-24</div>
                                <div class="task-meta">
                                    <span>Due: 15 Dec</span>
                                    <span>Medium</span>
                                </div>
                            </div>
                        </div>
                        <div class="task-column">
                            <div class="task-column-header">
                                <div class="task-column-title">Completed</div>
                                <div class="task-count">6</div>
                            </div>
                            <div class="task-item">
                                <div class="task-title">Income Tax Return - Individual Client</div>
                                <div class="task-meta">
                                    <span>Completed: Today</span>
                                    <span>✓</span>
                                </div>
                            </div>
                            <div class="task-item">
                                <div class="task-title">GST Registration for New Client</div>
                                <div class="task-meta">
                                    <span>Completed: Yesterday</span>
                                    <span>✓</span>
                                </div>
                            </div>
                            <div class="task-item">
                                <div class="task-title">Monthly Bookkeeping - ABC Traders</div>
                                <div class="task-meta">
                                    <span>Completed: 2 days ago</span>
                                    <span>✓</span>
                                </div>
                            </div>
                            <div class="task-item">
                                <div class="task-title">ROC Filing for XYZ Ltd</div>
                                <div class="task-meta">
                                    <span>Completed: 3 days ago</span>
                                    <span>✓</span>
                                </div>
                            </div>
                            <div class="task-item">
                                <div class="task-title">Client Consultation - MNO Enterprises</div>
                                <div class="task-meta">
                                    <span>Completed: 1 week ago</span>
                                    <span>✓</span>
                                </div>
                            </div>
                            <div class="task-item">
                                <div class="task-title">Tax Audit - PQR Ltd</div>
                                <div class="task-meta">
                                    <span>Completed: 2 weeks ago</span>
                                    <span>✓</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Invoices Page -->
            <div class="page" id="invoices">
                <div class="dashboard-title">
                    <h2>Invoice Management</h2>
                    <button class="btn">
                        <i class="fas fa-file-invoice"></i>
                        Create New Invoice
                    </button>
                </div>

                <div class="invoices-grid">
                    <div class="invoice-card">
                        <div class="invoice-header">
                            <div class="invoice-id">INV-2023-001</div>
                            <div class="invoice-status status-paid">Paid</div>
                        </div>
                        <div class="invoice-details">
                            <div class="info-label">Client</div>
                            <div class="info-value">ABC Traders</div>
                            <div class="info-label">Issue Date</div>
                            <div class="info-value">15 Oct 2023</div>
                            <div class="info-label">Due Date</div>
                            <div class="info-value">30 Oct 2023</div>
                        </div>
                        <div class="invoice-amount">₹45,000</div>
                    </div>

                    <div class="invoice-card">
                        <div class="invoice-header">
                            <div class="invoice-id">INV-2023-002</div>
                            <div class="invoice-status status-pending">Pending</div>
                        </div>
                        <div class="invoice-details">
                            <div class="info-label">Client</div>
                            <div class="info-value">XYZ Ltd</div>
                            <div class="info-label">Issue Date</div>
                            <div class="info-value">20 Oct 2023</div>
                            <div class="info-label">Due Date</div>
                            <div class="info-value">5 Nov 2023</div>
                        </div>
                        <div class="invoice-amount">₹75,000</div>
                    </div>

                    <div class="invoice-card">
                        <div class="invoice-header">
                            <div class="invoice-id">INV-2023-003</div>
                            <div class="invoice-status status-overdue">Overdue</div>
                        </div>
                        <div class="invoice-details">
                            <div class="info-label">Client</div>
                            <div class="info-value">PQR Ltd</div>
                            <div class="info-label">Issue Date</div>
                            <div class="info-value">5 Oct 2023</div>
                            <div class="info-label">Due Date</div>
                            <div class="info-value">20 Oct 2023</div>
                        </div>
                        <div class="invoice-amount">₹60,000</div>
                    </div>

                    <div class="invoice-card">
                        <div class="invoice-header">
                            <div class="invoice-id">INV-2023-004</div>
                            <div class="invoice-status status-paid">Paid</div>
                        </div>
                        <div class="invoice-details">
                            <div class="info-label">Client</div>
                            <div class="info-value">MNO Enterprises</div>
                            <div class="info-label">Issue Date</div>
                            <div class="info-value">10 Nov 2023</div>
                            <div class="info-label">Due Date</div>
                            <div class="info-value">25 Nov 2023</div>
                        </div>
                        <div class="invoice-amount">₹35,000</div>
                    </div>

                    <div class="invoice-card">
                        <div class="invoice-header">
                            <div class="invoice-id">INV-2023-005</div>
                            <div class="invoice-status status-pending">Pending</div>
                        </div>
                        <div class="invoice-details">
                            <div class="info-label">Client</div>
                            <div class="info-value">STU & Co.</div>
                            <div class="info-label">Issue Date</div>
                            <div class="info-value">15 Nov 2023</div>
                            <div class="info-label">Due Date</div>
                            <div class="info-value">30 Nov 2023</div>
                        </div>
                        <div class="invoice-amount">₹50,000</div>
                    </div>

                    <div class="invoice-card">
                        <div class="invoice-header">
                            <div class="invoice-id">INV-2023-006</div>
                            <div class="invoice-status status-pending">Pending</div>
                        </div>
                        <div class="invoice-details">
                            <div class="info-label">Client</div>
                            <div class="info-value">EFG Industries</div>
                            <div class="info-label">Issue Date</div>
                            <div class="info-value">18 Nov 2023</div>
                            <div class="info-label">Due Date</div>
                            <div class="info-value">3 Dec 2023</div>
                        </div>
                        <div class="invoice-amount">₹40,000</div>
                    </div>
                </div>
            </div>

            <!-- Reports Page -->
            <div class="page" id="reports">
                <div class="dashboard-title">
                    <h2>Reports & Analytics</h2>
                    <button class="btn">
                        <i class="fas fa-download"></i>
                        Export All Reports
                    </button>
                </div>

                <div class="reports-grid">
                    <div class="report-card">
                        <div class="report-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="report-title">Revenue Report</div>
                        <div class="report-description">Monthly revenue trends and performance analysis</div>
                        <button class="btn">
                            <i class="fas fa-eye"></i>
                            View Report
                        </button>
                    </div>

                    <div class="report-card">
                        <div class="report-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="report-title">Client Portfolio</div>
                        <div class="report-description">Analysis of client distribution and profitability</div>
                        <button class="btn">
                            <i class="fas fa-eye"></i>
                            View Report
                        </button>
                    </div>

                    <div class="report-card">
                        <div class="report-icon">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <div class="report-title">Task Performance</div>
                        <div class="report-description">Efficiency and completion rate analysis</div>
                        <button class="btn">
                            <i class="fas fa-eye"></i>
                            View Report
                        </button>
                    </div>

                    <div class="report-card">
                        <div class="report-icon">
                            <i class="fas fa-file-invoice"></i>
                        </div>
                        <div class="report-title">Invoice Analytics</div>
                        <div class="report-description">Payment patterns and outstanding analysis</div>
                        <button class="btn">
                            <i class="fas fa-eye"></i>
                            View Report
                        </button>
                    </div>

                    <div class="report-card">
                        <div class="report-icon">
                            <i class="fas fa-balance-scale"></i>
                        </div>
                        <div class="report-title">Compliance Status</div>
                        <div class="report-description">Regulatory compliance tracking and reporting</div>
                        <button class="btn">
                            <i class="fas fa-eye"></i>
                            View Report
                        </button>
                    </div>

                    <div class="report-card">
                        <div class="report-icon">
                            <i class="fas fa-chart-pie"></i>
                        </div>
                        <div class="report-title">Service Analysis</div>
                        <div class="report-description">Breakdown of services and revenue streams</div>
                        <button class="btn">
                            <i class="fas fa-eye"></i>
                            View Report
                        </button>
                    </div>
                </div>

                <div class="card" style="margin-top: 2rem;">
                    <div class="card-header">
                        <div class="card-title">Financial Performance - Last 6 Months</div>
                    </div>
                    <div class="chart-container">
                        <canvas id="performanceChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Settings Page -->
            <div class="page" id="settings">
                <div class="dashboard-title">
                    <h2>Settings</h2>
                </div>

                <div class="settings-grid">
                    <div class="settings-nav">
                        <div class="settings-nav-item active">Profile Settings</div>
                        <div class="settings-nav-item">Notification Preferences</div>
                        <div class="settings-nav-item">Billing & Subscription</div>
                        <div class="settings-nav-item">Security</div>
                        <div class="settings-nav-item">Integrations</div>
                    </div>

                    <div class="settings-content">
                        <h3 style="margin-bottom: 1.5rem;">Profile Settings</h3>

                        <div class="setting-group">
                            <div class="setting-label">Full Name</div>
                            <input type="text" class="setting-control" value="Rahul Sharma">
                        </div>

                        <div class="setting-group">
                            <div class="setting-label">Email Address</div>
                            <input type="email" class="setting-control" value="rahul.sharma@example.com">
                        </div>

                        <div class="setting-group">
                            <div class="setting-label">Phone Number</div>
                            <input type="tel" class="setting-control" value="+91 98765 43210">
                        </div>

                        <div class="setting-group">
                            <div class="setting-label">Firm Name</div>
                            <input type="text" class="setting-control" value="Sharma & Associates">
                        </div>

                        <div class="setting-group">
                            <div class="setting-label">Address</div>
                            <textarea class="setting-control" rows="3">123 Business Street, Financial District, Mumbai, Maharashtra - 400001</textarea>
                        </div>

                        <div class="setting-group">
                            <div class="setting-label">GSTIN</div>
                            <input type="text" class="setting-control" value="27ABCDE1234F1Z5">
                        </div>

                        <div class="setting-group">
                            <div class="setting-label">Theme Preference</div>
                            <div style="display: flex; gap: 1rem; margin-top: 0.5rem;">
                                <div style="display: flex; align-items: center; gap: 0.5rem;">
                                    <input type="radio" id="dark-theme" name="theme" checked>
                                    <label for="dark-theme">Dark Theme</label>
                                </div>
                                <div style="display: flex; align-items: center; gap: 0.5rem;">
                                    <input type="radio" id="light-theme" name="theme">
                                    <label for="light-theme">Light Theme</label>
                                </div>
                            </div>
                        </div>

                        <div class="setting-group">
                            <div class="setting-label">Email Notifications</div>
                            <div style="display: flex; align-items: center; gap: 1rem; margin-top: 0.5rem;">
                                <label class="toggle-switch">
                                    <input type="checkbox" checked>
                                    <span class="toggle-slider"></span>
                                </label>
                                <span>Receive email notifications</span>
                            </div>
                        </div>

                        <div class="setting-group">
                            <div class="setting-label">SMS Notifications</div>
                            <div style="display: flex; align-items: center; gap: 1rem; margin-top: 0.5rem;">
                                <label class="toggle-switch">
                                    <input type="checkbox">
                                    <span class="toggle-slider"></span>
                                </label>
                                <span>Receive SMS notifications</span>
                            </div>
                        </div>

                        <button class="btn" style="margin-top: 1rem;">
                            <i class="fas fa-save"></i>
                            Save Changes
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Set current date
        const currentDateElement = document.getElementById('currentDate');
        const now = new Date();
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        currentDateElement.textContent = now.toLocaleDateString('en-IN', options);

        // Initialize Revenue Chart
        const revenueCtx = document.getElementById('revenueChart').getContext('2d');
        const revenueChart = new Chart(revenueCtx, {
            type: 'line',
            data: {
                labels: ['Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov'],
                datasets: [{
                    label: 'Monthly Revenue (₹)',
                    data: [185000, 192000, 178000, 205000, 215000, 230000],
                    borderColor: '#7c3aed',
                    backgroundColor: 'rgba(124, 58, 237, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: false,
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)'
                        },
                        ticks: {
                            callback: function(value) {
                                return '₹' + value.toLocaleString('en-IN');
                            }
                        }
                    },
                    x: {
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)'
                        }
                    }
                }
            }
        });

        // Initialize Performance Chart
        const performanceCtx = document.getElementById('performanceChart').getContext('2d');
        const performanceChart = new Chart(performanceCtx, {
            type: 'bar',
            data: {
                labels: ['Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov'],
                datasets: [{
                    label: 'Revenue (₹)',
                    data: [185000, 192000, 178000, 205000, 215000, 230000],
                    backgroundColor: 'rgba(124, 58, 237, 0.7)',
                    borderColor: '#7c3aed',
                    borderWidth: 1
                }, {
                    label: 'Expenses (₹)',
                    data: [75000, 82000, 78000, 85000, 92000, 88000],
                    backgroundColor: 'rgba(239, 68, 68, 0.7)',
                    borderColor: '#ef4444',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)'
                        },
                        ticks: {
                            callback: function(value) {
                                return '₹' + value.toLocaleString('en-IN');
                            }
                        }
                    },
                    x: {
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)'
                        }
                    }
                }
            }
        });

        // Page Navigation
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function() {
                const targetPage = this.getAttribute('data-page');
                
                // Update active nav link
                document.querySelectorAll('.nav-link').forEach(nav => {
                    nav.classList.remove('active');
                });
                this.classList.add('active');
                
                // Show target page
                document.querySelectorAll('.page').forEach(page => {
                    page.classList.remove('active');
                });
                document.getElementById(targetPage).classList.add('active');
            });
        });

        // Filter buttons for tasks
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.filter-btn').forEach(b => {
                    b.classList.remove('active');
                });
                this.classList.add('active');
            });
        });

        // Settings navigation
        document.querySelectorAll('.settings-nav-item').forEach(item => {
            item.addEventListener('click', function() {
                document.querySelectorAll('.settings-nav-item').forEach(nav => {
                    nav.classList.remove('active');
                });
                this.classList.add('active');
            });
        });

        // Add animation to tiles on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animation = 'fadeIn 0.5s ease-out forwards';
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observe all tiles and cards
        document.querySelectorAll('.tile, .card, .activity-item, .task-item, .invoice-card, .report-card').forEach(el => {
            el.style.opacity = '0';
            observer.observe(el);
        });

        // Add hover effects to interactive elements
        document.querySelectorAll('.btn, .nav-link, .activity-item, .task-item, .tile, .invoice-card, .report-card, .settings-nav-item').forEach(el => {
            el.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
            });
            
            el.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    </script>
</body>
</html>