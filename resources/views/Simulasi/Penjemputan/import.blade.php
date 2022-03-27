<!-- Modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#penjemputanimport">
    Import
</button>

<div class="modal fade" id="penjemputanimport" tabindex="-1" aria-labelledby="import-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <form action="/penjemputanimport" method="POST" enctype="multipart/form-data"
            id="import-form">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="import-modal-label">Import Data Penjemputan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="d-none align-items-center justify-content-between bg-white p-2 shadow-md mb-3"
                        id="import-file-card">
                        <div class="d-flex align-items-center">
                            <div class="h1 p-3 mb-0"><i class="fa fa-file-excel"></i></div>
                            <div>
                                <h6 class="mb-0 filename">File.xlsx</h6>
                                <div class="text-sm filesize">30kb</div>
                            </div>
                        </div>
                        <div class="p-3">
                            <button type="button" class="close" id="remove-import-file">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    <div class="text-center py-5" id="select-import-file">
                        <div>Upload file</div>
                        <label for="file" class="btn btn-info mt-1 font-weight-normal">
                            <span>Pilih file</span>
                        </label>
                        <div>Klik <a href="/template">disini</a> untuk
                            mengunduh
                            template</div>
                    </div>
                    <input type="file" class="custom-file-input" id="file" name="file" hidden>
                    <button class="btn btn-primary w-100"><i class="fas fa-download mr-2"></i>Import data</button>
                </div>
            </div>
        </form>
    </div>
</div>
