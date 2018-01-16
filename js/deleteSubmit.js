// Double confirm if user wants to delete the account
const deleteSubmit = document.querySelector('.deleteSubmit');
const cancelSubmit = document.querySelector('.cancelSubmit');
const subpointerEvent = document.querySelector('.pointerEvents');

deleteSubmit.addEventListener('click', () => {
  const submitConfirm = document.querySelector('.submitConfirm');
  const bodySub = document.querySelector('body');
  submitConfirm.style.display = "block";
  bodySub.style.backgroundColor = "rgba(36, 36, 36, 0.54)";
  subpointerEvent.style.pointerEvents = "none";
});

cancelSubmit.addEventListener('click', () => {
  const submitConfirm = document.querySelector('.submitConfirm');
  const bodySub = document.querySelector('body');
  submitConfirm.style.display = "none";
  bodySub.style.backgroundColor = "";
  subpointerEvent.style.pointerEvents = "";
});
