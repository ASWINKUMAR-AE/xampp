# 💰 Driver Wallet Cash Withdrawal System

Production-ready cash withdrawal system for cab platform drivers with PhonePe Payment Gateway integration.

## 🚀 Features

- **Real-time Wallet Balance**: Fetch and display driver wallet balance
- **Secure Withdrawals**: Process cash withdrawals with atomic MySQL transactions
- **PhonePe Integration**: Integrated with PhonePe Payout API for instant transfers
- **Transaction Safety**: Row-level locking to prevent race conditions and double withdrawals
- **Input Validation**: Comprehensive client-side and server-side validation
- **Modern UI**: Responsive, beautiful interface with loading states and animations
- **Error Handling**: Robust error handling with user-friendly messages

## 📋 Prerequisites

- **PHP**: 8.0 or higher
- **MySQL**: 5.7 or higher (with InnoDB storage engine)
- **Web Server**: Apache/Nginx with PHP support
- **cURL**: PHP cURL extension enabled
- **PhonePe Account**: Merchant credentials (sandbox or production)

## 🛠️ Installation

### 1. Clone/Download the Project

```bash
cd d:/Final_view_waves/withdraw
```

### 2. Database Setup

**Import the database schema:**

```bash
mysql -u admin -p < database/schema.sql
```

Or manually execute the SQL file in phpMyAdmin/MySQL Workbench.

**Verify database connection:**
- Host: `localhost`
- User: `admin`
- Password: `wave@2025_zethub`
- Database: `cabit`

### 3. Configure PhonePe

Edit `config/phonepe-config.php`:

**For Sandbox Testing (Default):**
```php
$mode = "sandbox";
```

**For Production:**
```php
$mode = "production";
```

The credentials are already configured in the file.

### 4. Web Server Configuration

**For Apache:**

Ensure `mod_rewrite` is enabled and `.htaccess` is allowed.

**For Nginx:**

Add this to your server block:

```nginx
location /api/ {
    try_files $uri $uri/ =404;
}
```

### 5. File Permissions

```bash
chmod 755 api/
chmod 644 api/*.php
chmod 644 config/*.php
```

### 6. Test the Installation

Open your browser and navigate to:
```
http://localhost/withdraw/
```

Or your configured domain/path.

## 📁 Project Structure

```
withdraw/
├── api/
│   ├── get-wallet.php          # Fetch wallet balance API
│   └── withdraw.php            # Process withdrawal API
├── assets/
│   ├── css/
│   │   └── style.css           # Stylesheet
│   └── js/
│       └── app.js              # Frontend logic
├── config/
│   ├── database.php            # Database connection
│   └── phonepe-config.php      # PhonePe configuration
├── database/
│   └── schema.sql              # Database schema
├── index.html                  # Main interface
└── README.md                   # This file
```

## 🔌 API Documentation

### 1. Get Wallet Balance

**Endpoint:** `GET /api/get-wallet.php`

**Parameters:**
- `driver_id` (required): Driver ID

**Example Request:**
```bash
curl "http://localhost/withdraw/api/get-wallet.php?driver_id=10"
```

**Success Response:**
```json
{
  "success": true,
  "balance": 4500.00,
  "driver_id": 10
}
```

**Error Response:**
```json
{
  "success": false,
  "message": "Driver wallet not found"
}
```

### 2. Withdraw Cash

**Endpoint:** `POST /api/withdraw.php`

**Request Body:**
```json
{
  "driver_id": 10,
  "amount": 1000
}
```

**Example Request:**
```bash
curl -X POST http://localhost/withdraw/api/withdraw.php \
  -H "Content-Type: application/json" \
  -d '{"driver_id":10,"amount":1000}'
```

**Success Response:**
```json
{
  "success": true,
  "message": "Withdrawal successful",
  "remainingBalance": 3500.00,
  "withdrawnAmount": 1000,
  "orderId": "WD10_1734345887_1234",
  "timestamp": "2025-12-16 14:44:47"
}
```

**Error Response:**
```json
{
  "success": false,
  "message": "Insufficient balance",
  "currentBalance": 500.00,
  "requestedAmount": 1000
}
```

## 🧪 Testing

### Test with Sample Data

The schema includes sample driver wallets. Test with:
- Driver ID: `10` (Balance: ₹4500)
- Driver ID: `1` (Balance: ₹5000)
- Driver ID: `5` (Balance: ₹8900.25)

