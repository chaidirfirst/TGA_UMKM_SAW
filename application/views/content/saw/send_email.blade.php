@extends('master')

@section('content')
<div class="az-content-breadcrumb">
    <span>Petugas</span>
    <span>{{ $title }}</span>
</div>
<h2 class="az-content-title text-capitalize">{{ $title }}</h2>
<div class="row row-sm mg-b-20">
    <div class="col-lg-12 mt-2  ">
        <div class="card">
            <div class="card-title p-3">
                Alternatif SAW Data {{ count($alternatif_saw) }}
            </div>
            <div class="card-body">
                <table id="send-emails" class="display responsive">
                    <thead>
                        <tr>
                            <th class="wd-5p">No</th>
                            <th class="wd-5p">NIK</th>
                            <th class="wd-20p">Nama</th>
                            <th class="wd-5p">No Hp</th>
                            <th class="wd-5">Nama Usaha</th>
                            <th class="wd-20p">Total</th>
                            <th class="wd-6p">Rank</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no=1;
                        @endphp
                        @foreach($rank_top as $key=>$row)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $row['nik'] }}</td>
                            <td>{{ $row['nama_lengkap'] }}</td>
                            <td>{{ $row['no_telepon'] }}</td>
                            <td>{{ $row['bidang_usaha'] }}</td>
                            <td>{{ $row['total'] }}</td>
                            <td>
                                @if($no<=3) <h3 class="text-white p-2 bg-success">{{ $no++ }}</h3>
                                    @else
                                    {{ $no++}}
                                    @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

@endsection


@section('js')
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    <script>
        $('#send-emails').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
            });
    </script>
@endsection