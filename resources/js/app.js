import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
import { persist } from '@alpinejs/persist';
import Editor from '@toast-ui/editor'
import Swal from 'sweetalert2'
import '@toast-ui/editor/dist/toastui-editor.css';
import { initializeApp } from "firebase/app";
import { getAnalytics } from "firebase/analytics";

// or via CommonJS
window.Alpine = Alpine;
window.Swal = Swal;
Alpine.plugin(focus);
Alpine.plugin(persist);

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
Livewire.on('localeChanged', () => {
      window.location.reload();
});
// Initialize Firebase
const firebaseApp = initializeApp(firebaseConfig);
const analytics = getAnalytics(firebaseApp);

const isEditor = document.querySelector('#editor');
if (isEditor) {
  const editor = new Editor ({
    el: document.querySelector('#editor'),
    height: '600px',
    initialEditType: 'markdown',
    placeholder: 'اكتب شيئًا مفيدًا',
  });
  window.contentEditor = editor;
  
  editor.on('change', () => {
    const content = editor.getMarkdown();
    // Dispatch a custom event with the content
    window.dispatchEvent(new CustomEvent('editorContentChanged', { detail: { content } }));
  });
  Livewire.on('getContent', () => {
    const content = editor.getMarkdown();
    document.querySelector('#content').value = content;
    Livewire.emit('store', content);
    // const savedData = localStorage.getItem('blogFormData');
    // Livewire.emit('store', JSON.parse(savedData));
    
  });
  // Livewire.on('getUpdatedContent', () => {
  //   const content = editor.getMarkdown();
  //   document.querySelector('#editContent').value = content;
  //   Livewire.emit('updateBlog', content);
  //   editor.setMarkdown(''); 
  // });
  // Livewire.on('setBlogContent', $blogContent => {
  //     editor.setMarkdown($blogContent); 
  //     document.querySelector('#editContent').value = $blogContent;
  // });
}



Livewire.on('removeLocalStorage', () => {
  localStorage.removeItem('blogTitle');
  localStorage.removeItem('blogHashtags');
  localStorage.removeItem('blogCategory');
  localStorage.removeItem('blogLanguage');
  localStorage.removeItem('blogReadingTime');
  localStorage.removeItem('blogContent');
});
Livewire.on('removeBlogEditLocalStorage', () => {
  localStorage.removeItem('_x_editTitle');
  localStorage.removeItem('_x_editHashtags');
  localStorage.removeItem('_x_editCategory');
  localStorage.removeItem('_x_editLanguage');
  localStorage.removeItem('_x_editReadingTime');
  localStorage.removeItem('_x_editContent');
  localStorage.removeItem('blogTitleEdit');
  localStorage.removeItem('blogHashtagsEdit');
  localStorage.removeItem('blogCategoryEdit');
  localStorage.removeItem('blogLanguageEdit');
  localStorage.removeItem('blogReadingTimeEdit');
  localStorage.removeItem('blogContentEdit');
  window.location.reload();
});