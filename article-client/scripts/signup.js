import { passwordVarify } from './utils.js'

const baseUrl = 'http://localhost:3000/'

document.getElementById("loginForm").addEventListener("submit", function (e) {
    e.preventDefault();
    const form = new FormData(this)

    if (!passwordVarify(form.get('password'))) {
        console.log("password is not valid")
        return
    }

    if (form.get('password') != form.get('repassword')) {
        console.log("password should match repassword")
        return
    }

    axios.post(`${baseUrl}apis/v1/signup.php`,
        form
    )
        .then(() => {
            window.location.href = "home.html"
        })
        .catch(error => {
            console.error("Error logging in:", error)
        })
});