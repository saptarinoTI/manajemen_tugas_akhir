<div class="d-flex align-items-center h-100">
    <div class="row w-100 d-flex justify-content-center">
        <div class="col-12 text-center my-2">
            {{-- Image --}}
            {{ $logo }}
        </div>

        {{-- Form Login --}}
        <div class="col-lg-5 col-md-6 col-sm-12 col-12 my-3">
            {{-- Card Component --}}
            <div class="guest-card">
                <div class="card-body">
                    {{ $slot }}
                </div>
            </div>
        </div>

    </div>
</div>