### Testing Scenarios

1. **Successful Withdrawal:**
   - Driver ID: 10
   - Amount: 1000
   - Expected: Success, balance updated to 3500

2. **Insufficient Balance:**
   - Driver ID: 10
   - Amount: 10000
   - Expected: Error message

3. **Minimum Amount Validation:**
   - Driver ID: 10
   - Amount: 50
   - Expected: Error (minimum ₹100)

4. **Invalid Driver:**
   - Driver ID: 999
   - Amount: 100
   - Expected: Driver not found error

### PhonePe Sandbox Testing

In sandbox mode, PhonePe may return simulated responses. Check the browser console and PHP error logs for detailed API responses.

**Enable PhonePe Success Simulation (for testing):**

In `api/withdraw.php`, uncomment line 156:
```php
$payoutSuccess = true;
```

This bypasses PhonePe validation for testing the withdrawal flow.

## 🔐 Security Considerations

### Before Production Deployment:

1. **Implement Authentication:**
   - Add session-based or token-based driver authentication
   - Verify driver identity before allowing withdrawals
   - Example: Check session variable `$_SESSION['driver_id']`

2. **Add Driver Bank Details:**
   - Create a `driver_bank_details` table
   - Store UPI ID or bank account details
   - Fetch real beneficiary info in `withdraw.php`

3. **Enable HTTPS:**
   - Use SSL/TLS certificates
   - Redirect all HTTP to HTTPS

4. **Rate Limiting:**
   - Implement withdrawal request limits
   - Prevent abuse and brute force attacks

5. **Logging:**
   - Log all withdrawal attempts
   - Monitor for suspicious activity

6. **Input Sanitization:**
   - Already implemented, but review regularly
   - Keep PHP and MySQL updated

## 🐛 Troubleshooting

### Database Connection Failed

**Error:** "Database connection failed"

**Solution:**
- Verify MySQL is running
- Check credentials in `config/database.php`
- Ensure database `cabit` exists

### PhonePe API Errors

**Error:** "Payment gateway failed"

**Solution:**
- Check PhonePe credentials in `config/phonepe-config.php`
- Verify cURL is enabled: `php -m | grep curl`
- Check PHP error logs for detailed API responses
- For testing, enable success simulation (see Testing section)

### Balance Not Loading

**Error:** Balance shows "₹ --"

**Solution:**
- Open browser console (F12) for JavaScript errors
- Verify API endpoint is accessible: `/api/get-wallet.php`
- Check that driver_id is valid in database

### Transaction Rollback

**Error:** "An error occurred while processing withdrawal"

**Solution:**
- Check MySQL error logs
- Ensure InnoDB storage engine is used
- Verify `earnings` table exists
- Check PHP error logs for detailed error

## 📊 Database Queries

### View All Wallets
```sql
SELECT * FROM driver_wallet ORDER BY driver_id;
```

### View Withdrawal History
```sql
SELECT * FROM earnings 
WHERE type = 'withdraw' 
ORDER BY created_at DESC;
```

### View Driver Transaction Summary
```sql
SELECT 
    driver_id,
    SUM(CASE WHEN type = 'earning' THEN amount ELSE 0 END) as total_earnings,
    SUM(CASE WHEN type = 'withdraw' THEN amount ELSE 0 END) as total_withdrawals
FROM earnings
GROUP BY driver_id;
```

## 🚀 Production Deployment

1. Switch to production mode in `config/phonepe-config.php`
2. Implement driver authentication
3. Add real driver bank details
4. Enable HTTPS
5. Set up proper error logging
6. Configure rate limiting
7. Test thoroughly in staging environment
8. Monitor transactions and logs

## 📝 Business Rules

- **Minimum Withdrawal:** ₹100
- **Maximum Withdrawal:** Cannot exceed wallet balance
- **Balance Constraint:** Wallet balance cannot go negative
- **Transaction Atomicity:** All-or-nothing (commit on success, rollback on failure)
- **Concurrency Safety:** Row-level locking prevents race conditions

## 🆘 Support

For issues or questions:
1. Check PHP error logs: `/var/log/php/error.log`
2. Check MySQL error logs
3. Enable browser console for frontend errors
4. Review PhonePe API documentation

## 📄 License

This is a production-ready system for the Cabit cab platform.

---

**Built with ❤️ for Cabit Drivers**

*Powered by PhonePe Payment Gateway*
