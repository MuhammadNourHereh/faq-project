const baseUrl = 'http://localhost:3000/'

if (localStorage.getItem('user') != null)
    window.location.href = "home.html"

document.getElementById("loginForm").addEventListener("submit", function (e) {
    e.preventDefault();
    const form = new FormData(this)
    axios.post(`${baseUrl}apis/v1/login.php`,
        form
    )
        .then(response => {
            // getting data
            const data = response.data
            const { email, first_name, last_name } = data
            
            // store cookie
            localStorage.setItem("user", JSON.stringify({ email, first_name, last_name }))

            console.log(data)
            window.location.href = "home.html"

        })
        .catch(error => {
            // This handles any non-2xx status codes
            if (error.response) {
                // The request was made and the server responded with a status code
                // that falls out of the range of 2xx
                const statusCode = error.response.status;

                switch (statusCode) {
                    case 401:
                        console.error("Invalid credentials");
                        break;
                    case 404:
                        console.error("User not found");
                        break;
                    case 500:
                        console.error("Server error");
                        break;
                    default:
                        console.error(`Error with status code: ${statusCode}`);
                }

                // You can also access the response data if the server sent any
                console.error("Error details:", error.response.data);
            } else if (error.request) {
                // The request was made but no response was received
                console.error("No response received from server");
            } else {
                // Something happened in setting up the request that triggered an Error
                console.error("Error setting up request:", error.message);
            }
        });
});