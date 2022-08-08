<script>

    /* When click btn close */
    $('.btn_close').click(function() {
        $('#formCreate')[0].reset();
        $('#formEdit')[0].reset();
        $('#ajax-modal-create').modal('hide');
        $('#ajax-modal-edit').modal('hide');
        $('#desc_err_msg,#title_err_msg,#status_err_msg').text('');
    });


    /* When click new task */
    $('#new-task').click(function() {
        console.log('new-task');
        $('#taskShowModal').html("Create Task");
        $('#ajax-modal-create').modal('show');
    });

    $('.btn_save').click(function() {
        console.log('btn_save');

        $('#desc_err_msg,#title_err_msg,#status_err_msg').text('');

        let formData = new FormData($('#formCreate')[0]);
        formData.append('_token', '{{ csrf_token() }}');
        $.ajax({
            url: "{{ route('tasks.store') }}",
            data: formData,
            type: 'post',
            processData: false,
            contentType: false,
            cache: false,

            success: function(response) {
                console.log('Task Send AJax ');
                $('#formCreate')[0].reset();
                $('#ajax-modal-create').modal('hide');
                toastr.success(response.message);
            },
            error: function(reject) {

                let res = $.parseJSON(reject.responseText);
                $.each(res.errors, function(key, value) {
                    $("#" + key + "_err_msg").text(value[0]);
                })
            }

        });


    });
</script>
