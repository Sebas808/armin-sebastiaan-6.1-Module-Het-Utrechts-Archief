<header>
  <div class="header-inner">
     <select class="language-select" id="langSelect">
      <option value="nl">Nederlands</option>
      <option value="en">English</option>
    </select>

    <a class="header-brand" href="#">
      <h1 data-i18n="title">Utrecht Archief — Tijdpanorama</h1>
    </a>

    <nav class="header-nav">
      <ul>
        <li><a data-i18n="nav_panorama" href="#" class="scroll-300">Panorama</a></li>
        <li><a data-i18n="nav_uitleg" href="index.php">uitleg</a></li>
        <li><a data-i18n="nav_login" href="login.php">login</a></li>
        <li><a data-i18n="nav_over" href="#">Over het project</a></li>
      </ul>
    </nav>

    <div class="header-icon" title="Panorama Icon">
  <svg width="80" height="40" viewBox="0 0 24 24" role="img" aria-hidden="false" xmlns="http://www.w3.org/2000/svg">
    <rect x="0" y="0" width="80" height="80" rx="3" ry="3" fill="#2a8b79"/>
    <g transform="translate(2 2)" fill="none" stroke="#ffffff" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
      <circle cx="8" cy="8" r="5.2" />
      <line x1="12.2" y1="12.2" x2="16" y2="16" />
    </g>
  </svg>
    </div>
  </div>
</header>
<script>
const translations = {
  nl: {
    title: "Utrecht Archief — Tijdpanorama",
    nav_panorama: "Panorama",
    nav_uitleg: "uitleg",
    nav_login: "login",
    nav_over: "Over het project",
    btn_start: "Start panorama",
    welcome_title: "Welkom bij Het Utrechts Archief",
    welcome_intro: "Ontdek de verhalen, details en verborgen parels van het historische Utrecht. Onze digitale panorama neemt je mee terug in de tijd en laat je de stad ervaren zoals zij er ooit uitzag.",
    welcome_highlight: "Verken iconische locaties, zoom in op bijzondere elementen en laat je inspireren door het rijke erfgoed dat Utrecht al eeuwenlang vormt.",
    welcome_subtext: "Scroll naar beneden om de volledige panorama te bekijken en jouw reis door het oude Utrecht te beginnen."
  },

  en: {
    title: "Utrecht Archive — Time Panorama",
    nav_panorama: "Panorama",
    nav_uitleg: "Instructions",
    nav_login: "Login",
    nav_over: "About the project",
    btn_start: "Start panorama",
      welcome_title: "Welcome to the Utrecht Archives",
    welcome_intro: "Discover the stories, details, and hidden gems of historic Utrecht. Our digital panorama takes you back in time and lets you experience the city as it once was.",
    welcome_highlight: "Explore iconic locations, zoom in on unique details, and get inspired by the rich heritage that has shaped Utrecht for centuries.",
    welcome_subtext: "Scroll down to view the full panorama and begin your journey through historic Utrecht."
  }
};

function setLanguage(lang) {
  document.querySelectorAll("[data-i18n]").forEach(el => {
    const key = el.getAttribute("data-i18n");
    el.textContent = translations[lang][key];
  });

  localStorage.setItem("lang", lang);
}

document.getElementById("langSelect").addEventListener("change", e => {
  setLanguage(e.target.value);
});

// Load saved language
const storedLang = localStorage.getItem("lang") || "nl";
document.getElementById("langSelect").value = storedLang;
setLanguage(storedLang);
</script>
<script>
  document.querySelectorAll(".scroll-300").forEach(function(link) {
    link.addEventListener("click", function(e) {
      e.preventDefault();
      window.scrollBy({
        top: 400,
        behavior: "smooth"
      });
    });
  });
</script>