jQuery(document).ready(function($) {
    var $form_login = $('#login');
    //显示或隐藏 password
    $('.hide-password').on('click', function() {
        var $this = $(this),
            $password_field = $this.prev('input');

        ('password' == $password_field.attr('type')) ? $password_field.attr('type', 'text'): $password_field.attr('type', 'password');
        ('隐藏' == $this.text()) ? $this.text('显示'): $this.text('隐藏');
        //focus and move cursor to the end of input field
        $password_field.putCursorAtEnd();
    });

    //错误提示
    $form_login.find('#submit').on('click', function(event) {
        var ok = 1;
        if ($('#username').val() == '') {
            event.preventDefault();
            $('#username').addClass('has-error');
            $('#erroru').addClass('is-visible');
            ok = 0;
        } else {
            $('#username').removeClass('has-error');
            $('#erroru').removeClass('is-visible');
        }
        if ($('#password').val() == '') {
            event.preventDefault();
            $('#password').addClass('has-error');
            $('#errorp').addClass('is-visible');
            ok = 0;
        } else {
            $('#password').removeClass('has-error');
            $('#errorp').removeClass('is-visible');
        }
        if (!ok) return;
        $.ajax({
            type: 'post',
            url: '../reg.php',
            data: {
                username: $('#username').val(),
                password: $('#password').val()
            },
            dataType: 'json',
            success: function(json) {
                if (json.msg) {
                    document.getElementById("login-info").innerHTML = json.msg;
                    $('#login-info').addClass('is-visible');
                }
                if (json.url) { window.location.href = json.url };
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                $('#login-info').addClass('is-visible');
            }
        });
    });

    //IE9 placeholder fallback
    //credits http://www.hagenburger.net/BLOG/HTML5-Input-Placeholder-Fix-With-jQuery.html
    if (!Modernizr.input.placeholder) {
        $('[placeholder]').focus(function() {
            var input = $(this);
            if (input.val() == input.attr('placeholder')) {
                input.val('');
            }
        }).blur(function() {
            var input = $(this);
            if (input.val() == '' || input.val() == input.attr('placeholder')) {
                input.val(input.attr('placeholder'));
            }
        }).blur();
        $('[placeholder]').parents('form').submit(function() {
            $(this).find('[placeholder]').each(function() {
                var input = $(this);
                if (input.val() == input.attr('placeholder')) {
                    input.val('');
                }
            })
        });
    }
    //forget passwords
    $('#forget').mouseover(function() {
        $('#forget-inf').addClass('is-visible');
    });
    $('#forget').mouseout(function() {
        $('#forget-inf').removeClass('is-visible');
    });

});


//credits http://css-tricks.com/snippets/jquery/move-cursor-to-end-of-textarea-or-input/
jQuery.fn.putCursorAtEnd = function() {
    return this.each(function() {
        // If this function exists...
        if (this.setSelectionRange) {
            // ... then use it (Doesn't work in IE)
            // Double the length because Opera is inconsistent about whether a carriage return is one character or two. Sigh.
            var len = $(this).val().length * 2;
            this.setSelectionRange(len, len);
        } else {
            // ... otherwise replace the contents with itself
            // (Doesn't work in Google Chrome)
            $(this).val($(this).val());
        }
    });
};
