{{-- Card row --}}
@foreach ($getData as $card)
<div class="relative flex-shrink-0 w-44 sm:w-[20rem] sm:max-h-[9rem] bg-inherit rounded-xl overflow-hidden shadow-sm border-2 dark:border dark:border-gray-900 shadow-md pro-card-slide">
    <a href="{{$card->link}}" target="_blank" class="relative sm:w-[20rem] sm:max-h-[10rem] overflow-hidden">
        <img class="w-full h-full rounded-xl aspect-video object-cover scale-110 sm:blur-[3px] hover:scale-105 hover:delay-75 hover:brightness-[0.9] hover:blur-0 duration-300 analyze-image" dataid="{{$card->id}}" src="{{asset($card->image)}}">
        <div class="font-poppins sm:flex justify-center pro-text-card hidden">
            <span class="absolute top-[30%] sm:top-[30%] px-3 pb-8 text-md sm:text-md font-light text-blue-100 drop-shadow-sm pro-text-a{{$card->id}}">Go to</span>
            <span class="absolute top-[45%] sm:top-[45%] px-3 pb-3 text-xl sm:text-3xl font-bold text-blue-100 drop-shadow-sm pro-text-b{{$card->id}}">{{$card->title}}</span>
        </div>
    </a>
</div>
@endforeach
