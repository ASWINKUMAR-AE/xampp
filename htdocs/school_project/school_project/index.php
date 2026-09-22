<?php
session_start();
$message = '';
$error = '';
$found_student = null;

// Load students
$students_raw = json_decode(file_get_contents(__DIR__ . '/data/students.json'), true);
$students = [];
foreach ($students_raw as $s) {
    $students[strtoupper(trim($s['reg_no']))] = $s['name'];
}

// Load existing responses
$responses_file = __DIR__ . '/data/responses.json';
$responses = file_exists($responses_file) ? json_decode(file_get_contents($responses_file), true) : [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'submit_student') {
    $reg_no = strtoupper(trim(isset($_POST['reg_no']) ? $_POST['reg_no'] : ''));
    $father_name   = trim(isset($_POST['father_name']) ? $_POST['father_name'] : '');
    $father_phone  = trim(isset($_POST['father_phone']) ? $_POST['father_phone'] : '');
    $mother_name   = trim(isset($_POST['mother_name']) ? $_POST['mother_name'] : '');
    $mother_phone  = trim(isset($_POST['mother_phone']) ? $_POST['mother_phone'] : '');

    if (!isset($students[$reg_no])) {
        $error = "❌ Register Number not found! Please check and try again.";
    } elseif (empty($father_name) || empty($father_phone) || empty($mother_name) || empty($mother_phone)) {
        $error = "⚠️ All fields are required.";
    } elseif (!preg_match('/^[6-9]\d{9}$/', $father_phone) || !preg_match('/^[6-9]\d{9}$/', $mother_phone)) {
        $error = "📞 Please enter valid 10-digit Indian mobile numbers.";
    } else {
        $found_student = $students[$reg_no];
        // Save/update response
        $responses[$reg_no] = [
            'reg_no'       => $reg_no,
            'student_name' => $students[$reg_no],
            'father_name'  => $father_name,
            'father_phone' => $father_phone,
            'mother_name'  => $mother_name,
            'mother_phone' => $mother_phone,
            'submitted_at' => date('Y-m-d H:i:s'),
        ];
        file_put_contents($responses_file, json_encode(array_values($responses), JSON_PRETTY_PRINT));
        $message = "✅ Details submitted successfully for <strong>" . htmlspecialchars($students[$reg_no]) . "</strong>!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Contact Portal | Class Connect</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<style>
:root {
  --orange: #FF6B00;
  --orange-light: #FF8C38;
  --orange-pale: #FFF3E8;
  --orange-dark: #D45700;
  --cream: #FFFAF5;
  --text-dark: #1A1208;
  --text-mid: #5A4A3A;
  --text-soft: #9A8A7A;
  --white: #FFFFFF;
  --border: #F0E6D8;
  --shadow-sm: 0 2px 12px rgba(255,107,0,0.08);
  --shadow-md: 0 8px 32px rgba(255,107,0,0.15);
  --shadow-lg: 0 20px 60px rgba(255,107,0,0.2);
  --radius: 20px;
  --radius-sm: 12px;
}

*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

html { scroll-behavior: smooth; }

body {
  font-family: 'DM Sans', sans-serif;
  background: var(--cream);
  color: var(--text-dark);
  min-height: 100vh;
  overflow-x: hidden;
}

/* BACKGROUND */
.bg-decor {
  position: fixed; inset: 0; z-index: 0; pointer-events: none; overflow: hidden;
}
.bg-orb {
  position: absolute;
  border-radius: 50%;
  filter: blur(80px);
  opacity: 0.18;
  animation: orbFloat 8s ease-in-out infinite;
}
.orb1 { width: 500px; height: 500px; background: var(--orange); top: -150px; right: -150px; animation-delay: 0s; }
.orb2 { width: 350px; height: 350px; background: #FFB347; bottom: -100px; left: -80px; animation-delay: -3s; }
.orb3 { width: 200px; height: 200px; background: var(--orange-dark); top: 50%; left: 40%; animation-delay: -5s; }

@keyframes orbFloat {
  0%, 100% { transform: translateY(0) scale(1); }
  50% { transform: translateY(-30px) scale(1.05); }
}

/* NAV */
.topnav {
  position: sticky; top: 0; z-index: 100;
  background: rgba(255,250,245,0.85);
  backdrop-filter: blur(20px);
  border-bottom: 1px solid var(--border);
  padding: 0.75rem 0;
}
.topnav .brand {
  font-family: 'Sora', sans-serif;
  font-weight: 800;
  font-size: 1.4rem;
  color: var(--orange);
  text-decoration: none;
  display: flex; align-items: center; gap: 10px;
}
.brand-icon {
  width: 40px; height: 40px;
  background: var(--orange);
  border-radius: 10px;
  display: flex; align-items: center; justify-content: center;
  color: white; font-size: 1.1rem;
}
.nav-pill-group { display: flex; gap: 8px; }
.nav-pill {
  padding: 8px 20px;
  border-radius: 50px;
  font-size: 0.875rem;
  font-weight: 500;
  text-decoration: none;
  transition: all 0.3s;
  border: 2px solid transparent;
}
.nav-pill.active, .nav-pill:hover {
  background: var(--orange);
  color: white;
  border-color: var(--orange);
  transform: translateY(-1px);
  box-shadow: 0 4px 15px rgba(255,107,0,0.3);
}
.nav-pill:not(.active) {
  color: var(--text-mid);
  background: white;
  border-color: var(--border);
}

/* HERO */
.hero-section {
  padding: 60px 0 40px;
  text-align: center;
  position: relative; z-index: 1;
}
.hero-badge {
  display: inline-flex; align-items: center; gap: 8px;
  background: var(--orange-pale);
  color: var(--orange-dark);
  border: 1px solid rgba(255,107,0,0.2);
  border-radius: 50px;
  padding: 6px 18px;
  font-size: 0.8rem;
  font-weight: 600;
  letter-spacing: 0.05em;
  margin-bottom: 20px;
  animation: badgePulse 2s ease-in-out infinite;
}
@keyframes badgePulse {
  0%, 100% { box-shadow: 0 0 0 0 rgba(255,107,0,0.2); }
  50% { box-shadow: 0 0 0 8px rgba(255,107,0,0); }
}
.hero-title {
  font-family: 'Sora', sans-serif;
  font-size: clamp(2rem, 5vw, 3.5rem);
  font-weight: 800;
  line-height: 1.1;
  color: var(--text-dark);
  margin-bottom: 16px;
}
.hero-title span { color: var(--orange); }
.hero-sub {
  font-size: 1.05rem;
  color: var(--text-soft);
  max-width: 460px;
  margin: 0 auto 40px;
  line-height: 1.6;
}

/* FORM CARD */
.form-card {
  background: white;
  border-radius: var(--radius);
  padding: 40px;
  box-shadow: var(--shadow-md);
  border: 1px solid var(--border);
  position: relative;
  overflow: hidden;
  max-width: 640px;
  margin: 0 auto;
  z-index: 1;
}
.form-card::before {
  content: '';
  position: absolute;
  top: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, var(--orange), var(--orange-light), #FFB347);
}
.section-label {
  font-family: 'Sora', sans-serif;
  font-size: 0.75rem;
  font-weight: 700;
  letter-spacing: 0.12em;
  color: var(--orange);
  text-transform: uppercase;
  margin-bottom: 20px;
  display: flex; align-items: center; gap: 8px;
}
.section-label::after {
  content: '';
  flex: 1;
  height: 1px;
  background: var(--border);
}

.form-floating-custom { position: relative; margin-bottom: 20px; }
.form-floating-custom label {
  position: absolute;
  top: 14px; left: 16px;
  color: var(--text-soft);
  font-size: 0.875rem;
  transition: all 0.2s;
  pointer-events: none;
  background: white;
  padding: 0 4px;
}
.form-floating-custom input:focus + label,
.form-floating-custom input:not(:placeholder-shown) + label {
  top: -8px; left: 12px;
  font-size: 0.72rem;
  color: var(--orange);
  font-weight: 600;
}
.form-input {
  width: 100%;
  padding: 14px 16px;
  border: 2px solid var(--border);
  border-radius: var(--radius-sm);
  font-size: 0.95rem;
  font-family: 'DM Sans', sans-serif;
  color: var(--text-dark);
  background: white;
  transition: all 0.3s;
  outline: none;
}
.form-input:focus {
  border-color: var(--orange);
  box-shadow: 0 0 0 4px rgba(255,107,0,0.1);
}
.form-input.is-error { border-color: #e74c3c; }

.parent-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
@media (max-width: 576px) { .parent-grid { grid-template-columns: 1fr; } }

.btn-submit {
  width: 100%;
  padding: 16px;
  background: var(--orange);
  color: white;
  border: none;
  border-radius: var(--radius-sm);
  font-family: 'Sora', sans-serif;
  font-size: 1rem;
  font-weight: 700;
  cursor: pointer;
  transition: all 0.3s;
  position: relative;
  overflow: hidden;
  margin-top: 8px;
}
.btn-submit::before {
  content: '';
  position: absolute;
  top: 50%; left: 50%;
  width: 0; height: 0;
  background: rgba(255,255,255,0.2);
  border-radius: 50%;
  transform: translate(-50%, -50%);
  transition: width 0.6s, height 0.6s;
}
.btn-submit:hover::before { width: 400px; height: 400px; }
.btn-submit:hover {
  background: var(--orange-dark);
  transform: translateY(-2px);
  box-shadow: var(--shadow-md);
}
.btn-submit:active { transform: translateY(0); }

/* ALERT */
.alert-custom {
  border-radius: var(--radius-sm);
  padding: 14px 18px;
  margin-bottom: 20px;
  font-size: 0.9rem;
  font-weight: 500;
  border: none;
  display: flex; align-items: flex-start; gap: 10px;
  animation: slideDown 0.4s ease;
}
@keyframes slideDown {
  from { opacity: 0; transform: translateY(-10px); }
  to { opacity: 1; transform: translateY(0); }
}
.alert-success-custom { background: #EAFAF1; color: #1e8449; }
.alert-error-custom { background: #FDEDEC; color: #c0392b; }

/* STEP INDICATOR */
.steps-row {
  display: flex;
  justify-content: center;
  gap: 0;
  margin-bottom: 40px;
  position: relative; z-index: 1;
}
.step-item {
  display: flex; flex-direction: column; align-items: center;
  gap: 8px; flex: 1; max-width: 120px;
  position: relative;
}
.step-item:not(:last-child)::after {
  content: '';
  position: absolute;
  top: 20px; left: 60%;
  width: calc(100% - 20px);
  height: 2px;
  background: var(--border);
}
.step-num {
  width: 40px; height: 40px;
  border-radius: 50%;
  background: var(--orange-pale);
  color: var(--orange);
  font-family: 'Sora', sans-serif;
  font-weight: 700;
  font-size: 0.9rem;
  display: flex; align-items: center; justify-content: center;
  border: 2px solid var(--orange);
  position: relative; z-index: 1;
  transition: all 0.3s;
}
.step-num.done { background: var(--orange); color: white; }
.step-label { font-size: 0.7rem; color: var(--text-soft); font-weight: 500; text-align: center; }

/* FOOTER */
footer {
  text-align: center;
  padding: 30px;
  color: var(--text-soft);
  font-size: 0.8rem;
  position: relative; z-index: 1;
  margin-top: 40px;
  border-top: 1px solid var(--border);
}

/* FLOATING PARTICLES */
.particle {
  position: fixed;
  width: 6px; height: 6px;
  border-radius: 50%;
  background: var(--orange);
  pointer-events: none;
  z-index: 0;
  opacity: 0;
  animation: particleFly linear infinite;
}
@keyframes particleFly {
  0% { opacity: 0; transform: translateY(100vh) rotate(0deg); }
  10% { opacity: 0.4; }
  90% { opacity: 0.4; }
  100% { opacity: 0; transform: translateY(-100px) rotate(360deg); }
}

/* SUCCESS CHECKMARK ANIMATION */
.success-checkmark {
  display: flex; flex-direction: column; align-items: center;
  padding: 30px 0;
  animation: fadeIn 0.5s ease;
}
@keyframes fadeIn { from { opacity: 0; transform: scale(0.8); } to { opacity: 1; transform: scale(1); } }
.check-circle {
  width: 80px; height: 80px;
  border-radius: 50%;
  background: linear-gradient(135deg, var(--orange), #FFB347);
  display: flex; align-items: center; justify-content: center;
  margin-bottom: 20px;
  animation: checkBounce 0.6s cubic-bezier(0.36, 0.07, 0.19, 0.97);
  box-shadow: 0 10px 30px rgba(255,107,0,0.4);
}
@keyframes checkBounce {
  0% { transform: scale(0); }
  60% { transform: scale(1.2); }
  100% { transform: scale(1); }
}
.check-circle i { color: white; font-size: 2.5rem; }
</style>
</head>
<body>
<!-- Background -->
<div class="bg-decor">
  <div class="bg-orb orb1"></div>
  <div class="bg-orb orb2"></div>
  <div class="bg-orb orb3"></div>
</div>

<!-- Particles -->
<?php for ($i = 0; $i < 8; $i++): ?>
<div class="particle" style="left:<?php echo rand(5,95); ?>%;animation-duration:<?php echo rand(8,15); ?>s;animation-delay:<?php echo rand(0,12); ?>s;width:<?php echo rand(4,8); ?>px;height:<?php echo rand(4,8); ?>px;opacity:0.<?php echo rand(2,5); ?>"></div>
<?php endfor; ?>

<!-- Navbar -->
<nav class="topnav">
  <div class="container d-flex align-items-center justify-content-between flex-wrap gap-2">
    <a href="index.php" class="brand">
      <div class="brand-icon"><i class="fas fa-graduation-cap"></i></div>
      Class Connect
    </a>
    <div class="nav-pill-group">
      <a href="index.php" class="nav-pill active"><i class="fas fa-user-graduate me-1"></i> Student</a>
      <a href="staff.php" class="nav-pill"><i class="fas fa-chalkboard-teacher me-1"></i> Staff</a>
    </div>
  </div>
</nav>

<!-- Hero -->
<div class="hero-section container">
  <div data-aos="fade-down" data-aos-duration="600">
    <div class="hero-badge"><i class="fas fa-star"></i> 2024–25 Academic Year</div>
    <h1 class="hero-title">Share Your Parents'<br><span>Contact Details</span></h1>
    <p class="hero-sub">Help us stay connected with your family. Fill in your parents' phone numbers below.</p>
  </div>

  <!-- Steps -->
  <div class="steps-row" data-aos="fade-up" data-aos-delay="200">
    <div class="step-item">
      <div class="step-num <?= $message ? 'done' : '' ?>">
        <?php if ($message): ?><i class="fas fa-check" style="font-size:0.8rem"></i><?php else: ?>1<?php endif; ?>
      </div>
      <span class="step-label">Enter Reg. No</span>
    </div>
    <div class="step-item">
      <div class="step-num <?= $message ? 'done' : '' ?>">
        <?php if ($message): ?><i class="fas fa-check" style="font-size:0.8rem"></i><?php else: ?>2<?php endif; ?>
      </div>
      <span class="step-label">Parent Info</span>
    </div>
    <div class="step-item">
      <div class="step-num <?= $message ? 'done' : '' ?>">
        <?php if ($message): ?><i class="fas fa-check" style="font-size:0.8rem"></i><?php else: ?>3<?php endif; ?>
      </div>
      <span class="step-label">Submit</span>
    </div>
  </div>
</div>

<!-- Form -->
<div class="container pb-5" style="position:relative;z-index:1;">
  <?php if ($message): ?>
  <div class="form-card" data-aos="zoom-in">
    <div class="success-checkmark">
      <div class="check-circle"><i class="fas fa-check"></i></div>
      <h3 style="font-family:'Sora',sans-serif;font-weight:700;color:var(--text-dark);margin-bottom:8px;">All Done!</h3>
      <p style="color:var(--text-soft);margin-bottom:24px;"><?php echo $message; ?></p>
      <a href="index.php" class="btn-submit" style="max-width:220px;display:inline-block;text-decoration:none;text-align:center;padding:12px 30px;">
        <i class="fas fa-plus me-2"></i> Submit Another
      </a>
    </div>
  </div>
  <?php else: ?>
  <div class="form-card" data-aos="fade-up" data-aos-duration="700">
    <?php if ($error): ?>
    <div class="alert-custom alert-error-custom">
      <i class="fas fa-exclamation-circle mt-1"></i>
      <span><?php echo $error; ?></span>
    </div>
    <?php endif; ?>

    <form method="POST" id="contactForm" novalidate>
      <input type="hidden" name="action" value="submit_student">

      <!-- Student Info -->
      <div class="section-label"><i class="fas fa-id-card"></i> Student Identity</div>
      <div class="form-floating-custom">
        <input type="text" name="reg_no" id="reg_no" class="form-input" placeholder=" "
               value="<?php echo htmlspecialchars(isset($_POST['reg_no']) ? $_POST['reg_no'] : ''); ?>"
               maxlength="20" autocomplete="off" required>
        <label for="reg_no">Register Number *</label>
      </div>

      <!-- Father -->
      <div class="section-label" style="margin-top:28px;"><i class="fas fa-male"></i> Father's Details</div>
      <div class="parent-grid">
        <div class="form-floating-custom">
          <input type="text" name="father_name" id="father_name" class="form-input" placeholder=" "
                 value="<?php echo htmlspecialchars(isset($_POST['father_name']) ? $_POST['father_name'] : ''); ?>" required>
          <label for="father_name">Father's Name *</label>
        </div>
        <div class="form-floating-custom">
          <input type="tel" name="father_phone" id="father_phone" class="form-input" placeholder=" "
                 value="<?php echo htmlspecialchars(isset($_POST['father_phone']) ? $_POST['father_phone'] : ''); ?>"
                 maxlength="10" pattern="[6-9][0-9]{9}" required>
          <label for="father_phone">Father's Mobile *</label>
        </div>
      </div>

      <!-- Mother -->
      <div class="section-label"><i class="fas fa-female"></i> Mother's Details</div>
      <div class="parent-grid">
        <div class="form-floating-custom">
          <input type="text" name="mother_name" id="mother_name" class="form-input" placeholder=" "
                 value="<?php echo htmlspecialchars(isset($_POST['mother_name']) ? $_POST['mother_name'] : ''); ?>" required>
          <label for="mother_name">Mother's Name *</label>
        </div>
        <div class="form-floating-custom">
          <input type="tel" name="mother_phone" id="mother_phone" class="form-input" placeholder=" "
                 value="<?php echo htmlspecialchars(isset($_POST['mother_phone']) ? $_POST['mother_phone'] : ''); ?>"
                 maxlength="10" pattern="[6-9][0-9]{9}" required>
          <label for="mother_phone">Mother's Mobile *</label>
        </div>
      </div>

      <button type="submit" class="btn-submit" id="submitBtn">
        <i class="fas fa-paper-plane me-2"></i> Submit Contact Details
      </button>
    </form>
  </div>
  <?php endif; ?>
</div>

<footer>
  <p>🎓 Class Connect &nbsp;|&nbsp; 2024–25 Academic Year &nbsp;|&nbsp; Student Contact Collection Portal</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
AOS.init({ once: true, easing: 'ease-out-cubic' });

// Phone number - digits only
document.querySelectorAll('input[type="tel"]').forEach(el => {
  el.addEventListener('input', () => { el.value = el.value.replace(/\D/g, '').slice(0, 10); });
});

// Reg number - uppercase
const regInput = document.getElementById('reg_no');
if (regInput) {
  regInput.addEventListener('input', () => { regInput.value = regInput.value.toUpperCase(); });
}

// Submit animation
const form = document.getElementById('contactForm');
const btn = document.getElementById('submitBtn');
if (form && btn) {
  form.addEventListener('submit', () => {
    btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Submitting...';
    btn.disabled = true;
  });
}
</script>
</body>
</html>
