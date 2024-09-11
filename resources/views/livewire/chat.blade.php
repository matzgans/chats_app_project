<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <a class="btn btn-info" href="{{ route('chatsview') }}" wire:navigate>Kembali</a>
                <div wire:poll>

                    @foreach ($items as $item)
                        <div class="@if ($item->from_user_id == Auth::user()->id) chat-end @else chat-start @endif chat">
                            <div class="avatar chat-image">
                                <div class="w-10 rounded-full">
                                    <img src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp"
                                        alt="Tailwind CSS chat bubble component" />
                                </div>
                            </div>
                            <div class="chat-header">
                                {{ $item->fromUser->name }}
                                <time class="text-xs opacity-50">{{ $item->created_at->diffForHumans() }}</time>
                            </div>
                            <div class="chat-bubble">{{ $item->message }}</div>
                            <div class="chat-footer opacity-50">Delivered</div>
                        </div>
                    @endforeach
                </div>
                <div class="form-control">
                    <form action="" wire:submit.prevent="sendMessage">
                        @csrf
                        <textarea class="textarea textarea-accent w-full" id="" wire:model="messages"></textarea>
                        <button class="btn btn-accent">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
