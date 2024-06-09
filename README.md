# Link Harvester - Laravel 11


## Description

This repository contains a Laravel application that serves as a skeleton for building web applications using the Laravel framework.

## Features

- **Laravel Framework**: Built on top of the Laravel framework, a powerful PHP framework for web artisans.
- **Composer Dependencies**: Uses Composer to manage PHP dependencies.
- **Dockerized Environment**: Includes Docker configuration files for easy setup and deployment.
- **MySQL Database**: Configured to use a MySQL database.
- **Nginx Web Server**: Configured with Nginx web server.
- **Supervisor for Queue Processing**: Uses Supervisor for managing queue workers.
- **Composer Scripts**: Includes Composer scripts for common tasks such as autoloading, migrations, and more.

## Installation and Setup

### Prerequisites

Before you begin, ensure you have the following installed on your local machine:

- Docker
- Composer

### Installation Steps

1. **Clone the repository:**

   ```bash
## Getting Started

### Clone the Repository

```bash
git clone https://github.com/nazmul199512/link-harvester.git
cd link-harvester

cp .env.example .env


### Build and Start the Containers

docker-compose up --build


Accessing the Application
Web Application: The Laravel application will be accessible at http://localhost:8000.
Web Server: The Nginx web server will be accessible at http://localhost:8080.
MySQL Database: MySQL will be running on port 3306.
