<script>
    let editFn = () => {


        $('.edit-task').click(function() {
            console.log('edit-task');
            $('#taskShowModal').html("Edit Task");
            $('#ajax-modal-edit').modal('show');

            // let id = $(this).data('id');
            let id = $(this).attr("data-id")

            $.get('tasks/' + id + '/edit', function(data) {
                $('#taskShowModal').html("Todo Edit");
                $('#ajax-modal-edit').modal('show');

                $('#inputId').val(data.id);
                $('#inputTitle').val(data.title);
                $('#inputDesc').val(data.desc);
                $('#status').val(data.status);

                $("div.optionStatus select").val(data.status);

            });



        });

        $('.btn_edit').click(function() {
            console.log('btn_edit');
            let id = $('#inputId').val();
            console.log(id);


            let formData = new FormData($('#formEdit')[0]);
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('_method', 'PUT');

            $.ajax({
                type: "post",
                url: "/tasks/" + id,
                data: formData,
                processData: false,
                contentType: false,
                cache: false,

                success: function(response) {
                    console.log('Task Send AJax updat ');
                    $('#formEdit')[0].reset();
                    $('#ajax-modal-edit').modal('hide');
                    toastr.success(response.message+id);
                },
                error: function(reject) {

                    let res = $.parseJSON(reject.responseText);
                    $.each(res.errors, function(key, value) {
                        $("#" + key + "_err_msg").text(value[0]);
                    })
                }




            })



        });




    };
    editFn();
</script>
