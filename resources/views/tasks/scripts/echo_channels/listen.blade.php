<script>
    function markup(taskValues) {
        return `<tr id="tr-${taskValues.id}">
                    <th scope="row">1</th>
                    <td>${taskValues.title}</td>
                    <td>${taskValues.desc}</td>
                    <td>${taskValues.status}</td>
                    <td>
                        <a href="javascript:void(0)" class="edit-task" data-id="${taskValues.id}" title="Edit todo"><i class="fas fa-pencil-alt me-3"></i></a>
                        <a href="javascript:void(0)" class="text-danger delete-task" data-id="${taskValues.id}" title="Delete todo"><i class="fas fa-trash-alt me-3"></i></a>
                    </td>
                </tr>`;
    }





    //Created New Task
    window.Echo.channel("newTask").listen(".task-created", e => {
        console.log(e);
        $("table tbody").append(markup(e));
        editFn();
        deleteFn();
        console.log('New Task Created - Pusher');
    });


    //Updated Task
    window.Echo.channel("taskUpdated").listen(".task-Updated", e => {
        console.log("task Updated - Pusher");
        $(`#tr-${e.id}`).replaceWith(markup(e));
        editFn();
        deleteFn();
    });

    //Removed Task
    window.Echo.channel("taskRemoved").listen(".task-removed", e => {
        console.log("taskRemoved - Pusher");
        $(`#tr-${e.id}`).remove();
        editFn();
        deleteFn();
    });
</script>
