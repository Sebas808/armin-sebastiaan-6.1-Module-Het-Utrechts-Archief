<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Extra Details – Testpagina</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f5f5f5;
      margin: 0;
      padding: 0;
      color: #333;
    }
    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1rem 2rem;
      background: white;
      border-bottom: 1px solid #ddd;
    }
    .language-select {
      font-size: 0.9rem;
      padding: 0.4rem 0.6rem;
    }
    .container {
      max-width: 900px;
      margin: 2rem auto;
      background: white;
      padding: 2rem;
      border-radius: 12px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    h1 {
      text-align: center;
      margin-bottom: 2rem;
    }

    /* Zoom test area */
    .zoom-box {
      width: 100%;
      height: 300px;
      background-image: url('https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&w=1200&q=80');
      background-size: 100%;
      background-position: center;
      background-repeat: no-repeat;
      border-radius: 12px;
      border: 2px solid #ccc;
      transition: background-size 0.18s ease, background-position 0.08s ease;
      margin-bottom: 2rem;
      cursor: zoom-in;
      overflow: hidden;
    }

    /* Info test */
    .info-button {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      background: #0057b8;
      color: white;
      font-weight: bold;
      display: flex;
      justify-content: center;
      align-items: center;
      cursor: pointer;
      margin: 0.5rem auto;
      user-select: none;
    }

    .info-box {
      display: none;
      margin-top: 1rem;
      padding: 1rem;
      background: #e9f1ff;
      border-left: 4px solid #0057b8;
      border-radius: 8px;
    }

    .controls {
      text-align: center;
      margin-top: 1rem;
    }
  </style>
</head>
<body>
<div class="startpage-content">
<header>
  <div class="logo">Het Utrecht Archief</div>
  <select class="language-select" id="langSelect" aria-label="Select language">
    <option value="nl">Nederlands</option>
    <option value="en">English</option>
  </select>
</header>

<div class="container">
  <h1 data-nl="Extra Details Testpagina" data-en="Extra Details Test Page">Extra Details Testpagina</h1>

  <h2 data-nl="Test: Inzoomen" data-en="Test: Zooming">Test: Inzoomen</h2>
  <p data-nl="Beweeg je muis over het vlak om in te zoomen." data-en="Move your mouse over the area to zoom in.">Beweeg je muis over het vlak om in te zoomen.</p>

  <div class="zoom-box" id="zoomBox" role="img" aria-label="Panorama zoom test"></div>

  <div class="controls">
    <button id="resetZoom" aria-label="Reset zoom">Reset zoom</button>
  </div>

  <h2 data-nl="Test: Informatiepunt" data-en="Test: Information Point">Test: Informatiepunt</h2>
  <p data-nl="Klik op de I om informatie te openen." data-en="Click the I to open information.">Klik op de I om informatie te openen.</p>

  <div class="info-button" id="infoBtn" role="button" tabindex="0" aria-pressed="false" aria-label="Open informatiepunt">i</div>
  <div class="info-box" id="infoBox" data-nl="Dit is voorbeeldinformatie zoals je die op de panorama-pagina zou zien." data-en="This is example information similar to what appears on the panorama page.">
    Dit is voorbeeldinformatie zoals je die op de panorama-pagina zou zien.
  </div>
</div>
</div>

<script>
  // Language switcher (works by toggling elements that have data-nl/data-en)
  const langSelect = document.getElementById('langSelect');
  function applyLanguage(lang) {
    document.querySelectorAll('[data-nl]').forEach(el => {
      const text = el.getAttribute(`data-${lang}`);
      if (text !== null) el.innerText = text;
    });
  }
  // initialize to Dutch
  applyLanguage('nl');
  langSelect.addEventListener('change', () => applyLanguage(langSelect.value));

  // Zoom test - lens-style zoom centered on mouse position
  const zoomBox = document.getElementById('zoomBox');
  let isZoomed = false;
  const ZOOM_SIZE = 180; // percent

  function setZoomAt(clientX, clientY) {
    const rect = zoomBox.getBoundingClientRect();
    const x = ((clientX - rect.left) / rect.width) * 100;
    const y = ((clientY - rect.top) / rect.height) * 100;
    zoomBox.style.backgroundSize = ZOOM_SIZE + '%';
    // clamp positions between 0 and 100
    const clamp = v => Math.max(0, Math.min(100, v));
    zoomBox.style.backgroundPosition = `${clamp(x)}% ${clamp(y)}%`;
  }

  function resetZoom() {
    zoomBox.style.backgroundSize = '100%';
    zoomBox.style.backgroundPosition = 'center';
    isZoomed = false;
  }

  zoomBox.addEventListener('mousemove', (e) => {
    isZoomed = true;
    setZoomAt(e.clientX, e.clientY);
  });
  zoomBox.addEventListener('mouseleave', () => {
    resetZoom();
  });

  // keyboard accessibility to move zoom with arrow keys when focused
  zoomBox.tabIndex = 0;
  zoomBox.addEventListener('keydown', (e) => {
    if (!isZoomed && ['ArrowUp','ArrowDown','ArrowLeft','ArrowRight'].includes(e.key)) {
      // start zoom centered
      zoomBox.style.backgroundSize = ZOOM_SIZE + '%';
      isZoomed = true;
    }
    const rect = zoomBox.getBoundingClientRect();
    // get current background position
    const pos = zoomBox.style.backgroundPosition || '50% 50%';
    let [curX, curY] = pos.split(' ').map(s => parseFloat(s));
    const step = 3; // percent
    if (e.key === 'ArrowLeft') curX -= step;
    if (e.key === 'ArrowRight') curX += step;
    if (e.key === 'ArrowUp') curY -= step;
    if (e.key === 'ArrowDown') curY += step;
    curX = Math.max(0, Math.min(100, curX));
    curY = Math.max(0, Math.min(100, curY));
    zoomBox.style.backgroundPosition = `${curX}% ${curY}%`;
  });

  document.getElementById('resetZoom').addEventListener('click', resetZoom);

  // Info test
  const infoBtn = document.getElementById('infoBtn');
  const infoBox = document.getElementById('infoBox');

  function toggleInfo() {
    const isOpen = infoBox.style.display === 'block';
    infoBox.style.display = isOpen ? 'none' : 'block';
    infoBtn.setAttribute('aria-pressed', String(!isOpen));
  }
  infoBtn.addEventListener('click', toggleInfo);
  infoBtn.addEventListener('keydown', (e) => {
    if (e.key === 'Enter' || e.key === ' ') {
      e.preventDefault();
      toggleInfo();
    }
  });

</script>

</body>
</html>
