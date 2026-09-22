<?php
session_start();

// Load students
$students_raw = json_decode(file_get_contents(__DIR__ . '/data/students.json'), true);
$students_map = [];
foreach ($students_raw as $s) {
    $students_map[strtoupper(trim($s['reg_no']))] = $s['name'];
}

// Load responses
$responses_file = __DIR__ . '/data/responses.json';
$responses = file_exists($responses_file) ? json_decode(file_get_contents($responses_file), true) : [];

// Index responses by reg_no
$submitted = [];
foreach ($responses as $r) {
    $submitted[strtoupper(trim($r['reg_no']))] = $r;
}

// Missing students
$missing = [];
foreach ($students_raw as $s) {
    $key = strtoupper(trim($s['reg_no']));
    if (!isset($submitted[$key])) {
        $missing[] = $s;
    }
}

$total = count($students_raw);
$done  = count($submitted);
$pct   = $total > 0 ? round(($done / $total) * 100) : 0;

// Handle download CSV (simple, no extra libs)
if (isset($_GET['download']) && $_GET['download'] === 'excel') {
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename="parent_contacts_' . date('Ymd_His') . '.xls"');
    echo "<table border='1'>";
    echo "<tr>
        <th>S.No</th><th>Reg. Number</th><th>Student Name</th>
        <th>Father Name</th><th>Father Mobile</th>
        <th>Mother Name</th><th>Mother Mobile</th>
        <th>Submitted At</th>
    </tr>";
    $i = 1;
    foreach ($responses as $r) {
        echo "<tr>
            <td>" . $i++ . "</td>
            <td>" . htmlspecialchars($r['reg_no']) . "</td>
            <td>" . htmlspecialchars($r['student_name']) . "</td>
            <td>" . htmlspecialchars($r['father_name']) . "</td>
            <td>" . htmlspecialchars($r['father_phone']) . "</td>
            <td>" . htmlspecialchars($r['mother_name']) . "</td>
            <td>" . htmlspecialchars($r['mother_phone']) . "</td>
            <td>" . htmlspecialchars($r['submitted_at']) . "</td>
        </tr>";
    }
    echo "</table>";
    exit;
}

// Handle download missing list
if (isset($_GET['download']) && $_GET['download'] === 'missing') {
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename="pending_students_' . date('Ymd_His') . '.xls"');
    echo "<table border='1'>";
    echo "<tr><th>S.No</th><th>Reg. Number</th><th>Student Name</th><th>Status</th></tr>";
    $i = 1;
    foreach ($missing as $s) {
        echo "<tr>
            <td>" . $i++ . "</td>
            <td>" . htmlspecialchars($s['reg_no']) . "</td>
            <td>" . htmlspecialchars($s['name']) . "</td>
            <td>Pending</td>
        </tr>";
    }
    echo "</table>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Staff Dashboard | Class Connect</title>
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
  --green: #27ae60;
  --red: #e74c3c;
  --shadow-sm: 0 2px 12px rgba(255,107,0,0.08);
  --shadow-md: 0 8px 32px rgba(255,107,0,0.15);
  --radius: 20px;
  --radius-sm: 12px;
}
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
html { scroll-behavior: smooth; }
body { font-family: 'DM Sans', sans-serif; background: var(--cream); color: var(--text-dark); min-height: 100vh; overflow-x: hidden; }

