<!-- Modal -->
<div class="modal fade" id="ajax-modal-create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="taskShowModal"></h4>
            </div>

            <form class="cmxform" id="formCreate">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="titleInput" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control">
                        <span id="title_err_msg" class="text-danger"></span>
                    </div>

                    <div class="mb-3">
                        <label for="descInput" class="form-label">description</label>
                        <textarea class="form-control"  rows="3" name="desc"></textarea>
                        <span id="desc_err_msg" class="text-danger"></span>
                    </div>

                    <div class="mb-3">
                        <span class="text-danger" id="status_err_msg"></span>
                        <select name="status" id="status" class="form-control status">
                            @foreach ($status as $value)
                                <option value="{{ $value }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>




                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn_close">Close</button>
                    <button type="button" class="btn btn-primary btn_save">Save</button>
                </div>

            </form>


        </div>
    </div>
</div>
