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