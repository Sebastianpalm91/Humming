const upvote = document.querySelectorAll('.upvote');
const downvote = document.querySelectorAll('.downvote');
const voteSum = document.querySelectorAll('.voteSum');
const url = "../php/vote.php";
const score = "../php/voteGet.php";
let voteCounter

Array.from(score).forEach(scoreSum => {
fetch(score, {
  method: "POST",
  headers: {"Content-Type": "application/x-www-form-urlencoded"},
  credentials: "include",
  body: `postID=${upvote.value}`
})
.then(response => {
  return response.json()
})
.then(voteGet => {
  console.log(voteGet);
  voteCounter = `${voteGet.score}`
})
})

Array.from(upvote).forEach(upVotes => {
upVotes.addEventListener('click', () => {
  fetch(url, {
    method: "POST",
    headers: {"Content-Type": "application/x-www-form-urlencoded"},
    credentials: "include",
    body: `upVotes=${upVotes.value}&dir=${upVotes.dataset.dir}`
  })
  .then(response => {
    return response.json()
  });
  voteSum.textContent = voteCounter++
  console.log("voteCounter");
})
})

Array.from(downvote).forEach(downVotes => {
downVotes.addEventListener('click', () => {
  fetch(url, {
    method: "POST",
    headers: {"Content-Type": "application/x-www-form-urlencoded"},
    credentials: "include",
    body: `downvote=${downvote.value}&dir=${downvote.dataset.dir}`
  })
  .then(response => {
    return response.json()
  })
  voteSum.textContent = voteCounter--
  console.log("hejdå");
})
})
