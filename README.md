# RestaurantSystem

Welcome to the Restaurant System! This project is designed to help you manage restaurant operations effectively. Follow the instructions below to set up your environment.


## Installation Guide

### Step 1: Clone the Repository

First, clone the repository to your local machine:

```bash
git clone https://github.com/0xDLT/restaurantsystem.git
cd restaurantsystem
```
### Step 2: Create `Config` Folder && Add `database.php` File

- Import The Schema Into Your Project. `schema.sql`

### Step 3: Create `Config` Folder && Add `database.php` File

```php
<?php

$dsn = 'mysql:host=yourHost;dbname=yourDB;';

$user = '';

$pass = '';

try {

    $dbconnect = new PDO($dsn, $user, $pass);
    $dbconnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "pass";//to check if you connect to the database

} catch (PDOException $e) {
    echo 'Failed: ' . $e->getMessage();
}
```

### Step 4: Install Required Packages

```bash
npm install
```
