// kmh gauge script
var basegradient = "repeating-conic-gradient(from 270deg, var(--black) 0deg 0.3deg, var(--color) 0.7deg 1.3deg, var(--black) 1.7deg 2deg)";

//input values
var total_kilometers = 172312;
var totalkm = total_kilometers;
var trip1_km = 352.7;
var trip2_km = 124.1;
var km = trip1_km;
var deci = 7;
var kmh = 0;
kmh = Math.max(0, Math.min(kmh, 100));

// Battery level (0-100)
var batteryLevel = 75;
var isCharging = false;

// Speed change variables
var accelerationInterval;
var decelerationInterval;
var accelerationRate = 1; // km/h per interval
var decelerationRate = 2; // km/h per interval
var updateInterval = 50; // ms

//log styles
var green = "color: seagreen; background-color: black; border: 1px solid seagreen; padding: 4px;";
var blue = "color: darkcyan; background-color: black; border: 1px solid darkcyan; padding: 4px;";
var orange = "color: orange; background-color: black; border: 1px solid orange; padding: 4px;";
var red = "color: red; background-color: black; border: 2px solid red; padding: 3px;";

window.onload = function () {
    console.clear();
    console.log("%cInitialisation", green);
    updateBattery();
};

//initial sweep
var sweepProgress = 0;
var InitialSweepInterv = setInterval(initialSweep, 20);
function initialSweep() {
    if (sweepProgress < 10) {
        kmh = kmh + 10;
        sweepProgress++;
        totalkm = 0;
        km = 0;
    }
    else if (sweepProgress < 20) {
        kmh = kmh - 10;
        sweepProgress++;
        totalkm = 999999;
        km = 9999;
        deci = 9;
    }
    else {
        console.log("%cInitial Sweep Complete", green);
        clearInterval(InitialSweepInterv);
        InitialSweepInterv = null;
        totalkm = total_kilometers;
        km = trip1_km;
        deci = 7;
    }
}

//updating the gauge each frame
var ScreenUpdateInterv = setInterval(screenUpdate, 20);
function screenUpdate() {
    if (kmh % 2 === 0) {
        movescale();
        updateOdometer();
        updateTripmeter();
    } else {
        kmh--;
        movescale();
        updateOdometer();
        updateTripmeter();
        kmh++;
    }

    document.getElementById("kmhslider").value = kmh;
    document.getElementById("valueshow").innerHTML = kmh;

    // Update battery based on speed
    updateBatteryConsumption();
}

function updateBatteryConsumption() {
    if (kmh > 0) {
        // Higher speed consumes more battery
        let consumptionRate = 0.02 + (kmh / 100) * 0.08;
        if (Math.random() < consumptionRate) {
            batteryLevel = Math.max(0, batteryLevel - 1);
            updateBattery();
        }
    } else if (isCharging) {
        // Charging when stopped
        if (Math.random() < 0.1 && batteryLevel < 100) {
            batteryLevel = Math.min(100, batteryLevel + 1);
            updateBattery();
        }
    }
}

function updateBattery() {
    const batteryElement = document.getElementById("battery-level");
    const percentageElement = document.getElementById("battery-percentage");

    batteryElement.style.width = `${batteryLevel}%`;
    batteryElement.setAttribute('data-level', 
        batteryLevel > 50 ? 'high' : (batteryLevel > 20 ? 'medium' : 'low'));

    percentageElement.textContent = `${batteryLevel}%`;
    
    // Update battery warning if needed
    if (batteryLevel <= 20 && !document.getElementById('low-battery-warning')) {
        showLowBatteryWarning();
    } else if (batteryLevel > 20 && document.getElementById('low-battery-warning')) {
        hideLowBatteryWarning();
    }
}

function showLowBatteryWarning() {
    const warning = document.createElement('div');
    warning.id = 'low-battery-warning';
    warning.style.position = 'fixed';
    warning.style.bottom = '20px';
    warning.style.left = '50%';
    warning.style.transform = 'translateX(-50%)';
    warning.style.backgroundColor = 'rgba(255, 0, 0, 0.8)';
    warning.style.color = 'white';
    warning.style.padding = '10px 20px';
    warning.style.borderRadius = '5px';
    warning.style.zIndex = '1000';
    warning.style.animation = 'pulse 1s infinite alternate';
    warning.textContent = '⚠ Low Battery! Please charge soon.';
    document.body.appendChild(warning);
}