.bg-decor { position: fixed; inset: 0; z-index: 0; pointer-events: none; overflow: hidden; }
.bg-orb { position: absolute; border-radius: 50%; filter: blur(80px); opacity: 0.12; animation: orbFloat 8s ease-in-out infinite; }
.orb1 { width: 500px; height: 500px; background: var(--orange); top: -150px; right: -150px; animation-delay: 0s; }
.orb2 { width: 350px; height: 350px; background: #FFB347; bottom: -100px; left: -80px; animation-delay: -3s; }
@keyframes orbFloat { 0%,100%{transform:translateY(0) scale(1);} 50%{transform:translateY(-30px) scale(1.05);} }

.topnav { position: sticky; top: 0; z-index: 100; background: rgba(255,250,245,0.88); backdrop-filter: blur(20px); border-bottom: 1px solid var(--border); padding: 0.75rem 0; }
.topnav .brand { font-family: 'Sora', sans-serif; font-weight: 800; font-size: 1.4rem; color: var(--orange); text-decoration: none; display: flex; align-items: center; gap: 10px; }
.brand-icon { width: 40px; height: 40px; background: var(--orange); border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.1rem; }
.nav-pill-group { display: flex; gap: 8px; }
.nav-pill { padding: 8px 20px; border-radius: 50px; font-size: 0.875rem; font-weight: 500; text-decoration: none; transition: all 0.3s; border: 2px solid transparent; }
.nav-pill.active, .nav-pill:hover { background: var(--orange); color: white; border-color: var(--orange); transform: translateY(-1px); box-shadow: 0 4px 15px rgba(255,107,0,0.3); }
.nav-pill:not(.active) { color: var(--text-mid); background: white; border-color: var(--border); }

/* Dashboard header */
.dash-header { padding: 40px 0 20px; position: relative; z-index: 1; }
.dash-title { font-family: 'Sora', sans-serif; font-size: clamp(1.6rem, 4vw, 2.8rem); font-weight: 800; color: var(--text-dark); margin-bottom: 6px; }
.dash-title span { color: var(--orange); }
.dash-sub { color: var(--text-soft); font-size: 0.95rem; }

/* Stat cards */
.stat-card {
  background: white;
  border-radius: var(--radius);
  padding: 24px;
  border: 1px solid var(--border);
  box-shadow: var(--shadow-sm);
  transition: all 0.3s;
  position: relative;
  overflow: hidden;
}
.stat-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); }
.stat-card::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 3px;
  background: linear-gradient(90deg, var(--orange), var(--orange-light));
  transform: scaleX(0);
  transform-origin: left;
  transition: transform 0.4s;
}
.stat-card:hover::after { transform: scaleX(1); }
.stat-icon { width: 48px; height: 48px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.3rem; margin-bottom: 14px; }
.stat-icon.orange { background: var(--orange-pale); color: var(--orange); }
.stat-icon.green { background: #EAFAF1; color: var(--green); }
.stat-icon.red { background: #FDEDEC; color: var(--red); }
.stat-num { font-family: 'Sora', sans-serif; font-size: 2rem; font-weight: 800; color: var(--text-dark); line-height: 1; margin-bottom: 4px; }
.stat-label { font-size: 0.8rem; color: var(--text-soft); font-weight: 500; text-transform: uppercase; letter-spacing: 0.06em; }

/* Progress bar */
.progress-card {
  background: white;
  border-radius: var(--radius);
  padding: 24px;
  border: 1px solid var(--border);
  box-shadow: var(--shadow-sm);
  margin-bottom: 30px;
}
.progress-label { font-family: 'Sora', sans-serif; font-weight: 700; font-size: 0.9rem; margin-bottom: 12px; color: var(--text-dark); display: flex; justify-content: space-between; }
.progress-bar-wrap { height: 12px; background: var(--orange-pale); border-radius: 10px; overflow: hidden; }
.progress-fill {
  height: 100%;
  background: linear-gradient(90deg, var(--orange), var(--orange-light));
  border-radius: 10px;
  transition: width 1.5s cubic-bezier(0.34, 1.56, 0.64, 1);
  width: 0;
}

/* Table section */
.section-card {
  background: white;
  border-radius: var(--radius);
  border: 1px solid var(--border);
  box-shadow: var(--shadow-sm);
  overflow: hidden;
  margin-bottom: 30px;
}
.section-head {
  padding: 20px 24px;
  border-bottom: 1px solid var(--border);
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 12px;
}
.section-title {
  font-family: 'Sora', sans-serif;
  font-weight: 700;
  font-size: 1rem;
  color: var(--text-dark);
  display: flex; align-items: center; gap: 10px;
}
.section-title .badge-count {
  background: var(--orange-pale);
  color: var(--orange-dark);
  border-radius: 50px;
  padding: 2px 10px;
  font-size: 0.75rem;
  font-weight: 700;
}
.missing .badge-count { background: #FDEDEC; color: var(--red); }

.btn-dl {
  display: inline-flex; align-items: center; gap: 8px;
  padding: 8px 18px;
  border-radius: 50px;
  font-size: 0.82rem;
  font-weight: 600;
  text-decoration: none;
  transition: all 0.3s;
  border: 2px solid;
  cursor: pointer;
}
.btn-dl.primary { background: var(--orange); color: white; border-color: var(--orange); }
.btn-dl.primary:hover { background: var(--orange-dark); border-color: var(--orange-dark); transform: translateY(-1px); box-shadow: 0 4px 15px rgba(255,107,0,0.3); }
.btn-dl.outline { background: transparent; color: var(--orange); border-color: var(--orange); }
.btn-dl.outline:hover { background: var(--orange-pale); }

/* Data table */
.data-table { width: 100%; border-collapse: collapse; }
.data-table th {
  padding: 11px 16px;
  text-align: left;
  font-size: 0.72rem;
  font-weight: 700;
  letter-spacing: 0.08em;
  text-transform: uppercase;
  color: var(--text-soft);
  background: #FAFAFA;
  border-bottom: 1px solid var(--border);
  white-space: nowrap;
}
.data-table td {
  padding: 14px 16px;
  font-size: 0.875rem;
  border-bottom: 1px solid var(--border);
  color: var(--text-dark);
  vertical-align: middle;
}
.data-table tr:last-child td { border-bottom: none; }
.data-table tbody tr {
  transition: background 0.2s;
  animation: rowIn 0.4s ease backwards;
}
@keyframes rowIn { from { opacity: 0; transform: translateX(-10px); } to { opacity: 1; transform: translateX(0); } }
.data-table tbody tr:hover { background: var(--orange-pale); }

.badge-status {
  display: inline-flex; align-items: center; gap: 5px;
  padding: 3px 10px;
  border-radius: 50px;
  font-size: 0.72rem;
  font-weight: 700;
}
.badge-done { background: #EAFAF1; color: var(--green); }
.badge-pend { background: #FDEDEC; color: var(--red); }

.sno-cell { font-family: 'Sora', sans-serif; font-weight: 700; color: var(--text-soft); width: 40px; }
.reg-cell { font-family: 'Sora', sans-serif; font-weight: 600; font-size: 0.82rem; color: var(--orange-dark); }
.name-cell { font-weight: 600; }
.phone-cell { font-family: monospace; font-size: 0.85rem; }

/* Search bar */
.search-wrap { padding: 14px 24px; background: #FAFAFA; border-bottom: 1px solid var(--border); }
.search-input {
  width: 100%;
  max-width: 320px;
  padding: 9px 14px 9px 38px;
  border: 2px solid var(--border);
  border-radius: 50px;
  font-size: 0.875rem;
  font-family: 'DM Sans', sans-serif;
  outline: none;
  transition: border-color 0.3s;
  background: white url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 24 24' fill='none' stroke='%239A8A7A' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Ccircle cx='11' cy='11' r='8'%3E%3C/circle%3E%3Cpath d='m21 21-4.35-4.35'%3E%3C/path%3E%3C/svg%3E") no-repeat 14px center;
}
.search-input:focus { border-color: var(--orange); }

.empty-state {
  text-align: center;
  padding: 50px 20px;
  color: var(--text-soft);
}
.empty-state i { font-size: 3rem; color: var(--border); margin-bottom: 14px; display: block; }

footer { text-align: center; padding: 30px; color: var(--text-soft); font-size: 0.8rem; position: relative; z-index: 1; margin-top: 20px; border-top: 1px solid var(--border); }

/* Responsive table scroll */
.table-scroll { overflow-x: auto; -webkit-overflow-scrolling: touch; }

/* Tabs */
.tab-nav { display: flex; border-bottom: 2px solid var(--border); padding: 0 24px; }
.tab-btn {
  padding: 14px 20px;
  font-family: 'Sora', sans-serif;
  font-weight: 600;
  font-size: 0.875rem;
  border: none;
  background: none;
  cursor: pointer;
  color: var(--text-soft);
  border-bottom: 3px solid transparent;
  margin-bottom: -2px;
  transition: all 0.2s;
  display: flex; align-items: center; gap: 8px;
}
.tab-btn.active { color: var(--orange); border-bottom-color: var(--orange); }
.tab-btn:hover:not(.active) { color: var(--text-mid); }
.tab-content { display: none; }
.tab-content.active { display: block; }
</style>
</head>
<body>
<div class="bg-decor">
  <div class="bg-orb orb1"></div>
  <div class="bg-orb orb2"></div>
</div>

<!-- Navbar -->
<nav class="topnav">
  <div class="container d-flex align-items-center justify-content-between flex-wrap gap-2">
    <a href="index.php" class="brand">
      <div class="brand-icon"><i class="fas fa-graduation-cap"></i></div>
      Class Connect
    </a>
    <div class="nav-pill-group">
      <a href="index.php" class="nav-pill"><i class="fas fa-user-graduate me-1"></i> Student</a>
      <a href="staff.php" class="nav-pill active"><i class="fas fa-chalkboard-teacher me-1"></i> Staff</a>
    </div>
  </div>
</nav>

<div class="container" style="position:relative;z-index:1;">
  <!-- Header -->
  <div class="dash-header" data-aos="fade-down">
    <h1 class="dash-title">Staff <span>Dashboard</span></h1>
    <p class="dash-sub"><i class="fas fa-calendar-alt me-1"></i> <?= date('d M Y, g:i A') ?> &nbsp;·&nbsp; Academic Year 2024–25</p>
  </div>

  <!-- Stat Cards -->
  <div class="row g-3 mb-4">
    <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="0">
      <div class="stat-card">
        <div class="stat-icon orange"><i class="fas fa-users"></i></div>
        <div class="stat-num"><?= $total ?></div>
        <div class="stat-label">Total Students</div>
      </div>
    </div>
    <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="80">
      <div class="stat-card">
        <div class="stat-icon green"><i class="fas fa-check-circle"></i></div>
        <div class="stat-num"><?= $done ?></div>
        <div class="stat-label">Submitted</div>
      </div>
    </div>
    <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="160">
      <div class="stat-card">
        <div class="stat-icon red"><i class="fas fa-clock"></i></div>
        <div class="stat-num"><?= count($missing) ?></div>
        <div class="stat-label">Pending</div>
      </div>
    </div>
    <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="240">
      <div class="stat-card">
        <div class="stat-icon orange"><i class="fas fa-percentage"></i></div>
        <div class="stat-num"><?= $pct ?>%</div>
        <div class="stat-label">Completion</div>
      </div>
    </div>
  </div>

  <!-- Progress -->
  <div class="progress-card" data-aos="fade-up" data-aos-delay="100">
    <div class="progress-label">
      <span>📊 Collection Progress</span>
      <span style="color:var(--orange);font-weight:800;"><?= $done ?> / <?= $total ?> students</span>
    </div>
    <div class="progress-bar-wrap">
      <div class="progress-fill" id="progressFill" data-width="<?= $pct ?>"></div>
    </div>
  </div>

  <!-- Main Table with Tabs -->
  <div class="section-card" data-aos="fade-up">
    <div class="tab-nav">
      <button class="tab-btn active" onclick="switchTab('submitted', this)">
        <i class="fas fa-check-circle" style="color:var(--green)"></i> Submitted
        <span style="background:#EAFAF1;color:var(--green);padding:1px 8px;border-radius:20px;font-size:0.72rem;"><?= $done ?></span>
      </button>
      <button class="tab-btn" onclick="switchTab('missing', this)">
        <i class="fas fa-exclamation-circle" style="color:var(--red)"></i> Pending
        <span style="background:#FDEDEC;color:var(--red);padding:1px 8px;border-radius:20px;font-size:0.72rem;"><?= count($missing) ?></span>
      </button>
    </div>

    <!-- Submitted Tab -->
    <div id="tab-submitted" class="tab-content active">
      <div class="section-head">
        <span class="section-title">
          <i class="fas fa-table" style="color:var(--orange)"></i> Parent Contact Details
          <span class="badge-count"><?= $done ?> records</span>
        </span>
        <a href="staff.php?download=excel" class="btn-dl primary">
          <i class="fas fa-file-excel"></i> Download Excel
        </a>
      </div>
      <div class="search-wrap">
        <input type="text" class="search-input" id="searchSubmitted" placeholder="Search by name or reg. no..." oninput="filterTable('submittedTable', this.value)">
      </div>
      <div class="table-scroll">
        <?php if (empty($responses)): ?>
        <div class="empty-state">
          <i class="fas fa-inbox"></i>
          <p>No submissions yet. Share the student link to collect data.</p>
        </div>
        <?php else: ?>
        <table class="data-table" id="submittedTable">
          <thead>
            <tr>
              <th>#</th>
              <th>Reg. Number</th>
              <th>Student Name</th>
              <th>Father Name</th>
              <th>Father Mobile</th>
              <th>Mother Name</th>
              <th>Mother Mobile</th>
              <th>Date</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; foreach ($responses as $r): ?>
            <tr style="animation-delay:<?= ($i * 0.04) ?>s">
              <td class="sno-cell"><?= $i++ ?></td>
              <td class="reg-cell"><?= htmlspecialchars($r['reg_no']) ?></td>
              <td class="name-cell"><?= htmlspecialchars($r['student_name']) ?></td>
              <td><?= htmlspecialchars($r['father_name']) ?></td>
              <td class="phone-cell"><i class="fas fa-phone-alt me-1" style="color:var(--orange);font-size:0.7rem;"></i><?= htmlspecialchars($r['father_phone']) ?></td>
              <td><?= htmlspecialchars($r['mother_name']) ?></td>
              <td class="phone-cell"><i class="fas fa-phone-alt me-1" style="color:var(--orange);font-size:0.7rem;"></i><?= htmlspecialchars($r['mother_phone']) ?></td>
              <td style="font-size:0.78rem;color:var(--text-soft)"><?= htmlspecialchars($r['submitted_at']) ?></td>
              <td><span class="badge-status badge-done"><i class="fas fa-check"></i> Done</span></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <?php endif; ?>
      </div>
    </div>

    <!-- Missing Tab -->
    <div id="tab-missing" class="tab-content">
      <div class="section-head">
        <span class="section-title missing">
          <i class="fas fa-exclamation-triangle" style="color:var(--red)"></i> Pending Students
          <span class="badge-count"><?= count($missing) ?> not submitted</span>
        </span>
        <a href="staff.php?download=missing" class="btn-dl outline">
          <i class="fas fa-download"></i> Download List
        </a>
      </div>
      <div class="search-wrap">
        <input type="text" class="search-input" id="searchMissing" placeholder="Search pending students..." oninput="filterTable('missingTable', this.value)">
      </div>
      <div class="table-scroll">
        <?php if (empty($missing)): ?>
        <div class="empty-state">
          <i class="fas fa-party-horn"></i>
          <p>🎉 All students have submitted! Great response rate.</p>
        </div>
        <?php else: ?>
        <table class="data-table" id="missingTable">
          <thead>
            <tr>
              <th>#</th>
              <th>Reg. Number</th>
              <th>Student Name</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; foreach ($missing as $s): ?>
            <tr style="animation-delay:<?= ($i * 0.04) ?>s">
              <td class="sno-cell"><?= $i++ ?></td>
              <td class="reg-cell"><?= htmlspecialchars($s['reg_no']) ?></td>
              <td class="name-cell"><?= htmlspecialchars($s['name']) ?></td>
              <td><span class="badge-status badge-pend"><i class="fas fa-clock"></i> Pending</span></td>
              <td>
                <span style="font-size:0.8rem;color:var(--text-soft);">
                  <i class="fas fa-share me-1"></i> Share form link
                </span>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <!-- All students overview -->
  <div class="section-card" data-aos="fade-up">
    <div class="section-head">
      <span class="section-title">
        <i class="fas fa-list" style="color:var(--orange)"></i> All Students Overview
        <span class="badge-count"><?= $total ?> total</span>
      </span>
    </div>
    <div class="table-scroll">
      <table class="data-table">
        <thead>
          <tr>
            <th>#</th>
            <th>Reg. Number</th>
            <th>Student Name</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; foreach ($students_raw as $s):
            $key = strtoupper(trim($s['reg_no']));
            $done_flag = isset($submitted[$key]);
          ?>
          <tr style="animation-delay:<?= ($i * 0.03) ?>s">
            <td class="sno-cell"><?= $i++ ?></td>
            <td class="reg-cell"><?= htmlspecialchars($s['reg_no']) ?></td>
            <td class="name-cell"><?= htmlspecialchars($s['name']) ?></td>
            <td>
              <?php if ($done_flag): ?>
              <span class="badge-status badge-done"><i class="fas fa-check"></i> Submitted</span>
              <?php else: ?>
              <span class="badge-status badge-pend"><i class="fas fa-clock"></i> Pending</span>
              <?php endif; ?>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<footer>
  <p>🎓 Class Connect &nbsp;|&nbsp; Staff Dashboard &nbsp;|&nbsp; 2024–25 Academic Year</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
AOS.init({ once: true, easing: 'ease-out-cubic' });

// Animate progress bar
window.addEventListener('load', () => {
  const fill = document.getElementById('progressFill');
  if (fill) {
    setTimeout(() => { fill.style.width = fill.dataset.width + '%'; }, 300);
  }
});

function switchTab(name, btn) {
  document.querySelectorAll('.tab-content').forEach(t => t.classList.remove('active'));
  document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
  document.getElementById('tab-' + name).classList.add('active');
  btn.classList.add('active');
}

function filterTable(tableId, query) {
  const table = document.getElementById(tableId);
  if (!table) return;
  const rows = table.querySelectorAll('tbody tr');
  const q = query.toLowerCase();
  rows.forEach(row => {
    row.style.display = row.textContent.toLowerCase().includes(q) ? '' : 'none';
  });
}
</script>
</body>
</html>
