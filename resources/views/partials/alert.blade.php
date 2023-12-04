{{-- alert for all --}}
<div class="alert-notification absolute top-0 duration-300 flex justify-center w-full z-20 mt-1 hidden">
    <div class="font-regular relative flex w-1/2 rounded-lg {{ session('error') ? 'bg-gradient-to-tr from-red-600 to-red-500' : 'bg-gradient-to-tr from-green-600 to-green-500' }} px-4 py-4 text-base text-white"
        data-dismissible="alert">
        <div class="absolute top-4 left-4">
            @if (session('success'))
                <i class="ri-checkbox-circle-fill text-lg"></i>
            @endif
            @if (session('error'))
                <i class="ri-alert-fill text-lg"></i>
            @endif
        </div>
        <div class="ml-10 mr-12">
            @if (session('success'))
                {{ session('success') }}
                <script type="text/javascript">
                    const getAlert = document.querySelector('.alert-notification')
                    setTimeout(() => {
                        getAlert.classList.remove('hidden')
                        getAlert.classList.add('animated-swipedown')
                        setTimeout(() => {
                            getAlert.classList.add('top-[-4rem]')
                        }, 8000)
                    }, 800)
                </script>
            @endif
            @if (session('error'))
                {{ session('error') }}
                <script type="text/javascript">
                    const getAlert = document.querySelector('.alert-notification')
                    setTimeout(() => {
                        getAlert.classList.remove('hidden')
                        getAlert.classList.add('animated-swipedown')
                        setTimeout(() => {
                            getAlert.classList.add('top-[-4rem]')
                        }, 8000)
                    }, 500)
                </script>
            @endif
        </div>
        <div class="absolute top-3 right-3 w-max rounded-lg transition-all hover:bg-white hover:bg-opacity-20"
            data-dismissible-target="alert">
            <div role="button" class="w-max">
                <button type="button"
                    class="close-alert-button select-none rounded-lg py-[.1rem] px-4 text-center align-middle font-sans text-xs font-bold uppercase text-white transition-all hover:bg-white/10 active:bg-white/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                    type="button" data-ripple-dark="true">
                    <i class="ri-close-line text-lg"></i>
                </button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    // close buton alert
    document.addEventListener('DOMContentLoaded', function() {
        const getAlert = document.querySelector('.alert-notification')
        const getCloseButton = document.querySelector('.close-alert-button')
        getCloseButton.addEventListener('click', function() {
            getAlert.classList.add('top-[-4rem]')
        })

    })
</script>
