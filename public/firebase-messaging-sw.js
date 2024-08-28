importScripts('https://www.gstatic.com/firebasejs/8.0.1/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.0.1/firebase-messaging.js'); // eslint-disable-line
// Initialize the Firebase app in the service worker by passing in the
// messagingSenderId.
const firebaseConfig = {
  apiKey: "AIzaSyAFTvUaQrxUeihZfDierwaT-In6bgkWgQI",
  authDomain: "baby-vaccine-app-e10e7.firebaseapp.com",
  projectId: "baby-vaccine-app-e10e7",
  storageBucket: "baby-vaccine-app-e10e7.appspot.com",
  messagingSenderId: "341485009197",
  appId: "1:341485009197:web:128da6195e0ac01e1c3ba4",
  measurementId: "G-FJ8D88Z9F9"
};
firebase.initializeApp(firebaseConfig);
const messaging = firebase.messaging();

messaging.setBackgroundMessageHandler(function(payload) {
    console.log('[firebase-messaging-sw.js] Received background message ', payload);
    // Customize notification here
    const notificationTitle = 'Background Message Title';
    const notificationOptions = {
      body: 'Background Message body.'
    };
  
    return self.registration.showNotification(notificationTitle,
        notificationOptions);
  });