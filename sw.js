// Cache infos
const VERSION_APP = "1.2";
const NAME_APP = "JEB";
const STATIC_CACHE_URLS = ["404.html"];
// PWA Installation
self.addEventListener("install", (event) => {
  console.log("Service Worker installing version : " + VERSION_APP);
  self.skipWaiting();
  caches.delete(VERSION_APP);
  event.waitUntil(
    caches.open(VERSION_APP).then((cache) => cache.addAll(STATIC_CACHE_URLS))
  );
});

self.addEventListener("activate", (event) => {
  console.log("Service Worker Activation version :" + VERSION_APP);
  clients.claim();
  // delete any unexpected caches
  event.waitUntil(
    caches
      .keys()
      .then((keys) => keys.filter((key) => key !== VERSION_APP))
      .then((keys) =>
        Promise.all(
          keys.map((key) => {
            console.log(`Deleting cache ${key}`);
            return caches.delete(key);
          })
        )
      )
  );
});

self.addEventListener("fetch", (event) => {
  event.respondWith(
    fetch(event.request)
      .then((res) => {
        if (res.status == 404) {
          return caches.match("404.html");
        }
        return res;
      })
      .catch((err) => {
        return caches.match("404.html");
        return caches
          .match(event.request)
          .then((res) => {
            return res;
          })
          .catch((err) => {
            return caches.match("404.html");
          });
      })
  );
  // event.respondWith()
});
self.addEventListener("push", (event) => {
  const data = JSON.parse(event.data.text());
  const options = {
    body: data.body,
    icon: "src/images/assets/jeb24.webp",
    image: data.image,
    data: {
      notifURL: data.url,
    },
    badge: "icon.png",
  };
  event.waitUntil(self.registration.showNotification(data.title, options));
});
self.addEventListener("notificationclick", (event) => {
  event.notification.close();
  event.waitUntil(clients.openWindow(event.notification.data.notifURL));
});
