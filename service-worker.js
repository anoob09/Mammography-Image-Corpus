/* global self, caches, Promise */

// https://developers.google.com/web/fundamentals/primers/service-workers/
// chrome: chrome://inspect/#service-workers

var CACHE_NAME = 'dwv-jqui-cache-v1';
var urlsToCache = [
    './',
    // css
    './css/style.css',
    // js
    './src/applauncher.js',
    './src/appgui.js',
    // images
    './resources/icons/dwv-16.png',
    './resources/icons/dwv-32.png',
    './resources/icons/dwv-64.png',
    './resources/icons/dwv-128.png',
    './resources/icons/dwv-256.png',
    './resources/help/click.png',
    './resources/help/double_click.png',
    './resources/help/mouse_drag.png',
    './resources/help/mouse_wheel.png',
    // translations
    './node_modules/dwv/locales/de/translation.json',
    './node_modules/dwv/locales/en/translation.json',
    './node_modules/dwv/locales/es/translation.json',
    './node_modules/dwv/locales/fr/translation.json',
    './node_modules/dwv/locales/it/translation.json',
    './node_modules/dwv/locales/jp/translation.json',
    './node_modules/dwv/locales/ru/translation.json',
    './node_modules/dwv/locales/zh/translation.json',
    // overlays
    './node_modules/dwv/locales/de/overlays.json',
    './node_modules/dwv/locales/en/overlays.json',
    './node_modules/dwv/locales/es/overlays.json',
    './node_modules/dwv/locales/fr/overlays.json',
    './node_modules/dwv/locales/it/overlays.json',
    './node_modules/dwv/locales/jp/overlays.json',
    './node_modules/dwv/locales/ru/overlays.json',
    './node_modules/dwv/locales/zh/overlays.json',

    // third party

    // css
    './ext/jquery-ui/themes/ui-darkness/jquery-ui-1.12.1.min.css',
    './ext/jquery-ui/themes/ui-darkness/images/ui-bg_glass_20_555555_1x400.png',
    './ext/jquery-ui/themes/ui-darkness/images/ui-bg_glass_40_0078a3_1x400.png',
    './ext/jquery-ui/themes/ui-darkness/images/ui-bg_glass_40_ffc73d_1x400.png',
    './ext/jquery-ui/themes/ui-darkness/images/ui-bg_gloss-wave_25_333333_500x100.png',
    './ext/jquery-ui/themes/ui-darkness/images/ui-bg_highlight-soft_80_eeeeee_1x100.png',
    './ext/jquery-ui/themes/ui-darkness/images/ui-bg_inset-soft_25_000000_1x100.png',
    './ext/jquery-ui/themes/ui-darkness/images/ui-bg_inset-soft_30_f58400_1x100.png',
    './ext/jquery-ui/themes/ui-darkness/images/ui-icons_222222_256x240.png',
    './ext/jquery-ui/themes/ui-darkness/images/ui-icons_4b8e0b_256x240.png',
    './ext/jquery-ui/themes/ui-darkness/images/ui-icons_a83300_256x240.png',
    './ext/jquery-ui/themes/ui-darkness/images/ui-icons_cccccc_256x240.png',
    './ext/jquery-ui/themes/ui-darkness/images/ui-icons_ffffff_256x240.png',
    // js: dwv
    './node_modules/dwv/dist/dwv.min.js',
    './node_modules/i18next/i18next.min.js',
    './node_modules/i18next-xhr-backend/i18nextXHRBackend.min.js',
    './node_modules/i18next-browser-languagedetector/i18nextBrowserLanguageDetector.min.js',
    './node_modules/jszip/dist/jszip.min.js',
    './node_modules/konva/konva.min.js',
    './node_modules/magic-wand-js/js/magic-wand-min.js',
    // js: viewer
    './node_modules/jquery/dist/jquery.min.js',
    './ext/jquery-ui/jquery-ui-1.12.1.min.js',
    './ext/flot/jquery.flot.min.js',
    // js: decoders
    './node_modules/dwv/decoders/pdfjs/jpx.js',
    './node_modules/dwv/decoders/pdfjs/arithmetic_decoder.js',
    './node_modules/dwv/decoders/pdfjs/decode-jpeg2000.js',
    './node_modules/dwv/decoders/pdfjs/util.js',
    './node_modules/dwv/decoders/pdfjs/jpg.js',
    './node_modules/dwv/decoders/pdfjs/decode-jpegbaseline.js',
    './node_modules/dwv/decoders/rii-mango/lossless-min.js',
    './node_modules/dwv/decoders/rii-mango/decode-jpegloss.js'
    ];

// install
self.addEventListener('install', function (event) {
    // Perform install steps
    event.waitUntil(
        caches.open(CACHE_NAME).then( function (cache) {
            return cache.addAll(urlsToCache);
        })
    );
});

// fetch
self.addEventListener('fetch', function (event) {
    event.respondWith(
        caches.match(event.request).then( function (response) {
            // Cache hit - return response
            if (response) {
                //console.log('Return form cache', event.request.url);
                return response;
            }
            return fetch(event.request);
        })
    );
});

// activate
self.addEventListener('activate', function (event) {

    var cacheWhitelist = [CACHE_NAME];

    event.waitUntil(
        caches.keys().then(function (cacheNames) {
            return Promise.all(
                cacheNames.map(function (cacheName) {
                    if (cacheWhitelist.indexOf(cacheName) === -1) {
                        console.log('Delete cache: '+cacheName);
                        return caches.delete(cacheName);
                    }
                })
            );
        })
    );
});
