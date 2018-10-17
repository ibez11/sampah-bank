$(document).ready(function(){
    $(document).on('click', '.btn-launch-modal', {} , function(e){
        e.preventDefault();
        const modalId = $(this).data('modal');
        const dataId = $(this).data('id');
        const type = $(this).data('type');
        if(type === 'subinstitution'){
            openModalSubinstitution(modalId, dataId);
        }
    });
    $('#modal-edit-subinstitution-form').submit(createOrEditSubinstitution);
});

function createOrEditSubinstitution(e){
    e.preventDefault();
    $('#modal-edit-subinstitution-progress').show();
    var id = $('#subinstitution-id').val();
    var data = new FormData();
    if(id != ''){
        data.append('id', id);
    }
    data.append('name', $('#name').val());
    data.append('desc', $('#desc').val());
    data.append('institution_id', $('#institution-id').val());

    var method = '';
    var url = '/subinstitution';
    if(id != ''){
        method = 'PUT';
        url = url + '/' + id;
    } 
    else method = 'POST';

    $.ajax({
        url: url,
        data: $('#modal-edit-subinstitution-form').serialize(),
        processData: false,
        headers:{
            'X-CSRF-TOKEN' : $('[name="_token"]').val()
        },
        type: method,
        success: function(data){
            $('#modal-edit-subinstitution-progress').hide();
           var obj = JSON.parse(data);
           if(obj.status == 1){
               alert(obj.message);
           }
           else{
               window.location.replace('/institution/' + $('#institution-id').val() + '/edit?success=yes');
           }
        }
    });
}

function openModalSubinstitution(modal, id){
    $('#' + modal).modal('show');
    $('#' + modal +'-label').html('Tambah Subinstitusi');
    clearSubinstitutionFields();

    if(id != undefined && id != null){
        $('#subinstitution-id').val(id);
        $('#' + modal +'-label').html('Ubah Subinstitusi');
        $('#' + modal +'-progress').show();
        toggleSubinstitutionFields(true);
        $.ajax({
            url: '/subinstitution/' + id,
            type: 'GET',
            success: function(data){
                $('#' + modal +'-progress').hide();
                populateSubinstitution(data);
                toggleSubinstitutionFields(false);
            }
        })
    }
}

function clearSubinstitutionFields(){
    $('#id').val('');
    $('#name').val('');
    $('#desc').val('');
}

function populateSubinstitution(data){
    data = JSON.parse(data);
    $('#id').val(data.id);
    $('#name').val(data.name);
    $('#desc').val(data.description);
}

function toggleSubinstitutionFields(isDisabled){
    $('#name').attr('disabled', isDisabled);
    $('#desc').attr('disabled', isDisabled);
    $('#modal-edit-subinstitution-save').attr('disabled', isDisabled);
}