<h1>Edit Category</h1>
<form action="/categories/update" method="post">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" class="form-control" value="<?= $category->name ?>">
    </div>

    <div class="form-group">
        <label for="description">Description:</label>
        <input type="text" name="description" id="description" class="form-control" value="<?= $category->description ?>">
    </div>
    <input type="hidden" name="id" value="<?= $category->id ?>">
    <button class="btn btn-primary mt-3">Save</button>
</form>