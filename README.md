# StradPos - Modern Point of Sale System

StradPos is a feature-rich, hybrid web-based Point of Sale (POS) and Inventory Management system. It seamlessly integrates a robust Laravel backend for administration with a highly responsive, React-powered frontend for the lightning-fast POS checkout interface.

## 🚀 Key Features

*   **Interactive POS Interface:** A fast, React-driven POS screen with instant cart updates, barcode scanning, fractional discount support, and keyboard/mouse-friendly navigation.
*   **Comprehensive Inventory Management:** Easily manage Products, Categories, Brands, and Units.
*   **Purchases & Stock Control:** Track stock levels, log supplier purchases, and maintain accurate inventory margins.
*   **User & Role Management:** Built-in Spatie role-based access control (Admin, Cashier, Sales Associate) to restrict sensitive actions.
*   **Customer & Supplier Records:** Keep a database of your clients and vendors for tracking order histories and due balances.
*   **Financial Reporting:** Generate detailed sales reports, inventory summaries, and print customizable POS invoices.
*   **Dynamic Settings:** Configure application currencies (e.g., ৳, $), store details, taxes, and UI themes directly from the dashboard.

## 🛠️ Technology Stack

**Backend**
*   [Laravel](https://laravel.com/) (PHP Framework)
*   MySQL (Relational Database)
*   Spatie Permission (Role-based access)
*   Laravel Excel (Data Export/Import)

**Frontend**
*   [React.js](https://reactjs.org/) (Powers the POS and Cart components)
*   Laravel Blade Templates
*   [AdminLTE 3](https://adminlte.io/) & Bootstrap (Admin UI)
*   DataTables (Advanced table sorting and searching)
*   React Hot Toast & SweetAlert2 (Notifications & Alerts)

## 💻 How to Run on Local Environment

Follow these steps to get your local development environment up and running.

### Prerequisites
*   PHP >= 8.1
*   Composer
*   Node.js & npm
*   MySQL (XAMPP, Laragon, or Docker)

### Installation Steps

1. **Clone the Repository**
   Navigate to your local server directory (e.g., `htdocs` or `www`) and clone the project (or extract the project files).

2. **Install PHP Dependencies**
   ```bash
   composer install
   ```

3. **Install Frontend Dependencies**
   ```bash
   npm install
   ```

4. **Environment Setup**
   Copy the example environment file and configure your database credentials.
   ```bash
   cp .env.example .env
   ```
   Open the `.env` file and update your database settings:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=stradpos
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

6. **Migrate and Seed the Database**
   This will create the database tables and populate the default roles (Admin, Cashier, Sales) and settings.
   ```bash
   php artisan migrate:fresh --seed
   ```
   *(Optional: If you created a custom `DummyProductSeeder`, you can run it via `php artisan db:seed --class=DummyProductSeeder` to load sample products).*

7. **Link Storage**
   To ensure product and category images are visible on the frontend, create the public storage symlink:
   ```bash
   php artisan storage:link
   ```

8. **Compile Frontend Assets**
   Since the POS uses React, you must compile the Javascript. 
   For development (watches for changes):
   ```bash
   npm run dev
   ```
   For production:
   ```bash
   npm run build
   ```

9. **Serve the Application**
   ```bash
   php artisan serve
   ```
   The application will be accessible at `http://127.0.0.1:8000`.

### Default Login Credentials
*(Assuming standard startup seeders have run)*
*   **Email:** demo@stradigtech.net
*   **Password:** 87654321

## 🔒 Security Vulnerabilities
If you discover a security vulnerability within StradPos, please send an e-mail to the development team. All security vulnerabilities will be promptly addressed.
