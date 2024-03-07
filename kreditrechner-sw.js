// Dateiname: sw.js
self.addEventListener('install', function(event) {
    event.waitUntil(
        caches.open('my-cache').then(function(cache) {
            return cache.addAll([
                '/',
                '/kreditrechner.html',
                '/qrcode.min.js',
                '/vue@2.js',
                '/assets/icons/apple-touch-icon-144x144.png?v=2',
                '/assets/icons/apple-touch-icon-152x152-precomposed.png?v=2',
                '/assets/icons/apple-touch-icon-152x152.png?v=2',
                '/assets/icons/apple-touch-icon-180x180-precomposed.png?v=2',
                '/assets/icons/apple-touch-icon-180x180.png?v=2',
                '/assets/icons/apple-touch-icon-57x57-precomposed.png?v=2',
                '/assets/icons/apple-touch-icon-57x57.png?v=2',
                '/assets/icons/apple-touch-icon-60x60-precomposed.png?v=2',
                '/assets/icons/apple-touch-icon-60x60.png?v=2',
                '/assets/icons/apple-touch-icon-72x72-precomposed.png?v=2',
                '/assets/icons/apple-touch-icon-72x72.png?v=2',
                '/assets/icons/apple-touch-icon-76x76-precomposed.png?v=2',
                '/assets/icons/apple-touch-icon-76x76.png?v=2',
                '/assets/icons/apple-touch-icon-precomposed.png?v=2',
                '/assets/icons/apple-touch-icon.png?v=2',
                '/assets/icons/browserconfig.xml?v=2',
                '/assets/icons/favicon-16x16.png?v=2',
                '/assets/icons/favicon-32x32.png?v=2',
                '/assets/icons/favicon.ico?v=2',
                '/assets/icons/html_code.html?v=2',
                '/assets/icons/mstile-144x144.png?v=2',
                '/assets/icons/mstile-150x150.png?v=2',
                '/assets/icons/mstile-310x150.png?v=2',
                '/assets/icons/mstile-310x310.png?v=2',
                '/assets/icons/mstile-70x70.png?v=2',
                '/assets/icons/safari-pinned-tab.svg?v=2',
                '/assets/icons/site.webmanifest?v=2',
                '/assets/icons/android-chrome-192x192.png?v=2',
                '/assets/icons/android-chrome-512x512.png?v=2',
                '/assets/icons/apple-touch-icon-114x114-precomposed.png?v=2',
                '/assets/icons/apple-touch-icon-114x114.png?v=2',
                '/assets/icons/apple-touch-icon-120x120-precomposed.png?v=2',
                '/assets/icons/apple-touch-icon-120x120.png?v=2',
                '/assets/icons/apple-touch-icon-144x144-precomposed.png?v=2'
        ]);
        })
    );
});

self.addEventListener('fetch', function(event) {
    event.respondWith(
        caches.match(event.request).then(function(response) {
            return response || fetch(event.request);
        })
    );
});