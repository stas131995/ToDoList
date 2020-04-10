<form method="post" action="">
    <input type="hidden" name="method" value="post">
    @component('components.input', ['name' => 'title', 'errors' => $errors ?? []])
    @endcomponent
    @component('components.input', ['name' => 'description', 'errors' => $errors ?? []])
    @endcomponent
    <div class="buttons">
        <footer class="addbtn">
            <button class=add-button type="submit">
                <i class="fas fa-plus"></i>
            </button>
        </footer>
    </div>
</form>​
@if (isset($errors['count']))
<script language="javascript">
    alert("{{ $errors['count'] }}");
</script>
@endif