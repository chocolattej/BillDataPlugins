@extends('BillDataPlugins::layout')

@section('cdn')
  <!-- popper.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js" 
  integrity="sha512-6UofPqm0QupIL0kzS/UIzekR73/luZdC6i/kXDbWnLOJoqwklBK6519iUnShaYceJ0y4FaiPtX/hRnV/X/xlUQ==" 
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- moment.js -->
  <script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>

  <!-- jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" 
  integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" 
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- Bootstrap 5 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" 
  integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==" 
  crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js" 
  integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g==" 
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- TempusDominus 6 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempus-dominus/6.2.10/css/tempus-dominus.min.css" 
  integrity="sha512-pWpMljGtRWINCDZids0D5gLdAxmyqLmoNFTx2PQl0ZTIq9oFQRc/xPmLgPLxLFJmn1aPxXm8r+g8z8O2TNci+A==" 
  crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/tempus-dominus/6.2.10/js/tempus-dominus.js" 
  integrity="sha512-M1nRraFe0fQ2MyPlesmjWHTJtaPgA81UH+QVOlw/kR7Hv+B8g6oTiT2Yh5Seb9YinuI2RsOHlZJ9+aLlRc6kgQ==" 
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- font Awesome 6 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" 
  integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" 
  crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Perfect Scrollbar -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/perfect-scrollbar/1.5.5/perfect-scrollbar.min.js" 
  integrity="sha512-X41/A5OSxoi5uqtS6Krhqz8QyyD8E/ZbN7B4IaBSgqPLRbWVuXJXr9UwOujstj71SoVxh5vxgy7kmtd17xrJRw==" 
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/perfect-scrollbar/1.5.5/css/perfect-scrollbar.css" 
  integrity="sha512-2xznCEl5y5T5huJ2hCmwhvVtIGVF1j/aNUEJwi/BzpWPKEzsZPGpwnP1JrIMmjPpQaVicWOYVu8QvAIg9hwv9w==" 
  crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css" 
  integrity="sha512-nzSGtgaJWS79WO+bCKLhowPkjbM+WI18/K4T77XPB4QPMybSKLozMFzDNPEHcWxN1dOx1gvYGKP39nXLNNZ8qg==" 
  crossorigin="anonymous" referrerpolicy="no-referrer" />
    
@endsection

@section('external-files')
  <script type="module" src="{{  route('datetimelinked.js')  }}"></script>
  <script src="{{  route('scrollbar.js')  }}"></script>
  <script src="{{  route('search.js')  }}"></script>
  <script src="{{  route('showdata.js')  }}"></script>
  <script src="{{  route('exports.js')  }}"></script>
  <link rel="stylesheet" href="{{ route('style.css') }}">
@endsection


@section('content')
<div class="panel panel-default">
    <div class="panel-header">
        <br><br>
        <!-- All input box here -->
        <div class="container" >
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                      <!-- Autocomplete Search box -->
                        <div class="col-md-6"> 
                          <div class="form-group">
                            <div class="input-group">
                                <input type="text" id="bill" class="form-control" placeholder="Enter Bill Name" style="background-color:#FFFAFA;">
                                <button id="showdata_btn" type="submit" class="input-group-text btn btn-primary" style="background-color:black">
                                    <span class="fa-solid fa-magnifying-glass"></span>
                                </button>
                            </div>
                            <div id="billList"></div>
                          </div>
                        </div>
                        <!-- Datetime Picker linked1 -->
                        <div class="col-sm-3">
                            <div
                                class="input-group log-event"
                                id="linkedPickers1"
                                data-td-target-input="nearest"
                                data-td-target-toggle="nearest"
                            >
                                <input
                                id="linkedPickers1Input"
                                type="text"
                                class="form-control"
                                data-td-target="#linkedPickers1"
                                />
                                <span
                                class="input-group-text"
                                data-td-target="#linkedPickers1"
                                data-td-toggle="datetimepicker"
                                style="background-color:crimson"
                                >
                                <span class="fa-solid fa-calendar" style="color:black"></span>
                                </span>
                            </div>
                        </div>
                        <!-- Datetime Picker linked2 -->
                        <div class="col-sm-3">
                            <div
                                class="input-group log-event"
                                id="linkedPickers2"
                                data-td-target-input="nearest"
                                data-td-target-toggle="nearest"
                                >
                                <input
                                id="linkedPickers2Input"
                                type="text"
                                class="form-control"
                                data-td-target="#linkedPickers2"
                                />
                                <span
                                class="input-group-text"
                                data-td-target="#linkedPickers2"
                                data-td-toggle="datetimepicker"
                                style="background-color:crimson"
                                >
                                <span class="fa-solid fa-calendar" style="color:black"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
  <div class="panel-body">
    <br><br><br>
    <!-- Show Table Data -->
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-sm-12">
            <div class="card shadow-2-strong" style="background-color:grey">
              <div class="card-body p-0">
                <div class="table-responsive table-scroll my-custom-scrollbar my-custom-scrollbar-primary" data-mdb-perfect-scrollbar="true" style="position: relative; height: 700px">
                  <table class="table table-dark table-striped mb-0">
                    <thead style="background-color: #393939;">
                      <tr class="text-uppercase text-danger text-center">
                        <th scope="col">Bill Name</th>
                        <th scope="col">TimeStamp</th>
                        <th scope="col">Inbound Traffic(kbps)</th>
                        <th scope="col">Outbound Traffic(kbps)</th>
                      </tr>
                    </thead>
                    <tbody class="text-center" id="showdata"></tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- Export button -->
  <div class="float-end">
    <div class="btn-group mt-3 fixed-btn">
      <button type="button" id="export" class="btn btn-danger">Export</button>
      <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="visually-hidden">Toggle Dropdown</span>
      </button>
      <ul class="dropdown-menu dropdown-menu-dark">
        <li><button id="xlsx" class="dropdown-item file-type text-center">XLSX</button></li>
        <li><button id="xls" class="dropdown-item file-type text-center">XLS</button></li>
        <li><button id="csv" class="dropdown-item file-type text-center">CSV</button></li>
      </ul>
      <select name="type_file" classs="form-control" hidden>
        <option value="xlsx">XLSX</option>
        <option value="xls">XLS</option>
        <option value="csv">CSV</option>
      </select>
    </div>
  </div>
</div>

@endsection