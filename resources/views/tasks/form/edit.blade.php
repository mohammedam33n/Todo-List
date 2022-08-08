<!-- Modal -->
<div class="modal fade" id="ajax-modal-edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="taskShowModal"></h4>
            </div>

            <form class="cmxform" id="formEdit">
                <div class="modal-body">
                    <input type="hidden" name="id" id="inputId">
                    <div class="mb-3">
                        <label for="titleInput" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="inputTitle">
                        <span id="title_err_msg" class="text-danger"></span>
                    </div>

                    <div class="mb-3">
                        <label for="descInput" class="form-label">description</label>
                        <textarea class="form-control" id="inputDesc" rows="3" name="desc"></textarea>
                        <span id="desc_err_msg" class="text-danger"></span>
                    </div>

                    <div class="mb-3 optionStatus">

                        <select name="status" id="status" class="form-control status">
                            @foreach ($status as $value)
                                <option value="{{ $value }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>




                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn_close" data-id="555">Close</button>
                    <button type="button" class="btn btn-primary btn_edit">Save</button>
                </div>

            </form>


        </div>
    </div>
</div>
