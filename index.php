<?php
$page = 'home';
$pageTitle = 'रमज़ान टाइम टेबल 2026 | सहरी और इफ़्तार';
$pageDesc = 'रमज़ान 2026 / 1447 हिजरी का पूरा 30 दिन का टाइम टेबल — सहरी और इफ़्तार के समय के साथ लाइव काउंटडाउन';
include 'header.php';
?>
<main>
    <div id="hero-card"></div><br>
    <h3 class="section-title text-gradient">ये टाइम टेबल मिरज शहर के लिए है</h3>
    <div class="table-wrap glass">
        <table>
            <thead>
                <tr>
                    <th>उर्दू</th>
                    <th>अंग्रेजी</th>
                    <th>दिन</th>
                    <th>सहरी</th>
                    <th>इफ़्तार</th>
                </tr>
            </thead>
            <tbody id="roza-tbody"></tbody>
        </table>
    </div>
</main>

<?php include 'footer.php'; ?>
<script src="data.js"></script>
<script>
    function getHeroIndex() {
        const idx = getTodayIndex();
        if (idx === -1 && ramadanData.length > 0) {
            const now = new Date();
            now.setHours(0, 0, 0, 0);
            const first = parseDate(ramadanData[0].englishDate);
            if (now < first) return 0;
        }
        return idx;
    }

    function renderTable() {
        const tbody = document.getElementById("roza-tbody");
        const now = new Date();
        now.setHours(0, 0, 0, 0);
        const todayIdx = getTodayIndex();
        let html = "";
        ramadanData.forEach((r, i) => {
            const rd = parseDate(r.englishDate);
            rd.setHours(0, 0, 0, 0);
            const isToday = i === todayIdx;
            const isPast = rd < now;
            let cls = isPast ? "past" : (i % 2 === 0 ? "odd" : "even");
            if (isToday) cls = "today";
            html += `<tr class="${cls}" ${isToday ? 'id="today-row"' : ""}>
      <td>${r.rozaNumber}${isToday ? '<span class="today-badge">आज</span>' : ""}</td>
      <td>${r.englishDate.split("-")[0]}</td>
      <td>${r.day}</td>
      <td>${r.sehriTime}</td>
      <td>${r.iftarTime}</td>
    </tr>`;
        });
        tbody.innerHTML = html;
        const todayRow = document.getElementById("today-row");
        if (todayRow) setTimeout(() => todayRow.scrollIntoView({
            behavior: "smooth",
            block: "center"
        }), 300);
    }

    function renderHero() {
        const el = document.getElementById("hero-card");
        const idx = getHeroIndex();
        if (idx === -1) {
            el.innerHTML = '<div class="pre-ramadan glass-hero" id="pre-hero"></div>';
            return;
        }
        const r = ramadanData[idx];
        const rozaNum = r.rozaNumber;
        let ashraName = "";
        if (rozaNum <= 10) ashraName = "पहला अशरा (रहमत)";
        else if (rozaNum <= 20) ashraName = "दूसरा अशरा (मग़फ़िरत)";
        else ashraName = "तीसरा अशरा (निजात)";

        el.innerHTML = `
    <div class="hero-card glass-hero">
      <div style="text-align:center"><span class="badge">आज का रोज़ा</span></div>
      <div class="roza-number text-gradient">रोज़ा नंबर ${r.rozaNumber}</div>
      <div class="info-grid">
        <div class="info-item glass"><div><div class="label">उर्दू तारीख</div><div class="value">${r.urduDate}</div></div></div>
        <div class="info-item glass"><div><div class="label">अंग्रेजी तारीख</div><div class="value">${r.englishDate}</div></div></div>
        <div class="info-item glass"><div><div class="label">आज का दिन</div><div class="value">${r.day}</div></div></div>
        <div class="info-item glass"><div><div class="label">अशरा</div><div class="value" style="color:var(--primary);font-weight:700;">${ashraName}</div></div></div>
      </div>
      <div class="time-grid">
        <div class="time-card glass"><div>🌙</div><div class="time-label">सहरी</div><div class="time-value">${r.sehriTime}</div></div>
        <div class="time-card glass"><div>☀️</div><div class="time-label">इफ़्तार</div><div class="time-value">${r.iftarTime}</div></div>
      </div>
      <div class="countdown-box glass">
        <div class="countdown-label sehri">🌙 सहरी काउंटडाउन</div>
        <div id="sehri-cd"></div>
      </div>
      <div class="countdown-box glass">
        <div class="countdown-label iftar">☀️ इफ़्तार काउंटडाउन</div>
        <div id="iftar-cd"></div>
      </div>
    </div>`;
    }

    function tickCountdown() {
        const now = new Date();
        const idx = getHeroIndex();
        if (idx === -1) {
            const preEl = document.getElementById("pre-hero");
            if (!preEl) return;
            const first = ramadanData[0];
            const target = timeToDate(first.englishDate, first.sehriTime);
            // Since getHeroIndex returns 0 if we are before Ramadan, 
            // idx only hits -1 here if we are AFTER Ramadan (or empty logic).
            // Thus diff will technically be negative.

            // Only Eid logic remains reachable effectively
            preEl.innerHTML = `<p style="color:var(--muted-fg)">रमज़ान का समय नहीं है</p>`;
            // Show Eid Mubarak + next Ramadan countdown
            const firstDate = parseDate(ramadanData[0].englishDate);
            const nextRamadan = new Date(firstDate.getTime());
            nextRamadan.setFullYear(nextRamadan.getFullYear() + 1);
            const nDiff = nextRamadan.getTime() - now.getTime();
            let eidHtml = `<div style="font-size:2.5rem">🎉</div><div class="roza-number text-gradient">ईद मुबारक!</div><p style="color:var(--muted-fg);font-size:0.85rem">अल्लाह आप के रोज़े और इबादात क़बूल फ़रमाए</p>`;
            if (nDiff > 0) {
                const nTs = Math.floor(nDiff / 1000),
                    nD = Math.floor(nTs / 86400),
                    nR = nTs % 86400;
                eidHtml += `<div style="margin-top:12px"><div class="label" style="color:var(--primary);font-weight:600;font-size:0.85rem">अगले रमज़ान में</div>
          <div class="countdown-units" style="margin-top:8px">
            <div class="cd-unit glass"><div class="num">${pad(nD)}</div><div class="lbl">दिन</div></div>
            <div class="cd-unit glass"><div class="num">${pad(Math.floor(nR / 3600))}</div><div class="lbl">घंटे</div></div>
            <div class="cd-unit glass"><div class="num">${pad(Math.floor((nR % 3600) / 60))}</div><div class="lbl">मिनट</div></div>
            <div class="cd-unit glass"><div class="num">${pad(nR % 60)}</div><div class="lbl">सेकंड</div></div>
          </div></div>`;
            }
            preEl.innerHTML = eidHtml;
            return;
        }
        const r = ramadanData[idx];
        const sehri = calcDiff(timeToDate(r.englishDate, r.sehriTime), now);
        const iftar = calcDiff(timeToDate(r.englishDate, r.iftarTime), now);
        const sEl = document.getElementById("sehri-cd");
        const iEl = document.getElementById("iftar-cd");
        if (!sEl || !iEl) return;
        sEl.innerHTML = sehri.passed ?
            '<p class="passed-msg">सहरी का समय समाप्त हो चुका है</p>' :
            `<div class="countdown-units"><div class="cd-unit glass"><div class="num">${pad(sehri.h)}</div><div class="lbl">घंटे</div></div><div class="cd-unit glass"><div class="num">${pad(sehri.m)}</div><div class="lbl">मिनट</div></div><div class="cd-unit glass"><div class="num">${pad(sehri.s)}</div><div class="lbl">सेकंड</div></div></div>`;
        const iftarMsg = sehri.passed && iftar.passed ? "आज का रोज़ा पूरा हो चुका है" : "इफ़्तार का समय समाप्त हो चुका है";
        iEl.innerHTML = iftar.passed ?
            `<p class="passed-msg">${iftarMsg}</p>` :
            `<div class="countdown-units"><div class="cd-unit glass"><div class="num">${pad(iftar.h)}</div><div class="lbl">घंटे</div></div><div class="cd-unit glass"><div class="num">${pad(iftar.m)}</div><div class="lbl">मिनट</div></div><div class="cd-unit glass"><div class="num">${pad(iftar.s)}</div><div class="lbl">सेकंड</div></div></div>`;
    }

    renderTable();
    renderHero();
    tickCountdown();
    setInterval(tickCountdown, 1000);
</script>
<?php include 'sw_include.php'; ?>
</body>

</html>