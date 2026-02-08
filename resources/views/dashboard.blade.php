<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>

            <p>
                Logged in as: <strong>{{ auth()->user()->email }}</strong><br>
                Role: <strong>{{ auth()->user()->role }}</strong>
            </p>

            <div id="chat-messages"></div>

            <form id="chat-form">
                <input type="hidden" id="receiver_id" value="2">
                <input type="text" id="message-input" placeholder="Type message">
                <button>Send</button>
            </form>

            <script>
            document.getElementById('chat-form').addEventListener('submit', async (e) => {
                e.preventDefault();

                await fetch('/messages', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        receiver_id: document.getElementById('receiver_id').value,
                        content: document.getElementById('message-input').value
                    })
                });

                document.getElementById('message-input').value = '';
            });
            </script>



            <div id="realtime-messages" style="margin-top:20px;"></div>

        </div>
    </div>
</x-app-layout>
