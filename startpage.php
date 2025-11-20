<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Uitleg – Het Utrecht Archief Panorama</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f5f5f5;
      margin: 0;
      padding: 0;
      color: #333;
    }
    .start-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1rem 2rem;
      background: white;
      border-bottom: 1px solid #ddd;
      position: sticky;
      top: 0;
    }
    .language-select {
      font-size: 0.9rem;
      padding: 0.4rem 0.6rem;
    }
    .container {
      max-width: 900px;
      margin: 2rem auto;
      padding: 0 1rem;
    }
    h1 {
      text-align: center;
      margin-bottom: 2rem;
    }
    .step {
      background: white;
      padding: 1.5rem;
      border-radius: 10px;
      margin-bottom: 1.5rem;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      display: flex;
      gap: 1rem;
      align-items: center;
    }
    .step img {
      width: 120px;
      height: 80px;
      background: #e0e0e0;
      border-radius: 6px;
      object-fit: cover;
    }
    .button-area {
      text-align: center;
      margin-top: 2rem;
    }
    .button-area a {
      display: inline-block;
      padding: 0.8rem 1.6rem;
      background: #0057b8;
      color: white;
      text-decoration: none;
      border-radius: 8px;
      font-weight: bold;
      transition: 0.2s ease;
    }
    .button-area a:hover {
      background: #004a9c;
    }
   
  </style>
</head>
<body>
    <div class="startpage-content">
  <header>
    <div class="start-header">
    <div class="logo">Het Utrecht Archief</div>
    <select class="language-select" id="langSelect">
      <option value="nl">Nederlands</option>
      <option value="en">English</option>
    </select>
    </div>
  </header>

  <div class="container">
    <h1 data-nl="Welkom! Zo werkt de Panorama-Pagina" data-en="Welcome! How the Panorama Page Works">Welkom! Zo werkt de Panorama-Pagina</h1>

    <div style="display:flex; gap:1rem; justify-content:space-between; margin-bottom:2rem;">
      <div style="background:white; padding:1rem; border-radius:10px; width:30%; text-align:center; box-shadow:0 2px 6px rgba(0,0,0,0.1);">
        <img src="img/scroll.png" style="width:80px; height:80px; background:#ddd; border-radius:6px;" />
        <h3 data-nl="Scroll door de panorama heen" data-en="Scroll through the panorama">Scroll door de panorama heen</h3>
      </div>

      <div style="background:white; padding:1rem; border-radius:10px; width:30%; text-align:center; box-shadow:0 2px 6px rgba(0,0,0,0.1);">
        <img src="img/info.png" style="width:80px; height:80px; background:#ddd; border-radius:6px;" />
        <h3 data-nl="Druk op de I voor informatie" data-en="Press the I for information">Druk op de I voor informatie</h3>
      </div>

      <div style="background:white; padding:1rem; border-radius:10px; width:30%; text-align:center; box-shadow:0 2px 6px rgba(0,0,0,0.1);">
        <img src="img/kijker.png" style="width:80px; height:80px; background:#ddd; border-radius:6px;" />
        <h3 data-nl="Zoem in door met je muis te bewegen" data-en="Zoom in by moving your mouse">Zoem in door met je muis te bewegen</h3>
      </div>
    </div>

    <div class="button-area">
      <a href="home.php" data-nl="Ga naar Home" data-en="Go to Home">Ga naar Home</a>
      <a href="extra-details.php" style="margin-left:1rem;" data-nl="Extra details" data-en="Extra details">Extra details</a>
    </div>
  </div>
</div>
  <script>
    const langSelect = document.getElementById('langSelect');
    langSelect.addEventListener('change', () => {
      const lang = langSelect.value;
      document.querySelectorAll('[data-nl]').forEach(el => {
        el.innerText = el.getAttribute(`data-${lang}`);
      });
    });
  </script>
</body>
</html>
