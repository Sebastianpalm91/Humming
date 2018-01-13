const deleteAccount = document.querySelector('.deleteAccount');
const cancelDelete = document.querySelector('.cancelDelete');
const pointerEvents = document.querySelector('.pointerEvents');

deleteAccount.addEventListener('click', () => {
  pointerEvents.style.pointerEvents = "none";
  const deleteConfirm = document.querySelector('.deleteConfirm');
  const body = document.querySelector('body');
  deleteConfirm.style.display = "block";
  document.body.style.backgroundColor = "rgba(36, 36, 36, 0.54)";
})

cancelDelete.addEventListener('click', () => {
  const deleteConfirm = document.querySelector('.deleteConfirm');
  const body = document.querySelector('body');
  deleteConfirm.style.display = "none";
  document.body.style.backgroundColor = "";
  pointerEvents.style.pointerEvents = "";
})
