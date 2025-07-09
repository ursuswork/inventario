
const CACHE_NAME = 'inventario-cache-v1';
const urlsToCache = [
  '/',
  '/index.php',
  '/manifest.json',
  '/icon-192.png',
  '/icon-512.png',
  '/bootstrap.min.css',
  '/bootstrap.bundle.min.js'
];

// ✅ Instalación del Service Worker
self.addEventListener('install', function(event) {
  event.waitUntil(
    caches.open(CACHE_NAME).then(function(cache) {
      console.log('📦 Archivos en caché');
      return cache.addAll(urlsToCache);
    })
  );
  self.skipWaiting();
  console.log('✅ Service Worker instalado');
});

// ✅ Activación
self.addEventListener('activate', function(event) {
  event.waitUntil(
    caches.keys().then(function(cacheNames) {
      return Promise.all(
        cacheNames.filter(function(cacheName) {
          return cacheName !== CACHE_NAME;
        }).map(function(cacheName) {
          return caches.delete(cacheName);
        })
      );
    })
  );
  console.log('⚙️ Service Worker activado');
});

// ✅ Interceptar peticiones
self.addEventListener('fetch', function(event) {
  event.respondWith(
    caches.match(event.request)
      .then(function(response) {
        return response || fetch(event.request);
      })
  );
});
