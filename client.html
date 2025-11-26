<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Management - CA Dashboard</title>
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
            display: block;
            animation: fadeIn 0.5s ease-out;
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

        /* Client Stats */
        .client-stats {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
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

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px var(--shadow);
            background-color: var(--bg-card-hover);
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .stat-title {
            font-size: 0.9rem;
            color: var(--text-secondary);
        }

        .stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(124, 58, 237, 0.2);
            color: var(--primary);
        }

        .stat-value {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .stat-growth {
            font-size: 0.85rem;
            color: var(--secondary);
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .stat-danger {
            color: var(--danger);
        }

        /* Client Actions */
        .client-actions {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
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

        .btn-success {
            background-color: var(--secondary);
        }

        .btn-warning {
            background-color: var(--warning);
        }

        .btn-danger {
            background-color: var(--danger);
        }

        /* Client Table */
        .card {
            background-color: var(--bg-card);
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 6px var(--shadow);
            animation: slideUp 0.5s ease-out;
            margin-bottom: 2rem;
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

        .status-active {
            background-color: rgba(16, 185, 129, 0.2);
            color: var(--secondary);
        }

        .status-inactive {
            background-color: rgba(107, 114, 128, 0.2);
            color: var(--text-secondary);
        }

        .status-pending {
            background-color: rgba(245, 158, 11, 0.2);
            color: var(--warning);
        }

        .action-btns {
            display: flex;
            gap: 0.5rem;
        }

        .action-btn {
            padding: 0.25rem 0.5rem;
            border-radius: 6px;
            background: transparent;
            border: 1px solid var(--border);
            color: var(--text-secondary);
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .action-btn:hover {
            background-color: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        /* Client Details Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 1000;
            align-items: center;
            justify-content: center;
            animation: fadeIn 0.3s ease-out;
        }

        .modal-content {
            background-color: var(--bg-card);
            border-radius: 12px;
            width: 90%;
            max-width: 800px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 10px 25px var(--shadow);
            animation: slideUp 0.3s ease-out;
        }

        .modal-header {
            padding: 1.5rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-title {
            font-size: 1.5rem;
            font-weight: 600;
        }

        .close-modal {
            background: transparent;
            border: none;
            color: var(--text-secondary);
            font-size: 1.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .close-modal:hover {
            color: var(--danger);
        }

        .modal-body {
            padding: 1.5rem;
        }

        .client-details-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }

        .client-info-card {
            background-color: var(--bg-dark);
            border-radius: 8px;
            padding: 1.5rem;
        }

        .client-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
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
            margin-bottom: 1rem;
        }

        .info-label {
            font-size: 0.85rem;
            color: var(--text-secondary);
        }

        .info-value {
            font-weight: 500;
        }

        .services-list {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-top: 0.5rem;
        }

        .service-tag {
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            background-color: rgba(124, 58, 237, 0.2);
            color: var(--primary);
            font-size: 0.8rem;
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
            .client-details-grid {
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
            
            .client-stats {
                grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            }
            
            .client-actions {
                flex-direction: column;
            }
            
            .header-right {
                display: none;
            }
            
            .client-table {
                display: block;
                overflow-x: auto;
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
                    <input type="text" placeholder="Search clients...">
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
                <a class="nav-link" data-page="dashboard">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
                <a class="nav-link active" data-page="clients">
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
            <div class="page active" id="clients">
                <div class="dashboard-title">
                    <h2>Client Management</h2>
                    <div class="date-display" id="currentDate"></div>
                </div>

                <!-- Client Stats -->
                <div class="client-stats">
                    <div class="stat-card">
                        <div class="stat-header">
                            <div class="stat-title">Total Clients</div>
                            <div class="stat-icon">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                        <div class="stat-value">45</div>
                        <div class="stat-growth">
                            <i class="fas fa-arrow-up"></i>
                            <span>+5 from last month</span>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-header">
                            <div class="stat-title">Active Clients</div>
                            <div class="stat-icon">
                                <i class="fas fa-user-check"></i>
                            </div>
                        </div>
                        <div class="stat-value">38</div>
                        <div class="stat-growth">
                            <i class="fas fa-arrow-up"></i>
                            <span>84% of total</span>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-header">
                            <div class="stat-title">New This Month</div>
                            <div class="stat-icon">
                                <i class="fas fa-user-plus"></i>
                            </div>
                        </div>
                        <div class="stat-value">5</div>
                        <div class="stat-growth">
                            <i class="fas fa-arrow-up"></i>
                            <span>+2 from last month</span>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-header">
                            <div class="stat-title">Pending Documents</div>
                            <div class="stat-icon">
                                <i class="fas fa-file-alt"></i>
                            </div>
                        </div>
                        <div class="stat-value">12</div>
                        <div class="stat-growth stat-danger">
                            <i class="fas fa-exclamation-circle"></i>
                            <span>3 are overdue</span>
                        </div>
                    </div>
                </div>

                <!-- Client Actions -->
                <div class="client-actions">
                    <button class="btn btn-success" id="addClientBtn">
                        <i class="fas fa-user-plus"></i>
                        Add New Client
                    </button>
                    <button class="btn btn-secondary">
                        <i class="fas fa-filter"></i>
                        Filter Clients
                    </button>
                    <button class="btn btn-secondary">
                        <i class="fas fa-download"></i>
                        Export Client List
                    </button>
                    <button class="btn btn-secondary">
                        <i class="fas fa-envelope"></i>
                        Send Bulk Email
                    </button>
                    <button class="btn btn-warning">
                        <i class="fas fa-bell"></i>
                        Pending Actions
                    </button>
                </div>

                <!-- Client Table -->
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">All Clients</div>
                        <div class="card-actions">
                            <button class="btn btn-secondary">
                                <i class="fas fa-sync-alt"></i>
                                Refresh
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
                                    <td>abc@example.com<br>+91 98765 43210</td>
                                    <td>2 days ago</td>
                                    <td>15 Nov 2023</td>
                                    <td><span class="status-badge status-active">Active</span></td>
                                    <td>₹0</td>
                                    <td>
                                        <div class="action-btns">
                                            <button class="action-btn view-client" data-client="abc-traders">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="action-btn">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="action-btn">
                                                <i class="fas fa-envelope"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>XYZ Ltd</td>
                                    <td>Audit, Compliance</td>
                                    <td>xyz@example.com<br>+91 98765 43211</td>
                                    <td>1 week ago</td>
                                    <td>30 Nov 2023</td>
                                    <td><span class="status-badge status-active">Active</span></td>
                                    <td>₹45,000</td>
                                    <td>
                                        <div class="action-btns">
                                            <button class="action-btn view-client" data-client="xyz-ltd">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="action-btn">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="action-btn">
                                                <i class="fas fa-envelope"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>MNO Enterprises</td>
                                    <td>GST, Bookkeeping</td>
                                    <td>mno@example.com<br>+91 98765 43212</td>
                                    <td>3 days ago</td>
                                    <td>20 Nov 2023</td>
                                    <td><span class="status-badge status-active">Active</span></td>
                                    <td>₹0</td>
                                    <td>
                                        <div class="action-btns">
                                            <button class="action-btn view-client" data-client="mno-enterprises">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="action-btn">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="action-btn">
                                                <i class="fas fa-envelope"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>PQR Ltd</td>
                                    <td>Tax Audit, ROC</td>
                                    <td>pqr@example.com<br>+91 98765 43213</td>
                                    <td>2 weeks ago</td>
                                    <td>25 Nov 2023</td>
                                    <td><span class="status-badge status-pending">Pending Docs</span></td>
                                    <td>₹75,000</td>
                                    <td>
                                        <div class="action-btns">
                                            <button class="action-btn view-client" data-client="pqr-ltd">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="action-btn">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="action-btn">
                                                <i class="fas fa-envelope"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>STU & Co.</td>
                                    <td>GST, Taxation, Advisory</td>
                                    <td>stu@example.com<br>+91 98765 43214</td>
                                    <td>5 days ago</td>
                                    <td>10 Dec 2023</td>
                                    <td><span class="status-badge status-active">Active</span></td>
                                    <td>₹25,000</td>
                                    <td>
                                        <div class="action-btns">
                                            <button class="action-btn view-client" data-client="stu-co">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="action-btn">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="action-btn">
                                                <i class="fas fa-envelope"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>EFG Industries</td>
                                    <td>Taxation, Consulting</td>
                                    <td>efg@example.com<br>+91 98765 43215</td>
                                    <td>1 month ago</td>
                                    <td>15 Dec 2023</td>
                                    <td><span class="status-badge status-inactive">Inactive</span></td>
                                    <td>₹0</td>
                                    <td>
                                        <div class="action-btns">
                                            <button class="action-btn view-client" data-client="efg-industries">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="action-btn">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="action-btn">
                                                <i class="fas fa-envelope"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>HIJ Solutions</td>
                                    <td>GST, Audit</td>
                                    <td>hij@example.com<br>+91 98765 43216</td>
                                    <td>3 weeks ago</td>
                                    <td>5 Jan 2024</td>
                                    <td><span class="status-badge status-active">Active</span></td>
                                    <td>₹15,000</td>
                                    <td>
                                        <div class="action-btns">
                                            <button class="action-btn view-client" data-client="hij-solutions">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="action-btn">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="action-btn">
                                                <i class="fas fa-envelope"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Client Services Overview -->
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Client Services Overview</div>
                    </div>
                    <div class="chart-container">
                        <canvas id="servicesChart"></canvas>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Client Details Modal -->
    <div class="modal" id="clientModal">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">Client Details</div>
                <button class="close-modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="client-details-grid">
                    <div class="client-info-card">
                        <div class="client-header">
                            <div class="client-avatar" id="clientAvatar">A</div>
                            <div>
                                <div class="client-name" id="clientName">ABC Traders</div>
                                <div class="client-meta" id="clientType">Proprietorship</div>
                            </div>
                        </div>
                        
                        <div class="info-group">
                            <div class="info-label">Contact Person</div>
                            <div class="info-value" id="contactPerson">Amit Sharma</div>
                        </div>
                        
                        <div class="info-group">
                            <div class="info-label">Email</div>
                            <div class="info-value" id="clientEmail">abc@example.com</div>
                        </div>
                        
                        <div class="info-group">
                            <div class="info-label">Phone</div>
                            <div class="info-value" id="clientPhone">+91 98765 43210</div>
                        </div>
                        
                        <div class="info-group">
                            <div class="info-label">Address</div>
                            <div class="info-value" id="clientAddress">123 Business Street, Financial District, Mumbai, Maharashtra - 400001</div>
                        </div>
                        
                        <div class="info-group">
                            <div class="info-label">GSTIN</div>
                            <div class="info-value" id="clientGST">27ABCDE1234F1Z5</div>
                        </div>
                    </div>
                    
                    <div class="client-info-card">
                        <div class="info-group">
                            <div class="info-label">Services</div>
                            <div class="services-list" id="clientServices">
                                <!-- Services will be populated by JS -->
                            </div>
                        </div>
                        
                        <div class="info-group">
                            <div class="info-label">Client Since</div>
                            <div class="info-value" id="clientSince">15 March 2020</div>
                        </div>
                        
                        <div class="info-group">
                            <div class="info-label">Last Contact</div>
                            <div class="info-value" id="lastContact">2 days ago</div>
                        </div>
                        
                        <div class="info-group">
                            <div class="info-label">Next Deadline</div>
                            <div class="info-value" id="nextDeadline">15 November 2023</div>
                        </div>
                        
                        <div class="info-group">
                            <div class="info-label">Outstanding Balance</div>
                            <div class="info-value" id="outstandingBalance">₹0</div>
                        </div>
                        
                        <div class="info-group">
                            <div class="info-label">Status</div>
                            <div id="clientStatus"><span class="status-badge status-active">Active</span></div>
                        </div>
                    </div>
                </div>
                
                <div class="card" style="margin-top: 1.5rem;">
                    <div class="card-header">
                        <div class="card-title">Recent Activities</div>
                    </div>
                    <div class="activity-stream">
                        <div class="activity-item">
                            <div class="activity-icon meeting">
                                <i class="fas fa-video"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">Consultation Meeting</div>
                                <div class="activity-time">Today, 10:30 AM</div>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon communication">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">Sent GST Return Reminder</div>
                                <div class="activity-time">Yesterday, 3:15 PM</div>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon communication">
                                <i class="fas fa-file-invoice"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">Invoice #INV-2023-045 Sent</div>
                                <div class="activity-time">2 days ago</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div style="display: flex; gap: 1rem; margin-top: 1.5rem;">
                    <button class="btn">
                        <i class="fas fa-edit"></i>
                        Edit Client
                    </button>
                    <button class="btn btn-secondary">
                        <i class="fas fa-file-invoice"></i>
                        Create Invoice
                    </button>
                    <button class="btn btn-secondary">
                        <i class="fas fa-tasks"></i>
                        Add Task
                    </button>
                    <button class="btn btn-danger">
                        <i class="fas fa-trash"></i>
                        Delete Client
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Set current date
        const currentDateElement = document.getElementById('currentDate');
        const now = new Date();
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        currentDateElement.textContent = now.toLocaleDateString('en-IN', options);

        // Initialize Services Chart
        const servicesCtx = document.getElementById('servicesChart').getContext('2d');
        const servicesChart = new Chart(servicesCtx, {
            type: 'doughnut',
            data: {
                labels: ['GST', 'Taxation', 'Audit', 'Compliance', 'Bookkeeping', 'Advisory'],
                datasets: [{
                    data: [18, 12, 8, 10, 7, 5],
                    backgroundColor: [
                        '#7c3aed',
                        '#10b981',
                        '#f59e0b',
                        '#ef4444',
                        '#8b5cf6',
                        '#06b6d4'
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right'
                    }
                }
            }
        });

        // Client data for modal
        const clients = {
            'abc-traders': {
                name: 'ABC Traders',
                type: 'Proprietorship',
                contactPerson: 'Amit Sharma',
                email: 'abc@example.com',
                phone: '+91 98765 43210',
                address: '123 Business Street, Financial District, Mumbai, Maharashtra - 400001',
                gst: '27ABCDE1234F1Z5',
                services: ['GST', 'Taxation'],
                since: '15 March 2020',
                lastContact: '2 days ago',
                nextDeadline: '15 November 2023',
                outstanding: '₹0',
                status: 'active',
                avatar: 'A'
            },
            'xyz-ltd': {
                name: 'XYZ Ltd',
                type: 'Private Limited',
                contactPerson: 'Rajiv Mehta',
                email: 'xyz@example.com',
                phone: '+91 98765 43211',
                address: '456 Corporate Avenue, Andheri East, Mumbai, Maharashtra - 400069',
                gst: '27XYZAB5678G2H3',
                services: ['Audit', 'Compliance'],
                since: '10 July 2019',
                lastContact: '1 week ago',
                nextDeadline: '30 November 2023',
                outstanding: '₹45,000',
                status: 'active',
                avatar: 'X'
            },
            'mno-enterprises': {
                name: 'MNO Enterprises',
                type: 'Partnership',
                contactPerson: 'Priya Patel',
                email: 'mno@example.com',
                phone: '+91 98765 43212',
                address: '789 Trade Center, Lower Parel, Mumbai, Maharashtra - 400013',
                gst: '27MNOCD9012I3J4',
                services: ['GST', 'Bookkeeping'],
                since: '5 January 2021',
                lastContact: '3 days ago',
                nextDeadline: '20 November 2023',
                outstanding: '₹0',
                status: 'active',
                avatar: 'M'
            },
            'pqr-ltd': {
                name: 'PQR Ltd',
                type: 'Private Limited',
                contactPerson: 'Sanjay Gupta',
                email: 'pqr@example.com',
                phone: '+91 98765 43213',
                address: '321 Industry Zone, Thane West, Thane, Maharashtra - 400601',
                gst: '27PQREF3456K7L8',
                services: ['Tax Audit', 'ROC'],
                since: '22 November 2018',
                lastContact: '2 weeks ago',
                nextDeadline: '25 November 2023',
                outstanding: '₹75,000',
                status: 'pending',
                avatar: 'P'
            },
            'stu-co': {
                name: 'STU & Co.',
                type: 'Partnership',
                contactPerson: 'Neha Singh',
                email: 'stu@example.com',
                phone: '+91 98765 43214',
                address: '654 Commerce Road, Vashi, Navi Mumbai, Maharashtra - 400703',
                gst: '27STUGH7890M9N0',
                services: ['GST', 'Taxation', 'Advisory'],
                since: '8 September 2020',
                lastContact: '5 days ago',
                nextDeadline: '10 December 2023',
                outstanding: '₹25,000',
                status: 'active',
                avatar: 'S'
            },
            'efg-industries': {
                name: 'EFG Industries',
                type: 'Private Limited',
                contactPerson: 'Vikram Joshi',
                email: 'efg@example.com',
                phone: '+91 98765 43215',
                address: '987 Manufacturing Hub, Pune, Maharashtra - 411001',
                gst: '27EFGIJ1234K5L6',
                services: ['Taxation', 'Consulting'],
                since: '3 May 2017',
                lastContact: '1 month ago',
                nextDeadline: '15 December 2023',
                outstanding: '₹0',
                status: 'inactive',
                avatar: 'E'
            },
            'hij-solutions': {
                name: 'HIJ Solutions',
                type: 'Proprietorship',
                contactPerson: 'Anita Desai',
                email: 'hij@example.com',
                phone: '+91 98765 43216',
                address: '147 Tech Park, Hinjewadi, Pune, Maharashtra - 411057',
                gst: '27HIJKL5678M9N0',
                services: ['GST', 'Audit'],
                since: '12 December 2021',
                lastContact: '3 weeks ago',
                nextDeadline: '5 January 2024',
                outstanding: '₹15,000',
                status: 'active',
                avatar: 'H'
            }
        };

        // Modal functionality
        const modal = document.getElementById('clientModal');
        const closeModal = document.querySelector('.close-modal');
        const viewClientButtons = document.querySelectorAll('.view-client');

        viewClientButtons.forEach(button => {
            button.addEventListener('click', function() {
                const clientId = this.getAttribute('data-client');
                const client = clients[clientId];
                
                if (client) {
                    document.getElementById('clientAvatar').textContent = client.avatar;
                    document.getElementById('clientName').textContent = client.name;
                    document.getElementById('clientType').textContent = client.type;
                    document.getElementById('contactPerson').textContent = client.contactPerson;
                    document.getElementById('clientEmail').textContent = client.email;
                    document.getElementById('clientPhone').textContent = client.phone;
                    document.getElementById('clientAddress').textContent = client.address;
                    document.getElementById('clientGST').textContent = client.gst;
                    document.getElementById('clientSince').textContent = client.since;
                    document.getElementById('lastContact').textContent = client.lastContact;
                    document.getElementById('nextDeadline').textContent = client.nextDeadline;
                    document.getElementById('outstandingBalance').textContent = client.outstanding;
                    
                    // Update services
                    const servicesContainer = document.getElementById('clientServices');
                    servicesContainer.innerHTML = '';
                    client.services.forEach(service => {
                        const serviceTag = document.createElement('span');
                        serviceTag.className = 'service-tag';
                        serviceTag.textContent = service;
                        servicesContainer.appendChild(serviceTag);
                    });
                    
                    // Update status
                    const statusContainer = document.getElementById('clientStatus');
                    statusContainer.innerHTML = '';
                    let statusClass = 'status-active';
                    if (client.status === 'pending') statusClass = 'status-pending';
                    if (client.status === 'inactive') statusClass = 'status-inactive';
                    
                    const statusBadge = document.createElement('span');
                    statusBadge.className = `status-badge ${statusClass}`;
                    statusBadge.textContent = 
                        client.status === 'active' ? 'Active' : 
                        client.status === 'pending' ? 'Pending Docs' : 'Inactive';
                    statusContainer.appendChild(statusBadge);
                    
                    // Show modal
                    modal.style.display = 'flex';
                }
            });
        });

        closeModal.addEventListener('click', function() {
            modal.style.display = 'none';
        });

        window.addEventListener('click', function(event) {
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });

        // Add animation to elements on scroll
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

        // Observe all stat cards and table rows
        document.querySelectorAll('.stat-card, .client-table tr').forEach(el => {
            el.style.opacity = '0';
            observer.observe(el);
        });

        // Add hover effects to interactive elements
        document.querySelectorAll('.btn, .nav-link, .action-btn, .stat-card').forEach(el => {
            el.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
            });
            
            el.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });

        // Add new client button functionality
        document.getElementById('addClientBtn').addEventListener('click', function() {
            alert('Add New Client functionality would open a form here in a real application.');
        });
    </script>
</body>
</html>