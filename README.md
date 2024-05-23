# Laravel Project Setup Guide

Let's get you started by cloning the repository, installing dependencies, setting up the database, and starting the server.

## Prerequisites

Before you begin, ensure you have the following installed on your machine:
- **PHP (>= 8.3)**
- **Composer**
- **MySQL or any other database you prefer**

## Getting Started

### Step 1: Clone the Repository

First, clone the repository to your local machine using the following command:

```bash
git clone https://github.com/Mugambi-Ian/noodle-test.git
cd noodle-test
```

### Step 2: Install Dependencies

Next, install the PHP dependencies:

**Install PHP dependencies using Composer:**

    ```bash
    composer install
    ```
   ```

### Step 3: Environment Setup

Copy the example environment file and create a new `.env` file:

```bash
cp .env.example .env
```

Open the `.env` file and update the necessary configurations, especially the database settings:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

### Step 4: Generate Application Key

Generate the application key, which is used for encryption and other security purposes:

```bash
php artisan key:generate
```

### Step 5: Set Up the Database

1. **Create the database:**

    Ensure you have created a database in MySQL (or your chosen database) that matches the name in your `.env` file.

2. **Run the migrations to set up the database schema:**

    ```bash
    php artisan migrate
    ```


### Step 6: Start the Development Server

Finally, start the Laravel development server:

```bash
php artisan serve
```

By default, the server will start at `http://localhost:8000`. Open this URL in your web browser to be redirected to the swaager documentation of the api.
