 <!-- Modal -->
 <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#update{{ $value->id }}">
     UPDATE
 </button>
    <div class="modal fade" id="update{{ $value->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">MENGUPDATE DATA PAKET</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <form action="paket/{{ $value->id }}" method="post">
                            @csrf
                            @method('put')
                            <div class="input-group mb-3">
                                <select name="id_outlet" class="form-control">
                                    <option disabled value="">Select Outlet</option>
                                    @foreach ($outlet as $key => $va)
                                        <option @if ($value->id_outlet == $va->id) selected @endif
                                            value="{{ $va->id }}">{{ $va->nama }}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user" name="nama" type="text"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <select type="text" name="jenis" class="form-control" placeholder="Retype jenis">
                                    <option disabled selected>Jenis</option>
                                    <option value="kiloan" {{ $value->jenis == 'kiloan' ? 'selected' : '' }}>Kiloan
                                    </option>
                                    <option value="selimut" {{ $value->jenis == 'selimut' ? 'selected' : '' }}>Selimut
                                    </option>
                                    <option value="bed_cover" {{ $value->jenis == 'bed_cover' ? 'selected' : '' }}>Bed
                                        Cover</option>
                                    <option value="kaos" {{ $value->jenis == 'kaos' ? 'selected' : '' }}>Kaos</option>
                                </select>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope" name="jenis" type="text">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" value="{{ $value->nama_paket }}"
                                    name="nama_paket">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock" name="tlp" type="text">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" value="{{ $value->harga }}" name="harga">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock" name="tlp" type="text">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
