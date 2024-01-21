import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
import Editor from '@toast-ui/editor'
import Swal from 'sweetalert2'
import '@toast-ui/editor/dist/toastui-editor.css';
import { initializeApp } from "firebase/app";
import { getAnalytics } from "firebase/analytics";

// or via CommonJS
window.Alpine = Alpine;
window.Swal = Swal;
Alpine.plugin(focus);

Alpine.start();
const firebaseConfig = {
  apiKey: "AIzaSyDywk9FvnyRER8-AHDixwVZznnHQ-6d6vQ",
  authDomain: "t9chnih-490a6.firebaseapp.com",
  projectId: "t9chnih-490a6",
  storageBucket: "t9chnih-490a6.appspot.com",
  messagingSenderId: "914780328481",
  appId: "1:914780328481:web:e52ba08ae329db648cc960",
  measurementId: "G-B5Q3E5F570"
};

// Initialize Firebase
const firebaseApp = initializeApp(firebaseConfig);
const analytics = getAnalytics(firebaseApp);
const editor = new Editor ({
	el: document.querySelector('#editor'),
	height: '400px',
  initialEditType: 'markdown',
  placeholder: 'اكتب شيئًا مفيدًا',
});
Livewire.on('getContent', () => {
  const content = editor.getMarkdown();
  document.querySelector('#content').value = content;
  Livewire.emit('store', content);
  editor.setMarkdown(''); 
});
Livewire.on('getUpdatedContent', () => {
  const content = editor.getMarkdown();
  document.querySelector('#editContent').value = content;
  Livewire.emit('updateBlog', content);
  editor.setMarkdown(''); 
});
Livewire.on('setBlogContent', $blogContent => {
    editor.setMarkdown($blogContent); 
    document.querySelector('#editContent').value = $blogContent;
});

