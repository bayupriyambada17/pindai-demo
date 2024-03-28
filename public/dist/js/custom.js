document.addEventListener('DOMContentLoaded', function () {
  const eyePassword = document.getElementById('eyePassword');
  const password = document.getElementById('pass');

  eyePassword.addEventListener('click', () => {
    if (password.type === 'password') {
      password.type = 'text';

    } else {
      password.type = 'password';
    }
  });
});