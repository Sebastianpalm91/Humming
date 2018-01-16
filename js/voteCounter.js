// Score counter on each posts/submits
const upvotes = document.querySelectorAll('.upvote');
const downvotes = document.querySelectorAll('.downvote');
const voteSums = document.querySelector('.voteSums');
const url = "/../php/vote.php";
const score = "/../php/voteGet.php";
const voteDir = "/../php/voteDir.php";

// upvotes
Array.from(upvotes).forEach(upvote => {
  upvote.addEventListener('click', () => {
    fetch(url, {
      method: "POST",
      headers: {"Content-Type": "application/x-www-form-urlencoded"},
      credentials: "include",
      body: `upvote=${upvote.value}&dir=${upvote.dataset.dir}`
    })
  })
});

Array.from(upvotes).forEach(upvote => {
  upvote.addEventListener('click', () => {
    setTimeout(function () {
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

      })
      fetch(voteDir, {
        method: "POST",
        headers: {"Content-Type": "application/x-www-form-urlencoded"},
        credentials: "include",
        body: `postID=${upvote.value}`
      })
      .then(response => {
        return response.json()
      })
      .then(voteDirr => {
        const postSum = upvote.parentElement.querySelector('.voteSums');
        if (voteDirr.voteDir == 1) {
          console.log("1");
          postSum.style.color = "#EB3324";
        }
        else {
          console.log("0");
          postSum.style.color = "#000000";
        }
      })
    }, 10);
  })
});

// downvotes
Array.from(downvotes).forEach(downvote => {
  downvote.addEventListener('click', () => {
    fetch(url, {
      method: "POST",
      headers: {"Content-Type": "application/x-www-form-urlencoded"},
      credentials: "include",
      body: `downvote=${downvote.value}&dir=${downvote.dataset.dir}`
    })
  })
});

Array.from(downvotes).forEach(downvote => {
  downvote.addEventListener('click', () => {
    setTimeout(function () {
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
      })
      fetch(voteDir, {
        method: "POST",
        headers: {"Content-Type": "application/x-www-form-urlencoded"},
        credentials: "include",
        body: `postID=${downvote.value}`
      })
      .then(response => {
        return response.json()
      })
      .then(voteDirr => {
        const postSum = downvote.parentElement.querySelector('.voteSums');
        console.log(voteDirr.voteDir);
        if (voteDirr.voteDir == -1) {
          postSum.style.color = "#2e90d7";
        }
        else {
          postSum.style.color = "#000000";
        }
      })
    }, 10);
  })
});
