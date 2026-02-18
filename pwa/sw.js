const CACHE_NAME = "ramadan-v6-php";
const ASSETS = [
  "../",
  "../dua",
  "../surah",
  "../tasbih",
  "../about",
  "../style.css?v=1",
  "../data.js",
  "./manifest.json",
  "./favicon.png",
  "./pwa-192x192.png",
  "./pwa-512x512.png"
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
  // Stale-while-revalidate strategy for HTML pages ensuring fresh content
  if (e.request.destination === 'document') {
    e.respondWith(
      fetch(e.request).then((networkResponse) => {
        return caches.open(CACHE_NAME).then((cache) => {
          cache.put(e.request, networkResponse.clone());
          return networkResponse;
        });
      }).catch(() => {
        return caches.match(e.request);
      })
    );
  } else {
    // Cache-first for other assets
    e.respondWith(
      caches.match(e.request).then((cached) => cached || fetch(e.request))
    );
  }
});
