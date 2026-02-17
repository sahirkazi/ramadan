const ramadanData = [
  { rozaNumber: 1, urduDate: "1 रमज़ान", englishDate: "19-02-2026", day: "जुमेरात", sehriTime: "05:38 AM", iftarTime: "06:40 PM" },
  { rozaNumber: 2, urduDate: "2 रमज़ान", englishDate: "20-02-2026", day: "जुमा", sehriTime: "05:38 AM", iftarTime: "06:40 PM" },
  { rozaNumber: 3, urduDate: "3 रमज़ान", englishDate: "21-02-2026", day: "शनिचर", sehriTime: "05:37 AM", iftarTime: "06:41 PM" },
  { rozaNumber: 4, urduDate: "4 रमज़ान", englishDate: "22-02-2026", day: "इतवार", sehriTime: "05:37 AM", iftarTime: "06:41 PM" },
  { rozaNumber: 5, urduDate: "5 रमज़ान", englishDate: "23-02-2026", day: "पीर", sehriTime: "05:36 AM", iftarTime: "06:41 PM" },
  { rozaNumber: 6, urduDate: "6 रमज़ान", englishDate: "24-02-2026", day: "मंगल", sehriTime: "05:36 AM", iftarTime: "06:42 PM" },
  { rozaNumber: 7, urduDate: "7 रमज़ान", englishDate: "25-02-2026", day: "बुध", sehriTime: "05:35 AM", iftarTime: "06:42 PM" },
  { rozaNumber: 8, urduDate: "8 रमज़ान", englishDate: "26-02-2026", day: "जुमेरात", sehriTime: "05:35 AM", iftarTime: "06:42 PM" },
  { rozaNumber: 9, urduDate: "9 रमज़ान", englishDate: "27-02-2026", day: "जुमा", sehriTime: "05:34 AM", iftarTime: "06:43 PM" },
  { rozaNumber: 10, urduDate: "10 रमज़ान", englishDate: "28-02-2026", day: "शनिचर", sehriTime: "05:33 AM", iftarTime: "06:43 PM" },
  { rozaNumber: 11, urduDate: "11 रमज़ान", englishDate: "01-03-2026", day: "इतवार", sehriTime: "05:33 AM", iftarTime: "06:43 PM" },
  { rozaNumber: 12, urduDate: "12 रमज़ान", englishDate: "02-03-2026", day: "पीर", sehriTime: "05:32 AM", iftarTime: "06:44 PM" },
  { rozaNumber: 13, urduDate: "13 रमज़ान", englishDate: "03-03-2026", day: "मंगल", sehriTime: "05:32 AM", iftarTime: "06:44 PM" },
  { rozaNumber: 14, urduDate: "14 रमज़ान", englishDate: "04-03-2026", day: "बुध", sehriTime: "05:31 AM", iftarTime: "06:44 PM" },
  { rozaNumber: 15, urduDate: "15 रमज़ान", englishDate: "05-03-2026", day: "जुमेरात", sehriTime: "05:30 AM", iftarTime: "06:44 PM" },
  { rozaNumber: 16, urduDate: "16 रमज़ान", englishDate: "06-03-2026", day: "जुमा", sehriTime: "05:30 AM", iftarTime: "06:45 PM" },
  { rozaNumber: 17, urduDate: "17 रमज़ान", englishDate: "07-03-2026", day: "शनिचर", sehriTime: "05:29 AM", iftarTime: "06:45 PM" },
  { rozaNumber: 18, urduDate: "18 रमज़ान", englishDate: "08-03-2026", day: "इतवार", sehriTime: "05:28 AM", iftarTime: "06:45 PM" },
  { rozaNumber: 19, urduDate: "19 रमज़ान", englishDate: "09-03-2026", day: "पीर", sehriTime: "05:28 AM", iftarTime: "06:45 PM" },
  { rozaNumber: 20, urduDate: "20 रमज़ान", englishDate: "10-03-2026", day: "मंगल", sehriTime: "05:27 AM", iftarTime: "06:45 PM" },
  { rozaNumber: 21, urduDate: "21 रमज़ान", englishDate: "11-03-2026", day: "बुध", sehriTime: "05:26 AM", iftarTime: "06:46 PM" },
  { rozaNumber: 22, urduDate: "22 रमज़ान", englishDate: "12-03-2026", day: "जुमेरात", sehriTime: "05:25 AM", iftarTime: "06:46 PM" },
  { rozaNumber: 23, urduDate: "23 रमज़ान", englishDate: "13-03-2026", day: "जुमा", sehriTime: "05:25 AM", iftarTime: "06:46 PM" },
  { rozaNumber: 24, urduDate: "24 रमज़ान", englishDate: "14-03-2026", day: "शनिचर", sehriTime: "05:24 AM", iftarTime: "06:46 PM" },
  { rozaNumber: 25, urduDate: "25 रमज़ान", englishDate: "15-03-2026", day: "इतवार", sehriTime: "05:23 AM", iftarTime: "06:47 PM" },
  { rozaNumber: 26, urduDate: "26 रमज़ान", englishDate: "16-03-2026", day: "पीर", sehriTime: "05:22 AM", iftarTime: "06:47 PM" },
  { rozaNumber: 27, urduDate: "27 रमज़ान", englishDate: "17-03-2026", day: "मंगल", sehriTime: "05:22 AM", iftarTime: "06:47 PM" },
  { rozaNumber: 28, urduDate: "28 रमज़ान", englishDate: "18-03-2026", day: "बुध", sehriTime: "05:21 AM", iftarTime: "06:47 PM" },
  { rozaNumber: 29, urduDate: "29 रमज़ान", englishDate: "19-03-2026", day: "जुमेरात", sehriTime: "05:20 AM", iftarTime: "06:47 PM" },
  { rozaNumber: 30, urduDate: "30 रमज़ान", englishDate: "20-03-2026", day: "जुमा", sehriTime: "05:19 AM", iftarTime: "06:47 PM" },
];

