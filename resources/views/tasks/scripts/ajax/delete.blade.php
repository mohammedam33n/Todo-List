<script>
    let deleteFn = () => {
        /* When click delete task */
        $('.delete-task').click(function() {

            var id = $(this).data('id');
            console.log(id);

            $.ajax({
                url: "tasks/" + id,
                type: 'DELETE',
                data: {
                    "id": id,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(response) {
                    toastr.success(response.message);
                }
            });

        })
    }
    deleteFn();
</script>
