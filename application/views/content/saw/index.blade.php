@extends('master')
@section('css')

    <link href="{{ base_url('assets') }}/lib/select2/css/select2.min.css" rel="stylesheet">
    <style>
        th,
        td {
            white-space: nowrap;
        }

        tr {
            margin-top: 10px;
        }

        div.dataTables_wrapper {
            width: 100%;
            margin: 0 auto;
        }

        .dataTables_scrollHead {
            margin-bottom: -15px !important;
        }

    </style>
@endsection
@section('content')
    <div class="az-content-breadcrumb">
        <span>Petugas</span>
        <span>{{ $title }}</span>
    </div>
    <h2 class="az-content-title text-capitalize">{{ $title }}</h2>
        <div class="row row-sm mg-b-20">
            <div class="col-lg-12 col-xs-12 col-12 ">
                <div class="card">
                    <div class="card-body my-2">
                        <div class="input-group my-2 " style="width: 250px;">
                            <input type="number" id="limit_data" min="0"   class="form-control ">
                            <button  class="btn btn-primary" id="btn-limit">Limit Data</button>
                        </div>
                        <table id="fixed" class="display stripe  nowrap ">
                            <thead>
                                <th class="wd-5p">No</th>
                                <th class="wd-30p">{{ get_msg('nik') }}</th>
                                <th class="wd-30p">{{ get_msg('nama_lengkap') }} </th>
                                <th class="wd-25p">{{ get_msg('bidang_usaha') }} (C1)</th>
                                <th class="wd-25p">{{ get_msg('aset') }} (C2)</th>
                                <th class="wd-20p">{{ get_msg('umur') }} (C3)</th>
                                <th class="wd-25p">{{ get_msg('nb_skhu') }} (C4)</th>
                                <th class="wd-25p">{{ get_msg('omset') }} (C5) </th>
                                <th class="wd-15p">{{ get_msg('kecamatan') }} (C6)</th>
                                <th class="wd-25p">{{ get_msg('status_penerima') }} (C7)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                    
                                @endphp
                                @foreach ($data as $key => $row)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $row->nik }}</td>
                                        <td>{{ $row->nama_lengkap }}</td>
                                        <td>{{ $row->C1 }}</td>
                                        <td>{{ $row->C2 }}</td>
                                        <td>{{ $row->C3 }}</td>
                                        <td>{{ $row->C4 }}</td>
                                        <td>{{ $row->C5 }}</td>
                                        <td>{{ $row->C6 }}</td>
                                        <td>{{ $row->C7 }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-body">
                        <p>Jumlah Data {{ $CI->db->count_all('masyarakat') }}</p>
                        <div class="row">
                            <div class="col-lg-12 mg-t-20 mg-lg-t-0">
                                <form action="{{ base_url('/Spk_saw') }}" method="POST">
                                    <input type="text" class="form-control" name="top" placeholder="Top Rank">
                                    <input type="hidden" name="limit" value="{{ $limit }}">
                                    <button class=" btn btn-az-primary btn-block mt-2" type="submit">Proses Perankingan</button>
                               
                                    <div class="alert alert-info">
                                        Jika Rank Top Di kosongkan Maka Secara Default akan dirankingan semuanya
                                    </div>
                     
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('js')
    <script src="{{ base_url('assets') }}/lib/select2/js/select2.min.js"></script>
    <script>
        $('.select2').select2({
            placeholder: 'File yang dilampiran saat mengirim email'
        });
        $("#btn-limit").click(()=>{
            var limit=$("#limit_data").val();
            if(limit<0){
                alert("Limit Tidak Bisa Kurang Dari 0");
            }else{
                window.location = "<?=base_url('Petugas/spk_saw/')?>"+limit;
            }
        });
    </script>
@endsection
