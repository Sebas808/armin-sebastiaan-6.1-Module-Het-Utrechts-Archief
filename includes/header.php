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
        <li><a data-i18n="nav_panorama" href="#">Panorama</a></li>
        <li><a data-i18n="nav_uitleg" href="index.php">uitleg</a></li>
        <li><a data-i18n="nav_login" href="login.php">login</a></li>
        <li><a data-i18n="nav_over" href="#">Over het project</a></li>
      </ul>
    </nav>

    <button class="header-btn-panorama">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M4 4v16h16"/><path d="M4 12h8"/><path d="M12 4v8"/></svg>
      <span data-i18n="btn_start">Start panorama</span>
    </button>
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
    btn_start: "Start panorama"
  },

  en: {
    title: "Utrecht Archive — Time Panorama",
    nav_panorama: "Panorama",
    nav_uitleg: "Instructions",
    nav_login: "Login",
    nav_over: "About the project",
    btn_start: "Start panorama"
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
