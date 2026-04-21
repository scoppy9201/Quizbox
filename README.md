<h1 align="center">MovieBox - Online Movie Ticket Booking System</h1>

<p align="center">
  Built with Laravel, Tailwind CSS, and Blade UI <br/>
  Developed solo in 8 days as a 2nd semester term-end project at Aptech.
</p>

<p align="center">
  <a href="https://github.com/himeshdua/moviebox"><img src="https://img.shields.io/github/stars/himeshdua/moviebox?style=social" alt="GitHub stars"></a>
  <a href="https://github.com/himeshdua/moviebox"><img src="https://img.shields.io/github/forks/himeshdua/moviebox?style=social" alt="GitHub forks"></a>
</p>

---

## 🎥 About MovieBox

**MovieBox** is a fully functional movie ticket booking system built using **Laravel 12**. It allows users to browse currently showing and top-rated movies, watch trailers, read and post reviews, and book movie tickets — all through a responsive, user-friendly interface.

This project was developed as a **2nd semester term-end project at Aptech** and built entirely by one person within just **8 days**. It demonstrates full-stack capability, including admin management, role-based access control, database design, and clean UI components.

---

## 🚀 Features

-   🎬 Movie Browse with posters, categories, and ratings
-   🎞 Trailer preview and short descriptions
-   ⭐ Community reviews with ratings
-   🧾 Ticket booking with multiple class pricing (**Silver, Gold, Platinum**)
-   🧒 Discounted pricing for kids (3–12 years)
-   📱 Responsive and mobile-friendly design using **Tailwind CSS**
-   🔐 User authentication (**Laravel Auth**) and protected routes
-   📊 Admin dashboard with total revenue, user, movie, and show stats
-   🎛 Admin controls for adding/updating/deleting movies and shows
-   🧾 Booking list with quantities, dates, and total pricing

---

## ⚙️ Tech Stack

-   **Framework**: Laravel 12 (MVC architecture)
-   **Frontend**: Blade Templating, Tailwind CSS
-   **UI Libraries**: ShadCN-inspired components, BadtzUI, PrismUI
-   **Database**: MySQL using Eloquent ORM
-   **Authentication**: Laravel built-in Auth + Middleware
-   **Deployment**: Vite + Artisan + PHP server

---

## 📁 Folder Structure

-   `moviebox/`
    -   `app/`
        -   `Http/Controllers/` → `MovieController`, `ShowController`, `BookingController`, etc.
        -   `Models/` → `Movie`, `Show`, `Booking`, `User`, `Review`
    -   `resources/views/` → All Blade templates
    -   `routes/web.php` → App routes
    -   `database/migrations/` → Table structures for movies, shows, bookings, etc.
    -   `database/factories/` → Model factories for test data
    -   `database/seeders/` → Seed classes for users, movies, shows, etc.
    -   `public/posters/` → Uploaded movie posters
    -   `.env` → Environment-specific variables

---

## 🖼 Screenshots

-   **🎬 Movie Listings Page**
    ![Movie Listings Page](screenshots/movie-listings.png)

-   **🎬 Movie Details Page**
    ![Movie Details Page](screenshots/movie-details.png)

    **💬 Review Submission**
    ![Review Submission](screenshots/review-submission.png)

-   **📊 Admin Dashboard**
    ![Admin Dashboard](screenshots/admin-dashboard.png)

    **📆 Movies List**
    ![Movies List](screenshots/movies-list.png)

    **📆 Shows List**
    ![Shows List](screenshots/shows-list.png)

    **📆 Reviews List**
    ![Reviews List](screenshots/reviews-list.png)

    **📆 Customers List**
    ![Customers List](screenshots/customers-list.png)

    **📆 Create Movie Show Form**
    ![Create Movie Show Form](screenshots/create-show-form.png)

---

## 🧪 How to Run Locally

Follow the steps below to set up and run MovieBox on your local machine.

1.  **Clone the repository and navigate to the project directory:**

    ```bash
    git clone https://github.com/HimeshDua/MovieBox.git
    cd MovieBox
    ```

2.  **Install dependencies:**

    ```bash
    composer install
    npm install
    ```

3.  **Set up the `.env` file and generate the application key:**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

    Next, open the `.env` file and update the `DB_` variables with your MySQL database credentials.

4.  **Run migrations and seed the database:**
    This command will create the necessary database tables and populate them with sample data.

    ```bash
    php artisan migrate --seed
    ```

5.  **Start the local development server:**
    Run these two commands in separate terminal windows to serve both the back-end and front-end assets.
    ```bash
    php artisan serve
    npm run dev
    ```
    Visit `http://127.0.0.1:8000` in your browser to view the application.

---

## 🌟 Project Highlights

-   Solo-built in just **8 days**.
-   Developed as a final project for **Aptech's 2nd semester**.
-   Full **CRUD** (Create, Read, Update, Delete) functionality for movies and shows.
-   Clean database schema and **Eloquent relationships**.
-   No external UI kits—fully customized **Tailwind CSS** components.
-   Light/dark mode compatible using CSS variables.

---

## 🧱 Tables Overview

The database is structured with the following key tables:

-   `users`: Stores user information (id, name, email, password, role, created_at).
-   `movies`: Contains details about each movie (id, title, description, year, poster, trailer_url, category, language, rating, duration).
-   `shows`: Links movies to showtimes and locations (id, movie_id, city, location, show_date, show_time, price_silver, price_gold, price_platinum).
-   `bookings`: Records ticket bookings (user_id, show_id, class_type, quantity, is_kid, total_price).
-   `reviews`: Manages user reviews and ratings for movies (user_id, movie_id, comment, rating, created_at).

---

## 🔮 Future Enhancements

-   **💳 Payment gateway integration** (e.g., Stripe, JazzCash)
-   **🪑 Seat selection layout**
-   **📧 Email ticket confirmations**
-   **🗺 Multi-city theatre map support**
-   **📱 PWA or mobile app companion**

---

## 👨‍💻 Author

**Himesh Dua**

17 y/o Full Stack Developer from Karachi, Pakistan

-   **Portfolio**: [himeshdua.vercel.app](https://himeshdua.vercel.app)
-   **GitHub**: [@himeshdua](https://github.com/himeshdua)
-   **Email**: himeshdua22@gmail.com

---

## 📝 License

This project is open-sourced under the [MIT license](https://opensource.org/licenses/MIT).
