/**
 * Driver Wallet - Frontend JavaScript
 * 
 * Handles wallet balance fetching, withdrawal processing,
 * and UI state management
 */

// API Configuration
const API_BASE_URL = 'api';

// DOM Elements
let balanceAmountEl;
let balanceLoaderEl;
let driverIdInput;
let amountInput;
let withdrawalForm;
let withdrawBtn;
let btnText;
let btnLoader;
let messageContainer;
let messageEl;

// State
let currentBalance = 0;
let isProcessing = false;

/**
 * Initialize application
 */
document.addEventListener('DOMContentLoaded', () => {
    // Get DOM elements
    balanceAmountEl = document.getElementById('balanceAmount');
    balanceLoaderEl = document.getElementById('balanceLoader');
    driverIdInput = document.getElementById('driverId');
    amountInput = document.getElementById('amount');
    withdrawalForm = document.getElementById('withdrawalForm');
    withdrawBtn = document.getElementById('withdrawBtn');
    btnText = withdrawBtn.querySelector('.btn-text');
    btnLoader = withdrawBtn.querySelector('.btn-loader');
    messageContainer = document.getElementById('messageContainer');
    messageEl = document.getElementById('message');

    // Event listeners
    withdrawalForm.addEventListener('submit', handleWithdrawal);
    driverIdInput.addEventListener('input', handleDriverIdChange);
    amountInput.addEventListener('input', validateAmount);

    // Load balance if driver ID is pre-filled
    if (driverIdInput.value) {
        fetchWalletBalance(driverIdInput.value);
    }
});

/**
 * Handle driver ID change
 */
function handleDriverIdChange() {
    const driverId = driverIdInput.value.trim();

    if (driverId && driverId > 0) {
        fetchWalletBalance(driverId);
    } else {
        resetBalance();
    }
}

/**
 * Fetch wallet balance from API
 */
async function fetchWalletBalance(driverId) {
    try {
        // Show loader
        showBalanceLoader();

        // Make API call
        const response = await fetch(`${API_BASE_URL}/get-wallet.php?driver_id=${driverId}`);
        const responseText = await response.text();
        
        let data;
        try {
            data = JSON.parse(responseText);
        } catch (e) {
            console.error('Invalid JSON response:', responseText);
            throw new Error('Server returned invalid response');
        }

        if (data.success) {
            currentBalance = data.balance;
            displayBalance(currentBalance);
        } else {
            console.warn('API Error:', data);
            showMessage(data.message || 'Failed to fetch wallet balance', 'error');
            resetBalance();
        }
    } catch (error) {
        console.error('Error fetching wallet balance:', error);
        showMessage('Failed to connect to server. Please try again.', 'error');
        resetBalance();
    } finally {
        hideBalanceLoader();
    }
}

/**
 * Display balance
 */
function displayBalance(balance) {
    balanceAmountEl.textContent = `₹ ${formatCurrency(balance)}`;
    balanceAmountEl.classList.add('fade-in');
}

/**
 * Reset balance display
 */
function resetBalance() {
    currentBalance = 0;
    balanceAmountEl.textContent = '₹ --';
}

/**
 * Show balance loader
 */
function showBalanceLoader() {
    balanceLoaderEl.style.display = 'flex';
    balanceAmountEl.style.opacity = '0';
}

/**
 * Hide balance loader
 */
function hideBalanceLoader() {
    balanceLoaderEl.style.display = 'none';
    balanceAmountEl.style.opacity = '1';
}

/**
 * Validate withdrawal amount
 */
function validateAmount() {
    const amount = parseFloat(amountInput.value);

    if (isNaN(amount) || amount <= 0) {
        return;
    }

    // Check minimum amount
    if (amount < 100) {
        amountInput.setCustomValidity('Minimum withdrawal amount is ₹100');
    }
    // Check if amount exceeds balance
    else if (amount > currentBalance) {
        amountInput.setCustomValidity(`Amount exceeds available balance (₹${formatCurrency(currentBalance)})`);
    }
    else {
        amountInput.setCustomValidity('');
    }
}

/**
 * Handle withdrawal form submission
 */
async function handleWithdrawal(event) {
    event.preventDefault();

    // Prevent double submission
    if (isProcessing) {
        return;
    }

    // Get form values
    const driverId = parseInt(driverIdInput.value);
    const amount = parseFloat(amountInput.value);

    // Validate inputs
    if (!driverId || driverId <= 0) {
        showMessage('Please enter a valid driver ID', 'error');
        return;
    }

    if (!amount || amount < 100) {
        showMessage('Minimum withdrawal amount is ₹100', 'error');
        return;
    }

    if (amount > currentBalance) {
        showMessage(`Insufficient balance. Available: ₹${formatCurrency(currentBalance)}`, 'error');
        return;
    }

    // Start processing
    setProcessingState(true);
    hideMessage();

    try {
        // Make withdrawal API call
        const response = await fetch(`${API_BASE_URL}/withdraw.php`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                driver_id: driverId,
                amount: amount
            })
        });

        const responseText = await response.text();
        let data;
        try {
            data = JSON.parse(responseText);
        } catch (e) {
            console.error('Invalid JSON response:', responseText);
            throw new Error('Server returned invalid response. Check console for details.');
        }

        if (data.success) {
            // Update balance
            currentBalance = data.remainingBalance;
            displayBalance(currentBalance);

            // Show success message
            showMessage(
                `✓ Withdrawal successful! ₹${formatCurrency(data.withdrawnAmount)} has been processed. Order ID: ${data.orderId}`,
                'success'
            );

            // Reset amount input
            amountInput.value = '';

            // Scroll to message
            messageContainer.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        } else {
            // Show error message
            showMessage(data.message || 'Withdrawal failed. Please try again.', 'error');

            // Refresh balance in case it changed
            if (driverId) {
                fetchWalletBalance(driverId);
            }
        }
    } catch (error) {
        console.error('Withdrawal error:', error);
        showMessage('Failed to process withdrawal. Please check your connection and try again.', 'error');
    } finally {
        setProcessingState(false);
    }
}

/**
 * Set processing state
 */
function setProcessingState(processing) {
    isProcessing = processing;

    if (processing) {
        // Disable form inputs
        driverIdInput.disabled = true;
        amountInput.disabled = true;
        withdrawBtn.disabled = true;

        // Show loader in button
        btnText.style.display = 'none';
        btnLoader.style.display = 'flex';
    } else {
        // Enable form inputs
        driverIdInput.disabled = false;
        amountInput.disabled = false;
        withdrawBtn.disabled = false;

        // Hide loader in button
        btnText.style.display = 'inline';
        btnLoader.style.display = 'none';
    }
}

/**
 * Show message
 */
function showMessage(text, type = 'success') {
    messageEl.textContent = text;
    messageEl.className = `message ${type}`;
    messageContainer.style.display = 'block';
    messageContainer.classList.add('fade-in');
}

/**
 * Hide message
 */
function hideMessage() {
    messageContainer.style.display = 'none';
}

/**
 * Format currency
 */
function formatCurrency(amount) {
    return new Intl.NumberFormat('en-IN', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }).format(amount);
}

/**
 * Auto-hide messages after 10 seconds
 */
setInterval(() => {
    if (messageContainer.style.display === 'block') {
        const messageAge = Date.now() - (messageContainer.dataset.timestamp || 0);
        if (messageAge > 10000) {
            hideMessage();
        }
    }
}, 1000);

// Update timestamp when showing message
const originalShowMessage = showMessage;
showMessage = function (text, type) {
    messageContainer.dataset.timestamp = Date.now();
    originalShowMessage(text, type);
};
