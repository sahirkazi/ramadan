<?php
$page = 'surah';
$pageTitle = 'सूरह | रमज़ान 2026';
$extraHead = '<style>
    .surah-card {
      border-radius: 12px;
      padding: 20px;
      margin-bottom: 12px;
    }

    .surah-title {
      display: flex;
      align-items: center;
      gap: 8px;
      font-size: 1.1rem;
      font-weight: 700;
      margin-bottom: 12px;
    }

    .surah-bismillah {
      text-align: center;
      font-size: 14px;
      color: var(--muted-fg);
      font-weight: 600;
      margin-bottom: 12px;
    }

    .surah-lines {
      text-align: right;
      direction: auto;
    }

    .surah-lines p {
      font-size: 16px;
      line-height: 1.7;
      margin-bottom: 6px;
      color: hsla(140, 15%, 93%, 0.9);
    }

    .surah-ameen {
      text-align: center;
      font-size: 16px;
      font-weight: 600;
      color: var(--primary);
      margin-top: 12px;
    }

    .toggle-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 4px;
      margin-bottom: 12px;
    }

    .lang-btn {
      padding: 6px 14px;
      border-radius: 9999px;
      border: 1px solid hsla(152, 69%, 24%, 0.3);
      background: hsla(152, 69%, 24%, 0.15);
      color: var(--primary);
      font-size: 12px;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.2s;
    }

    .lang-btn:hover {
      background: hsla(152, 69%, 24%, 0.3);
    }
  </style>';
include 'header.php';
?>

<main>
  <div class="toggle-row">
    <h3 class="section-title text-gradient" style="margin-bottom:0;">सूरह</h3>
    <button class="lang-btn" id="langToggle" onclick="toggleLang()">Hinglish</button>
  </div>

  <div id="surahContainer"></div>
</main>

