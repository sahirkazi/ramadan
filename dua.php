<?php
$page = 'dua';
$pageTitle = 'रोज़े की नियत और इफ़्तार की दुआ | रमज़ान 2026';
$extraHead = '<style>
    .dua-card {
      border-radius: 12px;
      padding: 20px;
      margin-bottom: 12px;
    }

    .dua-header {
      display: flex;
      align-items: center;
      gap: 8px;
      margin-bottom: 8px;
    }

    .dua-tag {
      font-size: 11px;
      font-weight: 600;
      letter-spacing: 0.5px;
    }

    .dua-tag.sehri {
      color: var(--primary);
    }

    .dua-tag.iftar {
      color: var(--accent);
    }

    .dua-tag.taraweeh {
      color: #3b82f6;
    }

    .dua-tag.ashra1 { color: #d97706; }
    .dua-tag.ashra2 { color: #0891b2; }
    .dua-tag.ashra3 { color: #dc2626; }

    .dua-text {
      font-size: 16px;
      font-weight: 600;
      line-height: 1.6;
      margin-bottom: 4px;
      white-space: pre-line;
    }

    .dua-trans {
      font-size: 12px;
      color: var(--muted-fg);
      font-style: italic;
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
    <h3 class="section-title text-gradient" style="margin-bottom:0;">दुआ</h3>
    <button class="lang-btn" id="langToggle" onclick="toggleLang()">Hinglish</button>
  </div>

  <div id="duaContainer"></div>
</main>

<?php include 'footer.php'; ?>
<script src="data.js"></script>
<script>
  const duas = [
    {
      tag: "sehri", tagNameHindi: "रोज़े की नियत", tagNameHinglish: "Roze Ki Niyat",
      textHindi: "व बि सोमि ग़दिन नवईतु मिन शहरि रमज़ान",
      transHindi: "मैं रमज़ान के इस रोज़े की नियत करता/ करती हूं।",
      textHinglish: "Wa Bisawmi Ghadin Nawaitu Min Shahri Ramadan",
      transHinglish: "Maine Ramadan ke is roze ki niyat krta/krti hu."
    },
    {
      tag: "iftar", tagNameHindi: "इफ़्तार की दुआ", tagNameHinglish: "Iftar Ki Dua",
      textHindi: "अल्लाहुम्मा इन्नी लक सुम्तु, वबीका आमन्तु, वअलाइक तवक्कलतु, वअला रिज़्क़िक अफ़्तरतु, फ़तकब्बल मिन्नी",
      transHindi: "ऐ अल्लाह! मैंने तेरे लिए रोज़ा रखा, तुझ पर ईमान लाया, तुझ पर भरोसा किया और तेरे रिज़्क़ से इफ़्तार किया, इसे क़बूल फ़रमा।",
      textHinglish: "Allahumma Inni Laka Sumtu, Wa Bika Aamantu, Wa 'Alaika Tawakkaltu, Wa 'Ala Rizqika Aftartu, Fa Taqabbal Minni",
      transHinglish: "Aye Allah! Maine tere liye roza rakha, tujh par eemaan laya, tujh par bharosa kiya aur tere rizq se iftar kiya, ise qubool farma."
    },
    {
      tag: "taraweeh", tagNameHindi: "तरावीह की दुआ", tagNameHinglish: "Taraweeh Ki Dua",
      textHindi: "सुब्हाना ज़िल मुल्कि वल मलकूत\nसुब्हाना ज़िल इज़्ज़ति वल अज़-मति वल हैबति वल कुदरति वल किबरिया-इ वल जबरूत\nसुब्हानल मलिकिल हय्यिल लज़ी ला यनामु व ला यमूत\nसुब्बुहुन कुद्दूसुन रब्बुना व रब्बुल मलाइ-कति वर-रूह\nअल्लाहुम्मा अजिरना मिनन नार, या मुजीरु या मुजीरु या मुजीरु",
      transHindi: "पाक है वो (अल्लाह) जो मुल्क और बादशाहत वाला है।\nपाक है वो जो इज़्ज़त, बड़ाई, हैबत, कुदरत, बड़प्पन और दबदबे वाला है।\nपाक है वो बादशाह जो ज़िंदा है, जिसे न नींद आती है न मौत।\nवो बहुत ही पाक और मुक़द्दस है, हमारा रब और फ़रिश्तों और रूह का रब।\nऐ अल्लाह! हमें आग (जहन्नम) से बचा, ऐ पनाह देने वाले, ऐ पनाह देने वाले, ऐ पनाह देने वाले।",
      textHinglish: "Subhana Zil Mulki Wal Malakoot\nSubhana Zil Izzati Wal Azmati Wal Haibati Wal Qudrati Wal Kibriyaai Wal Jabaroot\nSubhanal Malikil Hayyil Lazee La Yanaamu Wa La Yamoot\nSubboohun Quddoosun Rabbuna Wa Rabbul Malaaikati War Rooh\nAllahumma Ajirna Minan Naar, Ya Mujeeru Ya Mujeeru Ya Mujeeru",
      transHinglish: "Paak hai wo (Allah) jo Mulk aur Badshahat wala hai.\nPaak hai wo jo Izzat, Badai, Haibat, Qudrat, Badappan aur Dabdabe wala hai.\nPaak hai wo Badshah jo Zinda hai, jise na neend aati hai na maut.\nWo bahut hi Paak aur Muqaddas hai, Hamara Rab aur Farishton aur Rooh ka Rab.\nAye Allah! Hamein aag (Jahannam) se bacha, Aye Panah dene wale, Aye Panah dene wale, Aye Panah dene wale."
    },
    {
      tag: "ashra1", tagNameHindi: "पहला अशरा (रहमत)", tagNameHinglish: "Pahla Ashra (Rahmat)",
      textHindi: "रब्बिग़ फ़िर वर हम व अंता खैरुर्र हिमीन",
      transHindi: "ए मेरे रब ! मुझे बख्श दे, और मुझ पर रहम फरमा, और तू सबसे बेहतर रहम करने वाला है।",
      textHinglish: "Rabbigh Fir War Ham Wa Anta Khairur Rahimeen",
      transHinglish: "Aye mere Rab! Mujhe bakhsh de, aur mujh par raham farma, aur tu sabse behtar raham karne wala hai."
    },
    {
      tag: "ashra2", tagNameHindi: "दूसरा अशरा (मग़फ़िरत)", tagNameHinglish: "Dusra Ashra (Maghfirat)",
      textHindi: "अस्तग फ़िरुल्लाहा रब्बी मिन कुल्ली ज़म्बिन व अतूबू इलयेह",
      transHindi: "मैं अल्लाह से तमाम गुनाहों की बख्शिश मांगता हूँ जो मेरा रब है और उसी की तरफ रुजू करता हूँ।",
      textHinglish: "Astaghfirullaha Rabbi Min Kulli Zambin Wa Atoobu Ilaih",
      transHinglish: "Main Allah se tamam gunahon ki bakhshish mangta hoon jo mera Rab hai aur usi ki taraf ruku karta hoon."
    },
    {
      tag: "ashra3", tagNameHindi: "तीसरा अशरा (निजात)", tagNameHinglish: "Teesra Ashra (Nijat)",
      textHindi: "अल्लाहुम्मा अजिरनी मिनन नार",
      transHindi: "ऐ अल्लाह! मुझे आग (जहन्नम) के अज़ाब से बचा।",
      textHinglish: "Allahumma Ajirni Minan Naar",
      transHinglish: "Aye Allah! Mujhe aag (Jahannam) ke azaab se bacha."
    }
  ];

  let isHinglish = false;

  function toggleLang() {
    isHinglish = !isHinglish;
    document.getElementById("langToggle").textContent = isHinglish ? "हिंदी" : "Hinglish";
    renderDuas();
  }

  function renderDuas() {
    const container = document.getElementById("duaContainer");
    container.innerHTML = duas.map(d => {
      const tagName = isHinglish ? d.tagNameHinglish : d.tagNameHindi;
      const text = isHinglish ? d.textHinglish : d.textHindi;
      const trans = isHinglish ? d.transHinglish : d.transHindi;

      return `<div class="dua-card glass">
      <div class="dua-header"><span>📖</span><span class="dua-tag ${d.tag}">${tagName}</span></div>
      <p class="dua-text">${text}</p>
      <p class="dua-trans">"${trans}"</p>
    </div>`;
    }).join("");
  }

  renderDuas();
</script>
<?php include 'sw_include.php'; ?>
</body>

</html>