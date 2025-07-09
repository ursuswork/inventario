self.addEventListener("install", function (e) {
  console.log("Service Worker instalado");
});

self.addEventListener("fetch", function (e) {
  // Se puede personalizar para cache offline
});
