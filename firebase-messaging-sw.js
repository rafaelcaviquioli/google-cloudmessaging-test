importScripts('https://www.gstatic.com/firebasejs/3.6.3/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/3.6.3/firebase-messaging.js');

var config = {
    apiKey: "AIzaSyC7DCWjtu-b0J4qCg5cm09ySRJwKsAKqJo",
    authDomain: "siganet-2ebe0.firebaseapp.com",
    databaseURL: "https://siganet-2ebe0.firebaseio.com",
    storageBucket: "siganet-2ebe0.appspot.com",
    messagingSenderId: "921905752716"
};
firebase.initializeApp(config);

const messaging = firebase.messaging();

messaging.setBackgroundMessageHandler(function(playload){
    const title = 'Hello Word';
    const options = {
        body: playload.data.body
    };

    return self.registration.showNotification(title, options);
});