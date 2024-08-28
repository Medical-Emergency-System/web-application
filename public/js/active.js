// window.addEventListener('load', e => {
//     registerSW(); 
//   });


//   async function registerSW() { 
//     if ('serviceWorker' in navigator) { 
//       try {
//         await navigator.serviceWorker.register('./sw.js'); 
//       } catch (e) {
//         alert('ServiceWorker registration failed. Sorry about that.'); 
//       }
//     } else {
//       document.querySelector('.alert').removeAttribute('hidden'); 
//     }
//   }



// async function registerSW(){
//   if ('serviceWorker' in navigator) {
//     navigator.serviceWorker.register('sw.js?v2', {
//         scope: './emergency' // <--- THIS BIT IS REQUIRED
//     }).then(function(registration) {
//         // Registration was successful
//         console.log('ServiceWorker registration successful with scope: ', registration.scope);
//     }, function(err) {
//         // registration failed :(
//         console.log('ServiceWorker registration failed: ', err);
//     });
// }
// }

// self.addEventListener('install', (e) => {
//     console.log('[Service Worker] Install');
//   });




if ('serviceWorker' in navigator) {
    // Use the window load event to keep the page load performant
    window.addEventListener('load', () => {
      navigator.serviceWorker.register('./sw.js');
    });
  }
