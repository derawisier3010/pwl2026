<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manajemen Barang
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto">

            {{-- Notifikasi sukses --}}
            @if (session('success'))
                <div class="mb-4 p-3 bg-green-200 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Tombol tambah --}}
            <a href="{{ route('barangs.create') }}"
               class="bg-blue-500 text-white px-4 py-2 rounded">
                + Tambah Barang
            </a>

            {{-- Tabel --}}
            <div class="mt-4 overflow-x-auto">
                <table class="w-full border border-gray-300 text-left">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-2 border">No</th>
                            <th class="p-2 border">Nama Barang</th>
                            <th class="p-2 border">Stok</th>
                            <th class="p-2 border">Harga</th>
                            <th class="p-2 border">Kategori</th>
                            <th class="p-2 border text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($barangs as $index => $barang)
                        <tr>
                            <td class="p-2 border">{{ $index + 1 }}</td>
                            <td class="p-2 border">{{ $barang->nama_barang }}</td>
                            <td class="p-2 border">{{ $barang->stok }}</td>
                            <td class="p-2 border">
                                Rp {{ number_format($barang->harga, 0, ',', '.') }}
                            </td>
                            <td class="p-2 border">{{ $barang->kategori }}</td>
                            <td class="p-2 border text-center">

                                {{-- Edit --}}
                                <a href="{{ route('barangs.edit', $barang->id) }}"
                                   class="bg-yellow-400 px-3 py-1 rounded text-white">
                                   Edit
                                </a>

                                {{-- Hapus --}}
                                <form action="{{ route('barangs.destroy', $barang->id) }}"
                                      method="POST"
                                      class="inline"
                                      onsubmit="return confirm('Yakin mau hapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-500 px-3 py-1 rounded text-white">
                                        Hapus
                                    </button>
                                </form>

                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center p-4">
                                Data barang belum ada
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>