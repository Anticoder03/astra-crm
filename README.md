# Astra CRM - Customer Relationship Management System



Astra CRM is a modern, feature-rich Customer Relationship Management system built with Laravel. It helps businesses manage their customer relationships, track investments, and maintain follow-ups efficiently.

Copyright © 2025 Anticoder03. All rights reserved.

## 🌟 Features

- **Customer Management**
  - Add, edit, and manage customer information
  - Track customer interactions and history
  - Email notifications to customers

- **Investment Tracking**
  - Record and monitor customer investments
  - Generate investment reports
  - Track investment performance

- **Policy Management**
  - Create and manage customer policies
  - Track policy status and updates
  - Policy renewal reminders

- **Follow-up System**
  - Schedule and track customer follow-ups
  - Set reminders for important dates
  - Automated follow-up notifications

- **Analytics Dashboard**
  - Visual representation of business metrics
  - Customer growth tracking
  - Investment performance analysis

## 🚀 Getting Started

### Prerequisites

- PHP >= 8.2
- Composer
- Node.js & NPM
- SQLite/MySQL/PostgreSQL

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/astra-crm.git
   cd astra-crm
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install JavaScript dependencies**
   ```bash
   npm install
   ```

4. **Create environment file**
   ```bash
   cp .env.example .env
   ```

5. **Generate application key**
   ```bash
   php artisan key:generate
   ```

6. **Configure database**
   Update your `.env` file with your database credentials:
   ```env
   DB_CONNECTION=sqlite
   DB_DATABASE=/absolute/path/to/database.sqlite
   ```

7. **Run migrations**
   ```bash
   php artisan migrate
   ```

8. **Seed the database (optional)**
   ```bash
   php artisan db:seed
   ```

9. **Start the development server**
   ```bash
   php artisan serve
   ```

10. **Compile assets**
    ```bash
    npm run dev
    ```

## 📧 Email Configuration

To enable email functionality, configure your `.env` file with your email settings:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your_email@gmail.com
MAIL_PASSWORD=your_app_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your_email@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
```

## 🛠️ Project Structure

```
astra-crm/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── CustomerController.php
│   │   │   ├── CustomerEmailController.php
│   │   │   ├── InvestmentsController.php
│   │   │   ├── PoliciesController.php
│   │   │   ├── FollowupsController.php
│   │   │   └── AnalyticsController.php
│   ├── Models/
│   │   ├── Customer.php
│   │   ├── Investment.php
│   │   ├── Policy.php
│   │   └── Followup.php
│   └── Mail/
│       └── CustomerEmailNotification.php
├── resources/
│   ├── views/
│   │   ├── customers/
│   │   ├── investments/
│   │   ├── policies/
│   │   ├── followups/
│   │   └── emails/
├── database/
│   ├── migrations/
│   └── seeders/
└── routes/
    └── web.php
```

## 🔐 Security Features

- CSRF protection
- XSS prevention
- SQL injection protection
- Secure password hashing
- Input validation
- Email verification

## 📊 Analytics Features

- Customer growth tracking
- Investment performance analysis
- Policy status monitoring
- Follow-up completion rates
- Custom report generation

## 🤝 Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 👥 Authors

- Anticoder03 - Initial work - [GitHub](https://github.com/Anticoder03)

## 🙏 Acknowledgments

- Laravel Framework
- Tailwind CSS
- All contributors who have helped shape this project

## 📞 Support

For support, email support@astracrm.com or join our Slack channel.

---

Made with ❤️ by Anticoder03
