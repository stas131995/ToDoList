<div class="inputDiv {{ isset($errors[$name]) ? 'errors' : '' }}">
    <label for="{{ $name }}">{{ ucwords($name) }}:</label>
    <input id="{{ $name }}" class="inputins" name="{{ $name }}" type="text" value="{{count($errors ?? []) ? $_POST[$name] : ''}}">
    @if (isset($errors[$name]))
    <p class="error">{{$errors[$name]}}</p>
    @endif
</div>