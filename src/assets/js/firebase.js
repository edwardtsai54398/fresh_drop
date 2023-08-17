// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
// import { getFirestore, collection } from 'firebase/firestore'
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyBihLswe4QC0MgaO15T_3n8NnFfNA4hG8c",
  authDomain: "freshdrop-4953e.firebaseapp.com",
  projectId: "freshdrop-4953e",
  storageBucket: "freshdrop-4953e.appspot.com",
  messagingSenderId: "85818624080",
  appId: "1:85818624080:web:3dc645ba35808824a72955",
  measurementId: "G-V7TBWZBPME"
};

export const firebaseApp = initializeApp(firebaseConfig)

// const db = getFirestore(firebaseApp)

// export const todosRef = collection(db, 'todos')

// Initialize Firebase
// const app = initializeApp(firebaseConfig);
// const analytics = getAnalytics(app);