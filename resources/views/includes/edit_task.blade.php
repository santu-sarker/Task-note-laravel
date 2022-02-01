<!-- Modal -->
<div class="modal fade text-center" id="edit_task" role="dialog" aria-labelledby="edit_task" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="edit_task">Update Task </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-signin" action="{{ url('/user/task/') }}" id='edit_form' method="POST">
                    @csrf
                    {{ method_field('PUT') }}

                    <div class="card-body justify-content-center">
                        <div class="row mt-0">

                            <input type="text" name="task_title" id="task_title"
                                class="form-control col-lg-12 col-md-12 col-sm-12 col-12  " value=""
                                placeholder="Task Title" required autofocus>
                        </div>
                        <div class="row my-3">

                            <input type="text" name="task_description" id="task_description"
                                class="form-control col-lg-12 col-md-12 col-sm-12 col-12  " value=""
                                placeholder="Task Description" required autofocus>

                        </div>
                    </div>

                    <button class="btn btn-lg btn-info btn-block" type="submit" id="submit"
                        name="submit">Update</button>
                </form>

            </div>
        </div>
    </div>
</div>
