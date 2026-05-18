<div>
    @if ($success)
        <div class="alert-success">
            Pesan berhasil dikirim. Terima kasih sudah menghubungi saya.
        </div>
    @endif

    <form wire:submit.prevent="submit" class="contact-form">
        <div class="field-grid">
            <div>
                <input
                    type="text"
                    class="form-control"
                    wire:model="name"
                    placeholder="Your Name"
                    autocomplete="name"
                >

                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <input
                    type="email"
                    class="form-control"
                    wire:model="email"
                    placeholder="Your Email"
                    autocomplete="email"
                >

                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div>
            <input
                type="text"
                class="form-control"
                wire:model="subject"
                placeholder="Subject"
            >

            @error('subject')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <textarea
                class="form-control"
                wire:model="message"
                placeholder="Message"
            ></textarea>

            @error('message')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
            <span wire:loading.remove>Kirim Pesan</span>
            <span wire:loading>Mengirim...</span>
            <span>→</span>
        </button>
    </form>
</div>