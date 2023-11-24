@if ($target == 'addModal')
<div class="flex w-full min-h-screen absolute top-0 left-0 z-10 justify-center bg-neutral-700 bg-opacity-70">
    <div class="modalFormAll dark: fg-dark flex m-5 w-2/5 max-h-96 bg-neutral-50 absolute top-0 rounded-md shadow-md animated-swipedown">
        <form class="py-1 px-8 w-full m-3" action="{{route('items.save')}}" method="post">
            @csrf
            @method('PUT')
            <h2 class="dark:text-white text-center text-2xl text-black font-bold my-5">FORM ADD</h2>
            {{-- kolom input --}}
            <div class="flex justify-center my-10 gap-5">
                {{-- getting Id --}}
                <label class="relative w-full flex justify-center">
                    <input id="kode_aset" name="kode_aset" class="dark: bg-dark dark:text-neutral-200 bg-neutral-200 text-neutral-800 border-none text-sm w-full h-8 rounded-md px-2 shadow-sm bg-inherit border border-slate-500 outline-none inputtoSpan" type="text" pattern="[a-zA-Z0-9].{1,64}" autocomplete="off" required>
                    <span class="text-slate-500 text-sm cursor-text absolute top-[.4rem] left-3 duration-300">KODE</span>
                </label>
                <label class="relative w-full flex justify-center">
                    <input id="nama_aset" name="nama_aset" class="dark: bg-dark dark:text-neutral-200 bg-neutral-200 text-neutral-800 border-none text-sm w-full h-8 rounded-md px-2 shadow-sm bg-inherit border border-slate-500 outline-none inputtoSpan" type="text" pattern="[a-zA-Z0-9].{1,64}" autocomplete="off" required>
                    <span class="text-slate-500 text-sm cursor-text absolute top-[.4rem] left-3 duration-300">NAME</span>
                </label>
            </div>
            {{-- kolom input --}}
            <div class="flex justify-center my-10 gap-5">
                <label class="relative w-full flex justify-center">
                    <input id="harga_aset" name="harga_aset" class="dark: bg-dark dark:text-neutral-200 bg-neutral-200 text-neutral-800 border-none text-sm w-full h-8 rounded-md px-2 shadow-sm bg-inherit border border-slate-500 outline-none inputtoSpan" type="text" pattern="[0-9]{1,64}" autocomplete="off" required>
                    <span class="text-slate-500 text-sm cursor-text absolute top-[.4rem] left-3 duration-300">HARGA</span>
                </label>
                <label class="relative w-full flex justify-center">
                    <select id="id_jenis" name="id_jenis" class="dark: bg-dark dark:text-neutral-200 bg-neutral-200 text-neutral-800 border-none text-sm w-full h-8 rounded-md px-2 shadow-sm bg-inherit border border-slate-500 outline-none inputtoSpan " required>
                        <option value="" disabled selected hidden></option>
                        @foreach ($getJenis as $jenis)
                        <option value="{{$jenis->id_jenis}}">{{ $jenis->nama_jenis }}</option>
                        @endforeach
                    </select>
                    <span class="text-slate-500 text-sm cursor-default absolute top-[.4rem] left-3 duration-300">JENIS</span>
                </label>
            </div>
            {{-- kolom input --}}
            <div class="flex justify-center my-10 gap-5">
                <label class="relative w-full flex justify-center">
                    <select id="id_lokasi" name="id_lokasi" class="dark: bg-dark dark:text-neutral-200 bg-neutral-200 text-neutral-800 border-none text-sm w-full h-8 rounded-md px-2 shadow-sm bg-inherit border border-slate-500 outline-none inputtoSpan " required>
                        <option value="" disabled selected hidden></option>
                        @foreach ($getLokasi as $lokasi)
                        <option value="{{$lokasi->id_lokasi}}">{{ $lokasi->nama_lokasi }}</option>
                        @endforeach
                    </select>
                    <span class="text-slate-500 text-sm cursor-default absolute top-[.4rem] left-3 duration-300">LOKASI</span>
                </label>
                <label class="relative w-full flex justify-center">
                    <select id="id_status" name="id_status" class="dark: bg-dark dark:text-neutral-200 bg-neutral-200 text-neutral-800 border-none text-sm w-full h-8 rounded-md px-2 shadow-sm bg-inherit border border-slate-500 outline-none inputtoSpan " required>
                        <option value="" disabled selected hidden></option>
                        @foreach ($getStatus as $status)
                        <option value="{{$status->id_status}}">{{ $status->status }}</option>
                        @endforeach
                    </select>
                    <span class="text-slate-500 text-sm cursor-default absolute top-[.4rem] left-3 duration-300">STATUS</span>
                </label>
            </div>
            {{-- Button --}}
            <div class="flex justify-end my-10">
                <label class="absolute">
                    <button type="button" class="close-modal-add text-xs h-8 rounded-md px-6 my-2 shadow-sm text-blue-500 font-bold">CANCEL</button>
                    <button type="submit" class="text-xs h-8 rounded-md px-5 my-2 shadow-sm bg-blue-500 text-white font-bold hover:bg-gray-500 duration-300">SUBMIT</button>
                </label>
            </div>
        </form>
    </div>
