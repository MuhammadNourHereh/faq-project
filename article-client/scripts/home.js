import baseUrl from './utils.js'

const userString = localStorage.getItem('user')
if (userString === null) {
    window.location.href = "login.html"
}

// Parse JSON string to object
const user = JSON.parse(userString)
const { first_name, last_name } = user

const firstname_span = document.getElementById("firstname")
const lastname_span = document.getElementById("lastname")

firstname_span.innerHTML = first_name
lastname_span.innerHTML = last_name

// set logout button
const logoutButton = document.getElementById("logout")

logoutButton.addEventListener('click', () => {
    localStorage.removeItem('user');
    window.location.href = "index.html"
})