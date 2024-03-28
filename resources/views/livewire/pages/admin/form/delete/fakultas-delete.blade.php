<div wire:ignore.self class="modal modal-blur fade" id="modalDelete" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" wire:click="tutupModalDelete()" class="btn-close" data-bs-dismiss="modal"
                aria-label="Close"></button>
            <div class="modal-status bg-danger"></div>
            <div class="modal-body text-center py-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24"
                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 9v4"></path>
                    <path
                        d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z">
                    </path>
                    <path d="M12 16h.01"></path>
                </svg>
                <h3>Menghapus <b>{{ $tahun_akademik ?? '' }}</b>?</h3>
                <div class="text-secondary">Data yang telah di hapus tidak dapat dikembalikan</div>
            </div>
            <div class="modal-footer">
                <div class="w-100">
                    <div class="row">
                        <div class="col"><a href="javascritp:void(0)" class="btn w-100"
                                wire:click="tutupModalDelete()" data-bs-dismiss="modal">
                                Batalkan
                            </a></div>
                        <div class="col"><button wire:click="delete()" type="button" class="btn btn-danger w-100">
                                Hapus
                            </button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
