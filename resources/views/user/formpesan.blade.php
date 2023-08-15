<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
        <div class="card text-left">
                <div class="card-header">
                  <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" data-toggle="tab" href="#home" id="home-tab" role="tab" aria-controls="home" aria-selected="true">Pemesanan</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#history" id="history-tab" role="tab" aria-controls="history" aria-selected="false">History</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link" id="profile-tab" href="#" data-toggle="dropdown">
                        <div class="navbar-profile">
                          <img class="img-xs rounded-circle" src="{{asset('assets/images/faces/icon.png')}}" alt="" width="22px" height="22px" >
                        </div>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                        <a class="dropdown-item preview-item" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" href="{{ route('logout') }}">
                          <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                              <i class="mdi mdi-logout text-danger"></i>
                            </div>
                          </div>
                          <div class="preview-item-content">
                          <p class="preview-subject mb-1">Log out</p>
                          </div>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form> 
                    </li>
                  </ul>
                </div>
                <div class="card-body">
                    {{-- tab konten --}}
                    <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                              <form>
                                                               
                                <div class="form-group col-md-6">
                                  <label for="pekerjaan">Jenis Kamar</label>
                                  <select id="pekerjaan" class="form-control">
                                    <option value="">- Pilih Jenis Kamar</option>
                                    <option value="">Programmer</option>
                                    <option value="">Web Designer</option>
                                    <option value="">Pengusaha</option>
                                  </select>
                                </div>
                               
                                <div class="form-group col-md-6">
                                  <label for="umur">Jumlah Kamar</label>
                                  <input type="number" id="umur" class="form-control" placeholder="Masukkan Jumlah Kamar">
                                </div>

                                <div class="form-group col-md-6">
                                  <label for="umur">Tanggal Chek-In</label>
                                  <input type="date" id="umur" class="form-control" placeholder="Contoh form angka ...">
                                </div>

                                <div class="form-group col-md-6">
                                  <label for="umur">Tanggal Chek-Out</label>
                                  <input type="date" id="umur" class="form-control" placeholder="Contoh form angka ...">
                                </div>
                               <br />
                                <button type="submit" class="btn btn-primary">Proses</button>
                              </form>
                            </div>

                            <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
                             haloooooooooooooooooo
                            </div>

                            
                    </div>
                      {{-- end tab konten --}}
                  
                </div>
              </div>
</body>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<script>
  $(function() {
    $('#myTab a').on('click', function (e) {
      e.preventDefault()
      $(this).tab('show')
    })
  })
</script>
</html>





