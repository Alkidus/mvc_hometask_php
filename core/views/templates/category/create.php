<h1>Create Category</h1>

<form action="/categories/store" method="post">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" class="form-control">
    </div>

    <div class="form-group">
        <label for="description">Description:</label>
        <input type="text" name="description" id="description" class="form-control">
    </div>

    <button class="btn btn-primary mt-3">Save</button>
</form>