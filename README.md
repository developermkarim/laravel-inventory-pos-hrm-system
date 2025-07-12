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

Great! Since you're maintaining developer/client-friendly documentation, here's a **starter version** of the `TenantInfo` trait documentation section you can include in your README or a `docs/traits.md` file:

---

### 🧩 TenantInfo Trait (Developer Guide)

#### Overview

The `TenantInfo` trait is a reusable component in Laravel that handles **multi-tenant logic** in the system. It helps create, manage, and configure tenant-specific data such as subdomain, packages, permissions, and more.

#### Methods Included

##### 🔹 `getTenantId()`

* **Purpose**: Extracts the tenant's subdomain from the current URL.
* **Example**:
  URL: `https://shop1.yourdomain.com` → returns `shop1`

---

##### 🔹 `changePermission($packageData)`

* **Purpose**: Appends additional role/permission values from the selected package into the SQL template file (`tenant_necessary.sql`).
* **When used**: During tenant creation or when updating their subscription/package.

---

##### 🔹 `createTenant($request)`

* **Purpose**: Creates a new tenant, sets up:

  * Subdomain
  * Payment info
  * Basic user/admin credentials
  * Expiry date based on trial/monthly/yearly
  * Permissions based on selected package
  * SQL file generation for importing tenant data

* **Note**: This method modifies `tenant_necessary.sql` dynamically to insert tenant-specific data.

---

#### 🧪 How It Works (Simple Flow)

1. A user signs up for a new tenant (shop, company).
2. A new subdomain like `shop1.yourapp.com` is created.
3. The system creates their default data using `tenant_necessary.sql`.
4. Each tenant logs in and manages their own sales, inventory, staff, etc.
5. Tenants never see each other’s data — it’s 100% separate.

---

Let me know when you're ready to add more sections like:

* Installation steps
* Environment setup
* Deployment guide
* Feature list
  And I’ll help you build it step by step.


No problem! Let’s explain it step-by-step in **very simple words** — just like a beginner would understand.

---

## 🧠 First, Understand the Context

You are building a **SaaS system**, where **many companies (tenants)** use your SalePro app.

* **Each company** has their own subdomain like:
  `shop1.yourdomain.com`, `shop2.yourdomain.com`

* Each company can **upload category images**.

But now here’s a **problem** 👇

> What if 2 tenants upload a file with the same name like `logo.png`?
> One will overwrite the other.

---

## ✅ So what do we do?

We **rename the file** before saving it.

### 🔸 If it’s a normal user (not SaaS):

```php
$imageName = 20250709183045.png
```

### 🔸 If it’s a tenant (in SaaS mode):

```php
$imageName = shop1_20250709183045.png
```

✅ Now `shop1` and `shop2` can both upload `logo.png`, and they will be saved differently.

---

## 🔹 What is `$this->getTenantId()`?

This just returns the subdomain name.

### Example:

If your current URL is:
`https://shop1.yourdomain.com`

Then:

```php
$this->getTenantId() // returns "shop1"
```

So your image will be saved as:
`shop1_20250709184510.png`

---

## 🔹 What is `config('database.connections.saleprosaas_landlord')`?

This checks **which part of the app is running**.

| If true  | You are in the **main admin/landlord** panel |
| -------- | -------------------------------------------- |
| If false | You are in a **tenant’s subdomain**          |

So:

* If you are the **landlord**, no need to add `shop1_` to the image.
* If you are in a **tenant panel**, add the tenant name to the image.

---

> ❓ Is `saleprosaas_landlord` the main DB?
> ✔️ **Yes** — that name is used in your config to check if you're in the central admin system.

> ❓ Does each tenant have its own DB?
> ✔️ **Most likely yes**, based on the trait structure, especially the `.sql` file generation (`tenant_necessary.sql` per tenant).

**But**, the actual tenant DB names are probably not like `shop1`, `shop2`, etc., unless you configured it that way.

> 🧠 The DB name might look like:

* `tenant_shop1`
* `tenant_abc_company`
* or even something auto-generated, depending on your `.env` and tenancy config.


## ✅ Final Summary (for README)

```markdown
### 🖼️ Why `getTenantId()` is used in Image Uploads

When a tenant uploads an image (like a category photo), we rename the image using the tenant's subdomain name (like `shop1`) to avoid filename conflicts.

- `getTenantId()` → gets the tenant name from the URL.
- `config('database.connections.saleprosaas_landlord')` → checks if we're in the main admin system (landlord) or a tenant.

👉 This helps save images like:
- `shop1_20250709184510.png`
- `shop2_20250709184510.png`

✅ So different tenants can upload files with the same name without overwriting each other.
```

Let me know if you want me to draw this with a diagram or example folders like `/public/images/shop1`, etc.
