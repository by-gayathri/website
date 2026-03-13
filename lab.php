<?php
session_start();

/* -----------------------------
   CONSTANT
------------------------------ */
define("UNIVERSITY_NAME", "San Jose State University 2026");

/* -----------------------------
   TEAM MEMBER DATA
   (string, integer, float)
------------------------------ */
$teamName = "The Byte Builders";

$members = [
  [
    "name" => "Megha Gangal",
    "age" => 20,
    "gpa" => 3.8,
    "major" => "Computer Science",
    "role" => "Frontend",
    "emoji" => "🎨"
  ],
  [
    "name" => "Mansi Gupta",
    "age" => 22,
    "gpa" => 3.5,
    "major" => "Software Engineering",
    "role" => "Backend",
    "emoji" => "⚙️"
  ],
  [
    "name" => "Aishwarya Hiremath",
    "age" => 21,
    "gpa" => 3.9,
    "major" => "Information Technology",
    "role" => "DevOps",
    "emoji" => "🚀"
  ],
  [
    "name" => "Gayathri Rukmadhavan",
    "age" => 21,
    "gpa" => 3.9,
    "major" => "Information Technology",
    "role" => "DevOps",
    "emoji" => "🚀"
  ],
];

/* -----------------------------
   HANDLE VISITOR NAME FORM
------------------------------ */
$visitorGreeting = "";
if (isset($_POST['visitor_name'])) {
    $visitorName = trim($_POST['visitor_name']);
    $visitorNameSafe = htmlspecialchars($visitorName);
    if ($visitorNameSafe !== "") {
        $visitorGreeting = "Welcome, <strong>{$visitorNameSafe}</strong>! You are visiting <strong>{$teamName}</strong>'s page.";
    }
}

/* -----------------------------
   PASSWORD SECTION
------------------------------ */
$correctPassword = "secret123"; // change if needed
$passwordMessage = "";

if (isset($_POST['password'])) {
    if ($_POST['password'] === $correctPassword) {
        $_SESSION['authorized'] = true;
    } else {
        $passwordMessage = "Incorrect password. Try again.";
    }
}

