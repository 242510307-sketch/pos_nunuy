<?php if(!empty($produk->foto)): ?>
    <div class="mb-2">
        <label>Foto Saat Ini</label><br>
        <img
            src="<?php echo e(asset('storage/' . $produk->foto)); ?>"
            width="150"
            class="img-thumbnail"
        >
    </div>
<?php endif; ?>


<div class="row mb-3">

    <div class="col">
        <div>
            <label>Gambar</label>

            <input
                type="file"
                name="foto"
                onchange="previewImage(this)"
                class="form-control <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
            >

            <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="invalid-feedback d-block">
                    <?php echo e($message); ?>

                </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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



<div class="mb-3">

    <label for="name" class="form-label">
        Nama Produk
    </label>

    <input
        type="text"
        name="name"
        id="name"
        class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
        value="<?php echo e(old('name', $produk->nama ?? '')); ?>"
    >

    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="invalid-feedback">
            <?php echo e($message); ?>

        </div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

</div>



<div class="mb-3">

    <label for="jenis" class="form-label">
        Jenis
    </label>

    <select
        name="jenis"
        id="jenis"
        class="form-control <?php $__errorArgs = ['jenis'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
    >

        <option value="">
            -- Pilih Jenis --
        </option>

        <option
            value="Makanan"
            <?php echo e(old('jenis', $produk->jenis ?? '') == 'Makanan' ? 'selected' : ''); ?>

        >
            Makanan
        </option>

        <option
            value="Minuman"
            <?php echo e(old('jenis', $produk->jenis ?? '') == 'Minuman' ? 'selected' : ''); ?>

        >
            Minuman
        </option>

        <option
            value="Barang"
            <?php echo e(old('jenis', $produk->jenis ?? '') == 'Barang' ? 'selected' : ''); ?>

        >
            Barang
        </option>

    </select>

    <?php $__errorArgs = ['jenis'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="invalid-feedback">
            <?php echo e($message); ?>

        </div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

</div>



<div class="mb-3">

    <label for="purchase_price" class="form-label">
        Harga Beli
    </label>

    <input
        type="number"
        name="purchase_price"
        id="purchase_price"
        class="form-control <?php $__errorArgs = ['purchase_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
        value="<?php echo e(old('purchase_price', $produk->harga_beli ?? '')); ?>"
    >

    <?php $__errorArgs = ['purchase_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="invalid-feedback">
            <?php echo e($message); ?>

        </div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

</div>



<div class="mb-3">

    <label for="selling_price" class="form-label">
        Harga Jual
    </label>

    <input
        type="number"
        name="selling_price"
        id="selling_price"
        class="form-control <?php $__errorArgs = ['selling_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
        value="<?php echo e(old('selling_price', $produk->harga_jual ?? '')); ?>"
    >

    <?php $__errorArgs = ['selling_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="invalid-feedback">
            <?php echo e($message); ?>

        </div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

</div>



<div class="mb-3">

    <label for="stock" class="form-label">
        Stok
    </label>

    <input
        type="number"
        name="stock"
        id="stock"
        class="form-control <?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
        value="<?php echo e(old('stock', $produk->stok ?? '')); ?>"
    >

    <?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="invalid-feedback">
            <?php echo e($message); ?>

        </div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

</div>



<button
    class="btn btn-success mt-3"
    type="submit"
>
    Simpan
</button>

<a
    href="<?php echo e(route('produk.index')); ?>"
    class="btn btn-secondary mt-3"
>
    Kembali
</a>



<script>
    function previewImage(input) {

        const preview = document.getElementById('preview');
        const file = input.files[0];

        if (file) {

            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';

        }

    }
</script><?php /**PATH C:\laragon\www\pos_nunuy\resources\views/Produk/_form.blade.php ENDPATH**/ ?>