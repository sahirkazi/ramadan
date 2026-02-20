<?php
if (!isset($pageTitle))
  $pageTitle = 'रमज़ान 2026';
?>
<!DOCTYPE html>
<html lang="hi">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo $pageTitle; ?></title>
  <?php if (isset($pageDesc)): ?>
    <meta name="description" content="<?php echo $pageDesc; ?>" />
  <?php endif; ?>
  <meta name="theme-color" content="#0F5132" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
  <meta name="apple-mobile-web-app-title" content="रमज़ान 2026" />
  <link rel="apple-touch-icon" href="pwa/pwa-192x192.png" />
  <link rel="icon" type="image/png" href="pwa/favicon.png" />
  <link rel="manifest" href="pwa/manifest.json" />
  <link rel="stylesheet" href="style.css?v=2" />
  <?php if (isset($extraHead))
    echo $extraHead; ?>
</head>

<body>

  <header class="glass">
    <div class="header-row">
      <div style="display:flex;align-items:center;gap:8px;">
        <span>🌙</span>
        <h1 class="text-gradient" style="font-size:1rem;font-weight:800;">रमज़ान 2026</h1>
      </div>
      <div class="share-actions">
        <button class="share-btn install install-btn" onclick="installPWA()">📥 Install</button>
        <button class="share-btn wa" onclick="shareOnWhatsApp()">📲 WhatsApp</button>
        <button class="share-btn" onclick="shareNative()">🔗 शेयर</button>
      </div>
    </div>
  </header>