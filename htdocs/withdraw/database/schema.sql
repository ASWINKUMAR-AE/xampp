-- =====================================================
-- Driver Wallet Cash Withdrawal System - Database Schema
-- =====================================================
-- 
-- This file contains the SQL schema for the driver wallet
-- and earnings tables required for the withdrawal system.
--
-- Database: cabit
-- =====================================================

-- Create database if not exists
CREATE DATABASE IF NOT EXISTS cabit
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE cabit;

-- =====================================================
-- Table: driver_wallet
-- =====================================================
-- Stores wallet balance for each driver
-- =====================================================

CREATE TABLE IF NOT EXISTS driver_wallet (
    id INT AUTO_INCREMENT PRIMARY KEY,
    driver_id INT NOT NULL UNIQUE,
    balance DECIMAL(10, 2) NOT NULL DEFAULT 0.00,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    INDEX idx_driver_id (driver_id),
    
    CONSTRAINT chk_balance_positive CHECK (balance >= 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- Table: earnings
-- =====================================================
-- Records all earning and withdrawal transactions
-- =====================================================

CREATE TABLE IF NOT EXISTS earnings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    driver_id INT NOT NULL,
    ride_id INT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    type ENUM('earning', 'withdraw', 'bonus', 'penalty') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    notes TEXT NULL,
    
    INDEX idx_driver_id (driver_id),
    INDEX idx_type (type),
    INDEX idx_created_at (created_at),
    INDEX idx_driver_type (driver_id, type)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- Sample Data for Testing
-- =====================================================

-- Insert sample driver wallets
INSERT INTO driver_wallet (driver_id, balance) VALUES
(1, 5000.00),
(2, 3500.50),
(3, 7200.75),
(4, 1500.00),
(5, 8900.25),
(10, 4500.00)
ON DUPLICATE KEY UPDATE balance = VALUES(balance);

-- Insert sample earnings
INSERT INTO earnings (driver_id, ride_id, amount, type, notes) VALUES
(1, 101, 250.00, 'earning', 'Ride earnings'),
(1, 102, 350.00, 'earning', 'Ride earnings'),
(2, 103, 180.50, 'earning', 'Ride earnings'),
(3, 104, 420.75, 'earning', 'Ride earnings'),
(4, 105, 150.00, 'earning', 'Ride earnings'),
(5, 106, 890.25, 'earning', 'Ride earnings'),
(10, 107, 500.00, 'earning', 'Ride earnings');

-- =====================================================
-- Useful Queries for Testing
-- =====================================================

-- Check all driver wallets
-- SELECT * FROM driver_wallet ORDER BY driver_id;

-- Check all withdrawals
-- SELECT * FROM earnings WHERE type = 'withdraw' ORDER BY created_at DESC;

-- Check specific driver's transaction history
-- SELECT * FROM earnings WHERE driver_id = 1 ORDER BY created_at DESC;

-- Get driver's total earnings and withdrawals
-- SELECT 
--     driver_id,
--     SUM(CASE WHEN type = 'earning' THEN amount ELSE 0 END) as total_earnings,
--     SUM(CASE WHEN type = 'withdraw' THEN amount ELSE 0 END) as total_withdrawals
-- FROM earnings
-- GROUP BY driver_id;

-- =====================================================
-- Maintenance Queries
-- =====================================================

-- Reset a driver's wallet (for testing)
-- UPDATE driver_wallet SET balance = 5000.00 WHERE driver_id = 1;

-- Delete all withdrawal records (for testing)
-- DELETE FROM earnings WHERE type = 'withdraw';

-- =====================================================
-- End of Schema
-- =====================================================
