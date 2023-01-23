// const editTagForm =document.forms.editTagForm;

// const deleteTagForm =document.forms.deleteTagForm;

// const deleteMessage =document.getElementById('deleteTagModalLabel');

// document.getElementById('editTagModal').addEventListener('show.bs.modal', (event)=>{
//   let tagButton = event.relatedTarget;
//   let tagId = tagButton.dataset.tagId;
//   let TagName = tagButton.dataset.tagName;
//   editTagForm.action = `tags/${tagId}`;
//   editTagForm.name.value = TagName;
// });

// document.getElementById('deleteTagModal').addEventListener('show.bs.modal', (event)=>{
//   let deleteButton = event.relatedTarget;
//   let tagId = deleteButton.dataset.tagId;
//   let tagName = deleteButton.dataset.tagName;

//   deleteTagForm.action = `tags/${tagId}`;
//   deleteMessage.textContent =`${tagName}を削除しますか？`;
// });

const editTagForm = document.forms.editTagForm;
 
 // タグの削除用フォーム
 const deleteTagForm = document.forms.deleteTagForm;
 
 // 削除の確認メッセージ
 const deleteMessage = document.getElementById('deleteTagModalLabel');
 
 // タグの編集用モーダルを開くときの処理
 document.getElementById('editTagModal').addEventListener('show.bs.modal', (event) => {
   let tagButton = event.relatedTarget;
   let tagId = tagButton.dataset.tagId;
   let tagName = tagButton.dataset.tagName;
 
   editTagForm.action = `tags/${tagId}`;
   editTagForm.name.value = tagName;
 });
 
 // タグの削除用モーダルを開くときの処理
 document.getElementById('deleteTagModal').addEventListener('show.bs.modal', (event) => {
   let deleteButton = event.relatedTarget;
   let tagId = deleteButton.dataset.tagId;
   let tagName = deleteButton.dataset.tagName;
 
   deleteTagForm.action = `tags/${tagId}`;
   deleteMessage.textContent = `「${tagName}」を削除してもよろしいですか？`
 });