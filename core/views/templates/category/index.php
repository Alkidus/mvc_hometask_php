<h1 class="text-center">Categories</h1>
<a href="/categories/create" class="btn btn-primary">Add Category</a>
<table class="table">
    <thead>
        <tr>
            <th>id</th>
            <th>Nmae</th>
            <th>Description</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $item) : ?>
            <tr>
                <td><?= $item->id ?> </td>
                <td><?= $item->name ?> </td>
                <td><?= $item->description ?> </td>
                <td>
                    <div class="d-flex justify-contend-end">
                        <a href="/categories/edit/<?= $item->id ?>" class="btn btn-warning me-2">Edit</a>
                    </div>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>