<?php include 'footer.php'; ?>
<script src="data.js"></script>
<script>
  const surahs = [
    {
      titleHindi: "सूरह अल-फ़ातिहा", titleHinglish: "Surah Al-Fatiha",
      bismillah: null,
      hindi: ["अल्हम्दु लिल्लाहि रब्बिल आलमीन", "अर्रहमानिर रहीम", "मालिकि यौमिद् दीन", "इय्याक नअबुदु व इय्याक नस्तईन", "इह्दिनस् सिरातल मुस्तक़ीम", "सिरातल्लज़ी न अन अम-त अलैहिम", "ग़ैरिल मग़दूबि अलैहिम वलद-दाल्लीन"],
      hinglish: ["Alhamdulillahi Rabbil 'Aalameen", "Ar-Rahmanir-Raheem", "Maliki Yawmid-Deen", "Iyyaka Na'budu Wa Iyyaka Nasta'een", "Ihdinas-Siraatal-Mustaqeem", "Siraatallazeena An'amta 'Alaihim", "Ghairil-Maghdoobi 'Alaihim Walad-Daalleen"],
      ameen: true
    },
    {
      titleHindi: "सूरह अल-काफ़िरून", titleHinglish: "Surah Al-Kafirun",
      bismillah: { hindi: "बिस्मिल्लाहिर रहमानिर रहीम", hinglish: "Bismillahir Rahmanir Raheem" },
      hindi: ["कुल या अय्युहल काफ़िरून", "ला अबुदु मा तअबुदून", "व ला अन्तुम आबिदू-न मा अबुद", "व ला अना आबिदुम मा अबत्तूम", "व ला अन्तुम आबिदू-न मा अबुद", "लकुम दीनु-कुम वलिय दीन"],
      hinglish: ["Qul Ya Ayyuhal Kafiroon", "La A'budu Ma Ta'budoon", "Wa La Antum 'Abidoona Ma A'bud", "Wa La Ana 'Abidum Ma 'Abattum", "Wa La Antum 'Abidoona Ma A'bud", "Lakum Deenukum Waliya Deen"],
      ameen: false
    },
    {
      titleHindi: "सूरह अल-इख़लास", titleHinglish: "Surah Al-Ikhlas",
      bismillah: { hindi: "बिस्मिल्लाहिर रहमानिर रहीम", hinglish: "Bismillahir Rahmanir Raheem" },
      hindi: ["कुल हुवल्लाहु अहद", "अल्लाहुस समद", "लम यलिद व लम यूलद", "व लम यकुल्लहू कुफ़ुवन अहद"],
      hinglish: ["Qul Huwallahu Ahad", "Allahus Samad", "Lam Yalid Wa Lam Yoolad", "Wa Lam Yakullahu Kufuwan Ahad"],
      ameen: false
    },
    {
      titleHindi: "सूरह अल-फ़लक़", titleHinglish: "Surah Al-Falaq",
      bismillah: { hindi: "बिस्मिल्लाहिर रहमानिर रहीम", hinglish: "Bismillahir Rahmanir Raheem" },
      hindi: ["कुल अऊज़ु बिरब्बिल फ़लक़", "मिन शर्रि मा ख़लक़", "व मिन शर्रि ग़ासिक़िन इज़ा वक़ब", "व मिन शर्रिन नफ़्फ़ासाति फ़िल उक़द", "व मिन शर्रि हासिदिन इज़ा हसद"],
      hinglish: ["Qul A'uzu Birabbil Falaq", "Min Sharri Ma Khalaq", "Wa Min Sharri Ghasiqin Iza Waqab", "Wa Min Sharrin Naffathati Fil Uqad", "Wa Min Sharri Hasidin Iza Hasad"],
      ameen: false
    },
    {
      titleHindi: "सूरह अन-नास", titleHinglish: "Surah An-Nas",
      bismillah: { hindi: "बिस्मिल्लाहिर रहमानिर रहीम", hinglish: "Bismillahir Rahmanir Raheem" },
      hindi: ["कुल अऊज़ु बिरब्बिन नास", "मलिकिन नास", "इलाहिन नास", "मिन शर्रिल वसव-सिल खन्नास", "अल्लज़ी युवस्विसु फ़ी सुदूरिन नास", "मिनल जिन्नति वन नास"],
      hinglish: ["Qul A'uzu Birabbin Naas", "Malikin Naas", "Ilahin Naas", "Min Sharril Waswasil Khannaas", "Allazee Yuwaswisu Fee Sudoorin Naas", "Minal Jinnati Wan Naas"],
      ameen: false
    },
    {
      titleHindi: "सूरह अल-क़द्र", titleHinglish: "Surah Al-Qadr",
      bismillah: { hindi: "बिस्मिल्ला हिर्रहमा निर्रहीम", hinglish: "Bismillahir Rahmanir Raheem" },
      hindi: ["इन्ना अनज़ल नाहु फ़ी लैयलतिल कद्र", "वमा अदराका मा लैयलतुल कद्र", "लय्लतुल कदरि खैरुम मिन अल्फि शहर", "तनज्जलुल मलाइकातु वररुहु फ़ीहा बिइज़्नि रब्बिहिम मिन कुल्लि अम्र", "सलामुन हिय हत्ता मत लइल फज्र"],
      hinglish: ["Inna Anzalnahu Fee Laylatil Qadr", "Wa Ma Adraka Ma Laylatul Qadr", "Laylatul Qadri Khairum Min Alfi Shahr", "Tanazzalul Malaikatu War-Roohu Feeha Bi Izni Rabbihim Min Kulli Amr", "Salamun Hiya Hatta Mat La'il Fajr"],
      ameen: false
    }
  ];

  let isHinglish = false;

  function toggleLang() {
    isHinglish = !isHinglish;
    document.getElementById("langToggle").textContent = isHinglish ? "हिंदी" : "Hinglish";
    renderSurahs();
  }

  function renderSurahs() {
    const container = document.getElementById("surahContainer");
    container.innerHTML = surahs.map(s => {
      const lines = isHinglish ? s.hinglish : s.hindi;
      const title = isHinglish ? s.titleHinglish : s.titleHindi;
      const bism = s.bismillah ? (isHinglish ? s.bismillah.hinglish : s.bismillah.hindi) : "";
      let html = '<div class="surah-card glass">';
      html += '<div class="surah-title">📕 ' + title + '</div>';
      if (bism) html += '<div class="surah-bismillah">' + bism + '</div>';
      html += '<div class="surah-lines">';
      lines.forEach(l => { html += '<p>' + l + '</p>'; });
      html += '</div>';
      if (s.ameen) html += '<div class="surah-ameen">' + (isHinglish ? '(Aameen)' : '(आमीन)') + '</div>';
      html += '</div>';
      return html;
    }).join("");
  }

  renderSurahs();
</script>
<?php include 'sw_include.php'; ?>
</body>

</html>