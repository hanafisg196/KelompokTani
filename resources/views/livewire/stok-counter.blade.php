<div>
    {{-- In work, do what you enjoy. --}}

    <div class="mt-3 pull-right">
        <button type="button" wire:click.prevent="accept({{ $bayar->id }})"
             class="btn btn-danger">Tolak Pembayaran</button>




        <button type="submit" class="btn btn-info">Konfirmasi Pembayaran</button>
    </div>
</div>
