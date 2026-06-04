@extends('template_backend.app')

@section('content')
    <section class="department_section mb-4 layout_margin-top">
        <div class="department_container">
            <div class="container ">
                <div class="heading_container heading_center">
                    <!-- <h2>
                        Diagnosa
                    </h2>
                    <p class="text-muted">Isi dulu data diri anda</p> -->
                </div>
            </div>
        </div>
    </section>

    <section class="about_section layout_margin-bottom">
    <div class="card">
      
      <div class="container" align="center">
                  <h1 align="center">
                      Skrinning
                  </h1>
                  <p align="center" class="text-muted">Isi data diri Pasien</p>
<hr>
              <div class="col-sm-8 m-auto" align="center">
                    <form action="{{ route('diagnosis.proses') }}" method="post">
                        @csrf

                        <!-- <div class="row"> -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" required class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ old('nama', $hasil->nama) }}">
                                    <div class="invalid-feedback">
                                        @error('nama')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" id="jenis_kelamin">
                                        <!-- <option value="">Pilih</option> -->
                                        @if($hasil->jenis_kelamin == 'Laki-Laki')
                        
                        <option value="Laki-Laki" {{ old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        
                        @else
                            <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            <option value="Laki-Laki" {{ old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>

                        @endif
                                           </select>
                                    <div class="invalid-feedback">
                                        @error('jenis_kelamin')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_hp">No HP</label>
                                    <input type="number" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" id="no_hp" value="{{ old('no_hp', $hasil->no_hp) }}">
                                    <div class="invalid-feedback">
                                        @error('no_hp')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" value="{{ old('alamat', $hasil->alamat) }}">
                                    <div class="invalid-feedback">
                                        @error('alamat')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="row justify-content-center mb-5">
                            <div class="col-md-4">
                                <button type="submit" name="btn_proses" class="btn btn-lg btn-block btn-primary"><i class="fa fa-arrow-right"></i> Proses</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
