// Indicamos que durante el proceso de instalación
self.addEventListener('install', evento => {
    /* Promesa que crea el proceso de creación del espacio
    en la caché y agrega los archivos necesarios para cargar nuestra
    aplicación */
    const promesa = caches.open('cache-1')
      .then(cache => {
        return cache.addAll([
          '/',
          'index.html',
          'css/styles.css',
          'css/bootstrap.css',
          'css/fontawesome-all.css',
          'css/magnific-popup.css',
          'css/swiper.css',
          'js/app.js'
        ]);
      });
    // Indicamos que la instalación espere hasta que la promesa se cumpla
    evento.waitUntil(promesa);
  });
  