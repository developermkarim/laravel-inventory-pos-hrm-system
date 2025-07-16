## 📘 Project Overview: SalePro POS, Inventory Management System, HRM & Accounting

This project is a **SaaS-based** POS (Point of Sale), Inventory, HRM & Accounting system based on the **SalePro** script from CodeCanyon.

### 🔗 Official Resources

- 🔹 [Project Documentation](https://lion-coders.com/docs/salepropos/#salepro-saas)  

- 🔹 [Official SalePro on CodeCanyon](https://codecanyon.net/item/lims-stock-manager-pro-with-pos/22256829)


### 🔑 Key Concepts

| Term                             | Meaning                                                                                                                       |
| -------------------------------- | ----------------------------------------------------------------------------------------------------------------------------- |
| **SalePro**                      | This is the name of the main software that includes POS, Inventory, HRM, and Accounting features.                             |
| **SaaS (Software as a Service)** | A model where **multiple companies** can use the same system, each with their own data. Like how multiple shops use Shopify.  |
| **Tenant**                       | Each business or company that uses the system is called a **tenant**. Example: Shop1, Shop2, HR Company, etc.                 |
| **Multi-Tenant System**          | A single Laravel project that serves multiple businesses (tenants), each using their **own subdomain** and **separate data**. |
| **Subdomain**                    | Tenants access the system using subdomains like `shop1.yourapp.com`, `shop2.yourapp.com`.                                     |
| **TenantInfo Trait**             | A Laravel **trait** used to detect and manage tenant information (domain etTenantId(), package, permissions - changePermission($packageData), setup - createTenant($request), etc.).                 |
| **tenant\_necessary.sql**        | SQL template file used when creating a new tenant (adds default data, settings, user, etc.).                                  |
| **Central Domain**               | The main domain of your SaaS app (e.g., `yourapp.com`) which manages tenant creation and access.                              |

---


### 🔠 What is `saleprosaas_landlord`?

In a **SaaS (multi-tenant)** Laravel app, there are usually **two types of databases**:

1. A **central/main database** that manages all shops or businesses.
2. Separate databases for each shop (called tenants).

The central database is often called the **“landlord”** database. In this project, the name `saleprosaas_landlord` is used as a custom name for that landlord database connection.

#### Breakdown of the name:

* `salepro` – The name of the app (SalePro)
* `saas` – Indicates that it's intended to support Software as a Service
* `landlord` – The owner or controller of all tenants/shops


### 📂 What Data Does the `saleprosaas_landlord` Database Store?

This "landlord" DB stores **global data** that applies across all tenants (shops). Examples:

| Table Name | Purpose                                     |
| ---------- | ------------------------------------------- |
| `tenants`  | List of all shops/clients                   |
| `domains`  | Domain or subdomain assigned to each tenant |
| `plans`    | Subscription plan details                   |
| `users`    | Platform-wide users (admins, super-admins)  |
| `payments` | Centralized billing & subscription tracking |

### 🔄 How Laravel Detects and Connects to the Right Tenant

When building a real multi-tenant Laravel SaaS system (especially using packages like `stancl/tenancy`), Laravel performs these actions behind the scenes:

1. **Request comes in** → e.g., `https://shop1.yourdomain.com`
2. Laravel reads the **subdomain** (in this case, `shop1`)
3. It checks the `tenants` table in the `saleprosaas_landlord` DB
4. Finds the tenant’s matching database info (e.g., DB name, host)
5. **Dynamically switches** to that tenant's DB before running any request
6. From this point on, **all queries go to that tenant’s own DB**

---

### 📦 Why Is This Important for POS, HRM, Inventory?

Each tenant (shop/company) has their own:

| Module    | What It Stores                             |
| --------- | ------------------------------------------ |
| POS       | Sales, customers, invoices, cash registers |
| Inventory | Products, categories, warehouses           |
| HRM       | Employees, payroll, attendance             |

With separate DBs:

* Each shop’s business data is fully isolated
* No risk of data mix-up between tenants
* Easier to maintain backups or restore per shop
* Better for compliance (especially with client data)

---

### 🧩 Recap: How the System Can Grow into SaaS

Your current project is **single-tenant** (one business). But the structure already hints at future SaaS capability. Here's how the parts fit together:

| Part                             | Current Status       | Future SaaS Role                       |
| -------------------------------- | -------------------- | -------------------------------------- |
| `getTenantId()`                  | ✅ Used               | Gets subdomain to identify shop        |
| `saleprosaas_landlord`           | ❌ Not configured yet | Stores global info about shops/tenants |
| Tenant DBs                       | ❌ One DB for all     | One DB per shop for full SaaS          |
| Image naming (e.g., `shop1_...`) | ✅ Already used       | Avoids file conflicts between tenants  |

---

Let me know when you're ready and I’ll continue with the next logical parts, like:

* How to define `saleprosaas_landlord` in `config/database.php`
* How to structure tenant DBs
* How to auto-create tenant databases
* Sample folder structure for SaaS file organization


Great! Let’s continue by explaining how to configure the `saleprosaas_landlord` connection and prepare the system for multi-tenant functionality. This will be useful for when you're ready to scale your single-tenant project into a full SaaS platform.

---

### ⚙️ How to Define `saleprosaas_landlord` in `config/database.php`

To enable Laravel to connect to the central (landlord) database, add a new connection in your `config/database.php` file:

```php
'connections' => [

    // Default tenant connection (usually 'mysql')
    'mysql' => [
        'driver' => 'mysql',
        'host' => env('DB_HOST', '127.0.0.1'),
        'database' => env('DB_DATABASE', 'tenant_default'),
        ...
    ],

    // Landlord (central) database
    'saleprosaas_landlord' => [
        'driver' => 'mysql',
        'host' => env('LANDLORD_DB_HOST', '127.0.0.1'),
        'port' => env('LANDLORD_DB_PORT', '3306'),
        'database' => env('LANDLORD_DB_DATABASE', 'saleprosaas_landlord'),
        'username' => env('LANDLORD_DB_USERNAME', 'root'),
        'password' => env('LANDLORD_DB_PASSWORD', ''),
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'strict' => true,
        'engine' => null,
    ],

],
```

Then in your `.env` file, set:

```env
LANDLORD_DB_HOST=127.0.0.1
LANDLORD_DB_PORT=3306
LANDLORD_DB_DATABASE=saleprosaas_landlord
LANDLORD_DB_USERNAME=root
LANDLORD_DB_PASSWORD=
```

> 🔄 Laravel will now recognize the `saleprosaas_landlord` connection, and your SaaS check logic will start working.

---

### 🛠️ How to Create Tenant Databases Dynamically (for Each Shop)

When a user signs up and becomes a new tenant/shop, your system should:

1. Create a new database (e.g., `tenant_shop1`)
2. Run migrations and seed data (e.g., from `tenant_necessary.sql`)
3. Link the subdomain to the tenant
4. Store tenant info in `saleprosaas_landlord.tenants`

You can automate this using Laravel DB commands:

```php
DB::statement("CREATE DATABASE `tenant_shop1`");
Artisan::call('migrate', [
    '--database' => 'tenant_connection_name',
    '--path' => '/database/migrations/tenant',
]);
```

Or with packages like `stancl/tenancy`, which handles this for you.

---

### 📁 Suggested Folder Structure for Multi-Tenant Laravel SaaS

Organize your code to keep landlord and tenant logic separate:

```
/app
  /Traits
    TenantInfo.php

/config
  database.php

/database
  /migrations
    /landlord        → Tables like `tenants`, `plans`
    /tenant          → Tables like `products`, `sales`, `employees`

/routes
  /landlord.php      → Routes for super admin
  /tenant.php        → Routes for shops

/resources/views
  /landlord          → Admin panel
  /tenant            → Shop dashboard
```

---

### ✅ Final Notes (Add to README for Developers)

* `saleprosaas_landlord` is the main DB that stores global SaaS data
* Each shop should have its own tenant DB (auto-created when signing up)
* File uploads should include tenant IDs or names to avoid conflict
* Laravel must dynamically switch databases based on the tenant's subdomain
* You can use [stancl/tenancy](https://tenancyforlaravel.com) for easier integration

---

Excellent! Let’s now continue with how to implement **subdomain-based routing**, and how to **automatically create and set up tenant databases** (with migrations and seeding) — essential for a real Laravel SaaS system (like for POS, HRM, and Inventory modules).

---

## 🌐 Subdomain-Based Routing in Laravel SaaS

Each tenant (shop) will have their own subdomain, like:

* `shop1.yourapp.com`
* `shop2.yourapp.com`

Laravel needs to route requests **differently** for each subdomain so the correct tenant database is used.

### ✅ How to Set This Up

1. In your `routes/web.php`, use domain-based grouping:

```php
Route::domain('{tenant}.yourapp.com')->group(function () {
    // Tenant routes go here
    Route::get('/', [TenantDashboardController::class, 'index']);
});
```

2. Add middleware that captures `{tenant}` and sets the database connection:

```php
public function handle($request, Closure $next)
{
    $tenant = $request->route('tenant'); // e.g., 'shop1'

    // Lookup in landlord DB
    $tenantInfo = DB::connection('saleprosaas_landlord')
                    ->table('tenants')
                    ->where('subdomain', $tenant)
                    ->first();

    if (!$tenantInfo) {
        abort(404, 'Tenant not found.');
    }

    // Set tenant DB connection dynamically
    config(['database.connections.tenant.database' => $tenantInfo->db_name]);

    DB::purge('tenant'); // Clear old connection cache
    DB::reconnect('tenant');

    return $next($request);
}
```

3. Define the tenant DB connection in `config/database.php`:

```php
'tenant' => [
    'driver' => 'mysql',
    'host' => env('TENANT_DB_HOST', '127.0.0.1'),
    'database' => '', // filled dynamically
    'username' => env('TENANT_DB_USERNAME', 'root'),
    'password' => env('TENANT_DB_PASSWORD', ''),
    ...
],
```

---

## 🛠️ Automatically Create Tenant Databases (When Shop Registers)

When a user signs up, your app should:

1. Create a new MySQL database
2. Run tenant migrations
3. Optionally import SQL from `tenant_necessary.sql`
4. Save tenant info to the landlord DB

### 🔄 Sample Code:

```php
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

public function createTenantDatabase($tenantName)
{
    $dbName = 'tenant_' . strtolower($tenantName);

    // Step 1: Create DB
    DB::statement("CREATE DATABASE `$dbName` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");

    // Step 2: Run migrations
    config(['database.connections.tenant.database' => $dbName]);
    Artisan::call('migrate', [
        '--database' => 'tenant',
        '--path' => '/database/migrations/tenant',
        '--force' => true
    ]);

    // Step 3: Seed from SQL file (optional)
    $sql = File::get(database_path('tenant_necessary.sql'));
    DB::connection('tenant')->unprepared($sql);

    // Step 4: Save tenant to landlord DB
    DB::connection('saleprosaas_landlord')->table('tenants')->insert([
        'subdomain' => $tenantName,
        'db_name'   => $dbName,
        'created_at' => now(),
    ]);
}
```

> 💡 Tip: Wrap this logic inside your `createTenant($request)` method (which you already have via the `TenantInfo` trait).

---

## ✅ Benefits of This Setup for Your POS/HRM/Inventory SaaS

| Feature                        | How It Helps in SaaS                                  |
| ------------------------------ | ----------------------------------------------------- |
| Subdomain-based routing        | Clean URL per business (`shop1.yourapp.com`)          |
| Dynamic DB switching           | Keeps shop data 100% isolated                         |
| Auto database creation         | Easily scale to thousands of shops                    |
| Upload naming (with tenant ID) | Prevents file name conflicts in shared storage        |
| Custom feature per shop        | You can give specific modules to premium tenants only |

---
