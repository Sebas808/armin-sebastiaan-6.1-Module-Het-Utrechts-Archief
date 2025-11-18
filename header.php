<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header class="ua-header" role="banner" aria-label="Hoofdnavigatie Het Utrechts Archief">
  <a class="ua-skip" href="#main">Spring naar hoofdcontent</a>

  <div class="ua-top">
    <div class="ua-brand">
      <a href="/" class="ua-logo-link" aria-label="Naar de startpagina">
        <img src="/images/logo-ua-placeholder.svg" alt="Logo Het Utrechts Archief" class="ua-logo">
      </a>
      <div class="ua-title">
        <h1>Het Utrechts Archief</h1>
        <p class="ua-tag">Verhalen uit de stad en provincie</p>
      </div>
    </div>

    <form class="ua-search" action="/zoeken.php" method="get" role="search" aria-label="Zoek in archief">
      <label for="q" class="visually-hidden">Zoeken</label>
      <input id="q" name="q" type="search" placeholder="Zoeken in het archief…" aria-label="Zoekterm">
      <button type="submit" aria-label="Start zoekopdracht">Zoeken</button>
    </form>

    <button class="ua-menu-toggle" aria-expanded="false" aria-controls="ua-nav">Menu</button>
  </div>

  <nav id="ua-nav" class="ua-nav" role="navigation" aria-label="Hoofdnavigatie">
    <ul>
      <li><a href="/" <?php if(basename($_SERVER['PHP_SELF'])=='index.php') echo 'aria-current="page"'; ?>>Home</a></li>
      <li><a href="/collecties.php">Collecties</a></li>
      <li><a href="/onderzoek.php">Onderzoek</a></li>
      <li><a href="/tentoonstellingen.php">Tentoonstellingen</a></li>
      <li><a href="/over-ons.php">Over ons</a></li>
      <li><a href="/bezoeken.php">Bezoeken</a></li>
    </ul>
  </nav>
</header>
</body>
</html>