// For Firebase JS SDK v7.20.0 and later, measurementId is optional
var firebaseConfig = {
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
  messaging.requestPermission()
        .then(function(){
            console.log('permission');
            return messaging.getToken()
        }).then(function(token){
            // $('#device_token').val(token);
            console.log(token)
            fd = new FormData();

            fd.append('token',token)
            $.ajax("update_token", 
            {
                type:'POST', 
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: fd,    
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function (res) {   // success callback function
                    console.log(res)
                },
                error: function (jqXhr, textStatus, errorMessage) { // error callback 
                  console.log(jqXhr.responseText);
                }
            });
        }).catch(function(err){
            console.log('error ',err);
        })



        messaging.onMessage((payload) => {
            console.log('Message received. ', payload);
            document.getElementById('title').innerHTML = payload.notification.title;
            document.getElementById('body').innerHTML = payload.notification.body;

          });