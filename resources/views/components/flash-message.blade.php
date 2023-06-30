@if (session()->has('success'))
    <div x-data="{show: true}" x-init="setTimeout(()=> show = false, 2000)" x-show="show" class="fixed top-10 left-1/2 transform-translate-x-1/2 bg-laravel text-white px-48 py-3">
        <p>
            {{session('success')}}
        </p>
    </div>
@endif