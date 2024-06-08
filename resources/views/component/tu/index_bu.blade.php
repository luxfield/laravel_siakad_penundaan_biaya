@foreach ($pengajuan_dana as $data)
<tr>
    @switch(Session::get('user'))
    @case('TU')
    <td>{{ $data->id }}</td>
    @break

    @case('HMJ')
    <td>{{ $data->id }}</td>
    @break

    @default
    @endswitch

    <td>{{ $data->name }}</td>
    <td>{{ $data->tanggal }}</td>
    <td>{{ $data->status }}</td>
    <td>Pengajuan dana</td>
    <td>{{ $data->disetujui }}</td>
    <td>{{ $data->diteruskan }}</td>
    <td>{{ $data->dikonfirmasi }}</td>
    <td>{{ $data->disahkan }}</td>

    <td>
        <a href="{{ route('staff review', ['id' => $data->id]) }}" class="btn btn-primary">detail</a>
    </td>
</tr>
@endforeach
@foreach ($pencairan_dana_all as $data)
@if ($data->disetujui == null)
@else
<tr class="table-danger">
    @switch(Session::get('user'))
    @case('TU')
    <td>{{ $data->id }}</td>
    @break

    @case('HMJ')
    <td>{{ $data->id }}</td>
    @break

    @default
    @endswitch

    <td>{{ $data->name }}</td>
    <td>{{ $data->tanggal }}</td>
    <td></td>
    <td>Pencairan dana</td>
    <td>{{ $data->disetujui }}</td>
    <td>{{ $data->diteruskan }}</td>
    <td></td>
    <td></td>

    <td>
        <a href="{{ route('user konfirmasi pencairan dana', ['id' => $data->id]) }}" class="btn btn-primary">detail</a>
    </td>
</tr>
@endif
@endforeach

@foreach ($laporan_dana as $laporan)
@if ($laporan->status == "setuju")
    <tr class="table-primary">
@elseif($laporan->status == "pending")
    <tr class="table-warning">
@else
    <tr class="table-danger">
@endif
    <td>{{ $laporan->id }}</td>
    <td>{{ $laporan->name }}</td>
    <td>{{ $laporan->tanggal }}</td>
    <td>{{ $laporan->status }}</td>
    <td>{{ $laporan->jenis_pengajuan }}</td>
    <td>{{ $laporan->disetujui }}</td>
    <td>{{ $laporan->diteruskan }}</td>
    <td>{{ $laporan->dikonfirmasi }}</td>
    <td>{{ $laporan->disahkan }}</td>
    <td>
        <a href="{{ route('staff review', ['id' => $laporan->id]) }}" class="btn btn-primary">detail</a>
    </td>
</tr>

@endforeach
@foreach ($data_permintaan as $data)
<tr>


    <td>
        {{ $data->id }}
    </td>
    <td>
        {{ $data->nama }}
    </td>
    <td>
        {{ $data->tanggal }}
    </td>
    <td></td>
    <td>Pemintaan Pencairan Dana</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td>
        <a href="{{ route('user pencairan dana', ["id" => $data->id]) }}" class="btn btn-primary">detail</a>
    </td>
</tr>
@endforeach