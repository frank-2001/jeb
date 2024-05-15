// Cache infos
const VERSION_APP = "1"
const VERSION_FILES="?version=5a"
const NAME_APP="JEB"
// if (location.host=="localhost") {
//     dir=dir+"laloca/"
// }
const STATIC_CACHE_URLS = [
    "/",
    "index.html",
    "/src/css/style.css",
    "/src/css/responsive.css",
    "/src/css/home.css",
    "/src/css/articles.css",
    "/src/css/admin.css",
    "/src/css/profil.css",
    "/src/css/user.css",
    "/src/js/lacrea.js",
    "/src/js/home.js",
    "/src/js/fx.js",
    "/src/js/server.js",
    "/src/js/localStorage.js",
    "/src/js/jquery.min.js",
    "/apps/home/index.html",
    "/apps/produits/index.html",
    "/apps/profile/admin.html",
    "/apps/profile/user.html"
    
];
STATIC_CACHE_URLS.forEach((url,i) => {
    if (url!="/" && url!="index.html" && url!="/src/js/jquery.min.js") {
        STATIC_CACHE_URLS[i]=url+VERSION_FILES        
    }
});
STATIC_CACHE_URLS.push("/src/images/assets/jeb17.webp","/src/images/assets/jeb22.webp","/src/images/assets/jeb32.webp")
// PWA Installation
self.addEventListener("install", event => {
    console.log("Service Worker installing version : " + VERSION_APP);
    self.skipWaiting();
    caches.delete(VERSION_APP)
    event.waitUntil(
        caches.open(VERSION_APP).then(cache => cache.addAll(STATIC_CACHE_URLS))
    );
});

self.addEventListener("activate", event => {
    console.log("Service Worker Activation version :" + VERSION_APP);
    clients.claim();
    // delete any unexpected caches
    event.waitUntil(
        caches
            .keys()
            .then(keys => keys.filter(key => key !== VERSION_APP))
            .then(keys =>
                Promise.all(
                    keys.map(key => {
                        console.log(`Deleting cache ${key}`);
                        return  caches.delete(key);
                    })
                )
            )
    );

})

self.addEventListener("fetch", event => {
    // console.log(event.request.url);
    // caches.match(event.request).then(response => {  
    //     // return response
    //     console.log(response);
    // }).catch(e=>{
    //     console.log("No req in the cache");
    // })
    // return fetch(event.request)
    // console.log();
    event.respondWith(
        caches.match(event.request).then(response => { 
            // console.log(event.request.destination,event.request.url);
            return  response || fetch(event.request)
        }).catch(e=>{
            // console.log(e);
        })
        // console.log("no cache"),
    );
    // event.respondWith()

});
self.addEventListener('push', event => {
    // console.log(JSON.parse(event.data.text()));
    // payload
    // {"title":"Title","body":"body testing push notif","url":"/" }
    const data = JSON.parse(event.data.text())
    // console.log(data);
    const options = {
        body: data.body,
        icon: 'src/img/icon512x512.png',
        image: data.image,
        data: {
            notifURL: data.url
        }
    };
    event.waitUntil(self.registration.showNotification(data.title, options));
    
});
self.addEventListener('notificationclick', event => {
    event.notification.close();
    event.waitUntil(
        clients.openWindow(event.notification.data.notifURL)
    );
});