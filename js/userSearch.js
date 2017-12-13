const searchUserField = document.querySelector('.searchUser');
const alreadyExists = document.querySelector('.alreadyExists');

let searchUsername = () => {
  let searchUser = searchUserField.value;
  fetch(`../php/search.php?username=${searchUser}`)
  .then(response => {
    return response.json()
  })
  .then(response => {
    for (let user of response) {
      if (searchUser == user.username) {
        console.log("if")
        alreadyExists.innerText = "Username already exists"
      }
      else {
        alreadyExists.innerText = ""
      }
    }
  })
}
searchUserField.addEventListener('keyup', searchUsername);
