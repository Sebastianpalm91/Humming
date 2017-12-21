const searchUserField = document.querySelector('.searchUser');
const alreadyExists = document.querySelector('.alreadyExists');
const avaliableUsername = document.querySelector('.avaliableUsername');

let searchUsername = () => {
  let searchUser = searchUserField.value;
  fetch(`../php/search.php?username=${searchUser}`)
  .then(response => {
    return response.json()
  })
  .then(response => {
    console.log(response)
      if (response.length && searchUser.toLowerCase() === response[0].username.toLowerCase()) {
        console.log("if")
        alreadyExists.textContent = "Did someone take your username before you? sorry, try another one!"
        avaliableUsername.textContent = ""
      }
      else {
        console.log("else")
        alreadyExists.textContent = ""
        avaliableUsername.textContent = "This username is avaliable!"
      }
  })
}
searchUserField.addEventListener('keyup', searchUsername);