function hideLowBatteryWarning() {
    const warning = document.getElementById('low-battery-warning');
    if (warning) {
        warning.remove();
    }
}

function toggleCharging() {
    isCharging = !isCharging;
    const chargeBtn = document.getElementById('charge-button');
    if (isCharging) {
        chargeBtn.textContent = 'Stop Charging';
        chargeBtn.style.backgroundColor = '#4CAF50';
    } else {
        chargeBtn.textContent = 'Start Charging';
        chargeBtn.style.backgroundColor = '#333';
    }
}

function movescale() {
    let kmhDegrees = kmh * 2.7; // maps 0-100 km/h to 0-270 degrees
    document.getElementById("gauge").style.background =
        basegradient + `, conic-gradient(from 270deg, white 0deg ${kmhDegrees}deg, var(--black) ${kmhDegrees}deg)`;
}

function updateOdometer() {
    document.getElementById("km_total").innerHTML = totalkm.toString().padStart(6, '0');
}

function updateTripmeter() {
    document.getElementById("km_trip").innerHTML = km.toString().padStart(4, '0');
    document.getElementById("km_trip_decimal").innerHTML = ". " + deci;
}

// Speed control functions
function changeSpeed(amount) {
    if (amount > 0) {
        kmh = Math.min(100, kmh + amount);
    } else {
        kmh = Math.max(0, kmh + amount);
    }
}

function startAccelerating() {
    stopBraking();
    if (!accelerationInterval) {
        accelerationInterval = setInterval(function () {
            kmh = Math.min(100, kmh + accelerationRate);
        }, updateInterval);
    }
}

function startBraking() {
    stopAccelerating();
    if (!decelerationInterval) {
        decelerationInterval = setInterval(function () {
            kmh = Math.max(0, kmh - decelerationRate);
        }, updateInterval);
    }
}

function stopAccelerating() {
    if (accelerationInterval) {
        clearInterval(accelerationInterval);
        accelerationInterval = null;
    }
}

function stopBraking() {
    if (decelerationInterval) {
        clearInterval(decelerationInterval);
        decelerationInterval = null;
    }
}

// Event listeners for button presses
document.getElementById('accelerate').addEventListener('mousedown', startAccelerating);
document.getElementById('accelerate').addEventListener('mouseup', stopAccelerating);
document.getElementById('accelerate').addEventListener('mouseleave', stopAccelerating);

document.getElementById('brake').addEventListener('mousedown', startBraking);
document.getElementById('brake').addEventListener('mouseup', stopBraking);
document.getElementById('brake').addEventListener('mouseleave', stopBraking);

document.getElementById("kmhslider").oninput = function () {
    if (InitialSweepInterv == null) {
        kmh = Math.min(100, this.value);
    }
    document.getElementById("valueshow").innerHTML = kmh;
};

function toggleTheme() {
    const currentTheme = document.body.getAttribute('data-theme');
    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
    document.body.setAttribute('data-theme', newTheme);
}

// Add charge button to HTML if not exists
if (!document.getElementById('charge-button')) {
    const chargeBtn = document.createElement('button');
    chargeBtn.id = 'charge-button';
    chargeBtn.textContent = 'Start Charging';
    chargeBtn.style.position = 'fixed';
    chargeBtn.style.bottom = '20px';
    chargeBtn.style.right = '20px';
    chargeBtn.style.padding = '10px 20px';
    chargeBtn.style.borderRadius = '5px';
    chargeBtn.style.border = 'none';
    chargeBtn.style.backgroundColor = '#333';
    chargeBtn.style.color = 'white';
    chargeBtn.style.cursor = 'pointer';
    chargeBtn.style.zIndex = '1000';
    chargeBtn.onclick = toggleCharging;
    document.body.appendChild(chargeBtn);
}