/* -----------------------------
   LOGOUT (optional)
------------------------------ */
if (isset($_POST['logout'])) {
    unset($_SESSION['authorized']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Team Bio Page</title>
  <style>
    :root{
      --bg1:#0b1020;
      --bg2:#0f1630;
      --card: rgba(255,255,255,.08);
      --card2: rgba(255,255,255,.06);
      --border: rgba(255,255,255,.12);
      --text: rgba(255,255,255,.90);
      --muted: rgba(255,255,255,.72);
      --muted2: rgba(255,255,255,.55);
      --shadow: 0 18px 55px rgba(0,0,0,.35);
      --radius: 18px;
      --radius2: 14px;
      --pad: 18px;
      --pad2: 14px;
      --accent1:#7c3aed;
      --accent2:#22c55e;
      --accent3:#06b6d4;
      --danger:#fb7185;
      --warn:#fbbf24;
      --focus: 0 0 0 4px rgba(124,58,237,.25);
      --font: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Arial, "Apple Color Emoji","Segoe UI Emoji";
    }
    *{ box-sizing: border-box; }
    body{
      margin:0;
      font-family: var(--font);
      color: var(--text);
      background:
        radial-gradient(900px 600px at 15% 10%, rgba(124,58,237,.35), transparent 60%),
        radial-gradient(900px 600px at 85% 20%, rgba(6,182,212,.25), transparent 60%),
        radial-gradient(900px 600px at 50% 90%, rgba(34,197,94,.18), transparent 60%),
        linear-gradient(180deg, var(--bg1), var(--bg2));
      min-height:100vh;
    }
    a{ color:inherit; }
    .wrap{
      max-width: 1050px;
      margin: 0 auto;
      padding: 36px 18px 60px;
    }
    .topbar{
      display:flex;
      align-items:flex-start;
      justify-content:space-between;
      gap:14px;
      margin-bottom: 18px;
    }
    .brand{
      display:flex;
      flex-direction:column;
      gap:8px;
    }
    .badge{
      display:inline-flex;
      align-items:center;
      gap:10px;
      padding: 10px 12px;
      border: 1px solid var(--border);
      background: linear-gradient(180deg, rgba(255,255,255,.10), rgba(255,255,255,.05));
      border-radius: 999px;
      width: fit-content;
      box-shadow: 0 10px 30px rgba(0,0,0,.20);
      backdrop-filter: blur(10px);
    }
    .dot{
      width:10px;height:10px;border-radius:99px;
      background: linear-gradient(135deg, var(--accent1), var(--accent3));
      box-shadow: 0 0 0 3px rgba(124,58,237,.18);
    }
    h1{
      margin:0;
      font-size: clamp(26px, 3.2vw, 42px);
      letter-spacing: -0.02em;
      line-height: 1.05;
    }
    .sub{
      margin: 0;
      color: var(--muted);
      font-size: 14px;
      line-height: 1.5;
    }
    .pillrow{
      display:flex; flex-wrap:wrap; gap:10px;
      justify-content:flex-end;
    }
    .pill{
      padding: 10px 12px;
      border-radius: 999px;
      border: 1px solid var(--border);
      background: rgba(255,255,255,.06);
      color: var(--muted);
      font-size: 13px;
      backdrop-filter: blur(10px);
    }
    .grid{
      display:grid;
      grid-template-columns: 1.2fr .8fr;
      gap: 16px;
      margin-top: 18px;
    }
    @media (max-width: 900px){
      .grid{ grid-template-columns: 1fr; }
      .pillrow{ justify-content:flex-start; }
    }
    .card{
      border: 1px solid var(--border);
      background: linear-gradient(180deg, rgba(255,255,255,.10), rgba(255,255,255,.05));
      border-radius: var(--radius);
      padding: 18px;
      box-shadow: var(--shadow);
      backdrop-filter: blur(12px);
    }
    .card h2{
      margin:0 0 10px;
      font-size: 18px;
      letter-spacing: -0.01em;
    }
    .muted{ color: var(--muted); }
    .divider{
      height:1px;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,.15), transparent);
      margin: 14px 0;
    }

    /* Forms */
    .formRow{
      display:flex;
      gap: 10px;
      flex-wrap: wrap;
      align-items:center;
      margin-top: 12px;
    }
    .input{
      flex:1 1 220px;
      min-width: 220px;
      padding: 12px 12px;
      border-radius: 12px;
      border: 1px solid rgba(255,255,255,.16);
      background: rgba(10,14,26,.55);
      color: var(--text);
      outline:none;
      box-shadow: inset 0 0 0 1px rgba(255,255,255,.03);
    }
    .input::placeholder{ color: rgba(255,255,255,.45); }
    .input:focus{ box-shadow: var(--focus); border-color: rgba(124,58,237,.55); }
    .btn{
      padding: 12px 14px;
      border-radius: 12px;
      border: 1px solid rgba(255,255,255,.16);
      background: linear-gradient(135deg, rgba(124,58,237,.95), rgba(6,182,212,.75));
      color: white;
      font-weight: 650;
      letter-spacing: .01em;
      cursor:pointer;
      transition: transform .08s ease, filter .15s ease;
      user-select:none;
    }
    .btn:hover{ filter: brightness(1.07); }
    .btn:active{ transform: translateY(1px); }
    .btn.secondary{
      background: rgba(255,255,255,.08);
      color: var(--text);
    }

    /* Toast / message */
    .msg{
      margin-top: 12px;
      padding: 12px 12px;
      border-radius: 14px;
      border: 1px solid rgba(255,255,255,.14);
      background: rgba(255,255,255,.06);
      color: var(--muted);
    }
    .msg strong{ color: var(--text); }
    .msg.good{
      border-color: rgba(34,197,94,.35);
      background: rgba(34,197,94,.10);
      color: rgba(214,255,228,.90);
    }
    .msg.bad{
      border-color: rgba(251,113,133,.40);
      background: rgba(251,113,133,.10);
      color: rgba(255,220,226,.92);
    }

    /* Member cards */
    .members{
      display:grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 14px;
      margin-top: 12px;
    }
    @media (max-width: 1000px){
      .members{ grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 650px){
      .members{ grid-template-columns: 1fr; }
    }
    .mcard{
      border: 1px solid var(--border);
      background: linear-gradient(180deg, rgba(255,255,255,.10), rgba(255,255,255,.05));
      border-radius: var(--radius);
      padding: 16px;
      box-shadow: 0 14px 40px rgba(0,0,0,.28);
      backdrop-filter: blur(12px);
      position: relative;
      overflow: hidden;
    }
    .mcard::before{
      content:"";
      position:absolute;
      inset:-60px -80px auto auto;
      width:220px;height:220px;
      background: radial-gradient(circle at 30% 30%, rgba(124,58,237,.28), transparent 60%);
      transform: rotate(10deg);
      pointer-events:none;
    }
    .mhead{
      display:flex;
      align-items:center;
      justify-content:space-between;
      gap: 10px;
      margin-bottom: 10px;
      position:relative;
    }
    .mname{
      font-size: 18px;
      margin:0;
      letter-spacing:-0.01em;
    }
    .tag{
      font-size: 12px;
      color: rgba(255,255,255,.82);
      border: 1px solid rgba(255,255,255,.14);
      background: rgba(255,255,255,.07);
      padding: 6px 10px;
      border-radius: 999px;
      display:inline-flex;
      align-items:center;
      gap: 6px;
      white-space: nowrap;
    }
    .kv{
      display:grid;
      grid-template-columns: 1fr;
      gap: 8px;
      position:relative;
    }
    .row{
      display:flex;
      justify-content:space-between;
      gap: 12px;
      padding: 10px 10px;
      border-radius: 12px;
      background: rgba(255,255,255,.05);
      border: 1px solid rgba(255,255,255,.10);
    }
    .k{ color: var(--muted2); font-size: 13px; }
    .v{ color: var(--text); font-weight: 600; font-size: 13px; }

    /* Secret box */
    .secret{
      border-radius: var(--radius);
      border: 1px solid rgba(34,197,94,.32);
      background: linear-gradient(180deg, rgba(34,197,94,.14), rgba(255,255,255,.05));
      padding: 14px;
      margin-top: 12px;
    }
    .secretTitle{
      margin:0 0 8px;
      font-size: 14px;
      color: rgba(214,255,228,.95);
      display:flex;
      align-items:center;
      gap: 8px;
    }
    .secretText{
      margin:0;
      color: rgba(214,255,228,.90);
      line-height: 1.6;
    }

    /* Footer */
    .footer{
      margin-top: 22px;
      color: rgba(255,255,255,.50);
      font-size: 12px;
      text-align:center;
    }
  </style>
</head>
<body>
  <div class="wrap">

    <div class="topbar">
      <div class="brand">
        <div class="badge">
          <div class="dot"></div>
          <div>
            <div style="font-weight:700; font-size:13px;"><?php echo htmlspecialchars($teamName); ?></div>
            <div style="color:rgba(255,255,255,.65); font-size:12px;"><?php echo UNIVERSITY_NAME; ?></div>
          </div>
        </div>

        <h1>Team Bio Page</h1>
        <p class="sub">A clean PHP + HTML page with forms, sessions, and a fun secret section.</p>
      </div>

      <div class="pillrow">
        <div class="pill">✅ PHP Variables</div>
        <div class="pill">✅ Constant</div>
        <div class="pill">✅ Form + Greeting</div>
        <div class="pill">✅ Password + Session</div>
      </div>
    </div>

    <div class="grid">
      <!-- LEFT: Members -->
      <div class="card">
        <h2>Our Team Members</h2>
        <p class="muted" style="margin:0;">Each member includes string, integer, and float data (name, age, GPA) plus major.</p>
        <div class="divider"></div>

        <div class="members">
          <?php foreach ($members as $m): ?>
            <div class="mcard">
              <div class="mhead">
                <h3 class="mname"><?php echo htmlspecialchars($m["name"]); ?></h3>
                <div class="tag"><?php echo $m["emoji"]; ?> <?php echo htmlspecialchars($m["role"]); ?></div>
              </div>

              <div class="kv">
                <div class="row">
                  <div class="k">Age</div>
                  <div class="v"><?php echo (int)$m["age"]; ?></div>
                </div>
                <div class="row">
                  <div class="k">GPA</div>
                  <div class="v"><?php echo number_format((float)$m["gpa"], 2); ?></div>
                </div>
                <div class="row">
                  <div class="k">Major</div>
                  <div class="v"><?php echo htmlspecialchars($m["major"]); ?></div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- RIGHT: Forms -->
      <div class="card">
        <h2>Visitor Forms</h2>
        <p class="muted" style="margin:0;">Enter your name for a personalized greeting, then unlock a secret fun fact.</p>

        <div class="divider"></div>

        <!-- Visitor name form -->
        <div style="margin-bottom: 16px;">
          <div style="font-weight:700; margin-bottom:8px;">👋 Say Hi</div>
          <form method="POST" class="formRow">
            <input class="input" type="text" name="visitor_name" placeholder="Type your name..." required>
            <button class="btn" type="submit">Submit</button>
          </form>

          <?php if ($visitorGreeting): ?>
            <div class="msg good"><?php echo $visitorGreeting; ?></div>
          <?php else: ?>
            <div class="msg">Tip: Try <strong>your name</strong> and click Submit.</div>
          <?php endif; ?>
        </div>

        <div class="divider"></div>

        <!-- Password / Secret section -->
        <div>
          <div style="font-weight:700; margin-bottom:8px;">🔒 Secret Section</div>

          <?php if (!isset($_SESSION['authorized'])): ?>
            <form method="POST" class="formRow">
              <input class="input" type="password" name="password" placeholder="Enter password..." required>
              <button class="btn" type="submit">Unlock</button>
            </form>

            <?php if ($passwordMessage): ?>
              <div class="msg bad"><?php echo htmlspecialchars($passwordMessage); ?></div>
            <?php else: ?>
              <div class="msg">Password hint: <strong>it's secret</strong></div>
            <?php endif; ?>

          <?php else: ?>
            <div class="secret">
              <div class="secretTitle">🎉 Access Granted</div>
              <p class="secretText">
                <strong>Secret Fun Fact:</strong> Our team once built a mini app in 24 hours and won 1st place in a hackathon!
              </p>

              <form method="POST" style="margin-top:12px;">
                <button class="btn secondary" type="submit" name="logout" value="1">Lock Again</button>
              </form>
            </div>
          <?php endif; ?>
        </div>

      </div>
    </div>

    <div class="footer">
      © <?php echo date("Y"); ?> <?php echo htmlspecialchars($teamName); ?> • Built with PHP sessions + clean UI
    </div>

  </div>
</body>
</html>