# Data Collection APP

-   A form-based data collection web application built with Laravel, designed for controlled data entry, editing and secure access.

## Live Demo

-   Not deployed yet.

---

## Tech Stack

-   **Backend:** Laravel (PHP)
-   **Frontend:** Blade Templates, Tailwind CSS, Flowbite
-   **Database:** MySQL, Eloquent ORM
-   **Authentication:** Custom authentication flow
-   **Build Tooling:** Vite
-   **Package Manager:** npm

## Features

-   Custom authentication using access codes and predefined credentials
-   Role-based access (admin-managed user registration)
-   Form-based data collection with server-side validation
-   Persistent data storage in a relational database (MySQL)
-   Separate views for data entry and data listing
-   Clean, responsive UI built with Tailwind CSS and Flowbite
-   Pagination and search UI built with Flowbite
-   Alert messages with custom JavaScript
-   MVC architecture following Laravel best practices

## Architecture Overview

### Views

-   Authentication views -> `resources/views/auth`
-   Forms- related views (data entry, listing, edit and delete) -> `resources/views/forms`

### Application logic (Form related and auth)

-   `app/Http/ Controllers`

### Routing

-   Web routes definition: `/routes/web.php`

### Database

-   Migrations: `database/migrations`
-   Factories: `database/factories`
-   Seeders: `database/seeders`

## Getting Started (Local Setup)

### Prerequisites

-   PHP >= 8.1
-   Laravel Herd
-   Node.js & npm
-   MySQL

### Installation

```
npm install
```

### Development

```bash
npm run dev
```

### Build

```bash
npm run build
```

---

## Author

Developed by Codreanu Daniel  
Portfolio: https://rcd-portfolio.netlify.app/
