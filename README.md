# Subscription System

A lightweight PHP-based subscription system that allows users to sign up using their email, verify through a code, and then receive a **random XKCD comic every day**. A scheduled CRON job runs every 24 hours to fetch a new comic and deliver it to all verified subscribers.

---

## 🚀 Features

- **Email registration & verification**
- **Daily comic delivery** using the official XKCD JSON API
- **Automatic CRON execution** every 24 hours
- **Simple, clean PHP implementation**
- **Easy to deploy on any server**
- **No heavy frameworks required**

---

## 🔧 How the System Works

1. A user enters their email on the subscription page.  
2. The system generates a verification code and emails it to the user.  
3. After verification, the user becomes an active subscriber.  
4. A CRON job runs daily:
   - Fetches a random XKCD comic  
   - Extracts the title, image, alt-text, and link  
   - Sends the comic to every subscriber  
5. The process repeats automatically every 24 hours.

---

## 🛠️ Requirements

- PHP (any modern version)
- Working email configuration (SMTP or PHP mail)
- CRON job access
- Basic HTML/PHP hosting

---

## 📥 Installation

1. Clone the repository:
```bash
   git clone https://github.com/WHitE-TITaN/Subscription-System
```
   
2. Configure your email sending settings in the PHP files.
3. Ensure your server supports PHP mail or SMTP.
4. Set up the CRON job:

bash
``` n
0 0 * * * php /path/to/your/project/sendComic.php
(Runs every midnight — adjust as needed)
```

5. Deploy on your server and you're good to go!
<hr>

## ⚙️ Configuration Options
- Customize the verification email template
- Customize the daily comic email
- Adjust CRON frequency
- Add optional unsubscribe functionality
- Extend to other APIs or daily content

## 📚 Folder Structure
```
Subscription-System/
│── assets/             # Static assets or helper files <br>
│── api/                # API-related scripts  <br>
│── scripts/            # CRON-based scripts  <br>
│── email/              # Mail templates and sending logic  <br>
│── index.php           # Main entry point  <br>
│── verify.php          # Handles email verification  <br>
│── README.md           # Project documentation  <br>
```

## 🤝 Contributing
Want to improve the project? Awesome!
You can help by:

- Enhancing email templates
- Improving database or file storage
- Adding logging & error tracking
- Integrating PHPMailer for better reliability
- Pull requests are always welcome!

