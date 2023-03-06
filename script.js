const toggleButton = document.querySelector('.toggle-button');
const body = document.querySelector('body');

// Check if the user has a mode preference cookie
const mode = getCookie('mode');
if (mode === 'dark') {
  body.classList.add('dark-mode');
}

toggleButton.addEventListener('click', () => {
  body.classList.toggle('dark-mode');
  // Set a cookie to remember the user's preference for light or dark mode
  if (body.classList.contains('dark-mode')) {
    setCookie('mode', 'dark', 365);
  } else {
    setCookie('mode', 'light', 365);
  }
});

// Get the value of a cookie by its name
function getCookie(name) {
  const value = `; ${document.cookie}`;
  const parts = value.split(`; ${name}=`);
  if (parts.length === 2) return parts.pop().split(';').shift();
}

// Set the value of a cookie with a given name, value, and expiration date
function setCookie(name, value, days) {
  const date = new Date();
  date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
  const expires = `expires=${date.toUTCString()}`;
  document.cookie = `${name}=${value};${expires};path=/`;
}
