const searchUserField = document.querySelector('.searchUser');
const alreadyExists = document.querySelector('.alreadyExists');

let searchUsername = () => {
  let searchUser = searchUserField.value;
  fetch(`../php/search.php?username=${searchUser}`)
  .then(response => {
    return response.json()
  })
  .then(response => {
    console.log(response)
      if (response.length && searchUser === response[0].username) {
        console.log("if")
        alreadyExists.textContent = "Username already exists"
      }
      else {
        console.log("else")

        alreadyExists.textContent = ""
      }
  })
}
searchUserField.addEventListener('keyup', searchUsername);
