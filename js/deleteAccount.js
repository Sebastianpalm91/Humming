// Double confirm if user wants to delete the account
const deleteAccount = document.querySelector('.deleteAccount');
const cancelDelete = document.querySelector('.cancelDelete');
const pointerEvents = document.querySelector('.pointerEvents');

deleteAccount.addEventListener('click', () => {
  const deleteConfirm = document.querySelector('.deleteConfirm');
  const body = document.querySelector('body');
  deleteConfirm.style.display = "block";
  document.body.style.backgroundColor = "rgba(36, 36, 36, 0.54)";
  pointerEvents.style.pointerEvents = "none";
})

cancelDelete.addEventListener('click', () => {
  const deleteConfirm = document.querySelector('.deleteConfirm');
  const body = document.querySelector('body');
  deleteConfirm.style.display = "none";
  document.body.style.backgroundColor = "";
  pointerEvents.style.pointerEvents = "";
})
