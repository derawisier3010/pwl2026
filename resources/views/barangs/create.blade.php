<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Barang
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">

            {{-- Notifikasi error --}}
            @if ($errors->any())
                <div class="mb-4 text-red-600">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>- {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('barangs.store') }}" method="POST">
                @csrf

                {{-- Nama Barang --}}
                <div class="mb-4">
                    <label class="block mb-1">Nama Barang</label>
                    <input type="text" name="nama_barang"
                        class="w-full border rounded px-3 py-2"
                        placeholder="Contoh: Minyak Goreng"
                        required>
                </div>

                {{-- Stok --}}
                <div class="mb-4">
                    <label class="block mb-1">Stok</label>
                    <input type="number" name="stok"
                        class="w-full border rounded px-3 py-2"
                        placeholder="Contoh: 100"
                        required>
                </div>

                {{-- Harga --}}
                <div class="mb-4">
                    <label class="block mb-1">Harga</label>
                    <input type="number" name="harga"
                        class="w-full border rounded px-3 py-2"
                        placeholder="Contoh: 15000"
                        required>
                </div>

                {{-- Kategori --}}
                <div class="mb-4">
                    <label class="block mb-1">Kategori</label>
                    <select name="kategori"
                        class="w-full border rounded px-3 py-2"
                        required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Minyak">Minyak</option>
                        <option value="Gula">Gula</option>
                        <option value="Daging">Daging</option>
                    </select>
                </div>

                {{-- Tombol --}}
                <div class="flex justify-between">
                    <a href="{{ route('barangs.index') }}"
                        class="bg-gray-500 text-white px-4 py-2 rounded">
                        Kembali
                    </a>

                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded">
                        Simpan
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>