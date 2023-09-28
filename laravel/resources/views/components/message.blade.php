@if (session('success'))
    <p class="message" style="color: green; font-size: 30px;background-color:white ;text-align:center;">
        {{ session('success') }}
    </p>
@endif
@if (session('error'))
    <p class="message" style="color: red; font-size: 30px;background-color:white ;text-align:center;">
        {{ session('error') }}</p>
@endif

<script src="{{ asset('js/fade.js') }}"></script>
