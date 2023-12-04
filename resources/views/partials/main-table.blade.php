<table id="chooseTable" class="font-sans w-full shadow-md">
    <!-- Table Head -->
    <thead class="sticky top-0 bg-blue-500 h-10">
        <tr>
            <th class="text-center text-sm font-semibold text-neutral-100">No
            </th>
            <th class="text-center text-sm font-semibold text-neutral-100">Kode
            </th>
            <th class="text-center text-sm font-semibold text-neutral-100">Nama
            </th>
            <th class="text-center text-sm font-semibold text-neutral-100">Harga
            </th>
            <th class="text-center text-sm font-semibold text-neutral-100">Jenis
            </th>
            <th class="text-center text-sm font-semibold text-neutral-100">Lokasi
            </th>
            <th class="text-center text-sm font-semibold text-neutral-100">Status
            </th>
            <th class="text-center text-sm font-semibold text-neutral-100">Deskripsi
            </th>
            <th class="text-center text-sm font-semibold text-neutral-100">Tanggal
            </th>
            <th class="text-center text-sm font-semibold text-neutral-100">Action
            </th>
        </tr>
    </thead>
    <!-- Table Body -->
    @php
    $page = request()->input('page', 1);
    $no = ($page - 1) * 10 + 1;
    @endphp
    <tbody id="chooseTbody" class="bg-neutral-50 bg-neutral-100 text-black text-center max-h-screen">
        @foreach ($getAset as $aset)
        <tr class="dark: fg-dark dark:text-white dark:hover:text-blue-500 dark:hover:bg-neutral-900 hover:bg-slate-200 h-12 duration-300">
            <td class="w-10">{{ $no++."."}}</td>
            <td class="text-xs p-0 m-0 uppercase">{{ $aset->kode_aset }}</td>
            <td class="text-xs p-0 m-0">{{ $aset->nama_aset }}</td>
            <td class="text-xs p-0 m-0">{{ number_format($aset->harga_aset, 0, ',', '.') }}</td>
            <td class="text-xs p-0 m-0">
                @php
                $dataJenis = $getJenis->firstWhere('id_jenis', $aset->id_jenis);
                @endphp
                {{ $dataJenis->nama_jenis?:"N/A" }}
            </td>
            <td class="text-xs p-0 m-0">
                @php
                $dataLokasi = $getLokasi->firstWhere('id_lokasi', $aset->id_lokasi);
                @endphp
                {{ $dataLokasi->nama_lokasi?:"N/A" }}
            </td>
            <td class="text-xs p-0 m-0">
                @php
                $dataStatus = $getStatus->firstWhere('id_status', $aset->id_status);
                @endphp
                {{ $dataStatus->status?:"N/A" }}
            </td>
            <td class="text-xs p-0 m-0 flex justify-center">
                <p class="w-36 truncate">{{ $aset->deskripsi }}</p>
            </td>
            <td class="text-xs p-0 m-0">{{ $aset->date_modified ?: $aset->date_registered }}</td>
            <td class="text-sm p-3 m-0 flex justify-evenly">
                @if(isset($_COOKIE['userId']))
                {{-- edit button --}}
                <button class="open-modal-changes" data-id="{{$aset->id_aset}}" data-target="changesModal"><i class="ri-edit-2-line text-lg cursor-pointer text-orange-500 hover:text-blue-500"></i></button>
                {{-- delete button --}}
                <button class="open-modal-delete" data-id="{{$aset->id_aset}}" data-target="deleteModal"><i class="ri-delete-bin-6-line text-lg text-red-500 hover:text-blue-500"></i>
                </button>
                @else
                {{-- delete button --}}
                <button class="open-modal-read" data-id="{{$aset->id_aset}}" data-target="readModal"><i class="ri-file-list-3-line text-lg text-red-500 hover:text-blue-500"></i>
                </button>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
