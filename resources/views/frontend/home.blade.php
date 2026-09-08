<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ readConfig('site_name') ?? 'StradPOS' }} - Modern Web-Based Point of Sale &amp; Business Management</title>
    <meta name="description" content="StradPOS is a modern, web-based Point of Sale (POS) and business management solution developed using Laravel and React for managing products, inventory, customers, orders, and payments.">
    <meta name="keywords" content="StradPOS, POS software, web-based pos, retail management, inventory management, point of sale, laravel react pos, customer management, order management">

    <!-- FAVICON -->
    <link rel="shortcut icon" href="{{ assetImage(readConfig('favicon_icon') ?? readConfig('site_logo')) }}" type="image/x-icon">

    <!-- GOOGLE FONTS (Plus Jakarta Sans) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- BOOTSTRAP 5.3 CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap/bootstrap.min.css') }}">

    <!-- FONT AWESOME ICONS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- CUSTOM LANDING CSS -->
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
</head>

<body class="sp-landing-body">

    <!-- ======================================================================
         NAVIGATION BAR
         ====================================================================== -->
    <nav class="sp-navbar" id="spNavbar">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <!-- Brand Logo -->
                <a href="#home" class="sp-brand">
                    <span class="sp-brand-text">
                        {{ readConfig('site_name') ?? 'StradPos' }}
                    </span>
                </a>

                <!-- Desktop Nav Links -->
                <ul class="sp-nav-links">
                    <li><a href="#home" class="sp-nav-link">Home</a></li>
                    <li><a href="#features" class="sp-nav-link">Features</a></li>
                    <li><a href="#showcase" class="sp-nav-link">Screenshots</a></li>
                    <li><a href="#solutions" class="sp-nav-link">Industries</a></li>
                    <li><a href="#hardware" class="sp-nav-link">Hardware</a></li>
                    <li><a href="#why-us" class="sp-nav-link">Why StradPos</a></li>
                    <li><a href="#contact" class="sp-nav-link">Contact</a></li>
                </ul>

                <!-- Nav Action Buttons -->
                <div class="sp-nav-actions">
                    @auth
                        <a href="{{ route('backend.admin.dashboard') }}" class="sp-btn-nav-cta">
                            <i class="fas fa-gauge-high mr-1"></i> Dashboard
                        </a>
                        <a href="{{ route('logout') }}" class="sp-btn-nav-login">
                            <i class="fas fa-arrow-right-from-bracket"></i>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="sp-btn-nav-login">
                            <i class="fas fa-user-circle mr-1"></i> Sign In
                        </a>
                        <a href="{{ route('signup') }}" class="sp-btn-nav-cta">
                            <i class="fas fa-rocket mr-1"></i> Get Started Free
                        </a>
                    @endauth

                    <button class="sp-mobile-toggle" id="spMobileToggle" aria-label="Toggle Navigation">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Mobile Dropdown Menu -->
    <div id="spMobileMenu" style="display: none; background: #ffffff; padding: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); position: fixed; top: 70px; left: 0; right: 0; z-index: 999;">
        <ul style="list-style: none; padding: 0; margin: 0 0 15px 0;">
            <li class="py-2"><a href="#home" class="text-dark fw-bold text-decoration-none">Home</a></li>
            <li class="py-2"><a href="#features" class="text-dark fw-bold text-decoration-none">Features</a></li>
            <li class="py-2"><a href="#showcase" class="text-dark fw-bold text-decoration-none">Screenshots</a></li>
            <li class="py-2"><a href="#solutions" class="text-dark fw-bold text-decoration-none">Industries</a></li>
            <li class="py-2"><a href="#hardware" class="text-dark fw-bold text-decoration-none">Hardware</a></li>
            <li class="py-2"><a href="#why-us" class="text-dark fw-bold text-decoration-none">Why StradPos</a></li>
            <li class="py-2"><a href="#contact" class="text-dark fw-bold text-decoration-none">Contact</a></li>
        </ul>
        <div class="d-flex gap-2">
            <a href="{{ route('login') }}" class="btn btn-outline-primary w-50">Sign In</a>
            <a href="{{ route('signup') }}" class="btn btn-primary w-50">Sign Up</a>
        </div>
    </div>

    <!-- ======================================================================
         HERO SECTION
         ====================================================================== -->
    <!-- ======================================================================
         HERO SECTION (2-COLUMN SPLIT WITH HARDWARE MACHINES CLUSTER)
         ====================================================================== -->
    <section class="sp-hero-section" id="home">
        <!-- Subtle diagonal polygon slice matching reference UI -->
        <div class="sp-hero-slice-bg"></div>

        <!-- Concentric Circular Accents -->
        <div class="sp-hero-circle-accent sp-hero-circle-1"></div>
        <div class="sp-hero-circle-accent sp-hero-circle-2"></div>
        <div class="sp-hero-circle-accent sp-hero-circle-3"></div>

        <div class="container position-relative" style="z-index: 5;">
            <div class="row align-items-center sp-hero-split-row">
                <!-- Left Column: StradPOS Core Value Proposition -->
                <div class="col-lg-6 sp-hero-left-content">
                    <p class="sp-hero-eyebrow-text">Modern Web-Based Point of Sale</p>
                    <h1 class="sp-hero-split-title">Complete POS &amp; Business Management</h1>
                    <p class="sp-hero-split-subtitle">
                        Developed using Laravel and React to simplify day-to-day sales operations, inventory, customers, orders, and payments from a centralized dashboard.
                    </p>

                    <!-- Action Buttons -->
                    <div class="sp-hero-action-buttons">
                        <a href="{{ route('signup') }}" class="sp-btn-expert">
                            Get Started Free
                        </a>
                        <a href="#videoModal" class="sp-btn-video" data-bs-toggle="modal" data-bs-target="#videoModal">
                            <span class="sp-btn-play-icon"><i class="fas fa-play"></i></span>
                            <span>Watch System Tour</span>
                        </a>
                    </div>
                </div>

                <!-- Right Column: StradPos Screenshots inside Computer and Machines -->
                <div class="col-lg-6 sp-hero-right-hardware">
                    <div class="sp-cluster-container">
                        <!-- 1. Central POS Touchscreen Desktop Monitor with Stand -->
                        <div class="sp-item-pos-terminal">
                            <div class="sp-pos-terminal-monitor">
                                <div class="sp-pos-monitor-bezel">
                                    <div class="sp-pos-monitor-topbar">
                                        <span class="sp-pos-cam-dot"></span>
                                        <span class="sp-pos-brand-pill"><i class="fas fa-desktop me-1"></i> STRADPOS TERMINAL</span>
                                        <span class="sp-pos-status-led" title="Online"></span>
                                    </div>
                                    <div class="sp-pos-screen-window">
                                        <img src="{{ asset('ss/pos.png') }}?v={{ time() }}" alt="StradPos Live Cashier Checkout Screen" class="sp-pos-screen-img">
                                        <div class="sp-screen-gloss"></div>
                                    </div>
                                    <!-- Side Card Swipe & NFC Reader Attachment -->
                                    <div class="sp-pos-side-reader" title="Magstripe & Contactless Reader">
                                        <span class="sp-reader-slot"></span>
                                        <span class="sp-reader-led"></span>
                                    </div>
                                </div>
                                <!-- Heavy-duty POS Stand Neck & Weighted Base -->
                                <div class="sp-pos-stand">
                                    <div class="sp-stand-neck">
                                        <div class="sp-stand-cable-cutout"></div>
                                    </div>
                                    <div class="sp-stand-base"></div>
                                </div>
                            </div>
                        </div>

                        <!-- 2. Horizontal Tablet (Front Left of POS Stand) -->
                        <div class="sp-item-tablet">
                            <div class="sp-tablet-device">
                                <div class="sp-tablet-cam"></div>
                                <div class="sp-tablet-screen">
                                    <img src="{{ asset('ss/sales.png') }}?v={{ time() }}" alt="StradPos Tablet Sales Management" class="sp-tablet-screen-img">
                                    <div class="sp-tablet-gloss"></div>
                                </div>
                            </div>
                        </div>

                        <!-- 3. Smart Handheld POS Machine (Right side standing with paper slot) -->
                        <div class="sp-item-handheld">
                            <div class="sp-handheld-terminal">
                                <!-- Thermal Receipt Printer Hood & Paper Slot -->
                                <div class="sp-handheld-printer-head">
                                    <div class="sp-printer-roll-slit"></div>
                                    <div class="sp-printer-paper-tear"><i class="fas fa-receipt me-1"></i> THERMAL RECEIPT</div>
                                </div>
                                <!-- Contactless Tap / NFC Symbol -->
                                <div class="sp-handheld-nfc">
                                    <i class="fas fa-wifi"></i>
                                    <span>CONTACTLESS TAP</span>
                                </div>
                                <!-- Handheld Smart Screen displaying StradPos Invoice -->
                                <div class="sp-handheld-screen">
                                    <img src="{{ asset('ss/pos_invoice.png') }}?v={{ time() }}" alt="StradPos Smart POS Handheld Invoice" class="sp-handheld-screen-img">
                                </div>
                                <!-- Bottom Chip Card Insertion Slot -->
                                <div class="sp-handheld-chin">
                                    <div class="sp-chip-card-slot" title="EMV Chip Card Reader">
                                        <span class="sp-card-peek"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SVG Wave Divider -->
        <div class="sp-hero-wave">
            <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M0,0 C150,90 350,-40 500,50 C650,140 900,10 1200,40 L1200,120 L0,120 Z" fill="#ffffff"></path>
            </svg>
        </div>
    </section>

    <!-- ======================================================================
         FEATURES SECTION ("10 Key Features of StradPOS")
         ====================================================================== -->
    <section class="sp-features-section" id="features">
        <div class="container">
            <div class="sp-section-header">
                <span class="sp-section-eyebrow">STRADPOS KEY FEATURES</span>
                <h2 class="sp-section-title">Complete Sales Workflow &amp; Business Management</h2>
                <p class="sp-section-subtitle">
                    StradPOS provides a comprehensive set of tools for managing products and categories, processing sales transactions, maintaining customer records, monitoring inventory, and reviewing business performance through an intuitive dashboard.
                </p>
            </div>

            <div class="row g-4 justify-content-center">
                <!-- Feature 1: POS & Sales Management -->
                <div class="col-md-6 col-lg-4">
                    <div class="sp-feature-card">
                        <div class="sp-feature-icon-box sp-icon-purple">
                            <i class="fas fa-cash-register"></i>
                        </div>
                        <h3 class="sp-feature-title">POS &amp; Sales Management</h3>
                        <p class="sp-feature-desc">
                            Create and manage sales transactions quickly through an easy-to-use POS interface.
                        </p>
                        <a href="#showcase" class="sp-feature-link">
                            Explore POS <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Feature 2: Product Management -->
                <div class="col-md-6 col-lg-4">
                    <div class="sp-feature-card">
                        <div class="sp-feature-icon-box sp-icon-cyan">
                            <i class="fas fa-tags"></i>
                        </div>
                        <h3 class="sp-feature-title">Product Management</h3>
                        <p class="sp-feature-desc">
                            Manage products, categories, pricing, stock information, and product details.
                        </p>
                        <a href="#showcase" class="sp-feature-link">
                            Explore Products <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Feature 3: Inventory Management -->
                <div class="col-md-6 col-lg-4">
                    <div class="sp-feature-card">
                        <div class="sp-feature-icon-box sp-icon-pink">
                            <i class="fas fa-boxes-stacked"></i>
                        </div>
                        <h3 class="sp-feature-title">Inventory Management</h3>
                        <p class="sp-feature-desc">
                            Track stock levels and maintain accurate inventory records.
                        </p>
                        <a href="#showcase" class="sp-feature-link">
                            Explore Inventory <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Feature 4: Customer Management -->
                <div class="col-md-6 col-lg-4">
                    <div class="sp-feature-card">
                        <div class="sp-feature-icon-box sp-icon-blue">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3 class="sp-feature-title">Customer Management</h3>
                        <p class="sp-feature-desc">
                            Store and manage customer information and purchase history.
                        </p>
                        <a href="#showcase" class="sp-feature-link">
                            Explore Customers <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Feature 5: Order Management -->
                <div class="col-md-6 col-lg-4">
                    <div class="sp-feature-card">
                        <div class="sp-feature-icon-box sp-icon-orange">
                            <i class="fas fa-clipboard-list"></i>
                        </div>
                        <h3 class="sp-feature-title">Order Management</h3>
                        <p class="sp-feature-desc">
                            Manage orders and monitor their status throughout the sales process.
                        </p>
                        <a href="#showcase" class="sp-feature-link">
                            Explore Orders <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Feature 6: Payment Management -->
                <div class="col-md-6 col-lg-4">
                    <div class="sp-feature-card">
                        <div class="sp-feature-icon-box sp-icon-green">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <h3 class="sp-feature-title">Payment Management</h3>
                        <p class="sp-feature-desc">
                            Support and track transaction and payment information.
                        </p>
                        <a href="#showcase" class="sp-feature-link">
                            Explore Payments <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Feature 7: Dashboard & Reports -->
                <div class="col-md-6 col-lg-4">
                    <div class="sp-feature-card">
                        <div class="sp-feature-icon-box sp-icon-purple">
                            <i class="fas fa-chart-pie"></i>
                        </div>
                        <h3 class="sp-feature-title">Dashboard &amp; Reports</h3>
                        <p class="sp-feature-desc">
                            Provide business insights through sales summaries, statistics, and reporting tools.
                        </p>
                        <a href="#showcase" class="sp-feature-link">
                            Explore Reports <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Feature 8: Role-Based Access -->
                <div class="col-md-6 col-lg-4">
                    <div class="sp-feature-card">
                        <div class="sp-feature-icon-box sp-icon-cyan">
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <h3 class="sp-feature-title">Role-Based Access</h3>
                        <p class="sp-feature-desc">
                            Manage system access and permissions for different types of users.
                        </p>
                        <a href="#showcase" class="sp-feature-link">
                            Explore Roles <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Feature 9: Responsive Interface -->
                <div class="col-md-6 col-lg-4">
                    <div class="sp-feature-card">
                        <div class="sp-feature-icon-box sp-icon-pink">
                            <i class="fas fa-mobile-screen-button"></i>
                        </div>
                        <h3 class="sp-feature-title">Responsive Interface</h3>
                        <p class="sp-feature-desc">
                            React-based interface designed for efficient use across different screen sizes.
                        </p>
                        <a href="#showcase" class="sp-feature-link">
                            Explore UI <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======================================================================
         SYSTEM SHOWCASE TABS ("Explore StradPos in Action")
         ====================================================================== -->
    <section class="sp-showcase-section" id="showcase">
        <div class="container">
            <div class="sp-section-header">
                <span class="sp-section-eyebrow">LIVE SYSTEM TOUR</span>
                <h2 class="sp-section-title">Explore StradPos in Action</h2>
                <p class="sp-section-subtitle">
                    Take an authentic tour through our production interfaces — built for speed, accuracy, and effortless retail management.
                </p>
            </div>

            <!-- Tab Navigation Buttons -->
            <div class="sp-tabs-nav">
                <button class="sp-tab-btn active" data-tab="tab-pos">
                    <i class="fas fa-cash-register"></i> POS Terminal
                </button>
                <button class="sp-tab-btn" data-tab="tab-dashboard">
                    <i class="fas fa-chart-line"></i> Analytics Dashboard
                </button>
                <button class="sp-tab-btn" data-tab="tab-receipt">
                    <i class="fas fa-receipt"></i> Thermal Receipt
                </button>
                <button class="sp-tab-btn" data-tab="tab-invoice">
                    <i class="fas fa-file-invoice"></i> Standard Invoice
                </button>
                <button class="sp-tab-btn" data-tab="tab-products">
                    <i class="fas fa-boxes-stacked"></i> Products Catalog
                </button>
                <button class="sp-tab-btn" data-tab="tab-purchase">
                    <i class="fas fa-truck-ramp-box"></i> Supplier Purchases
                </button>
                <button class="sp-tab-btn" data-tab="tab-reports">
                    <i class="fas fa-file-excel"></i> Sales Reports
                </button>
            </div>

            <!-- Tab 1: POS Terminal -->
            <div class="sp-tab-content-panel active" id="tab-pos">
                <div class="sp-browser-window">
                    <div class="sp-browser-header">
                        <div class="sp-browser-dots">
                            <span class="sp-dot red"></span>
                            <span class="sp-dot yellow"></span>
                            <span class="sp-dot green"></span>
                        </div>
                        <div class="sp-browser-address-bar">
                            <i class="fas fa-lock"></i>
                            <span>https://app.stradpos.com/admin/cart</span>
                        </div>
                    </div>
                    <div class="sp-browser-content">
                        <img src="{{ asset('ss/pos.png') }}?v={{ time() }}" alt="StradPos POS Screen" loading="lazy">
                    </div>
                </div>
            </div>

            <!-- Tab 2: Dashboard -->
            <div class="sp-tab-content-panel" id="tab-dashboard">
                <div class="sp-browser-window">
                    <div class="sp-browser-header">
                        <div class="sp-browser-dots">
                            <span class="sp-dot red"></span>
                            <span class="sp-dot yellow"></span>
                            <span class="sp-dot green"></span>
                        </div>
                        <div class="sp-browser-address-bar">
                            <i class="fas fa-lock"></i>
                            <span>https://app.stradpos.com/admin/dashboard</span>
                        </div>
                    </div>
                    <div class="sp-browser-content">
                        <img src="{{ asset('ss/dashboard.png') }}?v={{ time() }}" alt="StradPos Dashboard" loading="lazy">
                    </div>
                </div>
            </div>

            <!-- Tab 3: Thermal Receipt -->
            <div class="sp-tab-content-panel" id="tab-receipt">
                <div class="sp-browser-window">
                    <div class="sp-browser-header">
                        <div class="sp-browser-dots">
                            <span class="sp-dot red"></span>
                            <span class="sp-dot yellow"></span>
                            <span class="sp-dot green"></span>
                        </div>
                        <div class="sp-browser-address-bar">
                            <i class="fas fa-lock"></i>
                            <span>https://app.stradpos.com/admin/orders/pos-invoice/2</span>
                        </div>
                    </div>
                    <div class="sp-browser-content">
                        <img src="{{ asset('ss/pos_invoice.png') }}?v={{ time() }}" alt="StradPos POS Thermal Receipt" loading="lazy">
                    </div>
                </div>
            </div>

            <!-- Tab 4: Standard Invoice -->
            <div class="sp-tab-content-panel" id="tab-invoice">
                <div class="sp-browser-window">
                    <div class="sp-browser-header">
                        <div class="sp-browser-dots">
                            <span class="sp-dot red"></span>
                            <span class="sp-dot yellow"></span>
                            <span class="sp-dot green"></span>
                        </div>
                        <div class="sp-browser-address-bar">
                            <i class="fas fa-lock"></i>
                            <span>https://app.stradpos.com/admin/orders/invoice/1</span>
                        </div>
                    </div>
                    <div class="sp-browser-content">
                        <img src="{{ asset('ss/sales.png') }}?v={{ time() }}" alt="StradPos Sales Invoice" loading="lazy">
                    </div>
                </div>
            </div>

            <!-- Tab 5: Products -->
            <div class="sp-tab-content-panel" id="tab-products">
                <div class="sp-browser-window">
                    <div class="sp-browser-header">
                        <div class="sp-browser-dots">
                            <span class="sp-dot red"></span>
                            <span class="sp-dot yellow"></span>
                            <span class="sp-dot green"></span>
                        </div>
                        <div class="sp-browser-address-bar">
                            <i class="fas fa-lock"></i>
                            <span>https://app.stradpos.com/admin/products</span>
                        </div>
                    </div>
                    <div class="sp-browser-content">
                        <img src="{{ asset('ss/product_list.png') }}?v={{ time() }}" alt="StradPos Product Management" loading="lazy">
                    </div>
                </div>
            </div>

            <!-- Tab 6: Purchase -->
            <div class="sp-tab-content-panel" id="tab-purchase">
                <div class="sp-browser-window">
                    <div class="sp-browser-header">
                        <div class="sp-browser-dots">
                            <span class="sp-dot red"></span>
                            <span class="sp-dot yellow"></span>
                            <span class="sp-dot green"></span>
                        </div>
                        <div class="sp-browser-address-bar">
                            <i class="fas fa-lock"></i>
                            <span>https://app.stradpos.com/admin/purchase/create</span>
                        </div>
                    </div>
                    <div class="sp-browser-content">
                        <img src="{{ asset('ss/product_purchase.png') }}?v={{ time() }}" alt="StradPos Supplier Purchases" loading="lazy">
                    </div>
                </div>
            </div>

            <!-- Tab 7: Reports -->
            <div class="sp-tab-content-panel" id="tab-reports">
                <div class="sp-browser-window">
                    <div class="sp-browser-header">
                        <div class="sp-browser-dots">
                            <span class="sp-dot red"></span>
                            <span class="sp-dot yellow"></span>
                            <span class="sp-dot green"></span>
                        </div>
                        <div class="sp-browser-address-bar">
                            <i class="fas fa-lock"></i>
                            <span>https://app.stradpos.com/admin/sale/report</span>
                        </div>
                    </div>
                    <div class="sp-browser-content">
                        <img src="{{ asset('ss/sales_report.png') }}?v={{ time() }}" alt="StradPos Sales Reports" loading="lazy">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======================================================================
         SOLUTIONS / INDUSTRIES ("Works for Any Business")
         ====================================================================== -->
    <section class="sp-solutions-section" id="solutions">
        <div class="container">
            <div class="sp-section-header">
                <span class="sp-section-eyebrow">VERSATILE & TAILORED</span>
                <h2 class="sp-section-title">StradPos Works for Any Type of Business</h2>
                <p class="sp-section-subtitle">
                    Whether you manage a single corner shop or a high-volume retail chain, StradPos adapts to your business workflow with zero friction.
                </p>
            </div>

            <div class="sp-industry-grid">
                <!-- Retail -->
                <div class="sp-industry-card">
                    <div class="sp-industry-icon">
                        <i class="fas fa-store"></i>
                    </div>
                    <h4 class="sp-industry-title">Retail & Mini Marts</h4>
                    <p class="sp-industry-desc">High-speed barcode scanning with fast cash drawer integration.</p>
                </div>

                <!-- Supermarkets -->
                <div class="sp-industry-card">
                    <div class="sp-industry-icon">
                        <i class="fas fa-shopping-basket"></i>
                    </div>
                    <h4 class="sp-industry-title">Supermarkets</h4>
                    <p class="sp-industry-desc">Unlimited SKU catalog, bulk pricing, and fast lane checkouts.</p>
                </div>

                <!-- Cafes & Bakeries -->
                <div class="sp-industry-card">
                    <div class="sp-industry-icon">
                        <i class="fas fa-mug-hot"></i>
                    </div>
                    <h4 class="sp-industry-title">Cafes & Bakeries</h4>
                    <p class="sp-industry-desc">Quick touch-screen orders, add-on discounts, and instant receipts.</p>
                </div>

                <!-- Restaurants -->
                <div class="sp-industry-card">
                    <div class="sp-industry-icon">
                        <i class="fas fa-utensils"></i>
                    </div>
                    <h4 class="sp-industry-title">Fast Food & Dining</h4>
                    <p class="sp-industry-desc">Counter sales, item variations, and customer credit ledger.</p>
                </div>

                <!-- Pharmacies -->
                <div class="sp-industry-card">
                    <div class="sp-industry-icon">
                        <i class="fas fa-prescription-bottle-medical"></i>
                    </div>
                    <h4 class="sp-industry-title">Pharmacies</h4>
                    <p class="sp-industry-desc">Track expiry dates, batch purchases, and prescription invoices.</p>
                </div>

                <!-- Fashion & Boutiques -->
                <div class="sp-industry-card">
                    <div class="sp-industry-icon">
                        <i class="fas fa-shirt"></i>
                    </div>
                    <h4 class="sp-industry-title">Fashion & Apparel</h4>
                    <p class="sp-industry-desc">Product images, brand categorization, and season clearance discounts.</p>
                </div>

                <!-- Electronics -->
                <div class="sp-industry-card">
                    <div class="sp-industry-icon">
                        <i class="fas fa-mobile-screen"></i>
                    </div>
                    <h4 class="sp-industry-title">Gadgets & Electronics</h4>
                    <p class="sp-industry-desc">Individual serial/SKU tracking and warranty customer logs.</p>
                </div>

                <!-- Wholesale -->
                <div class="sp-industry-card">
                    <div class="sp-industry-icon">
                        <i class="fas fa-warehouse"></i>
                    </div>
                    <h4 class="sp-industry-title">Wholesale Distributors</h4>
                    <p class="sp-industry-desc">Supplier purchase orders, volume units, and credit due collection.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ======================================================================
         DEEP FEATURE SPOTLIGHT ("Discover Our Suite of Innovation")
         ====================================================================== -->
    <section class="sp-spotlight-section">
        <div class="container">
            <div class="sp-spotlight-box">
                <div class="row align-items-center">
                    <!-- Left: Real Dashboard Preview -->
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <div class="sp-browser-window">
                            <div class="sp-browser-header">
                                <div class="sp-browser-dots">
                                    <span class="sp-dot red"></span>
                                    <span class="sp-dot yellow"></span>
                                    <span class="sp-dot green"></span>
                                </div>
                                <div class="sp-browser-address-bar">
                                    <i class="fas fa-lock"></i>
                                    <span>https://app.stradpos.com/admin/dashboard</span>
                                </div>
                            </div>
                            <div class="sp-browser-content">
                                <img src="{{ asset('ss/dashboard.png') }}?v={{ time() }}" alt="StradPos Real-Time Analytics Dashboard" style="width: 100%; height: auto;">
                            </div>
                        </div>
                    </div>

                    <!-- Right: Innovation Bullets -->
                    <div class="col-lg-6 ps-lg-5">
                        <span class="sp-section-eyebrow">INNOVATION SUITE</span>
                        <h2 class="sp-section-title mb-4">Discover Our Suite of Retail Innovation</h2>

                        <!-- Bullet 1 -->
                        <div class="sp-spotlight-bullet">
                            <div class="sp-bullet-icon">
                                <i class="fas fa-hand-holding-dollar"></i>
                            </div>
                            <div class="sp-bullet-text">
                                <h4>Instant Due & Credit Ledger</h4>
                                <p>Customers can pay in installments. The system logs exact payment history in an audit ledger and generates automated due receipts upon each collection.</p>
                            </div>
                        </div>

                        <!-- Bullet 2 -->
                        <div class="sp-spotlight-bullet">
                            <div class="sp-bullet-icon">
                                <i class="fas fa-truck-ramp-box"></i>
                            </div>
                            <div class="sp-bullet-text">
                                <h4>Batch Procurement with Margins</h4>
                                <p>Create multi-item supplier purchases in seconds. Set purchasing cost vs retail selling price to instantly calculate your operational profit margin.</p>
                            </div>
                        </div>

                        <!-- Bullet 3 -->
                        <div class="sp-spotlight-bullet">
                            <div class="sp-bullet-icon">
                                <i class="fas fa-bell"></i>
                            </div>
                            <div class="sp-bullet-text">
                                <h4>Real-Time Store Owner Alerts</h4>
                                <p>Store admins receive immediate in-app notifications whenever a sales associate completes a transaction or records inventory adjustments.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======================================================================
         HARDWARE READY BANNER (With Curved Purple Gradient)
         ====================================================================== -->
    <section class="sp-hardware-section" id="hardware">
        <div class="container">
            <div class="sp-hardware-banner">
                <div class="sp-hardware-circle"></div>

                <div class="row align-items-center">
                    <div class="col-lg-7 mb-4 mb-lg-0">
                        <span class="sp-hardware-badge">HARDWARE COMPATIBLE</span>
                        <h2 class="sp-hardware-title">Certified Hardware Ready with 100% Plug-and-Play Support</h2>
                        <p class="sp-hardware-desc">
                            StradPos works flawlessly with standard USB & Bluetooth thermal receipt printers (ESC/POS), handheld barcode guns, automatic cash drawers, and portable smart Android POS terminals.
                        </p>
                        <div class="d-flex flex-wrap gap-3">
                            <a href="#contact" class="sp-btn-hero-primary">
                                <i class="fas fa-microchip"></i> Request Hardware Bundle
                            </a>
                            <a href="#contact" class="sp-btn-hero-secondary">
                                <i class="fas fa-phone"></i> Talk to Hardware Specialist
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-5 text-center">
                        <img src="{{ asset('assets/images/landing/smart-terminal.jpg') }}" alt="Smart POS Terminal" class="sp-hardware-img" style="max-height: 380px;">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======================================================================
         WHY CHOOSE US / STATS
         ====================================================================== -->
    <section class="sp-why-section" id="why-us">
        <div class="container">
            <!-- Numerical Metrics -->
            <div class="row g-4 mb-5 pb-4 border-bottom">
                <div class="col-6 col-md-3">
                    <div class="sp-stat-box">
                        <div class="sp-stat-number">99.9%</div>
                        <div class="sp-stat-label">System Uptime Guarantee</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="sp-stat-box">
                        <div class="sp-stat-number">3x</div>
                        <div class="sp-stat-label">Faster Checkout Speed</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="sp-stat-box">
                        <div class="sp-stat-number">10k+</div>
                        <div class="sp-stat-label">Transactions Handled Daily</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="sp-stat-box">
                        <div class="sp-stat-number">0 min</div>
                        <div class="sp-stat-label">Staff Training Needed</div>
                    </div>
                </div>
            </div>

            <!-- Value Pillars -->
            <div class="sp-section-header">
                <span class="sp-section-eyebrow">RELIABILITY FIRST</span>
                <h2 class="sp-section-title">Why Modern Businesses Choose StradPos</h2>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="sp-pillar-card">
                        <div class="sp-pillar-icon">
                            <i class="fas fa-layer-group"></i>
                        </div>
                        <h4 class="sp-pillar-title">Modern Hybrid Architecture</h4>
                        <p class="sp-pillar-desc">
                            The security and stability of Laravel 10 married with the lightning-fast interactivity of React 18, ensuring no page lag during peak store rush hours.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="sp-pillar-card">
                        <div class="sp-pillar-icon">
                            <i class="fas fa-shield-halved"></i>
                        </div>
                        <h4 class="sp-pillar-title">Complete Data Sovereignty</h4>
                        <p class="sp-pillar-desc">
                            Keep your customer and financial records safe. Run on your private cloud or premises with automated database backups and audit logging.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="sp-pillar-card">
                        <div class="sp-pillar-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h4 class="sp-pillar-title">24/7 Priority Assistance</h4>
                        <p class="sp-pillar-desc">
                            Our team of POS engineers is always on standby to assist with printer drivers, barcode configurations, database migrations, and staff onboarding.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======================================================================
         CONTACT & DEMO REQUEST SECTION
         ====================================================================== -->
    <section class="sp-contact-section" id="contact">
        <div class="container">
            <div class="sp-section-header">
                <span class="sp-section-eyebrow">GET IN TOUCH</span>
                <h2 class="sp-section-title">Ready to Modernize Your Point of Sale?</h2>
                <p class="sp-section-subtitle">
                    Request a live 1-on-1 demonstration, discuss custom hardware packages, or ask our engineers any technical question.
                </p>
            </div>

            @if(session('contact_success'))
                <div class="alert alert-success alert-dismissible fade show text-center mb-4" role="alert">
                    <i class="fas fa-circle-check me-2"></i> {{ session('contact_success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="sp-contact-wrapper">
                <div class="row g-0">
                    <!-- Left: Contact Details -->
                    <div class="col-lg-5">
                        <div class="sp-contact-info-panel">
                            <div>
                                <h3 class="text-white fw-bold mb-3">Contact StradPos</h3>
                                <p class="text-white-50 mb-4" style="font-size: 14.5px;">
                                    Fill in the form to reach our commercial team, or contact us directly through the channels below.
                                </p>

                                <!-- Address -->
                                <div class="sp-contact-info-item">
                                    <div class="sp-contact-icon">
                                        <i class="fas fa-location-dot"></i>
                                    </div>
                                    <div class="sp-contact-text">
                                        <h6>Office Location</h6>
                                        <p>{{ readConfig('contact_address') ?? 'Dhaka, Bangladesh' }}</p>
                                    </div>
                                </div>

                                <!-- Phone -->
                                <div class="sp-contact-info-item">
                                    <div class="sp-contact-icon">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <div class="sp-contact-text">
                                        <h6>Phone & WhatsApp</h6>
                                        <p>{{ readConfig('contact_phone') ?? '+1 (151) 373-7979' }}</p>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="sp-contact-info-item">
                                    <div class="sp-contact-icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div class="sp-contact-text">
                                        <h6>Support & Sales Email</h6>
                                        <p>{{ readConfig('contact_email') ?? 'stradpos@gmail.com' }}</p>
                                    </div>
                                </div>

                                <!-- Working Hours -->
                                <div class="sp-contact-info-item">
                                    <div class="sp-contact-icon">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <div class="sp-contact-text">
                                        <h6>Customer Support Hours</h6>
                                        <p>{{ readConfig('working_hour') ?? 'Sun - Thu 10:30am - 07:00pm' }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-4 border-top border-white-50">
                                <small class="text-white-50 d-block mb-2">Connect with our community:</small>
                                <div class="d-flex gap-2">
                                    @if(readConfig('facebook_link'))
                                        <a href="{{ readConfig('facebook_link') }}" target="_blank" class="sp-social-btn"><i class="fab fa-facebook-f"></i></a>
                                    @endif
                                    @if(readConfig('twitter_link'))
                                        <a href="{{ readConfig('twitter_link') }}" target="_blank" class="sp-social-btn"><i class="fab fa-twitter"></i></a>
                                    @endif
                                    @if(readConfig('linkedin_link'))
                                        <a href="{{ readConfig('linkedin_link') }}" target="_blank" class="sp-social-btn"><i class="fab fa-linkedin-in"></i></a>
                                    @endif
                                    @if(readConfig('whatsapp_link'))
                                        <a href="{{ readConfig('whatsapp_link') }}" target="_blank" class="sp-social-btn"><i class="fab fa-whatsapp"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Form -->
                    <div class="col-lg-7">
                        <div class="sp-contact-form-panel">
                            <h4 class="fw-bold mb-4" style="color: var(--sp-text-dark);">Book a Personalized Demo</h4>

                            <form action="{{ route('frontend.contact.submit') }}" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="sp-form-label">Full Name *</label>
                                        <input type="text" name="name" class="sp-form-control" placeholder="e.g. John Doe" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="sp-form-label">Business Email *</label>
                                        <input type="email" name="email" class="sp-form-control" placeholder="john@company.com" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="sp-form-label">Phone Number</label>
                                        <input type="text" name="phone" class="sp-form-control" placeholder="+1 (555) 000-0000">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="sp-form-label">Business Type</label>
                                        <select name="business_type" class="sp-form-control">
                                            <option value="Retail">Retail & General Store</option>
                                            <option value="Supermarket">Supermarket / Grocery</option>
                                            <option value="Restaurant">Restaurant / Cafe</option>
                                            <option value="Pharmacy">Pharmacy / Medicine</option>
                                            <option value="Fashion">Fashion & Apparel</option>
                                            <option value="Electronics">Electronics & Hardware</option>
                                            <option value="Wholesale">Wholesale & Distribution</option>
                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <label class="sp-form-label">Your Message or Hardware Requirements *</label>
                                        <textarea name="message" rows="4" class="sp-form-control" placeholder="Tell us about your store count, current hardware, or specific features needed..." required></textarea>
                                    </div>

                                    <div class="col-12 mt-4">
                                        <button type="submit" class="sp-btn-submit">
                                            <i class="fas fa-paper-plane"></i> Send Request Now
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======================================================================
         FOOTER
         ====================================================================== -->
    <footer class="sp-footer">
        <div class="container">
            <div class="row g-4">
                <!-- Brand Info -->
                <!-- Brand Info -->
                <div class="col-lg-6 col-md-12">
                    <a href="#home" class="sp-footer-logo">
                        <span class="sp-footer-brand">{{ readConfig('site_name') ?? 'StradPOS' }}</span>
                    </a>
                    <p class="sp-footer-desc" style="max-width: 440px;">
                        StradPOS is a modern, web-based Point of Sale (POS) and business management solution developed using Laravel and React for retail and growing businesses.
                    </p>
                    <div class="sp-footer-socials">
                        <a href="{{ readConfig('facebook_link') ?? '#' }}" class="sp-social-btn"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{ readConfig('twitter_link') ?? '#' }}" class="sp-social-btn"><i class="fab fa-twitter"></i></a>
                        <a href="{{ readConfig('linkedin_link') ?? '#' }}" class="sp-social-btn"><i class="fab fa-linkedin-in"></i></a>
                        <a href="{{ readConfig('instagram_link') ?? '#' }}" class="sp-social-btn"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>

                <!-- Quick Navigation -->
                <div class="col-lg-3 col-md-6 col-6">
                    <h5 class="sp-footer-title">Navigation</h5>
                    <ul class="sp-footer-links">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#features">Features</a></li>
                        <li><a href="#solutions">Industries</a></li>
                        <li><a href="#hardware">Hardware</a></li>
                        <li><a href="#why-us">Why StradPos</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>

                <!-- Products & Tech -->
                <div class="col-lg-3 col-md-6 col-6">
                    <h5 class="sp-footer-title">Features</h5>
                    <ul class="sp-footer-links">
                        <li><a href="#features">POS &amp; Sales Management</a></li>
                        <li><a href="#features">Product Management</a></li>
                        <li><a href="#features">Inventory Management</a></li>
                        <li><a href="#features">Customer Management</a></li>
                        <li><a href="#features">Order &amp; Payment Management</a></li>
                        <li><a href="#features">Dashboard &amp; Reports</a></li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Copyright -->
            <div class="sp-footer-bottom">
                <div>
                    <div>&copy; {{ date('Y') }} <strong>{{ readConfig('site_name') ?? 'StradPos' }}</strong>. All rights reserved.</div>
                    <div class="mt-1" style="font-size: 13px; color: #94a3b8;">
                        Powered by <a href="https://www.stradigtech.com" target="_blank" rel="noopener noreferrer" style="color: #38bdf8; font-weight: 700; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='#60a5fa'" onmouseout="this.style.color='#38bdf8'">Stradigtech</a>
                    </div>
                </div>
                <div class="d-flex gap-4">
                    <a href="#home" class="text-muted text-decoration-none">Privacy Policy</a>
                    <a href="#home" class="text-muted text-decoration-none">Terms of Service</a>
                    <a href="#home" class="text-muted text-decoration-none">Security</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- ======================================================================
         VIDEO WALKTHROUGH MODAL
         ====================================================================== -->
    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" style="background: #0f172a; border: 1px solid #334155; border-radius: 20px; overflow: hidden; box-shadow: 0 25px 60px rgba(0,0,0,0.6);">
                <div class="modal-header" style="border-bottom: 1px solid #1e293b; padding: 18px 24px;">
                    <h5 class="modal-title text-white fw-bold d-flex align-items-center gap-2" id="videoModalLabel">
                        <i class="fas fa-play-circle" style="color: #2dd4bf;"></i> StradPos Live Product Demo
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=0" title="StradPos Video Demo" allowfullscreen style="border: none;" id="stradPosVideoIframe"></iframe>
                    </div>
                </div>
                <div class="modal-footer justify-content-between" style="border-top: 1px solid #1e293b; padding: 14px 24px;">
                    <span class="text-white-50 small">Experience fast sales transactions, real-time inventory, and centralized reporting.</span>
                    <a href="#contact" class="btn btn-sm" style="background: #2dd4bf; color: #042f2c; font-weight: 700; border-radius: 30px; padding: 8px 20px;" data-bs-dismiss="modal">
                        Schedule Live Consultation
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>

    <!-- JAVASCRIPT LOGIC -->
    <script>
        // Navbar Scroll Effect
        const navbar = document.getElementById('spNavbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 40) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Mobile Menu Toggle
        const mobileToggle = document.getElementById('spMobileToggle');
        const mobileMenu = document.getElementById('spMobileMenu');
        if (mobileToggle && mobileMenu) {
            mobileToggle.addEventListener('click', () => {
                const isShown = mobileMenu.style.display === 'block';
                mobileMenu.style.display = isShown ? 'none' : 'block';
            });
            // Close mobile menu on anchor click
            mobileMenu.querySelectorAll('a').forEach(anchor => {
                anchor.addEventListener('click', () => {
                    mobileMenu.style.display = 'none';
                });
            });
        }

        // Tab switching logic for system showcase
        const tabButtons = document.querySelectorAll('.sp-tab-btn');
        const tabPanels = document.querySelectorAll('.sp-tab-content-panel');
        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                const targetId = button.getAttribute('data-tab');
                tabButtons.forEach(btn => btn.classList.remove('active'));
                tabPanels.forEach(panel => panel.classList.remove('active'));
                button.classList.add('active');
                const targetPanel = document.getElementById(targetId);
                if (targetPanel) {
                    targetPanel.classList.add('active');
                }
            });
        });
    </script>
</body>

</html>
