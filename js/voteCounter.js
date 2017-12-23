const upvotes = document.querySelectorAll('.upvote');
const downvotes = document.querySelectorAll('.downvote');
const voteSums = document.querySelectorAll('.voteSum');
const url = "../php/vote.php";
const score = "../php/voteGet.php";
let voteCounter;

Array.from(voteSums).forEach(voteSum => {
fetch(score, {
  method: "POST",
  headers: {"Content-Type": "application/x-www-form-urlencoded"},
  credentials: "include",
  body: `postID=${voteSum.value}`
})
.then(response => {
  return response.json()
})
.then(voteGet => {
  voteCounter = `${voteGet.score}`
  console.log(voteSum);
})
});

Array.from(upvotes).forEach(upvote => {
upvote.addEventListener('click', () => {
  fetch(url, {
    method: "POST",
    headers: {"Content-Type": "application/x-www-form-urlencoded"},
    credentials: "include",
    body: `upvote=${upvote.value}&dir=${upvote.dataset.dir}`
  })
  .then(response => {
    return response.json()
  })
  voteSums.textContent = voteCounter++
  console.log("upvotes");
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
  .then(response => {
    return response.json()
  })
  voteSums.textContent = voteCounter--
  console.log("hejdå");
})
});
