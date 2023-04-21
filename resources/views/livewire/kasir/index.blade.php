<div>
    @php
        use App\Models\Timetable;
        use App\Models\Transaction;
    @endphp
    <div class="bg-white p-3"
        style="border-radius: 20px; min-height: 100vh; display : @if ($showIndex === true) block @else none @endif;">
        <div class="d-flex justify-content-between">
            <div class="p-2">
                <button class="btn {{ $this->genre === null ? 'btn-dark' : 'btn-secondary' }}" style="border-radius: 10px"
                    wire:click.prevent='resetFilter()'>All</button>
                @foreach ($genres as $genre)
                    <button class="btn {{ $this->genre === $genre->name ? 'btn-dark' : 'btn-secondary' }}"
                        style="border-radius: 10px"
                        wire:click.prevent='filter({{ $genre->id }})'>{{ $genre->name }}</button>
                @endforeach
            </div>
            <div class="p-2">
                <div class="input-group">
                    <input class="form-control border-2 rounded-pill" type="search" wire:model.lazy='search'
                        placeholder="Pencarian...">
                </div>
            </div>
        </div>
        <div class="container pt-3">
            @if (!$timetables->isEmpty())
                <div class="row row-cols-4 g-4">
                    @foreach ($timetables as $timetable)
                        <div class="col d-flex justify-content-center">
                            <a class="text-decoration-none text-dark">
                                <div class="image-container">
                                    @if ($timetable->tumbnail)
                                        <img src="{{ asset('storage/uploads/' . $timetable->tumbnail) }}"
                                            class="poster-img shadow" alt="tumbnail_film" width="200" height="300"
                                            style="border-radius: 20px">
                                    @else
                                        <img src="https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2Frlv.zcache.com%2Ftemplate_film_template_poster-r2887074b782a4030942a741a5346e187_ai6av_8byvr_630.jpg%3Fview_padding%3D%5B285%2C0%2C285%2C0%5D&f=1&nofb=1&ipt=ac2f3ab3487738f4b5e43818cb8cf0e98251e9c1f5f7749e555f73deb6934941&ipo=images"
                                            class="poster-img shadow" alt="tumbnail_film" width="200" height="300"
                                            style="border-radius: 20px">
                                    @endif
                                    <div class="image-caption">
                                        @foreach (collect(explode(',', $timetable->button))->map(function ($showtime) {
            $showtime_arr = explode(';', $showtime);
            return [
                'id' => $showtime_arr[0],
                'time' => $showtime_arr[1],
                'studio' => $showtime_arr[2],
            ];
        })->sortBy('time') as $showtime)
                                            @php
                                                $timetableId = $showtime['id'];
                                                $time = $showtime['time'];
                                                $studio = $showtime['studio'];
                                                
                                                $seatCount = Timetable::find($timetableId)
                                                    ->seat()
                                                    ->count();
                                                
                                                $seatSold = Transaction::where('timetable_id', $timetableId)->sum('quantity');
                                            @endphp
                                            {{-- Untuk menampilakan Jam tidak lebih dari sekarang --}}
                                            @if (\Carbon\Carbon::parse($time)->format('H:i:s') >= $timeNow && $seatSold < $seatCount)
                                                <button class="show"
                                                    wire:click.prevent='pickSeat({{ $timetableId }})'>
                                                    ({{ $studio }})
                                                    {{ \Carbon\Carbon::parse($time)->format('H:i') }}</button>
                                            @else
                                                <button class="disabled" disabled>
                                                    ({{ $studio }})
                                                    {{ \Carbon\Carbon::parse($time)->format('H:i') }}</button>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="poster-title mt-3 ml-3">{{ $timetable->title }}</div>
                                <div class="poster-title mt-1 ml-3 btn btn-dark">{{ $timetable->genre }}</div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="d-flex align-items-center justify-content-center">
                    <img src="{{ asset('search_not_found2.png') }}" width="500">
                    {{-- <h1 class="text-center">Tidak ada film</h1> --}}
                </div>
            @endif

        </div>
    </div>
    <livewire:kasir.seat />
</div>

<script>
    document.addEventListener('livewire:load', function() {
        setInterval(function() {
            @this.call('updateTime');
        }, 60000);
    });
</script>
