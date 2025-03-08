import { passwordVarify, baseUrl } from './utils.js'

// redirect if you signed in
if (localStorage.getItem('user') != null)
    window.location.href = "home.html"

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
            window.location.href = "index.html"
        })
        .catch(error => {
            console.error("Error logging in:", error)
        })
});