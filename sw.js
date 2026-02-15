const CACHE_NAME = "ramadan-v2";
const ASSETS = [
  "/plain/index.html",
  "/plain/dua.html",
  "/plain/surah.html",
  "/plain/tasbih.html",
  "/plain/about.html",
  "/plain/style.css",
  "/plain/data.js",
  "/plain/manifest.json",
  "/plain/favicon.png",
  "/plain/pwa-192x192.png",
  "/plain/pwa-512x512.png"
];

self.addEventListener("install", (e) => {
  e.waitUntil(caches.open(CACHE_NAME).then((cache) => cache.addAll(ASSETS)));
  self.skipWaiting();
});

self.addEventListener("activate", (e) => {
  e.waitUntil(
    caches.keys().then((keys) =>
      Promise.all(keys.filter((k) => k !== CACHE_NAME).map((k) => caches.delete(k)))
    )
  );
  self.clients.claim();
});

self.addEventListener("fetch", (e) => {
  e.respondWith(
    caches.match(e.request).then((cached) => cached || fetch(e.request))
  );
});
