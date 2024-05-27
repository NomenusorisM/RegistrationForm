$(document).ready(function() {
    $('#registrationForm').on('submit', function(e) {
        e.preventDefault();

        const firstName = $('#firstName').val().trim();
        const lastName = $('#lastName').val().trim();
        const email = $('#email').val().trim();
        const password = $('#password').val().trim();
        const confirmPassword = $('#confirmPassword').val().trim();
        
        if (!firstName || !lastName || !email || !password || !confirmPassword) {
            $('#message').html('<div class="alert alert-danger">Необходимо заполнить все поля!</div>');
            return;
        }

        if (!validateEmail(email)) {
            $('#message').html('<div class="alert alert-danger">Неверный email адрес!</div>');
            return;
        }

        if (password !== confirmPassword) {
            $('#message').html('<div class="alert alert-danger">Пароли не совпадают!</div>');
            return;
        }

        if(password.lenght < 8){
            $('#message').html('<div class="alert alert-danger">Длина пароля должна быть больше 8!</div>');
            return;
        }

        const formData = { firstName, lastName, email, password, confirmPassword };

        $.ajax({
            type: 'POST',
            url: 'register.php',
            data: formData,
            success: function(response) {
                const res = JSON.parse(response);
                if (res.success) {
                    $('#message').html('<div class="alert alert-success">Вы успешно зарегистрированы!</div>');
                    $('#registrationForm').hide();
                } else {
                    $('#message').html('<div class="alert alert-danger">' + res.message + '</div>');
                }
            }
        });
    });

    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }
});
