self.addEventListener('install', function(event) {
  console.log('✅ Service Worker instalado');
});

self.addEventListener('fetch', function(event) {
  // No hace nada especial todavía, solo deja pasar
});
