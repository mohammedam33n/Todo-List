@extends('layouts.app')

@section('style')

@endsection

@section('content')
    <section class="vh-100" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-10 col-xl-10">
                    <div class="card rounded-3">
                        <div class="card-body p-4">

                            <h4 class="text-center my-3 pb-3">To Do App</h4>

                            <div class="card-footer text-end p-3">
                                <a href="javascript:void(0)" id="new-task" class="btn btn-primary">Add Task</a>
                            </div>

                            <table class="table mb-4">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">title</th>
                                        <th scope="col">description</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">

                                    @foreach ($tasks as $task)
                                        <tr id="tr-{{ $task->id }}">
                                            <th scope="row">1</th>
                                            <td>{!! \Illuminate\Support\Str::limit($task->title, 30, '...') !!}</td>
                                            <td>{!! \Illuminate\Support\Str::limit($task->desc, 30, '...') !!}</td>
                                            <td>{{ $task->status }}</td>
                                            <td>
                                                <a href="javascript:void(0)" class="edit-task" data-id="{{ $task->id }}"title="Edit todo"><i class="fas fa-pencil-alt me-3"></i></a>
                                                <a href="javascript:void(0)" class="text-danger delete-task"data-id="{{ $task->id }}" title="Delete todo"><i class="fas fa-trash-alt me-3"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- form models  -->
    @include('tasks.form.create')
    @include('tasks.form.edit')
@endsection



@section('script')
    <!-- ajax reqest-->
    @include('tasks.scripts.ajax.creat')
    @include('tasks.scripts.ajax.edit')
    @include('tasks.scripts.ajax.delete')

    <!-- Channels-->
    @include('tasks.scripts.echo_channels.listen')
@endsection
