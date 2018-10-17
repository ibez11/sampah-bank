$(document).ready(function () {
    $('#institution-combobox').change(handleInstitutionCombobox);

    $('#subinstitution-combobox').change(function () {
        const val = $(this).val();
        if (val != -1) {
            $('#subinstitution-id').val(val);
        }
        else {
            $('#subinstitution-id').val('');
        }
    });

    //load subinstitution while load
    handleInstitutionCombobox();
});

function handleInstitutionCombobox() {
    $('#progress-institution').show();
    $('#subinstitution-combobox').attr('disabled', true);
    const val = $('#institution-combobox').val();
    if (val != -1) {
        getSubinstitutions(val);
    }
    else {
        var html = '<option value="-1" selected>-</option>';
        $('#subinstitution-combobox').html(html);
        $('#subinstitution-combobox').attr('disabled', true);
        $('#progress-institution').hide();
    }
}

function getSubinstitutions(id) {
    $.ajax({
        url: '/customer_edit_getsubinstitutions/' + id,
        type: 'GET',
        success: function (data) {
            $('#subinstitution-combobox').attr('disabled', false);
            var subinstitutionId = $('#subinstitution-id').val();
            const obj = JSON.parse(data);
            var html = '';
            if (subinstitutionId == '') {
                html = '<option value="-1" selected>-</option>';
            }
            else {
                html = '<option value="-1">-</option>';
            }
            for (const i in obj) {
                if (obj.hasOwnProperty(i)) {
                    const sub = obj[i];
                    html += '<option value="' + sub.id + '"';
                    if (subinstitutionId == sub.id) {
                        html += ' selected';
                    }
                    html += '>' + sub.name + '</option>';
                }
            }
            $('#subinstitution-combobox').html(html);
            $('#progress-institution').hide();
        }
    })
}
