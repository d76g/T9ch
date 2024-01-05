import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
import Editor from '@toast-ui/editor'
import Swal from 'sweetalert2'
import '@toast-ui/editor/dist/toastui-editor.css';

// or via CommonJS
window.Alpine = Alpine;
window.Swal = Swal;
Alpine.plugin(focus);

Alpine.start();
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

