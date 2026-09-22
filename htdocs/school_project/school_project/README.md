# 🎓 Class Connect — Parent Contact Collection Portal

## 📁 Project Structure

```
school_project/
├── index.php          ← Student View (form to submit parent contacts)
├── staff.php          ← Staff View (dashboard + download + pending list)
├── data/
│   ├── students.json  ← All 30 students with reg numbers (auto-loaded)
│   └── responses.json ← Submitted contacts (auto-created on first submit)
└── README.md
```

## 🚀 Setup Instructions

### Requirements
- PHP 7.4+ (with file write permission)
- Web server: Apache / Nginx / XAMPP / WAMP / PHP built-in server

### Quick Start (Local)
```bash
cd school_project
php -S localhost:8000
```
Then open:
- **Student View:** http://localhost:8000/index.php
- **Staff View:**   http://localhost:8000/staff.php

### Apache/XAMPP
1. Copy `school_project/` to `htdocs/` folder
2. Start Apache
3. Visit http://localhost/school_project/

### File Permissions
Make sure `data/` directory is writable:
```bash
chmod 755 data/
chmod 644 data/students.json
```

---

## 🎨 Features

### Student View (index.php)
- ✅ Register Number validation against class list
- ✅ Father's name + mobile number
- ✅ Mother's name + mobile number
- ✅ Indian phone number validation (starts with 6-9, 10 digits)
- ✅ Animated success confirmation
- ✅ Mobile-responsive (Bootstrap 5)
- ✅ AOS scroll animations

### Staff View (staff.php)
- ✅ Dashboard stats (Total / Submitted / Pending / %)
- ✅ Animated progress bar
- ✅ Submitted students table with all parent contacts
- ✅ Pending students tab (not yet submitted)
- ✅ All students overview with status badges
- ✅ Download submitted data as Excel (.xls)
- ✅ Download pending list as Excel (.xls)
- ✅ Live search/filter in tables
- ✅ Responsive on all devices

---

## 👥 Class List (30 Students)
All reg numbers from your uploaded boys_list.xlsx are pre-loaded:
913124104004 to 913124104183 (+ 2 without reg numbers assigned temp IDs)

## 🎨 Design
- **Primary Color:** Orange (#FF6B00)
- **Theme:** Light, clean, modern
- **Fonts:** Sora (headings) + DM Sans (body)
- **Framework:** Bootstrap 5.3
- **Animations:** AOS + CSS keyframes
- **Icons:** Font Awesome 6.5
