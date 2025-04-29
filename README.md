# 🚗 Car Rental Platform

A full-featured **Car Rental Management System** built with a clean architecture using **Laravel 12 (REST API)** and **Vue.js (SPA)**. This platform is designed for car rental companies to manage their fleet, reservations, customers, and online payments through a modern, scalable, and user-friendly interface.

---

## 📚 About the Project

This application provides a complete digital solution for car rental businesses. It includes advanced features like dynamic car search, online booking and payment, user authentication, role-based access control, admin dashboards, and real-time notifications. It strictly follows clean code principles and industry-standard design patterns to ensure maintainability and scalability.

---

## 🧩 Tech Stack

| Layer           | Technologies Used                                         |
|------------------|-----------------------------------------------------------|
| **Frontend**     | Vue.js 3 (Composition API), Vue Router, Pinia, Axios, Tailwind CSS |
| **Backend**      | Laravel 12, Laravel Sanctum, REST API                      |
| **Security/Auth**| Laravel Sanctum, Spatie Laravel Permission                 |
| **Media & Files**| Spatie Laravel Media Library                               |
| **Payments**     | Laravel Cashier (Stripe integration)                       |
| **Data Export**  | Laravel Excel                                              |
| **Architecture** | Repositories, Services, DTOs, Validation Requests, SOLID, Clean Code |
| **Notifications**| Laravel Notifications (mail/SMS/push ready)               |

---

## ✨ Key Features

### 👤 User Management
- Register, login, password reset
- Role-based access control (Admin / Manager / User)

### 🚘 Vehicle Management
- Add, update, and delete vehicles
- Upload multiple images per vehicle
- Define availability, brand, model, year, price, status

### 🔍 Smart Car Search
- Search cars by availability date, location, type, and price
- Filtering and sorting with real-time results

### 📆 Booking System
- Book vehicles for specific dates
- Real-time availability check
- Reservation confirmation with notifications

### 💳 Online Payments
- Stripe integration via Laravel Cashier
- Secure checkout process

### 🛠️ Admin Dashboard
- Manage bookings, cars, and users
- Generate and export reports
- View revenue and performance statistics

### ⭐ Ratings & Reviews
- Users can rate and review vehicles and services
- Publicly visible reviews per vehicle

### 📊 Analytics & Reports
- Daily/Monthly revenue reports
- Most rented cars
- User activity insights (Laravel Excel used for export)

---

## 🧪 How to Run Locally

### 🔹 Backend (Laravel API)
```bash
cd backend
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve

### 🔹 Frontend (Vue.js SPA)
cd frontend
npm install
npm run dev

## 📁 Project Structure

car-rental-platform/
├── backend/
│   ├── app/
│   │   ├── Services/
│   │   ├── Repositories/
│   │   ├── DTOs/
│   │   ├── Http/Controllers/
│   └── ...
├── frontend/
│   ├── src/
│   │   ├── views/
│   │   ├── store/ (Pinia)
│   │   ├── components/
│   │   └── router/





---

## 👩‍💻 Author

- **Name:** Shaza
- **GitHub:** [@shaza144](https://github.com/shaza144)
- **LinkedIn:** (https://linkedin.com/in/shaza-alkheder)

---

## 📄 License

This project is open-source and licensed under the MIT License.
