@foreach ($laporan_dana as $data)
    <tr>
        <td>{{ $data->id }}</td>
        <td>{{ $data->tanggal }}</td>
        <td>{{ $data->user }}</td>
        <td>{{ $data->berkas }}</td>
        <td>{{ $data->keterangan }}</td>
        <td>
            <a class="btn btn-primary" href="{{ route('user review', ['id' => $data->id]) }}">
                Detail
            </a>
        </td>
    </tr>
@endforeach