function parseDate(s) { const [d, m, y] = s.split("-").map(Number); return new Date(y, m - 1, d); }
function parseTime(s) { const [t, p] = s.split(" "); let [h, m] = t.split(":").map(Number); if (p === "PM" && h !== 12) h += 12; if (p === "AM" && h === 12) h = 0; return { h, m }; }
function pad(n) { return String(n).padStart(2, "0"); }

function getTodayIndex() {
  const today = new Date(); today.setHours(0, 0, 0, 0);
  return ramadanData.findIndex(r => { const d = parseDate(r.englishDate); d.setHours(0, 0, 0, 0); return d.getTime() === today.getTime(); });
}

function timeToDate(dateStr, timeStr) {
  const base = parseDate(dateStr); const { h, m } = parseTime(timeStr);
  base.setHours(h, m, 0, 0); return base;
}

function calcDiff(target, now) {
  const diff = target.getTime() - now.getTime();
  if (diff <= 0) return { h: 0, m: 0, s: 0, passed: true };
  const ts = Math.floor(diff / 1000);
  return { h: Math.floor(ts / 3600), m: Math.floor((ts % 3600) / 60), s: ts % 60, passed: false };
}

function shareOnWhatsApp() {
  const idx = getTodayIndex();
  let text = "🌙 रमज़ान टाइम टेबल 2026 / 1447 हिजरी\n\n";
  if (idx >= 0) {
    const r = ramadanData[idx];
    text += `आज रोज़ा नंबर ${r.rozaNumber}\n`;
    text += `📅 ${r.urduDate} | ${r.englishDate} | ${r.day}\n`;
    text += `🌙 सहरी: ${r.sehriTime}\n`;
    text += `☀️ इफ़्तार: ${r.iftarTime}\n\n`;
  }
  text += "👉 " + window.location.origin;
  window.open("https://wa.me/?text=" + encodeURIComponent(text), "_blank");
}

function shareNative() {
  const idx = getTodayIndex();
  let text = "🌙 रमज़ान टाइम टेबल 2026\n";
  if (idx >= 0) {
    const r = ramadanData[idx];
    text += `रोज़ा ${r.rozaNumber} | सहरी: ${r.sehriTime} | इफ़्तार: ${r.iftarTime}`;
  }
  if (navigator.share) {
    navigator.share({ title: "रमज़ान टाइम टेबल 2026", text, url: window.location.origin });
  } else {
    navigator.clipboard.writeText(text + "\n" + window.location.origin);
    alert("लिंक कॉपी हो गया!");
  }
}

// PWA Install Logic
let deferredPrompt;
window.addEventListener('beforeinstallprompt', (e) => {
  e.preventDefault();
  deferredPrompt = e;
  const installBtns = document.querySelectorAll('.install-btn');
  installBtns.forEach(btn => btn.style.display = 'inline-flex');
});

async function installPWA() {
  if (!deferredPrompt) return;
  deferredPrompt.prompt();
  const { outcome } = await deferredPrompt.userChoice;
  if (outcome === 'accepted') {
    const installBtns = document.querySelectorAll('.install-btn');
    installBtns.forEach(btn => btn.style.display = 'none');
  }
  deferredPrompt = null;
}
