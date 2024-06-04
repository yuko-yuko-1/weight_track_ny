const buttonOpen = document.getElementsByIdName('modalOpen')[0];
const modal = document.getElementsByIdName('editModal')[0];
const buttonClose = document.getElementsByIdName('modalClose')[0];
const body = document.getElementsByTagName('body')[0];

// ボタンがクリックされた時
buttonOpen.addEventListener('click', function(){
  modal.style.display = 'block';
  body.classList.add('open');
});


// cancelがクリックされた時
buttonClose.addEventListener('click',function(){
  modal.style.display = 'none';
  body.classList.remove('open');
});

// モーダルコンテンツ以外がクリックされた時
modal.addEventListener('click', function(){
    modal.style.display = 'none';
    body.classList.remove('open');
});
