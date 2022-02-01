<!-- Modal -->
<div class="modal fade text-center" id="task_modal" role="dialog" aria-labelledby="task_modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="task_modal">Create New Task </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-signin" action="{{ route('task.store') }}" method="POST" autocomplete="on">
                    @csrf
                    <div class="card-body justify-content-center">
                        <div class="row mt-0">
                            {{-- <input type="hidden" name="contact_id" id="contact_id"> --}}
                            <input type="text" name="task_title"
                                class="form-control col-lg-12 col-md-12 col-sm-12 col-12  " placeholder="Task Title"
                                required autofocus>
                        </div>
                        <div class="row my-3">

                            <input type="text" name="task_description"
                                class="form-control col-lg-12 col-md-12 col-sm-12 col-12  "
                                placeholder="Task Description" required autofocus>

                        </div>
                    </div>

                    <button class="btn btn-lg btn-primary btn-block" type="submit" id="submit" name="submit">Create
                        Task</button>
                </form>

            </div>
        </div>
    </div>
</div>
