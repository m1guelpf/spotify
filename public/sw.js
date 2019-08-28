self.addEventListener('install', event => {
    this.skipWaiting();
});

// Clear cache on activate
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames.map(cacheName => caches.delete(cacheName))
            );
        })
    );
});

self.addEventListener('fetch', event => {
    event.respondWith(
        caches.open('spotify-dynamic').then(cache => {
            return fetch(event.request).then(response => {
                cache.put(event.request, response.clone());

                return response;
            }).catch(() => {
                return cache.match(event.request);
            });
        })
    )
});