</div>
@endif
@if ($target == 'changesModal')
<div class="flex w-full min-h-screen absolute top-0 left-0 z-10 justify-center bg-neutral-700 bg-opacity-70">
    <div class="modalFormAll dark: fg-dark flex m-5 w-2/5 max-h-96 bg-neutral-50 absolute top-0 rounded-md shadow-md  animated-swipedown">
        <form class="py-1 px-8 w-full m-3" action="{{route('items.update',$item->id_aset)}}" method="post">
            @csrf
            @method('PUT')
            <h2 class="dark:text-white text-center text-2xl text-black font-bold my-5">FORM CHANGES</h2>
            {{-- kolom input --}}
            <div class="flex justify-center my-10 gap-5">
                {{-- getting Id --}}
                <input type="hidden" id="id_aset" name="id_aset" value="{{$item->id_aset}}">
                <label class="relative w-full flex justify-center">
                    <input id="kode_aset" name="kode_aset" class="dark: bg-dark dark:text-neutral-200 bg-neutral-200 text-neutral-800 border-none text-sm w-full h-8 rounded-md px-2 shadow-sm bg-inherit border border-slate-500 outline-none inputtoSpan" type="text" pattern="[a-zA-Z0-9].{1,64}" autocomplete="off" required value="{{$item->kode_aset}}">
                    <span class="text-slate-500 text-sm cursor-text absolute top-[.4rem] left-3 duration-300">KODE</span>
                </label>
                <label class="relative w-full flex justify-center">
                    <input id="nama_aset" name="nama_aset" class="dark: bg-dark dark:text-neutral-200 bg-neutral-200 text-neutral-800 border-none text-sm w-full h-8 rounded-md px-2 shadow-sm bg-inherit border border-slate-500 outline-none inputtoSpan" type="text" pattern="[a-zA-Z0-9].{1,64}" autocomplete="off" required value="{{$item->nama_aset}}">
                    <span class="text-slate-500 text-sm cursor-text absolute top-[.4rem] left-3 duration-300">NAME</span>
                </label>
            </div>
            {{-- kolom input --}}
            <div class="flex justify-center my-10 gap-5">
                <label class="relative w-full flex justify-center">
                    <input id="harga_aset" name="harga_aset" class="dark: bg-dark dark:text-neutral-200 bg-neutral-200 text-neutral-800 border-none text-sm w-full h-8 rounded-md px-2 shadow-sm bg-inherit border border-slate-500 outline-none inputtoSpan" type="text" pattern="[0-9]{1,64}" autocomplete="off" required value="{{$item->harga_aset}}">
                    <span class="text-slate-500 text-sm cursor-text absolute top-[.4rem] left-3 duration-300">HARGA</span>
                </label>
                <label class="relative w-full flex justify-center">
                    <select id="id_jenis" name="id_jenis" class="dark: bg-dark dark:text-neutral-200 bg-neutral-200 text-neutral-800 border-none text-sm w-full h-8 rounded-md px-2 shadow-sm bg-inherit border border-slate-500 outline-none inputtoSpan">
                        @php
                        $dataJenis = $getJenis->firstWhere('id_jenis', $item->id_jenis);
                        @endphp
                        @foreach ($getJenis as $jenis)
                        <option value="{{$jenis->id_jenis}}" {{ $item->id_jenis == $jenis->id_jenis ? 'selected' : '' }}>
                            {{ $jenis->nama_jenis }}
                        </option>
                        @endforeach
                    </select>
                    <span class="text-slate-500 text-sm cursor-text absolute top-[.4rem] left-3 duration-300">JENIS</span>
                </label>
            </div>
            {{-- kolom input --}}
            <div class="flex justify-center my-10 gap-5">
                <label class="relative w-full flex justify-center">
                    <select id="id_lokasi" name="id_lokasi" class="dark: bg-dark dark:text-neutral-200 bg-neutral-200 text-neutral-800 border-none text-sm w-full h-8 rounded-md px-2 shadow-sm bg-inherit border border-slate-500 outline-none inputtoSpan">
                        @php
                        $dataLokasi = $getLokasi->firstWhere('id_lokasi', $item->id_lokasi);
                        @endphp
                        @foreach ($getLokasi as $lokasi)
                        <option value="{{$lokasi->id_lokasi}}" {{ $item->id_lokasi == $lokasi->id_lokasi ? 'selected' : '' }}>
                            {{ $lokasi->nama_lokasi }}
                        </option>
                        @endforeach
                    </select>
                    <span class="text-slate-500 text-sm cursor-text absolute top-[.4rem] left-3 duration-300">LOKASI</span>
                </label>
                <label class="relative w-full flex justify-center">
                    <select id="id_status" name="id_status" class="dark: bg-dark dark:text-neutral-200 bg-neutral-200 text-neutral-800 border-none text-sm w-full h-8 rounded-md px-2 shadow-sm bg-inherit border border-slate-500 outline-none inputtoSpan">
                        @php
                        $dataStatus = $getStatus->firstWhere('id_status', $item->id_status);
                        @endphp
                        @foreach ($getStatus as $status)
                        <option value="{{$status->id_status}}" {{ $item->id_status == $status->id_status ? 'selected' : '' }}>
                            {{ $status->status }}
                        </option>
                        @endforeach
                    </select>
                    <span class="text-slate-500 text-sm cursor-text absolute top-[.4rem] left-3 duration-300">STATUS</span>
                </label>
            </div>
            {{-- Button --}}
            <div class="flex justify-end my-10">
                <label class="absolute">
                    <button type="button" class="close-modal-changes text-xs h-8 rounded-md px-6 my-2 shadow-sm text-blue-500 font-bold">CANCEL</button>
                    <button type="submit" class="text-xs h-8 rounded-md px-5 my-2 shadow-sm bg-blue-500 text-white font-bold hover:bg-gray-500 duration-300">SUBMIT</button>
                </label>
            </div>
        </form>
    </div>
