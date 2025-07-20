# MyBrada Portal

**MyBrada Portal** is a secure and responsive web dashboard built using **CodeIgniter 4 (MVC)**, **Axios**, and **JWT authentication**. It serves as the administrative backend for the **MyBrada** cross-platform mobile application (built with **Flutter**, **Dart**, and **Supabase**).

The portal allows dispatchers to manage requests, users, and notifications — all in real-time — with integrated **CRUD operations** and **OneSignal push notifications** for alerting users.

---

## 🚀 Features

### ✅ CodeIgniter 4 MVC Framework
- Clear separation of concerns using **Models**, **Views**, and **Controllers**
- Custom **JWT middleware (Filter)** for secure route access
- `.env`-based environment configuration

### 🔐 JWT Authentication
- Secure login with **access** and **refresh tokens** stored in HTTP-only cookies
- Auto-expiring sessions with optional **Remember Me** support
- Middleware-based token validation and user access control

### 📡 Axios + AJAX
- All form interactions (login, CRUD, etc.) handled via **Axios**
- No full page reloads, smoother UX with real-time responses

### 🧠 RESTful API Integration (Supabase)
- Full CRUD operations performed through the **PHPSupabase** library
- Syncs data seamlessly with Supabase Postgres backend used by the Flutter app

### 🔔 OneSignal Push Notifications
- Push alerts sent directly to mobile devices (via OneSignal) when:
  - New requests are made
  - A user is assigned a responder
  - An issue is resolved or escalated

---

## 🛠 Technologies Used

| Stack | Description |
|-------|-------------|
| **Backend** | PHP 8.x, CodeIgniter 4 |
| **Frontend** | HTML5, Bootstrap 5, Vanilla JS, Axios |
| **Auth** | JWT (Firebase PHP-JWT) |
| **Database** | Supabase (PostgreSQL) |
| **Notifications** | OneSignal Web SDK |
| **API Client** | PHPSupabase Library |

---



