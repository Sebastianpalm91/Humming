const upvotes = document.querySelectorAll('.upvote');
const downvotes = document.querySelectorAll('.downvote');
const voteSums = document.querySelector('.voteSums');
const url = "../php/vote.php";
const score = "../php/voteGet.php";


Array.from(upvotes).forEach(upvote => {
upvote.addEventListener('click', () => {
  fetch(url, {
    method: "POST",
    headers: {"Content-Type": "application/x-www-form-urlencoded"},
    credentials: "include",
    body: `upvote=${upvote.value}&dir=${upvote.dataset.dir}`
  })
  // .then(response => {
  //   return response.json()
  // })
})
});

Array.from(upvotes).forEach(upvote => {
upvote.addEventListener('click', () => {
fetch(score, {
  method: "POST",
  headers: {"Content-Type": "application/x-www-form-urlencoded"},
  credentials: "include",
  body: `postID=${upvote.value}`
})
.then(response => {
  return response.json()
})
.then(voteSum => {
  const postSum = upvote.parentElement.querySelector('.voteSums');
  postSum.textContent = `${voteSum.score}`;
  console.log(voteSum.score);
})
})
});

Array.from(downvotes).forEach(downvote => {
downvote.addEventListener('click', () => {
  fetch(url, {
    method: "POST",
    headers: {"Content-Type": "application/x-www-form-urlencoded"},
    credentials: "include",
    body: `downvote=${downvote.value}&dir=${downvote.dataset.dir}`
  })
  // .then(response => {
  //   return response.json()
  // })
})
});

Array.from(downvotes).forEach(downvote => {
downvote.addEventListener('click', () => {
fetch(score, {
  method: "POST",
  headers: {"Content-Type": "application/x-www-form-urlencoded"},
  credentials: "include",
  body: `postID=${downvote.value}`
})
.then(response => {
  return response.json()
})
.then(voteSum => {
  const postSum = downvote.parentElement.querySelector('.voteSums');
  postSum.textContent = `${voteSum.score}`;
  console.log(voteSum.score);
})
})
});
