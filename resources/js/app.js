import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
import Editor from '@toast-ui/editor'
import '@toast-ui/editor/dist/toastui-editor.css';
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();

const editor = new Editor ({
	el: document.querySelector('#editor'),
	height: '400px',
  initialEditType: 'markdown',
  placeholder: 'اكتب شيئًا مفيدًا',
});

Livewire.on('getContent', () => {
    const content =  document.querySelector('#content').value = editor.getMarkdown();
    Livewire.emit('store', content);
    editor.getMarkdown = '';
})