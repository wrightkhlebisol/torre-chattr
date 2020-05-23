<div class="flex my-5 border-solid border-2 border-gray-200 p-2">
    <div class="flex-1 items-center text-sm p-2">
        <img src="https://i.pravatar.cc/40" alt="{{ $chattr->torre_details_id }}" class="rounded-full mr-2">
    </div>
    <p class="flex-1 p-2 lg:text-lg text-xs">{{ $chattr->chattr }}</p>

    <div class="flex-1 items-center lg:text-3xl text-sm">
        <div class="flex-1 p-2">
            <a href="#up">{{ $chattr->likes }} 👍</a>
        </div>
        <div class="flex-1 p-2">
            <a href="#down">{{ $chattr->dislike }} 👎</a>
        </div>
    </div>
</div>
