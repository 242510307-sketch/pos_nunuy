@if (!empty($produk->foto))
    <div class="mb-2">
        <label>Foto Saat Ini</label><br>
        <img
            src="{{ asset('storage/' . $produk->foto) }}"
            width="150"
            class="img-thumbnail"
        >
    </div>
@endif

{{-- FOTO --}}
<div class="row mb-3">

    <div class="col">
        <div>
            <label>Gambar</label>

            <input
                type="file"
                name="foto"
                onchange="previewImage(this)"
                class="form-control @error('foto') is-invalid @enderror"
            >

            @error('foto')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    <div class="col">
        <div class="mb-2">
            <label>Preview Foto</label><br>

            <img
                id="preview"
                class="img-thumbnail mt-2"
                style="display: none;"
                width="150"
            >
        </div>
    </div>

</div>


{{-- NAMA PRODUK --}}
<div class="mb-3">

    <label for="name" class="form-label">
        Nama Produk
    </label>

    <input
        type="text"
        name="name"
        id="name"
        class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $produk->nama ?? '') }}"
    >

    @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>


{{-- JENIS PRODUK --}}
<div class="mb-3">

    <label for="jenis" class="form-label">
        Jenis
    </label>

    <select
        name="jenis"
        id="jenis"
        class="form-control @error('jenis') is-invalid @enderror"
    >

        <option value="">
            -- Pilih Jenis --
        </option>

        <option
            value="Makanan"
            {{ old('jenis', $produk->jenis ?? '') == 'Makanan' ? 'selected' : '' }}
        >
            Makanan
        </option>

        <option
            value="Minuman"
            {{ old('jenis', $produk->jenis ?? '') == 'Minuman' ? 'selected' : '' }}
        >
            Minuman
        </option>

        <option
            value="Barang"
            {{ old('jenis', $produk->jenis ?? '') == 'Barang' ? 'selected' : '' }}
        >
            Barang
        </option>

    </select>

    @error('jenis')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>


{{-- HARGA BELI --}}
<div class="mb-3">

    <label for="purchase_price" class="form-label">
        Harga Beli
    </label>

    <input
        type="number"
        name="purchase_price"
        id="purchase_price"
        class="form-control @error('purchase_price') is-invalid @enderror"
        value="{{ old('purchase_price', $produk->harga_beli ?? '') }}"
    >

    @error('purchase_price')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>


{{-- HARGA JUAL --}}
<div class="mb-3">

    <label for="selling_price" class="form-label">
        Harga Jual
    </label>

    <input
        type="number"
        name="selling_price"
        id="selling_price"
        class="form-control @error('selling_price') is-invalid @enderror"
        value="{{ old('selling_price', $produk->harga_jual ?? '') }}"
    >

    @error('selling_price')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>


{{-- STOK --}}
<div class="mb-3">

    <label for="stock" class="form-label">
        Stok
    </label>

    <input
        type="number"
        name="stock"
        id="stock"
        class="form-control @error('stock') is-invalid @enderror"
        value="{{ old('stock', $produk->stok ?? '') }}"
    >

    @error('stock')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>


{{-- TOMBOL --}}
<button
    class="btn btn-success mt-3"
    type="submit"
>
    Simpan
</button>

<a
    href="{{ route('produk.index') }}"
    class="btn btn-secondary mt-3"
>
    Kembali
</a>


{{-- PREVIEW FOTO --}}
<script>
    function previewImage(input) {

        const preview = document.getElementById('preview');
        const file = input.files[0];

        if (file) {

            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';

        }

    }
</script>