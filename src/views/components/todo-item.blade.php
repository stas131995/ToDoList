<li class="{{ $model->getDone() ? 'done' : '' }}">
    <div class="title">
        <h3>
            <b>{{ $model->getTitle()."--".$model->getDescription()."--".$model->getCreatedDate() }}</b>
        </h3>
    </div>
    <div>
        <form method="post" action="">
            <input type="hidden" name="method" value="patch">
            <input type="hidden" name="id" value="{{ $model->getId() }}">
            <button class="3tt" type="submit"><i class="far fa-check-circle"></i></button>
        </form>
    </div>
    <div>
        <form method="post" action="">
            <input type="hidden" name="method" value="delete">
            <input type="hidden" name="id" value="{{ $model->getId() }}">
            <button class="remove-button" type="submit"><i class="far fa-trash-alt"></i></button>
        </form>
    </div>
</li>