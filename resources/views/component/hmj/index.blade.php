@foreach ($pengajuan_dana as $data)
@if ($data->status == "setuju")
<tr class="table-primary">
    @elseif ($data->status == "tolak")
<tr class="table-danger">
    @else
<tr class="table-warning">
    @endif
    <td>{{ $data->id }}
       
    </td>
    <td>{{ $data->name }}</td>
    <td>{{ $data->tanggal }}</td>
    <td>
        <p>
            {{ $data->jenis_pengajuan}}
        </p>
        <p>
            ({{ $data->status }})
        </p>
    </td>

    <td>
        <a href="{{ route('user review', ['id' => $data->id]) }}" class="btn btn-primary">detail</a>
    </td>
</tr>
@endforeach