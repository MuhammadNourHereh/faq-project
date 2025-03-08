export const baseUrl = 'http://localhost:3000/article-server/'
export const passwordVarify = pass => {
    if (pass.length < 3 || pass.length > 20)
        return false
    // Regex to check if the password contains ONLY letters,numbers and underscore
    const regex = /^[a-zA-Z0-9_]+$/;
    if (!regex.test(pass))
        return false;
    return true
}