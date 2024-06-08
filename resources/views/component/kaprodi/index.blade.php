@foreach ($pengajuan_dana as $data)
@if ($data->name == 'Kepala Prodi')
<tr>
    <td>{{ $data->id }}</td>
    <td>{{ $data->name }}</td>
    <td>{{ $data->tanggal }}</td>
    <td>
        <p>
            Pengajuan Dana
        </p>
        <p>
            ({{ $data->status }})
        </p>
    </td>

    <td>
        <a href="{{ route('user review', ['id' => $data->id]) }}" class="btn btn-primary">detail</a>
    </td>
</tr>
@endif
@endforeach
@foreach ($pencairan_dana_all as $data)
    @if ($data->diteruskan == null)
    @else
    @if ($data->name == 'Kepala Prodi')
        <tr>
            <td>{{ $data->id }}</td>
            <td>{{ $data->name }}</td>
            <td>{{ $data->tanggal }}</td>

            <td>Pencairan dana</td>


            <td>
                <a href="{{ route('user konfirmasi pencairan dana', ['id' => $data->id]) }}"
                    class="btn btn-primary">detail</a>
            </td>
        </tr>
        @endif
    @endif
@endforeach