</div>
@endif
@if($target == 'deleteModal')
<div class="flex w-full min-h-screen absolute top-0 left-0 z-10 justify-center bg-neutral-700 bg-opacity-70">
    <div class="modalFormAll dark: fg-dark flex m-5 w-2/5 h-[20%] max-h-fit bg-neutral-50 absolute top-40 rounded-md shadow-md  animated-swipedown">
        <form class="py-1 px-4 w-full m-2" action="{{route('items.destroy',$item->id_aset)}}" method="post">
            @csrf
            @method('DELETE')
            <h2 class="dark:text-white text-start text-lg text-black font-bold my-2">FORM DELETE</h2>
            {{-- kolom input --}}
            <div class="flex justify-start">
                <span class="text-sm py-1">Apakah anda yakin ingin menghapus data?</span>
            </div>
            {{-- getting Id --}}
            <input type="hidden" id="id_aset" name="id_aset" value="{{$item->id_aset}}">
            {{-- Button --}}
            <div class="flex w-full justify-end my-2">
                <label class="absolute bottom-2">
                    <button type="button" class="close-modal-delete text-xs h-8 rounded-md px-6 my-2 shadow-sm text-blue-500 font-bold">CANCEL</button>
                    <button type="submit" class="text-xs h-8 rounded-md px-5 my-2 shadow-sm bg-blue-500 text-white font-bold hover:bg-gray-500 duration-300">DELETE</button>
                </label>
            </div>
        </form>
    </div>
</div>
@endif
