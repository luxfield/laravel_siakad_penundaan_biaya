@if (Session::get('user') == 'Warek')
@foreach ($laporan_dana as $data)
    <tr>
        <td>
            {{ $data->id }}
        </td>
        <td>
            {{ $data->user }}

        </td>
        <td>
            {{ $data->tanggal }}

        </td>
        <td>
            <a href="{{ route('user review', ['id' => $data->id]) }}"
                class="btn btn-primary">detail</a>

        </td>
@endforeach

@endif
@if (Session::get('user') == 'Wadek')

@foreach ($data_pengajuan as $data)
    <tr>
        <td>
            {{ $data->id }}
        </td>
        <td>
            {{ $data->name }}

        </td>
        <td>
            {{ $data->tanggal }}

        </td>
        <td>
            <p h3>Pengajuan dana</p>
            ({{ $data->status }})
        </td>

        <td>
            <a href="{{ route('user review', ['id' => $data->id]) }}"
                class="btn btn-primary">detail</a>
        </td>
    </tr>
@endforeach
@foreach ($data_pencairan as $data)
    <tr>
        <td>
            {{ $data->id }}
        </td>
        <td>
            {{ $data->name }}

        </td>
        <td>
            {{ $data->tanggal }}

        </td>
        <td>
            <p>Pencairan dana</p>
            @if ($data->disetujui == '-')
                <p>(pending)</p>
            @else
                <p>(disetujui)</p>
            @endif
        </td>
        <td>
            <a href="{{ route('user konfirmasi pencairan dana', ['id' => $data->id]) }}"
                class="btn btn-primary">detail</a>
        </td>
    </tr>
@endforeach
@foreach ($data_pelaporan as $data)
    <tr>
        <td>
            {{ $data->id }}
        </td>
        <td>
            {{ $data->name }}

        </td>
        <td>
            {{ $data->tanggal }}

        </td>
        <td>
            <p> Pelaporan Dana </p>
            </p>(diteruskan oleh {{ $data->diteruskan }})<p>
        </td>
        <td>
            <a href="{{ route('user review', ['id' => $data->id]) }}"
                class="btn btn-primary">detail</a>
        </td>
    </tr>
@endforeach
@foreach ($data_laporan as $data)
    <tr>
        <td>
            {{ $data->id }}
        </td>
        <td>
            {{ $data->name }}

        </td>
        <td>
            {{ $data->tanggal }}

        </td>
        <td>
            <p>Laporan penggunaan dana</p>
            <p>
                ({{ $data->status }})
            </p>
        </td>
        <td>
            <a href="{{ route('user review', ['id' => $data->id]) }}"
                class="btn btn-primary">detail</a>
        </td>
    </tr>
@endforeach

@endif
@if (Session::get('user') != 'Wadek' && Session::get('user') != 'Warek')
@foreach ($pengajuan_dana as $data)
    <tr>
        <td>{{ $data->id }}</td>
        <td>{{ $data->name }}</td>
        <td>{{ $data->tanggal }}</td>
        @if (Session::get('user') != 'Biro' && Session::get('user') != 'Warek')
            <td><span class="tag tag-success">{{ $data->status }}</span></td>
        @endif
        <td>pengajuan dana</td>
        @if (Session::get('user') == 'TU')
            <td>{{ $data->disetujui }}</td>
            <td>{{ $data->diteruskan }}</td>
        @endif
        @if (Session::get('user') != 'Biro')
            <td>
                <a class="btn btn-primary"
                    href="
                            @if (Session::get('user') != 'TU') {{ route('user review', ['id' => $data->id]) }}
                            @else
                            {{ route('staff review', ['id' => $data->id]) }} @endif
                            ">Detail</a>
            </td>
        @endif
        @if (Session::get('user') == 'Biro')
            <td>

                <a href="{{ route('user konfirmasi pencairan dana', ['id' => $data->id]) }}"
                    class="btn btn-primary">detail</a>
            </td>
        @endif


    </tr>
@endforeach
@endif
@if (Session::get('user') == 'TU' || Session::get('user') == 'HMJ')

@foreach ($pencairan_dana_all as $data)
    @if ($data->diteruskan == null)
    @else
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
            @if (Session::get('user') == 'TU')
                <td></td>
            @endif
            @if (Session::get('user') == 'HMJ')
                <td></td>
            @endif
            <td>Pencairan dana</td>
            <td>{{ $data->disetujui }}</td>
            @if (Session::get('user') == 'TU')
                <td>{{ $data->diteruskan }}</td>
            @endif

            <td>
                <a href="{{ route('user konfirmasi pencairan dana', ['id' => $data->id]) }}"
                    class="btn btn-primary">detail</a>
            </td>
        </tr>
    @endif
@endforeach
@if (Session::get('user') == 'TU')
    @foreach ($laporan_dana as $laporan)
        <tr>
            <td>{{ $laporan->id }}</td>
            <td>{{ $laporan->name }}</td>
            <td>{{ $laporan->tanggal }}</td>
            <td>{{ $laporan->status }}</td>
            <td>Laporan Dana</td>
            <td>{{ $laporan->disetujui }}</td>
            <td>{{ $laporan->diteruskan }}</td>
            <td>
                <a href="{{ route('staff review', ['id' => $laporan->id]) }}"
                    class="btn btn-primary">detail</a>
            </td>
        </tr>
    @endforeach
@endif
@endif
