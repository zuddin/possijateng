<div class="col-6 col-md-12 mb-12">
    <a href="/event/{{ $event->slug }}" wire:navigate class="text-decoration-none">
        <div class="card border-0 rounded shadow-sm">
            <div class="card-body text-center">
                <!-- <img src="{{ asset('/storage/' . $event->image) }}" class="img-fluid" width="50"> -->
                <label class="text-center">{{ $event->nama_event }}</label>
            </div>
        </div>
    </a>
</div>