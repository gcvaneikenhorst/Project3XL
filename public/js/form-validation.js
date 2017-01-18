

function validate(control) {
    if (new RegExp($(control).attr('data-validation')).test($(control).val())) {
        $(control).parents('.form-group').removeClass('has-error');
        return true;
    }

    $(control).parents('.form-group').addClass('has-error');
    return false;
}

$("form").each(function(ind, form) {
    $(form).on('submit', function(event) {
        $(this).find('[data-validation]').each(function () {
            if (!validate(this)) {
                event.preventDefault()
            }
        })
    })
    $(form).find('[data-validation]').each(function () {
        $(this).on('blur', function() {
            validate(this)
        })
    })
})